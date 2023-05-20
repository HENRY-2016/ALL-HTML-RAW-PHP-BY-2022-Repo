
<?php
    include 'configfile.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;
    echo $password;

    $loginerrors = array();
    if (isset($_POST['user-login-btn']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username)){array_push($loginerrors,"Username is required");}
        if (empty($password)){array_push($loginerrors,"Password is required");}

        // get user and passwdord from db
        $admin_Username = 'Adrace'; 
        $admin_password = 'Adrace';

        // validate and assign errors
        if (!$admin_Username) { array_push($loginerrors,"Sorry Invalid");}
        if (!$admin_password) { array_push($loginerrors,"User Name Or Password");}
        

        if (count($loginerrors) == 0)
        {
            header('Location:'.$AdminIndexPage);
        }
        
    }


?>  