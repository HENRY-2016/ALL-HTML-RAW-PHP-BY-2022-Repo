
<?php
    include 'configfile.php';
    $db_path = 'database/database.db';
    $db = new SQLite3($db_path);
    if (!$db) {echo $db->lastErrorMsg();}
    // else {echo "Opened Data Base Successfully\n";}


    $loginerrors = array();
    if (isset($_POST['user-login-btn']))
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $usertype = trim($_POST['usertype']);

        // echo $username . $password;
        if (empty($username)){array_push($loginerrors,"Username is required");}
        if (empty($password)){array_push($loginerrors,"Password is required");}
        if (empty($usertype)){array_push($loginerrors,"Usertype is required");}


        if ($usertype == $AdminLogInUserType)
        {
            // get user and passwdord from db
            $credentials_cmd = "SELECT * FROM admins WHERE UUSERNAME = '$username' AND UPASSWORD = '$password'";
            $credentials_query = $db->query($credentials_cmd);
            while ($row = $credentials_query->fetchArray(SQLITE3_ASSOC))
                {
                    $AdminDbUsername = $row['UUSERNAME']; 
                    $AdminDbPassword = $row['UPASSWORD'];
                    $fname = $row['FNAME'];
                    $lname = $row['LNAME'];
                }

            // validate and assign errors
            if (!$AdminDbUsername) { array_push($loginerrors,"Sorry Invalid");}
            if (!$AdminDbPassword) { array_push($loginerrors,"User Name Or Password");}
            

            if (count($loginerrors) == 0)
            {
                $username = $fname." ".$lname;
                session_start();
                $_SESSION['valid']  = true;
                $_SESSION['timeout'] = time();
                $_SESSION['login_username'] = $username;
                $_SESSION['username'] = $AdminDbUsername;
                $_SESSION['Admin_User_Type'] = "Admin";
                header('Location:'.$Dashboard);
            }
        }
        elseif ($usertype == $UserLogInUserType)
        { 
            // get user and passwdord from db
            $credentials_cmd = "SELECT * FROM staffs WHERE UUSERNAME  = '$username' AND UPASSWORD = '$password'";
            $credentials_query = $db->query($credentials_cmd);
            while ($row = $credentials_query->fetchArray(SQLITE3_ASSOC))
                {
                    $db_username = $row['UUSERNAME']; 
                    $db_password = $row['UPASSWORD'];
                    $fname = $row['FNAME'];
                    $lname = $row['LNAME'];
                }

            // validate and assign errors
            if (!$db_username) { array_push($loginerrors,"Sorry Invalid");}
            if (!$db_password) { array_push($loginerrors,"User Name Or Password");}
            
            if (count($loginerrors) == 0)
            {
                $username = $fname." ".$lname;
                session_start();
                $_SESSION['valid']  = true;
                $_SESSION['timeout'] = time();
                $_SESSION['login_username'] = $username;
                $_SESSION['username'] = $db_username;
                header('Location:'.$Dashboard);
            }
        }
        else {echo "Invalid User Type";}
        
    }
    $db->close();
?>