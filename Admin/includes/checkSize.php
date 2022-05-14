<?php
 
 function checkSize($file,$maxSize){
    if($file['size'] > $maxSize){
        return false;
    }else{
        return true;
    }
 }