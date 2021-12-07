<?php
function u_signup(){
    include("db.php");
    if(isset($_POST['u_signup'])){
      
        $u_email = $_POST['u_email'];
        $u_pass = $_POST['u_pass'];
        $u_hpass = password_hash($u_pass, PASSWORD_BCRYPT);
        $r_pass = $_POST['r_pass'];
        if($_POST['u_pass']===$_POST['r_pass']){
            $now = date_create()->format('Y-m-d H:i:s');
            $check_email=$con->prepare("SELECT * FROM users WHERE u_email=?");
            $check_email->setFetchMode(PDO:: FETCH_ASSOC);
            $check_email->execute([$u_email]);
            $user_count=$check_email->rowCount();
            if($user_count==1){
                echo"<script>alert('Email Address already exists');</script>";
                echo"<script>window.open('index.php','_SELF');</script>";
            }else{
                $add_user="INSERT INTO users (u_email,u_pass,u_reg_date)
                 VALUES (?,?,?)";
                $add_user = $con->prepare($add_user);
            if($add_user->execute([$u_email,$u_hpass,$now])){
                echo "<script> alert('Registration successfully.');</script>";
                echo"<script>window.open('index.php','_SELF');</script>";
            }else{
                echo"<script>alert('Registration failed, check your form');</script>";
            }
        }
        }else{
            echo"<script>alert('Password do not match');</script>"; 
        }
  }
}
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //from internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return  $ip;
}
function login(){
    include("db.php");
    if(isset($_POST['u_login'])){
        $email = $_POST['login_email'];
        $pass = $_POST['login_pass'];

        $select = $con->prepare("SELECT * FROM users WHERE u_email=?");
        $select->setFetchMode(PDO:: FETCH_ASSOC);
        $select->execute([$email]);
        
            $get_u_id=$select->fetch();
            if($get_u_id && password_verify($_POST['login_pass'], $get_u_id['u_pass'])){
               
            
            $check = $select->rowCount();
            if($check == 1){
                $_SESSION['u_email'] = $email;
                $u_id=$get_u_id['u_id'];
                $ip=getUserIpAddr();
                echo"<script>window.open('index.php','_SELF');</script>";
            }
        }
        else{
            echo"<script>alert('Incorrect Email or Password!');</script>";
            echo"<script>window.open('index.php','_SELF');</script>";
        }
    }
}

?>