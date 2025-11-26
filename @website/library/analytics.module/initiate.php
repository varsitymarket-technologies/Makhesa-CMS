<?php
// initiate.php

#   TITLE   : Library Initiation   
#   DESC    : Website functionalities are restricted to the user who enables these services. This Initiate Page Makes The Libraries To Load on system.  
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/06/29

class __ANALYTICS_MODULE__
{
    function get_tracking_user_ip()
    {
        switch (true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])):
                return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])):
                return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SESSION['HTTP_X_FORWARDED_FOR'])):
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default:
                return $_SERVER['REMOTE_ADDR'];
        }
    }

    function encryption($string)
    {
        return $string;
    }

    function get_current_url()
    {

    }

    function get_current_title()
    {

    }

    function get_tracking_location($state, $ip_address = FALSE)
    {

        if ($ip_address == FALSE) {
            $receive_ip = $this->get_tracking_user_ip();
            #Receieve The System IP Address
        } else {
            $receive_ip = $ip_address;
        }

        $url = "http://ip-api.com/json/{$receive_ip}";

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($curl);

        // Close the cURL session
        curl_close($curl);

        // Decode the JSON response
        $locationData = json_decode($response, true);

        // Extract relevant location information
        $location = array(
            'country' => isset($locationData['country']) ? $locationData['country'] : '',
            'city' => isset($locationData['city']) ? $locationData['city'] : ''
        );

        if (strtolower($state) == "country") {
            return ($location['country']);
        } else {
            return ($location['city']);
        }
    }


    function exec_analytics()
    {
        $page_link = $this->get_current_url();
        $page_title = $this->get_current_title();
        #Record The Website Page Details 

        $ip_code = $this->encryption($this->get_tracking_user_ip());
        #Retrieve The IP Code 

        $user_code = retrieve_code();
        #Get The User Code 

        if ($this->get_tracking_location('country') == "") {
            $country = $this->encryption('Hidden');
        } else {
            $country = $this->encryption(get_tracking_location('country'));
        }

        if ($this->get_tracking_location('city') == "") {
            $city = $this->encryption("Hidden");
        } else {
            $city = $this->encryption(get_tracking_location('city'));
        }
        #Get the location 

        $os = $this->get_tracking_device_details('operating_system');
        $make = $this->get_tracking_device_details('make');
        $model = $this->get_tracking_device_details('model');
        $browser = $this->get_tracking_device_details('browser');
        #Extracting Device Details 

        $tracking_session = $this->get_tracking_code();

        global $conn;

        $sql = "INSERT INTO `tblanalytical_view`
  (`tracking_session`, `user_session`, `ip_address`, `country`, `city`, `model`, `make`, `operating_system`, `browser`, `page_title`, `page_link`)
   VALUES 
   ('{$tracking_session}','{$user_code}', '{$ip_code}', '{$country}', '{$city}', '{$model}', '{$make}', '{$os}', '{$browser}', '{$page_title}', '{$page_link}')";
        die($sql);
        if ($conn->query($sql) === TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}


#Example Usage 
#$e = new __ANALYTICS_MODULE__();
#$e->exec_analytics();
?>