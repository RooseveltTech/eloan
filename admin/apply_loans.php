<?php
  session_start(); 
  include("inc/function.php");
  if(!isset($_SESSION['u_email'])){
    echo"<script>alert('You have to Login First!');</script>";
    echo"<script>window.open('index.php','_SELF')</script>";
    // header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Loan</title>
    <meta name="description" content="E-Loan">
    <meta name="keywords" content="E-Loan">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("select.homecountry").change(function(){
        var selectedCountry = $(".homecountry option:selected").val();
        $.ajax({
            type: "POST",
            url: "get_home_state.php",
            data: { homecountry : selectedCountry } 
        }).done(function(data){
            $("#home_response").html(data);
        });
    });
});
$(document).ready(function(){
    $("select.businesscountry").change(function(){
        var selectedCountry = $(".businesscountry option:selected").val();
        $.ajax({
            type: "POST",
            url: "get_business_state.php",
            data: { businesscountry : selectedCountry } 
        }).done(function(data){
            $("#business_response").html(data);
        });
    });
});
</script>
  </head>
  <body>
    
    <!-- Fixed navbar -->
    <?php include("inc/header.php") ?>

    
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>APPLY HERE FOR LOANS</h2>
              <p class="lead">Fill the form below to begin request.</p>
          </div>
        </div>
          <form method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>PERSONAL DETAILS</h2>
          </div>
              <div class="form-group col-md-4 col-md-offset-3 probootstrap-animate">
                <label for="inputEmail4">Title <span style="color:red">*</span></label>
                <select type="text" class="form-control" id="" name="l_title">
                  <option>Please Select</option>
                  <option value="mr">Mr</option>
                  <option value="mrs">Mrs</option>
                  <option value="ms">Ms</option>
                </select>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">First Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="" placeholder="Roosevelt" name="l_firstname" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Last Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="" placeholder="Ashley" name="l_lastname" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Middle Name </label>
                <input type="text" class="form-control" id="" placeholder="Trinta" name="l_middlename">
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="inputAddress">Home Address <span style="color:red">*</span></label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="l_homeaddress" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">Country <span style="color:red">*</span></label>
                <select id="inputState" class="homecountry form-control" name="l_homecountry" required> 
                  <option selected>Select Country</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Kenya">Kenya</option>
                </select>
              </div>
              <div class="form-group col-md-3" id="home_response">
                
              </div>
            <div class="form-group col-md-2">
                <label for="inputCity">City <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputCity" name="l_homecity" required>
              </div>
            <div class="form-group col-md-4">
              <label for="inputAddress2">Business Address <span style="color:red">*</span></label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="l_businessaddress" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">Country <span style="color:red">*</span></label>
                <select id="inputState" class="businesscountry form-control" name="l_businesscountry" required>
                  <option selected>Select Country</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Kenya">Kenya</option>
                </select>
              </div>
              <div class="form-group col-md-3" id="business_response">
   
              </div>
            <div class="form-group col-md-2">
                <label for="inputCity">City <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputCity" name="l_businesscity" required>
              </div>
            <div class="form-group col-md-3">
              <label for="inputAddress2">Date of Birth <span style="color:red">*</span></label>
              <input type="date" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="l_dateofbirth" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="">Nationality <span style="color:red">*</span></label>
                <select id="" class="form-control" name="l_nationalitycountry" required>
                <option selected>Select Country</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Kenya">Kenya</option>
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label for="">Country of Residence <span style="color:red">*</span></label>
                <select id="" class="form-control" name="l_residencecountry" required>
                    <option selected>Select Country</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Kenya">Kenya</option>
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Home Zip Code <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_homezipcode" required>
              </div>
              <div class="form-group col-md-12">
              <label for="inputZip">Marital Status <span style="color:red">*</span></label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_maritalstatus" id="gridRadios1" value="Single" required>
                  <label class="form-check-label" for="gridRadios1">
                    Single
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_maritalstatus" id="gridRadios2" value="Married">
                  <label class="form-check-label" for="gridRadios2">
                    Married
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_maritalstatus" id="gridRadios3" value="Other">
                  <label class="form-check-label" for="gridRadios3">
                    Other
                  </label>
                </div>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Email Address <span style="color:red">*</span></label>
                <input type="email" class="form-control" id="inputZip" name="l_email" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Phone Number <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_phonenumber" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Business Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_businessname" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Business License Number <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_businesslicensenumber" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Type of Business <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_typeofbusiness" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Monthly Income <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_monthlyincome" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Account Number <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_accountnumber" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Bank Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_bankname">
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Upload Business Certificate <span style="color:red">*</span></label>
                <input type="file" class="form-control" id="inputZip" name="l_businesscertificate" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Utility Bill Showing Address <span style="color:red">*</span></label>
                <input type="file" class="form-control" id="inputZip" name="l_utilitybill" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Upload Legal ID <span style="color:red">*</span></label>
                <input type="file" class="form-control" id="inputZip" name="l_legalid" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Loan Amount <span style="color:red">*</span></label>
                <input type="number" class="form-control" id="inputZip" name="l_loanamount" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Loan Duration <span style="color:red">*</span></label>
                <select id="inputState" class="form-control" name="l_loanduration" required>
                  <option selected>Select Duration</option>
                  <option value="9 months">9 months</option>
                  <option value="1 Year">1 Year</option>
                  <option value="2 Years">2 Years</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Number of Employee <span style="color:red">*</span></label>
                <input type="number" class="form-control" id="inputZip" name="l_numberofemployee" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Business Role <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_businessrole" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Tax ID <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_taxid" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Headshot Photo (0-3months) <span style="color:red">*</span></label>
                <input type="file" class="form-control" id="inputZip" name="l_headshot">
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Purpose of Loan <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_purposeofloan">
              </div>
              <div class="form-group col-md-12">
              <label for="inputZip">How long have you lived in your Home Address? <span style="color:red">*</span></label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios11" value="0-1 Year" required>
                  <label class="form-check-label" for="gridRadios11">
                    0-1 Year
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios22" value="1-2 Years">
                  <label class="form-check-label" for="gridRadios22">
                    1-2 Years
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios33" value="2-3 Years">
                  <label class="form-check-label" for="gridRadios33">
                    2-3 Years
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios44" value="3-4 Years">
                  <label class="form-check-label" for="gridRadio44">
                    3-4 Years
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios55" value="5+ Years">
                  <label class="form-check-label" for="gridRadios55">
                    5+ Years
                  </label>
                </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                    <h2>GUARANTOR DETAILS</h2>
                </div>
                <div class="form-group col-md-4 col-md-offset-3 probootstrap-animate">
                  <label for="inputEmail4">Title <span style="color:red">*</span></label>
                  <select type="text" class="form-control" name="l_guarantortitle" required>
                    <option>Please Select</option>
                    <option value="mr">Mr</option>
                    <option value="mrs">Mrs</option>
                    <option value="ms">Ms</option>
                  </select>
              </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">First Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="" placeholder="Roosevelt" name="l_guarantorfirstname" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Last Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="" placeholder="Ashley" name="l_guarantorlastname" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Middle Name </label>
                <input type="text" class="form-control" id="" placeholder="Trinta" name="l_guarantormiddlename" >
              </div>
            </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Relationship <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_guarantorrelationship" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Utility Bill Showing Address <span style="color:red">*</span></label>
                <input type="file" class="form-control" id="inputZip" name="l_guarantorutilitybill" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Upload Legal ID <span style="color:red">*</span></label>
                <input type="file" class="form-control" id="inputZip" name="l_guarantorlegalid" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Phone Number <span style="color:red">*</span></label>
                <input type="phone" class="form-control" id="inputZip" name="l_guarantorphonenumber" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Headshot Photo (0-3months) <span style="color:red">*</span></label>
                <input type="file" class="form-control" id="inputZip" name="l_guarantorheadshot" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Tax ID <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="inputZip" name="l_guarantortaxid" required>
              </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label" for="gridCheck">
                I authorize prospective Credit Grantors/Lending/Leasing Companies to obtain personal and credit information about me from my employer and credit bureau, or credit reporting agency, any person who has or may have any financial dealing with me, or from any references I have provided. This information, as well as that provided by me in the application, will be referred to in connection with this lease and any other relationships we may establish from time to time. Any personal and credit information obtained may be disclosed from time to time to other lenders, credit bureaus or other credit reporting agencies.
                </label>
                <input class="form-check-input" type="checkbox" id="gridCheck" name="l_agree" required> <span style="color:red">*</span> <label> YES</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label" for="gridCheck">
                I hereby agree that the information given is true, accurate and complete as of the date of this application submission.
                </label><br>
                <input class="form-check-input" type="checkbox" id="gridCheck" name="l_termsandcondition" required> <span style="color:red">*</span> <label> YES</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="l_loanrequest">Request Loan</button>
          </form>
          <?php echo loan_apply(); ?> 
        <!-- END row -->
      </div>
    </section>

  
    <?php include("footer.php"); ?> 
    
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>

  </body>
</html>