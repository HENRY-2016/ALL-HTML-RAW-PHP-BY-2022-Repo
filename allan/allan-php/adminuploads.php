
<?php
/*
    maximum file upload size ERROR (1)
        confings 
            nano /etc/php/7.0/apache2/php.ini
                upload_max_filesize = 40M
                post_max_size = 50M (must be greater or equal to upload_max_filesize)
                Then restart apache2
                    service apache2 restart



*/

// include "db.php";
include "file_uploads_config.php";


$response = array( ); 



function AdminAddItemEndPoint ()
{
    global $file_upload_dir_array; 
    global $adminpin;
    global $response;

    $itemname = $_POST["itemname"];
    $img_name = $_POST["code"]; 
    $img = $_FILES["file"]["code"];
    $password = $_POST["password"];

    if (empty($itemname)||empty($img_name)||empty($password))
    {$response['message'] = "Sorry, <br>All <br> Fields Required";}
    else
    {
        if ($password != $adminpin)
        {$uploadStatus = 0;$response['message'] = "Sorry, <br> $password <br> Invalid Admin Password,<br>Try Again";}
        else
        {
            // Upload file 
                // determine the dir to upload a file
                //array_search — Searches the array for a given value and returns the first corresponding key if successful
            //<<<6/7/2021>>> $target_dir = array_search($itemname,$file_upload_dir_array);
            $target_dir = array_search($itemname,$file_upload_dir_array);
            if(!empty($_FILES["file"]["name"]))
            { 
                $uploadStatus = 1;

                
                $target_file = $target_dir."/".$img_name; // rename the file add / be4 name
                // $file_type=$_FILES['file']['type']; // defining file type


                // $fileType = pathinfo($img, PATHINFO_EXTENSION);
                // $allowTypes = array('jpg', 'png', 'jpeg');

                // if($file_type!="image/jpg" || $file_type!="image/jpeg" || $file_type!="image/png")
                // {$uploadStatus = 0; $response['message'] = "Sorry,<br> $img_name <br> File Not Allowed.";}
                // if(!in_array($fileType, $allowTypes))

                
                // check if it already in db
                if (file_exists($target_file)) 
                {$uploadStatus = 0; $response['message'] = "Sorry,<br> $img_name <br> File Already Exists.";}
                else
                {
                    // Upload file to the folder
                    if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file))
                    {$response['message'] = "$img_name <br><br> Data Submitted Successfully!";}
                    else 
                    {$response['message'] = " Error On Uploading A file ".$_FILES["file"]["error"];}
                }
            }
            else{$uploadStatus = 0;$response['message'] = 'Sorry <br>Name<br>Code Picture <br>Inputs Are All Required.';} 
        }
    }
    // Return response
    echo json_encode($response);
}


function AdminViewItemEndPoint ()
{
    global $file_upload_dir_array; 
    $itemname = $_POST["itemname"];

    $list_names = array();
    $image_dir_path =  array_search($itemname,$file_upload_dir_array);
    $image_names = array_diff(scandir($image_dir_path),array('.','..'));

    foreach ($image_names as $name)
    {
        $image_file = $image_dir_path.$name;
        // create a key:value array ()
        // $list_names[] = array ($name => $name);
        $list_names[] = array ($name);
    }
    $names = json_encode ($list_names);
    echo $names;
}

function AdminUpdateItemEndPoint()
{
    // Renaming a file
    global $file_upload_dir_array; 
    global $adminpin;
    global $response;


    $itemname = $_POST["itemname"];
    $oldname = $_POST["oldname"]; 
    $newname = $_POST["newname"]; 
    $password = $_POST["password"];
    
    if (empty($itemname)||empty($oldname)||empty($newname)||empty($password))
    {$response['message'] = "Sorry, <br>All <br> Fields Required";}
    else
    {
        if ($password != $adminpin) // validate admin
        {$response['message'] = "Sorry, <br> $password <br> Invalid Admin Password,<br>Try Again";}
        else
        {
            $target_dir = array_search($itemname,$file_upload_dir_array);
            $old_file_name = $target_dir."/".$oldname;
            $new_file_name = $target_dir."/".$newname;
            

            if (!file_exists($old_file_name)) 
            {$response['message'] = "Sorry,<br> $oldname <br> File Do not Exists..";}

            // Update files in pic dir
            if(!rename($old_file_name,$new_file_name))
            {$response['message'] = "Sory, <br>  An Error <br> When Editing File";}
            else
            {$response['message'] = "$oldname <br>  Updated To <br> $newname <br>Successfully!";}
        }    
    }
    // Return response
    echo json_encode($response);
}

function AdminDeleteItemEndPoint ()
{
    // Renaming a file
    global $file_upload_dir_array; 
    global $adminpin;
    global $response;

    $itemname = $_POST["itemname"];
    $oldname = $_POST["oldname"]; 
    $password = $_POST["password"];
    
    if (empty($itemname)||empty($oldname)||empty($password))
    {$response['message'] = "Sorry, <br>All <br> Fields Required";}
    else
    {
        if ($password != $adminpin) // validate admin
        {$response['message'] = "Sorry, <br> $password <br> Invalid Admin Password,<br>Try Again";}
        else
        {
            $target_dir = array_search($itemname,$file_upload_dir_array);
            $old_file_name = $target_dir."/".$oldname;
            

            if (!file_exists($old_file_name)) 
            {$response['message'] = "Sorry,<br> $oldname <br> File Do not Exists..";}
                
            // Delete file from a folder
            if(!unlink($old_file_name))
            {$response['message'] = "Sory, An Error <br> When Deleting File $oldname";}
            else
            {$response['message'] = "$oldname <br>  Deleted <br>Successfully!";}
        }    
    }
    // Return response
    echo json_encode($response);
}



?>