<?php
session_start();

$datafile = "../data.json";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST["name"];
    $password = $_POST["password"];

    if(!empty($name) && strlen($name)>=5 && strlen($password)>=4)
    {
        if(file_exists($datafile))
        {
            $data = file_get_contents($datafile);
            $users = json_decode($data, true);

            if(is_array($users))
            {
                $found = false;

                foreach($users as $user)
                {
                    if($user["name"] == $name)
                    {
                        if(password_verify($password, $user["password"]))
                        {
                            $found = true;

                            $_SESSION["UserName"] = $name;
                            setcookie("UserName", $name, time()+3600, "/");

                            echo "Login Successful <br>";
                            echo "Welcome, " . $name;
                            break;
                        }
                    }
                }

                if(!$found)
                {
                    echo "Invalid username or password";
                }
            }
            else
            {
                echo "No user data found";
            }
        }
        else
        {
            echo "Data file not found";
        }
    }
    else
    {
        echo "Please use proper validation";
    }
}

if(isset($_SESSION["UserName"]) || isset($_COOKIE["UserName"]))
{
    echo "<br> Welcome Back!";
}
else
{
    echo "<br>Please log in";
}
?>
