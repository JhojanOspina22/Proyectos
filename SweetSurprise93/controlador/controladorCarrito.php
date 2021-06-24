<?php

$mensaje='';
$alert='';
session_start();

if(isset($_POST['btnAccion'])){

switch($_POST['btnAccion']){

    case 'Agregar':

        if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){

            $ID=openssl_decrypt($_POST['id'],COD,KEY);

        }
        if(is_string( openssl_decrypt($_POST['nombre'],COD,KEY))){

            $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);

        }
        if(is_string( openssl_decrypt($_POST['descrip'],COD,KEY))){

            $DESCRIPCION=openssl_decrypt($_POST['descrip'],COD,KEY);

        }
        if(is_numeric( openssl_decrypt($_POST['canti'],COD,KEY))){

            $CANTIDAD=openssl_decrypt($_POST['canti'],COD,KEY);

        }
        if(is_numeric( openssl_decrypt($_POST['preci'],COD,KEY))){

            $PRECIO=openssl_decrypt($_POST['preci'],COD,KEY);

        }
        if(is_string( openssl_decrypt($_POST['img'],COD,KEY))){

            $IMAGEN=openssl_decrypt($_POST['img'],COD,KEY);

        }

        if (!isset($_SESSION['CARRITO'])) {
            $producto=array(

                'ID'=>$ID,
                'NOMBRE'=>$NOMBRE,
                'DESCRIPCION'=>$DESCRIPCION,
                'CANTIDAD'=>$CANTIDAD,
                'PRECIO'=>$PRECIO,
                'IMAGEN'=>$IMAGEN

            );
            $_SESSION['CARRITO'][0]=$producto;
            $mensaje='Producto añadido al carrito';
            $alert='success';
            
        }else{
            $idproductos=array_column($_SESSION['CARRITO'],'ID');
            if(in_array($ID,$idproductos)){

                $mensaje='El producto ya esta registrado';
                $alert='warning';
            }else{

            
            


            $numProduc=count($_SESSION['CARRITO']);
            $producto=array(

                'ID'=>$ID,
                'NOMBRE'=>$NOMBRE,
                'DESCRIPCION'=>$DESCRIPCION,
                'CANTIDAD'=>$CANTIDAD,
                'PRECIO'=>$PRECIO,
                'IMAGEN'=>$IMAGEN

            );
            $_SESSION['CARRITO'][$numProduc]=$producto;
            $mensaje='Producto añadido al carrito';
            $alert='success';

        }
    }
     
    break;

    case 'Eliminar':
        
        if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){

            $ID=openssl_decrypt($_POST['id'],COD,KEY);

            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                
                if ($producto['ID']==$ID) {
                    unset($_SESSION['CARRITO'][$indice]);
                    $mensaje='Producto eliminado del carrito';

                }

            }

        }

    break;

    case 'Vacear':
        unset($_SESSION['CARRITO']);
        
        
    break;
  


}

}