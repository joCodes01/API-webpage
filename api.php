<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API web page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Customers</h1>

    <?php

    for($i = 0; $i < 10; $i++) {
        
        //API endpoint URL
        $apiUrl = 'https://randomuser.me/api/?nat=au';


        //Initialize the cURL session
        $ch = curl_init($apiUrl);


        //Set the cURL (client URL) options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Execute the cURL session and store the response in $data
        $data = curl_exec($ch);

        $userData = json_decode($data, true);

        // echo "<pre>";
        // print_r($userData);
        //echo "</pre>";

        $firstname = $userData['results'][0]['name']['first'];
        $lastname = $userData['results'][0]['name']['last'];
        $address = $userData['results'][0]['location']['street']['number'].' '.$userData['results'][0]['location']['street']['name'];
        $city = $userData['results'][0]['location']['city'];
        $state = $userData['results'][0]['location']['state'];
        $postcode = $userData['results'][0]['location']['postcode'];
        $country = $userData['results'][0]['location']['country'];
        $email = $userData['results'][0]['email'];
        $username = $userData['results'][0]['login']['username'];
        $password = $userData['results'][0]['login']['password'];
        $photo = $userData['results'][0]['picture']['large'];


        echo    "<div class='main-container'>
                    
                    <div class='customer-container'>
                        <h2>$firstname $lastname</h2>

                        <div class='customer-info'>
                            <div class='photo-container'><img src='$photo'>
                            </div>

                            <div class='text-container'>
                                <p class='address'>
                                <strong>Address:</strong>
                                <span class='address'> $address, </span>
                                <span class='city'>$city, </span>
                                <span class='state'>$state, </span>
                                <span class='postcode'>$postcode</span>
                                </p>
                                <p><strong>Country:</strong> $country</p>
                                <p><strong>Email:</strong> $email</p>
                            </div>    
                        </div>
                    </div>
                </div>";
            }

    ?>

    
</body>
</html>