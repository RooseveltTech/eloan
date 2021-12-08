<?php
session_start();
include("inc/function.php");
if(!isset($_SESSION['u_email'])){
    
}else{
    echo  cancel_loan();
  
}

?>