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
            $sql = $conn->prepare("select * from accounts where login = ?");
            $sql->bind_param("s", $username);
            $sql->execute();
            $sql_result = $sql->get_result();

            if($sql_result->num_rows > 0)
            {
                $data = $sql_result->fetch_assoc();
                if($data['password'] === $password)
                {
                    echo "Poprawnie zalogowano";
                }
                else
                {
                    echo "Niepoprawny login lub hasło";
                }
            }
            else
            {
                echo "Niepoprawny login lub hasło";
            }
            $conn->close();
        }
    }
}


?>