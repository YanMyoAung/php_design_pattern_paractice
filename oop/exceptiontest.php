<?php

$file = "BLBLB";
try{
    if( !file_exists($file)){
        throw new Exception("File not found ok");
    }
}catch(Exception $e){
    echo $e->getFile();
}