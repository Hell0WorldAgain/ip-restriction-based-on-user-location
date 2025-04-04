<?php

// In this example, we're going to show/hide page content based of user's country by getting user's IP address, added restriction for second time visitors as well



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

// Restrict  countries and Cities
$restrictedCountries = ['US', 'UK'];
$restrictedCities = ['Bangalore', 'Hyderabad', 'Ahmedabad', 'Odisha'];


// Check if the user is a second-time visitor
$second_time_visitor = isset($_COOKIE['visited']) ? true : false;

// Set a cookie to track the first visit (expires in 1 day)
setcookie('visited', 'true', time() + (86400 * 365), "/"); 

// Content restriction logic on second time visitors based on country and city
if (array_filter($restrictedCities, fn($c) => strpos($city, $c) !== false)) {
    // Hide registration for restricted companies
    ?>
    <style type="text/css">
            #registration {
                display: none;
            }
    </style>
    <?php
} elseif (in_array($country, $restrictedCountries)) {
    if ($second_time_visitor) {
        // Hide both registration and home on the second visit
        ?>
        <style type="text/css">
                #registration {
                    display: none;
                }
        </style>
        <?php
    } else {
        // Hide home for first-time visitors
        ?>
        <style type="text/css">
                #home {
                    display: none;
                }
        </style>
        <?php
    }
}
else {
        // Default: Hide registration for first-time visitors
        ?>
        <style type="text/css">
                #registration {
                    display: none;
                }
        </style>
        <?php
    }