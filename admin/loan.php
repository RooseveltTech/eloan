<?php
  include("inc/function.php");
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
  </head>
  <body>
    
    <!-- Fixed navbar -->
    <?php include("inc/header.php") ?>

    
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>Loan Details</h2>
          </div>
        </div>
          
            <?php echo view_loan(); ?> 
          
          
        <!-- END row -->
      </div>
    </section>

  
    <?php include("footer.php"); ?> 
    
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>

  </body>
</html>