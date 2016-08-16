<?php

    
    $activate_link = $_GET['activate_link'];

    echo $activate_link;
    echo "<br><br>";

    $servername = "localhost";
    $username = "root";
    $password_db = "root";
    $dbname = "Email";

    $conn = new mysqli($servername, $username, $password_db, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE Delegates
                SET activated = 'true'
                WHERE  link='$activate_link'";

        if($conn->query($sql) === TRUE) {
                echo "Email activated"."<br>";
        }
        else {
                echo "Error activating"."<br>" . $conn->error;
        }

    $conn->close();
    echo "<br><br>";
    echo "<a href='signin.php'>Sign in</a>";

?>