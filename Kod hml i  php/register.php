<?php

$username = filter_input(INPUT_POST, 'login');
$password = filter_input(INPUT_POST, 'password');

if (!empty($username)) 
{
    if (!empty($password))
    {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "travelus";


        $conn = new mysqli($host,$dbusername, $dbpassword, $dbname);

        if(mysqli_connect_error())
        {
            die('Błąd połączenia ('.mysqli_connect_errno() .') '. mysqli_connect_error());
        }
        else 
        {
            $sql = "INSERT INTO accounts (login,password) VALUES ('$username', '$password')";
            if ($conn->query($sql))
            {
                echo "Konto utworzono.";
            }
            $conn->close();
        }
    }
}


?>