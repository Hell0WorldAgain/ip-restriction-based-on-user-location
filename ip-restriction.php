<?php

// In this example, we're going to show/hide page content based of user's country by getting user's IP address 



//Fetching the IP address of the user
$ip_address = $_SERVER['REMOTE_ADDR'];

// Fetching the IP address of the user using ipinfo.io API
$token = "------------"; // Replace with your token

// Getting the IP information using file_get_contents
$ipinfo = file_get_contents("https://ipinfo.io/" . $ip_address . "?token=" . $token);

// Decoding the JSON response
$isp = json_decode($ipinfo);

// Getting the country and city name from the response
$country = $isp->country;
$city = $isp->org;

// Matching the ISP name with the given countries
$country1 = strpos($country, 'US');
$country2 = strpos($country, 'UK');


// Checking if the ISP name contains the given cities
$city1 = strpos($company, 'Bangalore');
$city2 = strpos($company, 'Hyderabad');
$city3 = strpos($company, 'Ahmedabad');
$city4 = strpos($company, 'Odisha');


// Checking if the given countries are present in the ISP name
if ($country1 !== False || $country2 !== False) {

    // If the country is US or IN, hide the desired sections
    ?>
    <style type="text/css">
	 ?>
     <style type="text/css">
#id_of_the_section_you_want_to_hide{
        display:none;
			 } 
</style>
 <?php
}

// Now, I want to hide content for few cities in India too, so I will check if the city name is present in the ISP name
elseif ($city1 !== False || $city2 !== False || $city3 !== False || $city4 !== False ) {

     // If the cities are same as mentioned, hide the desired sections
     ?>
     <style type="text/css">
#id_of_the_section_you_want_to_hide{
        display:none;
			 } 
</style>
 <?php
 }

 else{

    // If the country is not US or IN, hide the other sections
     ?>
    <style type="text/css">
   #id_of_the_section_you_want_to_hide{
        display:none;
			} 

</style>
 <?php
 }