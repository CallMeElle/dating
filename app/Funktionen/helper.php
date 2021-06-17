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