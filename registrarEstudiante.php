<?php

if(isset($_POST['guardar'])){
    echo"si";
    require_once("config.php");
    $config=new Config();

    $config->setNombre($_POST['nombres']);
    $config->setDireccion($_POST['direccion']);
    $config->setLogros($_POST['logros']);
    $config->setingles($_POST['ingles']);
    $config->setser($_POST['ser']);
    $config->setreviw($_POST['review']);
    $config->setskill($_POST['skill']);
    $config->setexpertoteg($_POST['expertoTeg']);
    $config->insertData();
    echo "<script>alert(se a registrado);window.location='estudiantes.php'</script>";
}

?>