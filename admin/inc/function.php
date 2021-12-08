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

function loan_apply(){
    include("db.php");
    if(isset($_POST['l_loanrequest'])){
        if($_POST['l_title']== ""
                // $_POST['l_firstname']== "" ||
                // $_POST['l_lastname']== "" ||
                // $_POST['l_homeaddress']== "" ||
                // $_POST['l_homecountry']== "" ||
                //  $_POST['l_homestate']== "" ||
                //   $_POST['l_homecity']== "" ||
                //   $_POST['l_businessaddress']== "" ||
                //  $_POST['l_businesscountry']== "" ||
                //    $_POST['l_businessstate']== "" ||
                //    $_POST['l_businesscity']== "" ||
                //    $_POST['l_dateofbirth']== "" ||
                //    $_POST['l_nationalitycountry']== "" ||
                //     $_POST['l_residencecountry']== "" ||
                //     $_POST['l_homezipcode']== "" ||
                //     $_POST['l_maritalstatus']== "" ||
                //   $_POST['l_email']== "" ||
                //     $_POST['l_phonenumber']== "" ||
                //       $_POST['l_businessname']== "" ||
                //       $_POST['l_businesslicensenumber']== "" ||
                //        $_POST['l_typeofbusiness']== "" ||
                //         $_POST['l_monthlyincome']== "" ||
                //        $_POST['l_accountnumber']== "" ||
                //        $_POST['l_bankname']== "" ||
                //       $_POST['l_businesscertificate']== "" ||
                //         $_POST['l_utilitybill']== "" ||
                //          $_POST['l_legalid']== "" ||
                //          $_POST['l_loanamount']== "" ||
                //            $_POST['l_loanduration']== "" ||
                //            $_POST['l_numberofemployee']== "" ||
                //           $_POST['l_businessrole']== "" ||
                //            $_POST['l_taxid']== "" ||
                //            $_POST['l_headshot']== "" ||
                //             $_POST['l_purposeofloan']== "" ||
                //             $_POST['l_howlonghomeaddress']== "" ||
                //              $_POST['l_guarantortitle']== "" ||
                //              $_POST['l_guarantorfirstname']== "" ||
                //               $_POST['l_guarantorlastname']== "" ||
                //               $_POST['l_guarantorrelationship']== "" ||
                //                 $_POST['l_guarantorutilitybill']== "" ||
                //                 $_POST['l_guarantorlegalid']== "" ||
                //               $_POST['l_guarantorphonenumber']== "" ||
                //                $_POST['l_guarantorheadshot']== "" || 
                //                 $_POST['l_agree']== "" ||
                //                 $_POST['l_termsandcondition']== "" 
                                 ){
                                    echo "<script> alert('All fields are required.');</script>";
                                    echo"<script>window.open('apply_loans.php','_SELF');</script>";
                                     
                }else{
                    $email = $_SESSION['u_email'];
                    $get_user=$con->prepare("SELECT * FROM users WHERE u_email='$email'");
                    $get_user->setFetchMode(PDO:: FETCH_ASSOC);
                    $get_user->execute();
                    $row_user=$get_user->fetch();
                    $u_id=$row_user['u_id'];
                 $u_email = $_SESSION['u_email'];
                 $loan_code = "REQ".substr(mt_rand(),0,10)."LNS";
                  $l_title = $_POST['l_title'];
                  $l_firstname = $_POST['l_firstname']; 
                  $l_lastname = $_POST['l_lastname']; 
                   $l_middlename = $_POST['l_middlename']; 
                   $l_homeaddress = $_POST['l_homeaddress']; 
                    $l_homecountry = $_POST['l_homecountry'];  
                    $l_homestate = $_POST['l_homestate']; 
                    $l_homecity = $_POST['l_homecity']; 
                    $l_businessaddress = $_POST['l_businessaddress']; 
                     $l_businesscountry = $_POST['l_businesscountry']; 
                      $l_businessstate  = $_POST['l_businessstate']; 
                     $l_businesscity = $_POST['l_businesscity']; 
                     $l_dateofbirth = $_POST['l_dateofbirth']; 
                     $l_nationalitycountry = $_POST['l_nationalitycountry']; 
                      $l_residencecountry = $_POST['l_residencecountry']; 
                      $l_homezipcode = $_POST['l_homezipcode']; 
                      $l_maritalstatus = $_POST['l_maritalstatus']; 
                       $l_email = $_POST['l_email']; 
                       $l_phonenumber = $_POST['l_phonenumber']; 
                        $l_businessname = $_POST['l_businessname']; 
                        $l_businesslicensenumber = $_POST['l_businesslicensenumber']; 
                         $l_typeofbusiness = $_POST['l_typeofbusiness']; 
                         $l_monthlyincome = $_POST['l_monthlyincome']; 
                         $l_accountnumber = $_POST['l_accountnumber']; 
                         $l_bankname = $_POST['l_bankname']; 

                         $l_businesscertificate = $_FILES['l_businesscertificate']['name']; 
                         $l_businesscertificate_tmp = $_FILES['l_businesscertificate']['tmp_name'];

                        
                          $l_utilitybill  = $_FILES['l_utilitybill']['name']; 
                          $l_utilitybill_tmp = $_FILES['l_utilitybill']['tmp_name'];

                          $l_legalid = $_FILES['l_legalid']['name']; 
                          $l_legalid_tmp = $_FILES['l_legalid']['tmp_name'];

                          $l_headshot = $_FILES['l_headshot']['name']; 
                          $l_headshot_tmp = $_FILES['l_headshot']['tmp_name'];


                          move_uploaded_file($l_businesscertificate_tmp,"img/loan_imgs/$l_businesscertificate");
                          move_uploaded_file($l_utilitybill_tmp,"img/loan_imgs/$l_utilitybill");
                          move_uploaded_file($l_legalid_tmp,"img/loan_imgs/$l_legalid");
                          move_uploaded_file($l_headshot_tmp,"img/loan_imgs/$l_headshot");
                          

                          $l_loanamount = $_POST['l_loanamount']; 
                           $l_loanduration = $_POST['l_loanduration']; 
                            $l_numberofemployee = $_POST['l_numberofemployee']; 
                             $l_businessrole = $_POST['l_businessrole']; 
                             $l_taxid = $_POST['l_taxid']; 

                              $l_purposeofloan = $_POST['l_purposeofloan']; 
                              $l_howlonghomeaddress = $_POST['l_howlonghomeaddress']; 
                               $l_guarantortitle = $_POST['l_guarantortitle']; 
                               $l_guarantorfirstname = $_POST['l_guarantorfirstname']; 
                                $l_guarantorlastname = $_POST['l_guarantorlastname']; 
                                $l_guarantormiddlename = $_POST['l_guarantormiddlename']; 
                                $l_guarantorrelationship = $_POST['l_guarantorrelationship']; 
                                 $l_guarantorutilitybill = $_FILES['l_guarantorutilitybill']['name']; 
                                 $l_guarantorutilitybill_tmp = $_FILES['l_guarantorutilitybill']['tmp_name'];
                              move_uploaded_file($l_guarantorutilitybill_tmp,"img/loan_imgs/$l_guarantorutilitybill");
                                 $l_guarantorlegalid = $_FILES['l_guarantorlegalid']['name']; 
                                 $l_guarantorlegalid_tmp = $_FILES['l_guarantorlegalid']['tmp_name'];
                              move_uploaded_file($l_guarantorlegalid_tmp,"img/loan_imgs/$l_guarantorlegalid");
                                 $l_guarantorphonenumber = $_POST['l_guarantorphonenumber']; 
                                  $l_guarantorheadshot = $_FILES['l_guarantorheadshot']['name']; 
                                  $l_guarantorheadshot_tmp = $_FILES['l_guarantorheadshot']['tmp_name'];
                              move_uploaded_file($l_guarantorheadshot_tmp,"img/loan_imgs/$l_guarantorheadshot");
                                  $l_guarantortaxid = $_POST['l_guarantortaxid']; 
                                  $l_requestdate = date_create()->format('Y-m-d H:i:s');
                    $apply_loan = "INSERT INTO loan_requests(u_id, u_email, loan_code, l_title, l_firstname, l_lastname, l_middlename, l_homeaddress, l_homecountry, l_homestate, l_homecity, l_businessaddress, l_businesscountry, l_businessstate, l_businesscity, l_dateofbirth, l_nationalitycountry, l_residencecountry, l_homezipcode, l_maritalstatus, l_email, l_phonenumber, l_businessname, l_businesslicensenumber, l_typeofbusiness, l_monthlyincome, l_accountnumber, l_bankname, l_businesscertificate, l_utilitybill, l_legalid, l_loanamount, l_loanduration, l_numberofemployee, l_businessrole, l_taxid, l_headshot, l_purposeofloan, l_howlonghomeaddress, l_guarantortitle, l_guarantorfirstname, l_guarantorlastname, l_guarantormiddlename, l_guarantorrelationship, l_guarantorutilitybill, l_guarantorlegalid, l_guarantorphonenumber, l_guarantorheadshot, l_guarantortaxid, l_agree, l_termsandcondition, l_requestdate, l_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $apply_loan = $con->prepare($apply_loan);
                    if($apply_loan->execute([$u_id, $u_email, $loan_code, $l_title, $l_firstname, $l_lastname, $l_middlename, $l_homeaddress, $l_homecountry, $l_homestate, $l_homecity, $l_businessaddress, $l_businesscountry, $l_businessstate, $l_businesscity, $l_dateofbirth, $l_nationalitycountry, $l_residencecountry, $l_homezipcode, $l_maritalstatus, $l_email, $l_phonenumber, $l_businessname, $l_businesslicensenumber, $l_typeofbusiness, $l_monthlyincome, $l_accountnumber, $l_bankname, $l_businesscertificate, $l_utilitybill, $l_legalid, $l_loanamount, $l_loanduration, $l_numberofemployee, $l_businessrole, $l_taxid, $l_headshot, $l_purposeofloan, $l_howlonghomeaddress, $l_guarantortitle, $l_guarantorfirstname, $l_guarantorlastname, $l_guarantormiddlename, $l_guarantorrelationship, $l_guarantorutilitybill, $l_guarantorlegalid, $l_guarantorphonenumber, $l_guarantorheadshot, $l_guarantortaxid, "YES", "YES", $l_requestdate, "PENDING"])){
                        echo "<script> alert('Loan Application Successful.');</script>";
                        echo"<script>window.open('index.php','_SELF');</script>";
                    }
                }
    }
}
function viewall_loans(){
    include("inc/db.php");
    if(isset($_POST['loan_search'])){
        // $pro_name=$_POST['loan_query'];
        // $fetch_job = $con->prepare("SELECT * FROM loan_requests WHERE pro_name LIKE '%$pro_name%' OR pro_keyword LIKE '%$pro_name%' ORDER BY 1 DESC");
        // $fetch_job->setFetchMode(PDO:: FETCH_ASSOC);
        // $fetch_job->execute();
    }else{
        $fetch_loan = $con->prepare("SELECT * FROM loan_requests where l_status=? ORDER BY 1 DESC");
        $fetch_loan->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_loan->execute(["PENDING"]);
        
    }
   $i=1;
  
   while($row = $fetch_loan->fetch()):
        $status=$row['l_status'];
        echo "<tr>
                <th scope='row'>".$i++."</th>
                <td><form method='POST'><a href='loan.php?view_loan=".$row['loan_id']."'>".$row['loan_code']."</a></form></td>
                <td>".$row['l_loanamount']."</td>
                <td>".$row['l_status']."</td>
                <td>".$row['l_requestdate']."</td>";
                if($status=='PENDING'){
                    echo"<td><a href='index.php?cancel_id=".$row['loan_id']."'>Cancel</a> OR <a href='index.php?approve_id=".$row['loan_id']."'>Approve</a></td>";
                }else if($status=='CANCELLED'){
                    echo"<td>DECLINED</td>";
                }else if($status=='APPROVED'){
                echo"<td>Awaiting Withdrawal</td>";
                }else if($status=='WITHDRAWN'){
                    echo"<td>Pay Now</td>";
                }else if($status=='PAID'){
                    echo"<td>CLEARED</td>";
                }

           echo "</tr>";
            endwhile;
}
function viewall_disapproved(){
  include("inc/db.php");
  if(isset($_POST['loan_search'])){
      // $pro_name=$_POST['loan_query'];
      // $fetch_job = $con->prepare("SELECT * FROM loan_requests WHERE pro_name LIKE '%$pro_name%' OR pro_keyword LIKE '%$pro_name%' ORDER BY 1 DESC");
      // $fetch_job->setFetchMode(PDO:: FETCH_ASSOC);
      // $fetch_job->execute();
  }else{
      $fetch_loan = $con->prepare("SELECT * FROM loan_requests where l_status=? ORDER BY 1 DESC");
      $fetch_loan->setFetchMode(PDO:: FETCH_ASSOC);
      $fetch_loan->execute(["DISAPPROVED"]);
      
  }
 $i=1;

 while($row = $fetch_loan->fetch()):
      $status=$row['l_status'];
      echo "<tr>
              <th scope='row'>".$i++."</th>
              <td><form method='POST'><a href='loan.php?view_loan=".$row['loan_id']."'>".$row['loan_code']."</a></form></td>
              <td>".$row['l_loanamount']."</td>
              <td>".$row['l_status']."</td>
              <td>".$row['l_requestdate']."</td>";
              if($status=='PENDING'){
                  echo"<td><a href='index.php?cancel_id=".$row['loan_id']."'>Cancel</a></td>";
              }else if($status=='CANCELLED'){
                  echo"<td>DECLINED</td>";
              }else if($status=='APPROVED'){
              echo"<td>WITHDRAW</td>";
              }else if($status=='DISAPPROVED'){
                echo"<td>DISABLED</td>";
              }else if($status=='WITHDRAWN'){
                  echo"<td>Pay Now</td>";
              }else if($status=='PAID'){
                  echo"<td>CLEARED</td>";
              }

         echo "</tr>";
          endwhile;
}
function viewall_approved(){
  include("inc/db.php");
  if(isset($_POST['loan_search'])){
      // $pro_name=$_POST['loan_query'];
      // $fetch_job = $con->prepare("SELECT * FROM loan_requests WHERE pro_name LIKE '%$pro_name%' OR pro_keyword LIKE '%$pro_name%' ORDER BY 1 DESC");
      // $fetch_job->setFetchMode(PDO:: FETCH_ASSOC);
      // $fetch_job->execute();
  }else{
      $fetch_loan = $con->prepare("SELECT * FROM loan_requests where l_status=? ORDER BY 1 DESC");
      $fetch_loan->setFetchMode(PDO:: FETCH_ASSOC);
      $fetch_loan->execute(["APPROVED"]);
      
  }
 $i=1;

 while($row = $fetch_loan->fetch()):
      $status=$row['l_status'];
      echo "<tr>
              <th scope='row'>".$i++."</th>
              <td><form method='POST'><a href='loan.php?view_loan=".$row['loan_id']."'>".$row['loan_code']."</a></form></td>
              <td>".$row['l_loanamount']."</td>
              <td>".$row['l_status']."</td>
              <td>".$row['l_requestdate']."</td>";
              if($status=='PENDING'){
                  echo"<td><a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='CANCELLED'){
                  echo"<td>DECLINED</td>";
              }else if($status=='APPROVED'){
              echo"<td><a href='index.php?withdraw_id=".$row['loan_id']."'>WITHDRAW</a> OR <a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='DISAPPROVED'){
                echo"<td>DISABLED</td>";
              }else if($status=='WITHDRAWN'){
                  echo"<td>Pay Now</td>";
              }else if($status=='PAID'){
                  echo"<td>CLEARED</td>";
              }

         echo "</tr>";
          endwhile;
}
function viewall_withdraw(){
  include("inc/db.php");
  if(isset($_POST['loan_search'])){
      // $pro_name=$_POST['loan_query'];
      // $fetch_job = $con->prepare("SELECT * FROM loan_requests WHERE pro_name LIKE '%$pro_name%' OR pro_keyword LIKE '%$pro_name%' ORDER BY 1 DESC");
      // $fetch_job->setFetchMode(PDO:: FETCH_ASSOC);
      // $fetch_job->execute();
  }else{
      $fetch_loan = $con->prepare("SELECT * FROM loan_requests where l_status=? ORDER BY 1 DESC");
      $fetch_loan->setFetchMode(PDO:: FETCH_ASSOC);
      $fetch_loan->execute(["APPROVED"]);
      
  }
 $i=1;

 while($row = $fetch_loan->fetch()):
      $status=$row['l_status'];
      echo "<tr>
              <th scope='row'>".$i++."</th>
              <td><form method='POST'><a href='loan.php?view_loan=".$row['loan_id']."'>".$row['loan_code']."</a></form></td>
              <td>".$row['l_loanamount']."</td>
              <td>".$row['l_status']."</td>
              <td>".$row['l_requestdate']."</td>";
              if($status=='PENDING'){
                  echo"<td><a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='CANCELLED'){
                  echo"<td>DECLINED</td>";
              }else if($status=='APPROVED'){
              echo"<td><a href='index.php?withdraw_id=".$row['loan_id']."'>WITHDRAW</a> OR <a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='DISAPPROVED'){
                echo"<td>DISABLED</td>";
              }else if($status=='WITHDRAWN'){
                  echo"<td>CLEAR</td>";
              }else if($status=='PAID'){
                  echo"<td>CLEARED</td>";
              }

         echo "</tr>";
          endwhile;
}
function viewall_withdrawn(){
  include("inc/db.php");
  if(isset($_POST['loan_search'])){
      // $pro_name=$_POST['loan_query'];
      // $fetch_job = $con->prepare("SELECT * FROM loan_requests WHERE pro_name LIKE '%$pro_name%' OR pro_keyword LIKE '%$pro_name%' ORDER BY 1 DESC");
      // $fetch_job->setFetchMode(PDO:: FETCH_ASSOC);
      // $fetch_job->execute();
  }else{
      $fetch_loan = $con->prepare("SELECT * FROM loan_requests where l_status=? ORDER BY 1 DESC");
      $fetch_loan->setFetchMode(PDO:: FETCH_ASSOC);
      $fetch_loan->execute(["WITHDRAWN"]);
      
  }
 $i=1;

 while($row = $fetch_loan->fetch()):
      $status=$row['l_status'];
      echo "<tr>
              <th scope='row'>".$i++."</th>
              <td><form method='POST'><a href='loan.php?view_loan=".$row['loan_id']."'>".$row['loan_code']."</a></form></td>
              <td>".$row['l_loanamount']."</td>
              <td>".$row['l_status']."</td>
              <td>".$row['l_requestdate']."</td>";
              if($status=='PENDING'){
                  echo"<td><a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='CANCELLED'){
                  echo"<td>DECLINED</td>";
              }else if($status=='APPROVED'){
              echo"<td><a href='index.php?withdraw_id=".$row['loan_id']."'>WITHDRAW</a> OR <a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='DISAPPROVED'){
                echo"<td>DISABLED</td>";
              }else if($status=='WITHDRAWN'){
                  echo"<td><a href='index.php?clear_id=".$row['loan_id']."'>CLEAR</a></td>";
              }else if($status=='PAID'){
                  echo"<td>CLEARED</td>";
              }

         echo "</tr>";
          endwhile;
}
function viewall_cleared(){
  include("inc/db.php");
  if(isset($_POST['loan_search'])){
      // $pro_name=$_POST['loan_query'];
      // $fetch_job = $con->prepare("SELECT * FROM loan_requests WHERE pro_name LIKE '%$pro_name%' OR pro_keyword LIKE '%$pro_name%' ORDER BY 1 DESC");
      // $fetch_job->setFetchMode(PDO:: FETCH_ASSOC);
      // $fetch_job->execute();
  }else{
      $fetch_loan = $con->prepare("SELECT * FROM loan_requests where l_status=? ORDER BY 1 DESC");
      $fetch_loan->setFetchMode(PDO:: FETCH_ASSOC);
      $fetch_loan->execute(["CLEARED"]);
      
  }
 $i=1;

 while($row = $fetch_loan->fetch()):
      $status=$row['l_status'];
      echo "<tr>
              <th scope='row'>".$i++."</th>
              <td><form method='POST'><a href='loan.php?view_loan=".$row['loan_id']."'>".$row['loan_code']."</a></form></td>
              <td>".$row['l_loanamount']."</td>
              <td>".$row['l_status']."</td>
              <td>".$row['l_requestdate']."</td>";
              if($status=='PENDING'){
                  echo"<td><a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='CANCELLED'){
                  echo"<td>DECLINED</td>";
              }else if($status=='APPROVED'){
              echo"<td><a href='index.php?withdraw_id=".$row['loan_id']."'>WITHDRAW</a> OR <a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='DISAPPROVED'){
                echo"<td>DISABLED</td>";
              }else if($status=='WITHDRAWN'){
                  echo"<td><a href='index.php?clear_id=".$row['loan_id']."'>CLEAR</a></td>";
              }else if($status=='CLEARED'){
                  echo"<td>SUCCESSFUL</td>";
              }

         echo "</tr>";
          endwhile;
}
function viewall_cancelled(){
  include("inc/db.php");
  if(isset($_POST['loan_search'])){
      // $pro_name=$_POST['loan_query'];
      // $fetch_job = $con->prepare("SELECT * FROM loan_requests WHERE pro_name LIKE '%$pro_name%' OR pro_keyword LIKE '%$pro_name%' ORDER BY 1 DESC");
      // $fetch_job->setFetchMode(PDO:: FETCH_ASSOC);
      // $fetch_job->execute();
  }else{
      $fetch_loan = $con->prepare("SELECT * FROM loan_requests where l_status=? ORDER BY 1 DESC");
      $fetch_loan->setFetchMode(PDO:: FETCH_ASSOC);
      $fetch_loan->execute(["CANCELLED"]);
      
  }
 $i=1;

 while($row = $fetch_loan->fetch()):
      $status=$row['l_status'];
      echo "<tr>
              <th scope='row'>".$i++."</th>
              <td><form method='POST'><a href='loan.php?view_loan=".$row['loan_id']."'>".$row['loan_code']."</a></form></td>
              <td>".$row['l_loanamount']."</td>
              <td>".$row['l_status']."</td>
              <td>".$row['l_requestdate']."</td>";
              if($status=='PENDING'){
                  echo"<td><a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='CANCELLED'){
                  echo"<td>RETRACKED</td>";
              }else if($status=='APPROVED'){
              echo"<td><a href='index.php?withdraw_id=".$row['loan_id']."'>WITHDRAW</a> OR <a href='index.php?cancel_id=".$row['loan_id']."'>CANCEL</a></td>";
              }else if($status=='DISAPPROVED'){
                echo"<td>DISABLED</td>";
              }else if($status=='WITHDRAWN'){
                  echo"<td><a href='index.php?clear_id=".$row['loan_id']."'>CLEAR</a></td>";
              }else if($status=='CLEARED'){
                  echo"<td>SUCCESSFUL</td>";
              }

         echo "</tr>";
          endwhile;
}
function view_loan(){
    include("inc/db.php");
    if(isset($_GET['view_loan'])){
    $loan_id = $_GET['view_loan'];
    $fetch_loan=$con->prepare("SELECT * FROM loan_requests WHERE loan_id=?");
    $fetch_loan->setFetchMode(PDO:: FETCH_ASSOC);
    $fetch_loan->execute([$loan_id]); 
    $row=$fetch_loan->fetch();
    echo "
    <div class='row'>
    <div class='col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate'>
      <h2>PERSONAL DETAILS</h2>
  </div>
      <div class='form-group col-md-4 col-md-offset-3 probootstrap-animate'>
        <label for='inputEmail4'>Title <span style='color:red'>*</span></label>
        <select type='text' class='form-control' disabled name='l_title'>
          <option value='".$row['l_title']."'>".$row['l_title']."</option>
        </select>
      </div>
  </div>
  <div class='form-row'>
      <div class='form-group col-md-4'>
        <label for='inputEmail4'>First Name <span style='color:red'>*</span></label>
        <input type='text' class='form-control' value='".$row['l_firstname']."' name='l_firstname' disabled>
      </div>
      <div class='form-group col-md-4'>
        <label for='inputPassword4'>Last Name <span style='color:red'>*</span></label>
        <input type='text' class='form-control' value='".$row['l_lastname']."' name='l_lastname' disabled>
      </div>
      <div class='form-group col-md-4'>
        <label for='inputPassword4'>Middle Name </label>
        <input type='text' class='form-control' value='".$row['l_middlename']."' name='l_middlename' disabled>
      </div>
    </div>
    <div class='form-group col-md-4'>
      <label for='inputAddress'>Home Address <span style='color:red'>*</span></label>
      <input type='text' class='form-control' id='inputAddress' value='".$row['l_homeaddress']."' name='l_homeaddress' disabled>
    </div>
    <div class='form-group col-md-3'>
        <label for='inputState'>Country <span style='color:red'>*</span></label>
        <select id='inputState' class='homecountry form-control' name='l_homecountry' disabled> 
            <option value='".$row['l_homecountry']."'>".$row['l_homecountry']."</option>
        </select>
      </div>
      <div class='form-group col-md-3'>
      <label for='inputCity'>Home State <span style='color:red'>*</span></label>
        <select id='inputState' class='homestate form-control' name='l_homestate' disabled> 
            <option value='".$row['l_homestate']."'>".$row['l_homestate']."</option>
        </select>
      </div>
    <div class='form-group col-md-2'>
        <label for='inputCity'>City <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputCity' value='".$row['l_homecity']."' name='l_homecity' disabled>
      </div>
    <div class='form-group col-md-4'>
      <label for='inputAddress2'>Business Address <span style='color:red'>*</span></label>
      <input type='text' class='form-control' id='inputAddress2' value='".$row['l_businessaddress']."' name='l_businessaddress' disabled>
    </div>
    <div class='form-group col-md-3'>
        <label for='inputState'>Country <span style='color:red'>*</span></label>
        <select id='inputState' class='businesscountry form-control' name='l_businesscountry' disabled>
            <option value='".$row['l_businesscountry']."'>".$row['l_businesscountry']."</option>
        </select>
      </div>
      <div class='form-group col-md-3' id='business_response'>
      <label for='inputCity'>Business State <span style='color:red'>*</span></label>
        <select id='inputState' class='businessstate form-control' name='l_businessstate' disabled> 
            <option value='".$row['l_businessstate']."'>".$row['l_businessstate']."</option>
        </select>
      </div>
    <div class='form-group col-md-2'>
        <label for='inputCity'>City <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputCity' value='".$row['l_businesscity']."' name='l_businesscity' disabled>
      </div>
    <div class='form-group col-md-3'>
      <label for='inputAddress2'>Date of Birth <span style='color:red'>*</span></label>
      <input type='date' class='form-control' id='inputAddress2' value='".$row['l_dateofbirth']."' name=l_dateofbirth disabled>
    </div>
    <div class='form-row'>
      <div class='form-group col-md-3'>
        <label>Nationality <span style='color:red'>*</span></label>
        <select class='form-control' name='l_nationalitycountry' disabled>
        <option value='".$row['l_nationalitycountry']."'>".$row['l_nationalitycountry']."</option>
          </select>
      </div>
      <div class='form-group col-md-3'>
        <label for=''>Country of Residence <span style='color:red'>*</span></label>
        <select id='' class='form-control' name='l_residencecountry' disabled>
        <option value='".$row['l_residencecountry']."'>".$row['l_residencecountry']."</option>
          </select>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Home Zip Code <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip'  value='".$row['l_homezipcode']."' name='l_homezipcode' disabled>
      </div>
      <div class='form-group col-md-3'>
          <label for='inputZip'>Marital Status <span style='color:red'>*</span></label>
          <input class='form-check-input' type='text'  value='".$row['l_maritalstatus']."' name='l_maritalstatus' id='gridRadios1' value='Single' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Email Address <span style='color:red'>*</span></label>
        <input type='email' class='form-control' id='inputZip'  value='".$row['l_email']."' name='l_email' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Phone Number <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_phonenumber']."' name='l_phonenumber' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Business Name <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip'  value='".$row['l_businessname']."' name=l_businessname' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Business License Number <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip'  value='".$row['l_businesslicensenumber']."' name='l_businesslicensenumber' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Type of Business <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_typeofbusiness']."' name='l_typeofbusiness' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Monthly Income <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_monthlyincome']."' name='l_monthlyincome' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Account Number <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_accountnumber']."' name='l_accountnumber' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Bank Name <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_bankname']."' name='l_bankname' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for=inputZip'>Upload Business Certificate <span style='color:red'>*</span></label>
        <img data:image/jpeg; style='height:150px' class='form-control' src='img/loan_imgs/".$row['l_businesscertificate']."'/>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Utility Bill Showing Address <span style='color:red'>*</span></label>
        <img data:image/jpeg; style='height:150px' class='form-control' src='img/loan_imgs/".$row['l_utilitybill']."'/>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Upload Legal ID <span style='color:red'>*</span></label>
        <img data:image/jpeg; style='height:150px' class='form-control' src='img/loan_imgs/".$row['l_legalid']."'/>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Loan Amount <span style='color:red'>*</span></label>
        <input type='number' class='form-control' id='inputZip' value='".$row['l_loanamount']."' name='l_loanamount' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Loan Duration <span style='color:red'>*</span></label>
        <select id='inputState' class='form-control' name='l_loanduration' disabled>
        <option value='".$row['l_loanduration']."'>".$row['l_loanduration']."</option>
        </select>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Number of Employee <span style='color:red'>*</span></label>
        <input type='number' class='form-control' id='inputZip' value='".$row['l_numberofemployee']."' name='l_numberofemployee' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Business Role <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_businessrole']."' name='l_businessrole' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Tax ID <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_taxid']."' name='l_taxid' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Headshot Photo (0-3months) <span style='color:red'>*</span></label>
        <img data:image/jpeg; style='height:150px' class='form-control' src='img/loan_imgs/".$row['l_headshot']."'/>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Purpose of Loan <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_purposeofloan']."' name='l_purposeofloan' disabled>
      </div>
      <div class='form-group col-md-3'>
          <label for='inputZip'>How long have you lived in your Home Address? <span style='color:red'>*</span></label>
          <input type='text' class='form-control' id='inputZip' value='".$row['l_howlonghomeaddress']."' name='l_purposeofloan' disabled>
        </div>
      <div class='row'>
        <div class='col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate'>
            <h2>GUARANTOR DETAILS</h2>
        </div>
        <div class='form-group col-md-4 col-md-offset-3 probootstrap-animate'>
          <label for='inputEmail4'>Title <span style='color:red'>*</span></label>
          <select type='text' class='form-control' name='l_guarantortitle' disabled>
            <option value='".$row['l_guarantortitle']."'>".$row['l_guarantortitle']."</option>
          </select>
      </div>
      </div>
      <div class='form-row'>
      <div class='form-group col-md-4'>
        <label for='inputEmail4'>First Name <span style='color:red'>*</span></label>
        <input type='text' class='form-control' value='".$row['l_firstname']."' name='l_guarantorfirstname' disabled>
      </div>
      <div class='form-group col-md-4'>
        <label for='inputPassword4'>Last Name <span style='color:red'>*</span></label>
        <input type='text' class='form-control' value='".$row['l_guarantorlastname']."' name='l_guarantorlastname' disabled>
      </div>
      <div class='form-group col-md-4'>
        <label for='inputPassword4'>Middle Name </label>
        <input type='text' class='form-control' value='".$row['l_guarantormiddlename']."' name='l_guarantormiddlename' disabled>
      </div>
    </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Relationship <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_guarantorrelationship']."' name='l_guarantorrelationship' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Utility Bill Showing Address <span style='color:red'>*</span></label>
        <img data:image/jpeg; style='height:150px' class='form-control' src='img/loan_imgs/".$row['l_guarantorutilitybill']."'/>
        
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Upload Legal ID <span style='color:red'>*</span></label>
        <img data:image/jpeg; style='height:150px' class='form-control' src='img/loan_imgs/".$row['l_guarantorlegalid']."'/>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Phone Number <span style='color:red'>*</span></label>
        <input type='phone' class='form-control' id='inputZip' value='".$row['l_guarantorphonenumber']."' name='l_guarantorphonenumber' disabled>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Headshot Photo (0-3months) <span style='color:red'>*</span></label>
        <img data:image/jpeg;  style='height:150px' class='form-control' src='img/loan_imgs/".$row['l_guarantorheadshot']."'/>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputZip'>Tax ID <span style='color:red'>*</span></label>
        <input type='text' class='form-control' id='inputZip' value='".$row['l_guarantortaxid']."' name='l_guarantortaxid' disabled>
      </div>
