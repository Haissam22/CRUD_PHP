<?php

require_once('config.php');
$record=new Config();
echo "si";
if(isset($_GET['id'])&& isset($_GET['req'])){
    echo "no se";
    if($_GET['req']=="delete");
    $record->setId($_GET['id']);
    $record->delete();
    echo "<script>alert('datos borrados exitosamente');document.location='estudiantes.php'</script>";
}
?>