<?php
    function getsafe($conn,$str)
    {
        if($str!=""){
            return mysqli_real_escape_string($conn,$str);
        }
    }
?>