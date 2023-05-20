
<?php
    // include "configfile.php";
    $db_path = '../allan-py/data_bases/utilities.db';
    $db = new SQLite3($db_path);
    if (!$db) {echo $db->lastErrorMsg();}
    else {echo "Opened Data Base Successfully\n";}

        $name = trim($_POST['name']);
        $contacts = trim($_POST['contacts']);
        $fees = $_POST['fees'];

        echo $name;
        echo $contacts;
        echo $fees;

        
        $date = date("m/d/y");
        $key = date("dh-is");

        // CUSTOMERNAME,CONTACTS,MESSAGES,DATE
        $insert_cmd = "INSERT INTO messages_table VALUES ('$key','$customername','$contacts','$message','$date')";
        $insert_excution = $db->exec($insert_cmd);
        if (!$insert_excution) {echo $db->lastErrorMsg();}
        else 
            {
                echo"Data posted well....";
            }

    $db->close();
?>