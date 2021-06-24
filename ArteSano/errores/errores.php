<?php

function mostrarerrores ($errores, $campo)
{
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo) )
    {
        $alerta = "<center><div class='alerta alerta-error' style='color:red;'>".$errores[$campo].'</div><center>';
    }
    return $alerta;
}

function borrar()
{
    $_SESSION['error']=NULL;
    $borrado= isset($_SESSION['error'])?session_unset($_SESSION['error']):NULL;
    return $borrado;
}
?>