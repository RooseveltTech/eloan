<?php
  session_start(); 
  include("inc/function.php");
  if(!isset($_SESSION['u_email'])){
    // echo"<script>alert('You have to Login First!');</script>";
    // echo"<script>window.open('index.php','_SELF')</script>";
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
              <h2>LOANS INFO</h2>
              <p class="lead"><input><button>Search</button></p>
          </div>
        </div>
          <form method="POST" enctype="multipart/form-data">
            <div class="row">
            <table class="table" style="min-height: 300px">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Loan Code</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php echo viewall_withdrawn();  ?>
                    </tbody>
                    </table>
          </div>
          </form>
        <!-- END row -->
      </div>
    </section>

  
    <?php include("footer.php"); ?> 
    
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>

  </body>
</html>