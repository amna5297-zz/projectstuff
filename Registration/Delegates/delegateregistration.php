<?php

    include("../../assets/phpscripts/dbconnect.php");

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO DelegateRegistrations_PhaseOne (username, firstname, lastname, email, phone, gender, cnic, institute, registrationtype, address, city, countryorigin,numdelegates, delegateexp, committee, committeereason) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssssssssss", $username, $firstname, $lastname, $email, $phone, $gender, $cnic, $institute, $regtype, $address, $city, $country, $numdelegates, $delegateexperience, $committee, $committeereason);

    $username = "sampleusername";
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $cnic = $_POST["cnic"];
    $institute = $_POST["institute"];
    $regtype = $_POST["regtype"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $numdelegates = $_POST["numdelegates"];
    $delegateexperience = $_POST["delegateexperience"];
    $committee = $_POST["committee"];
    $committeereason = $_POST["committeereason"];

    $status = "y";


    if($stmt->execute()){
        $status = "y";
    }
    else{
        $status = "n";
    }
    
    $stmt->close();

    $conn->close();
    
    echo $status;

?>