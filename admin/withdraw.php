<?php
session_start();
include("inc/function.php");
if(!isset($_SESSION['u_email'])){
    
}else{
    echo  withdraw_loan();
  
}

?>