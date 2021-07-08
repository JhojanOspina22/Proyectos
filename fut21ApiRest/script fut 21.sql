
EXEC sp_configure 'show advanced options', 1
RECONFIGURE

EXEC sp_configure 'Ole Automation Procedures', 1
RECONFIGURE

GO

IF EXISTS (SELECT * FROM sys.databases WHERE name = 'fut21')
BEGIN
    drop database fut21
END;
GO
CREATE DATABASE fut21;
GO
use [fut21]
create table jugador(
id int  primary key,
firstName nvarchar (50),
lastName nvarchar (50),
position nvarchar (50),
nacionality nvarchar (50),
club nvarchar (50)

);
GO




-- Variable declaration related to the Object.
DECLARE @token INT;
DECLARE @ret INT;

-- Variable declaration related to the Request.
DECLARE @url NVARCHAR(MAX);
DECLARE @authHeader NVARCHAR(64);
DECLARE @contentType NVARCHAR(64);
DECLARE @apiKey NVARCHAR(32);

-- Variable declaration related to the JSON string.
DECLARE @json AS TABLE(Json_Table NVARCHAR(MAX))
DECLARE @openjson AS TABLE(apikey NVARCHAR(MAX),valor nvarchar(max),type int)
DECLARE @jugadoresjson AS TABLE(jugadoresjson nvarchar(max))
declare @totalpages int =0
DECLARE @page INT = 1;


-- Define the URL
SET @url = 'https://www.easports.com/fifa/ultimate-team/api/fut/item?page='+ cast(@page as nvarchar)

-- This creates the new object.
EXEC @ret = sp_OACreate 'MSXML2.XMLHTTP', @token OUT;
IF @ret <> 0 RAISERROR('Unable to open HTTP connection.', 10, 1);

-- This calls the necessary methods.
EXEC @ret = sp_OAMethod @token, 'open', NULL, 'GET', @url, 'false';
EXEC @ret = sp_OAMethod @token, 'send'

-- Grab the responseText property, and insert the JSON string into a table temporarily. This is very important, if you don't do this step you'll run into problems.
INSERT into @json (Json_Table) EXEC sp_OAGetProperty @token, 'responseText'


 select @totalpages= CAST(totalpages as int) from openjson ((select * from @json)) WITH (
    
    page NVARCHAR(50) '$.page' ,
	 totalpages NVARCHAR (50) '$.totalPages'
  );


DECLARE @cnt2 INT = 1;

WHILE @cnt2 <= @totalpages
BEGIN
 

 if(@cnt2=1)
 begin
 insert into @openjson  select * from openjson ((select * from @json)) 


insert into @jugadoresjson  select value from openjson ((select  op.valor  from @openjson op where op.valor LIKE '%{%'))

 DECLARE @cnt INT = 0;

WHILE @cnt < (select count(jugadoresjson) from @jugadoresjson)
BEGIN

 insert into jugador select * from openjson ((select  * from @jugadoresjson order by jugadoresjson  OFFSET @cnt ROWS     fETCH NEXT 1 ROWS ONLY ))  WITH (

  
    id NVARCHAR(50) '$.id',
	firstName NVARCHAR(50) '$.firstName',
	lastName NVARCHAR(50) '$.lastName' ,
	position NVARCHAR(50) '$.position' ,
	nacionality NVARCHAR(50) '$.nation.name' ,
	club NVARCHAR(50) '$.club.name' 


  );


  set @cnt=@cnt+1;
END;

end

 else
  begin
  -- Define the URL
SET @url = 'https://www.easports.com/fifa/ultimate-team/api/fut/item?page=' + CAST(@page as  nvarchar)

-- This creates the new object.
EXEC @ret = sp_OACreate 'MSXML2.XMLHTTP', @token OUT;
IF @ret <> 0 RAISERROR('Unable to open HTTP connection.', 10, 1);

-- This calls the necessary methods.
EXEC @ret = sp_OAMethod @token, 'open', NULL, 'GET', @url, 'false';
EXEC @ret = sp_OAMethod @token, 'send'

-- Grab the responseText property, and insert the JSON string into a table temporarily. This is very important, if you don't do this step you'll run into problems.
delete from @json
INSERT into @json (Json_Table) EXEC sp_OAGetProperty @token, 'responseText'
delete from @openjson
insert into @openjson  select * from openjson ((select * from @json)) 

delete from @jugadoresjson

insert into @jugadoresjson  select value from openjson ((select  op.valor  from @openjson op where op.valor LIKE '%{%'))

 set @cnt=0;

WHILE @cnt < (select count(jugadoresjson) from @jugadoresjson)
BEGIN
insert into jugador select * from openjson ((select  * from @jugadoresjson order by jugadoresjson  OFFSET @cnt ROWS     fETCH NEXT 1 ROWS ONLY ))  WITH (
    
	    id NVARCHAR(50) '$.id',
	firstName NVARCHAR(50) '$.firstName',
	lastName NVARCHAR(50) '$.lastName' ,
	position NVARCHAR(50) '$.position' ,
	nacionality NVARCHAR(50) '$.nation.name' ,
	club NVARCHAR(50) '$.club.name' 

	
  );
  set @cnt=@cnt+1;
END;
end
 
 set @cnt2=@cnt2+1; 
 set @page=@page+1;
END;
