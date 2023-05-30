<?php
header("Content-Type: application/json");
echo <<<HTML
        Hola Mundo <br><a href="index.html" target="_blank">Volver</a><br>
        HTML;
print_r($_POST);
?>