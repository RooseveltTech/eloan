<?php
  session_start(); 
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
          <form>
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
                <label for="inputCity">Nationality <span style="color:red">*</span></label>
                <select id="nationality_country" name="nationality_country" class="form-control" name="l_nationalitycountry" required>
                    <option selected>Select Country</option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote DIvoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="India">India</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United States of America">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputState">Country of Residence <span style="color:red">*</span></label>
                <select id="residence_country" name="residence_country" class="form-control" name="l_residencecountry" required>
                    <option selected>Select Country</option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote DIvoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="India">India</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United States of America">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
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
                  <option>9 months</option>
                  <option>1 Year</option>
                  <option>2 Years</option>
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
                <input type="file" class="form-control" id="inputZip" name="l_purposeofloan">
              </div>
              <div class="form-group col-md-12">
              <label for="inputZip">How long have you lived in your Home Address? <span style="color:red">*</span></label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios1" value="0-1 Year" required>
                  <label class="form-check-label" for="gridRadios1">
                    0-1 Year
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios2" value="1-2 Years">
                  <label class="form-check-label" for="gridRadios2">
                    1-2 Years
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios3" value="2-3 Years">
                  <label class="form-check-label" for="gridRadios3">
                    2-3 Years
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios3" value="3-4 Years">
                  <label class="form-check-label" for="gridRadios3">
                    3-4 Years
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="l_howlonghomeaddress" id="gridRadios3" value="5+ Years">
                  <label class="form-check-label" for="gridRadios3">
                    5+ Years
                  </label>
                </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                    <h2>GUARANTOR DETAILS</h2>
                </div>
                <div class="form-group col-md-4 col-md-offset-3 probootstrap-animate">
                  <label for="inputEmail4">Title <span style="color:red">*</span></label>
                  <select type="email" class="form-control" name="l_guarantortitle" required>
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
                <input type="email" class="form-control" id="" placeholder="Roosevelt" name="l_guarantorfirstname" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Last Name <span style="color:red">*</span></label>
                <input type="password" class="form-control" id="" placeholder="Ashley" name="l_guarantorlastname" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Middle Name </label>
                <input type="password" class="form-control" id="" placeholder="Trinta" name="l_guarantormiddlename" >
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
                <input class="form-check-input" type="checkbox" id="gridCheck" required> <span style="color:red">*</span> <label> YES</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label" for="gridCheck">
                I hereby agree that the information given is true, accurate and complete as of the date of this application submission.
                </label><br>
                <input class="form-check-input" type="checkbox" id="gridCheck" required> <span style="color:red">*</span> <label> YES</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="l_loanrequest">Request Loan</button>
          </form>
    
        <!-- END row -->
      </div>
    </section>

  
    <?php include("footer.php"); ?> 
    
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>

  </body>
</html>