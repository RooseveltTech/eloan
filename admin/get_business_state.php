<?php
if(isset($_POST["businesscountry"])){
    // Capture selected country
    $country = $_POST["businesscountry"];
     
    // Define country and city array
    $countryArr = array(
                    "Nigeria" => array( "Abia",
                    "Adamawa",
                    "Akwa Ibom",
                    "Anambra",
                    "Bauchi",
                    "Bayelsa",
                    "Benue",
                    "Borno",
                    "Cross River",
                    "Delta",
                    "Ebonyi",
                    "Edo",
                    "Ekiti",
                    "Enugu",
                    "FCT - Abuja",
                    "Gombe",
                    "Imo",
                    "Jigawa",
                    "Kaduna",
                    "Kano",
                    "Katsina",
                    "Kebbi",
                    "Kogi",
                    "Kwara",
                    "Lagos",
                    "Nasarawa",
                    "Niger",
                    "Ogun",
                    "Ondo",
                    "Osun",
                    "Oyo",
                    "Plateau",
                    "Rivers",
                    "Sokoto",
                    "Taraba",
                    "Yobe",
                    "Zamfara"),
                    "Kenya" => array("Nairobi", "Central", "Coast", "Eastern", "North Eastern", "Nyanza", "Rift Valley", "Western")
                );
     
    // Display city dropdown based on country name
    if($country !== 'Select'){
        echo "<label for='inputState'>State <span style='color:red'>*</span></label>";
        echo "<select class='form-control' name='l_businessstate' required>";
        foreach($countryArr[$country] as $value){
            echo "<option value=".$value.">". $value . "</option>";
        }
        echo "</select>";
    } 
}
?>