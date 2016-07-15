<?php
spl_autoload_register(function ($class) {
         if(file_exists(dirname(__file__).'/../src/'.$class . '.php')){
                include dirname(__file__).'/../src/'.$class . '.php';
         }
});
?>
