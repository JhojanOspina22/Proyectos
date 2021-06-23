using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Mail;
using System.Text;
using System.Threading.Tasks;
using System.Web;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using Entidades;
using OfficeOpenXml;
using Repositorio;

namespace Logica
{
    public class UsuarioLogica
    {
        private UsuarioRepository repositorio = new UsuarioRepository();
        public List<Usuario> GetUsuarios()
        {
            try
            {
                return repositorio.GetUsuarios();
            }
            catch(Exception ex)
            {
                return null;
            }
        }
        public Usuario ListarUsuario(int IdUsuario)
        {
            try
            {
                return repositorio.ListarUsuario(IdUsuario);
            }
            catch (Exception ex)
            {
                return null;
            }
        }

        private bool EnviarEmail(string to, bool creado,string nombreUsuario)
        {
            try
            {
                String FROM = "storeinventorycontrolauth@gmail.com";
                String FROMNAME = "prueba";


                String TO = to;

                // Replace smtp_username with your Amazon SES SMTP user name.
                String SMTP_USERNAME = "enviocorrectoproyecto@gmail.com";

                // Replace smtp_password with your Amazon SES SMTP password.
                String SMTP_PASSWORD = "prueba123456";

                // (Optional) the name of a configuration set to use for this message.
                // If you comment out this line, you also need to remove or comment out
                // the "X-SES-CONFIGURATION-SET" header below.
                String CONFIGSET = "ConfigSet";

                // If you're using Amazon SES in a region other than US West (Oregon), 
                // replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
                // endpoint in the appropriate AWS Region.
                String HOST = "smtp.gmail.com";

                // The port you will connect to on the Amazon SES SMTP endpoint. We
                // are choosing port 587 because we will use STARTTLS to encrypt
                // the connection.
                int PORT = 587;

                // The subject line of the email
                String SUBJECT =
                    "Notificacion Estado Proceso";

                // The body of the email
                String BODY =
                    $"<h1>{(creado ? "Exitoso" : "Fallido")}</h1>" +
                    $"<p>{(creado ? "Datos almacenados correctamente del usuario " + nombreUsuario : "Falló al almacenar los datos del usuario " + nombreUsuario)}</p>";

                // Create and build a new MailMessage object
                MailMessage message = new MailMessage();
                message.IsBodyHtml = true;
                message.From = new MailAddress(FROM, FROMNAME);
                message.To.Add(new MailAddress(TO));
                message.Subject = SUBJECT;
                message.Body = BODY;
                // Comment or delete the next line if you are not using a configuration set
                //message.Headers.Add("X-SES-CONFIGURATION-SET", CONFIGSET);

                using (var client = new System.Net.Mail.SmtpClient(HOST, PORT))
                {
                    // Pass SMTP credentials
                    client.Credentials =
                        new NetworkCredential(SMTP_USERNAME, SMTP_PASSWORD);

                    // Enable SSL encryption
                    client.EnableSsl = true;

                    client.Send(message);
                    return true;
                }
            }
            catch (Exception ex)
            {
                return false;
            }
            
           
        }


        public bool CrearUsuarios(Usuario u)
        {
            try
            {
               var creado= repositorio.CrearUsuarios(u);
                EnviarEmail(u.Correo, creado, u.NombreCompleto);
                return creado;
               
                }
            catch (Exception ex)
            {
                return false;
            }
        }

        public bool ModificarUsuarios(Usuario u)
        {
            try
            {
                return repositorio.ModificarUsuarios(u);
            }
            catch (Exception ex)
            {
                return false;
            }
        }

        public bool EliminarUsuarios(Usuario u)
        {
            try
            {
                return repositorio.EliminarUsuarios(u);
            }
            catch (Exception ex)
            {
                return false;
            }
        }
        private void ExportToExcel(string nameReport, GridView wControl,HttpResponseBase response)
        {
          
            StringWriter sw = new StringWriter();
            HtmlTextWriter htw = new HtmlTextWriter(sw);
            Page pageToRender = new Page();
            HtmlForm form = new HtmlForm();
            form.Controls.Add(wControl);
            pageToRender.Controls.Add(form);
            response.Clear();
            response.Buffer = true;
            response.ContentType = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
            response.AddHeader("Content-Disposition", "attachment;filename=" + nameReport);
            response.Charset = "UTF-8";
            response.ContentEncoding = Encoding.Default;
            pageToRender.RenderControl(htw);
            response.Write(sw.ToString());
            response.End();
        }
        private void ExportToCSV(string nameReport, GridView wControl, HttpResponseBase response)
        {

            StringWriter sw = new StringWriter();
            HtmlTextWriter htw = new HtmlTextWriter(sw);
            Page pageToRender = new Page();
            HtmlForm form = new HtmlForm();
            form.Controls.Add(wControl);
            pageToRender.Controls.Add(form);
            response.Clear();
            response.Buffer = true;
            response.ContentType = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
            response.AddHeader("Content-Disposition", "attachment;filename=" + nameReport);
            response.Charset = "UTF-8";
            response.ContentEncoding = Encoding.Default;
            pageToRender.RenderControl(htw);
            response.Write(sw.ToString());
            response.End();
        }
        public bool ExportarXls(List<Usuario> usuarios,HttpResponseBase Response)
        {
            try
            {
                GridView GridView1 = new GridView();
                GridView1.DataSource = usuarios;
                GridView1.DataBind();

                ExportToExcel("Informe.xls", GridView1,Response);

                return true;
            }
            catch (Exception ex)
            {
                return false;
            }
        }
        public string ExportarCsv(List<Usuario> usuarios)
        {
            try
            {


                StringBuilder sb = new StringBuilder();

                usuarios.ForEach(u =>
                {

                    sb.AppendLine($"{u.NombreCompleto},{ u.Identificacion},{u.Telefono},{u.Direccion},{u.Ciudad},{u.Correo}");

                });


                return sb.ToString();
            }
            catch (Exception ex)
            {
                return "";
            }
        }


    }
}
