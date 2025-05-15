<?php
session_destroy();

if(headers_sent()){
    echo "<sript> window.location.href='index.php?vista=home';
    </script>";
   
}else{
    header("location:index.phph?vista=home");
    
}