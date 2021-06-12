<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

    function printJSDebug($data){
        $is_debug = true;
        
        if($is_debug){
            echo "<script>";
            echo "    console.log('$data');";
            echo "</script>";
        }
    }
    
?>