";
    }
}

function cancel_loan(){
    include("inc/db.php");
    if(isset($_GET['cancel_id'])){
        $loan_id=$_GET['cancel_id'];       
        $get_user=$con->prepare("SELECT * FROM loan_requests WHERE loan_id=?");
        $get_user->setFetchMode(PDO:: FETCH_ASSOC);
        $get_user->execute([$loan_id]);
        $row_user=$get_user->fetch();
        $u_id=$row_user['u_id'];
            $delete_lin=$con->prepare("UPDATE loan_requests SET l_status=? WHERE loan_id=? AND u_id=?");
            if ($delete_lin->execute(["DISAPPROVED", $loan_id, $u_id])){
                echo"<script>alert('Loan has been Disaproved');</script>";
                echo"<script>window.open('disapproved.php','_SELF');</script>";
            }
        }
}
function approve_loan(){
  include("inc/db.php");
  if(isset($_GET['approve_id'])){
      $loan_id=$_GET['approve_id'];       
      $get_user=$con->prepare("SELECT * FROM loan_requests WHERE loan_id=?");
      $get_user->setFetchMode(PDO:: FETCH_ASSOC);
      $get_user->execute([$loan_id]);
      $row_user=$get_user->fetch();
      $u_id=$row_user['u_id'];
          $delete_lin=$con->prepare("UPDATE loan_requests SET l_status=? WHERE loan_id=? AND u_id=?");
          if ($delete_lin->execute(["APPROVED", $loan_id, $u_id])){
              echo"<script>alert('Loan has been Aproved');</script>";
              echo"<script>window.open('approved.php','_SELF');</script>";
          }
      }
}
function withdraw_loan(){
  include("inc/db.php");
  if(isset($_GET['withdraw_id'])){
      $loan_id=$_GET['withdraw_id'];       
      $get_user=$con->prepare("SELECT * FROM loan_requests WHERE loan_id=?");
      $get_user->setFetchMode(PDO:: FETCH_ASSOC);
      $get_user->execute([$loan_id]);
      $row_user=$get_user->fetch();
      $u_id=$row_user['u_id'];
          $delete_lin=$con->prepare("UPDATE loan_requests SET l_status=? WHERE loan_id=? AND u_id=?");
          if ($delete_lin->execute(["WITHDRAWN", $loan_id, $u_id])){
              echo"<script>alert('Loan has been Withdrawn');</script>";
              echo"<script>window.open('withdrawn.php','_SELF');</script>";
          }
      }
}
function clear_loan(){
  include("inc/db.php");
  if(isset($_GET['clear_id'])){
      $loan_id=$_GET['clear_id'];       
      $get_user=$con->prepare("SELECT * FROM loan_requests WHERE loan_id=?");
      $get_user->setFetchMode(PDO:: FETCH_ASSOC);
      $get_user->execute([$loan_id]);
      $row_user=$get_user->fetch();
      $u_id=$row_user['u_id'];
          $delete_lin=$con->prepare("UPDATE loan_requests SET l_status=? WHERE loan_id=? AND u_id=?");
          if ($delete_lin->execute(["CLEARED", $loan_id, $u_id])){
              echo"<script>alert('Loan has been Cleared');</script>";
              echo"<script>window.open('cleared.php','_SELF');</script>";
          }
      }
}
?>