
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


// $targetFilePath = "fileuploads/cups/cup2.png";
// $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
// $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');

// echo $fileType;
// echo "===============\n";

function AdminViewItemNamesEndPoint ()
{
    $itemtype = $_POST["type"];
    if ($itemtype == "BOXES_LOGOS_UPLOAD"){AdminViewItemNames_BoxesLogos ();}
    elseif ($itemtype == "BOXES_MAPS_UPLOAD"){AdminViewItemNames_BoxesAfricanVilages ();}
    elseif ($itemtype == "BOXES_GUITAR_AMPLIFIED_UPLOAD"){AdminViewItemNames_BoxesAfricanAnimals ();}
    
    elseif ($itemtype == "TABLES_LOGOS_UPLOAD"){AdminViewItemNames_TablesLogos ();}
    elseif ($itemtype == "TABLES_MAPS_UPLOAD"){AdminViewItemNames_TablesAfricanVilages ();}
    elseif ($itemtype == "TABLES_GUITAR_AMPLIFIED_UPLOAD"){AdminViewItemNames_TablesAfricanAnimals ();}
    
    elseif ($itemtype == "WALL_HANGINGS_LOGOS_UPLOAD"){AdminViewItemNames_WallHangingsLogos ();}
    elseif ($itemtype == "WALL_HANGINGS_MAPS_UPLOAD"){AdminViewItemNames_WallHangingsAfricanVilages ();}
    elseif ($itemtype == "WALL_HANGINGS_GUITAR_AMPLIFIED_UPLOAD"){AdminViewItemNames_WallHangingsAfricanAnimals ();}
    
    elseif ($itemtype == "CHAIRS_LOGOS_UPLOAD"){AdminViewItemNames_ChairsLogos ();}
    elseif ($itemtype == "CHAIRS_MAPS_UPLOAD"){AdminViewItemNames_ChairsAfricanVilages ();}
    elseif ($itemtype == "CHAIRS_GUITAR_AMPLIFIED_UPLOAD"){AdminViewItemNames_ChairsAfricanAnimals ();}
    
    elseif ($itemtype == "DOORS_UPLOAD"){AdminViewItemNames_Doors ();}
    elseif ($itemtype == "ELECTRONICS_USB_UPLOAD"){AdminViewItemNames_Statues ();}
    elseif ($itemtype == "ELECTRONICS_CHARGER_BULBS_UPLOAD"){AdminViewItemNames_LampHolders ();}
    elseif ($itemtype == "ELECTRONICS_FLASH_DISKS_UPLOAD"){AdminViewItemNames_WalkingSticks ();}
    elseif ($itemtype == "ELECTRONICS_PORTABLE_SPEAKER_UPLOAD"){AdminViewItemNames_Cups ();}
    elseif ($itemtype == "ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD"){AdminViewItemNames_AshTreys ();}
    
}


function AdminViewItemNameToUpdateEndPoint ()
{
    $id = $_POST['id'];
    $itemtype = $_POST["type"];
    if ($itemtype == "BOXES_LOGOS_UPLOAD"){AdminViewItemNameToUpdate_BoxesLogos ($id);}
    elseif ($itemtype == "BOXES_MAPS_UPLOAD"){AdminViewItemNameToUpdate_BoxesAfricanVilages ($id);}
    elseif ($itemtype == "BOXES_GUITAR_AMPLIFIED_UPLOAD"){AdminViewItemNameToUpdate_BoxesAfricanAnimals ($id);}

    elseif ($itemtype == "TABLES_LOGOS_UPLOAD"){AdminViewItemNameToUpdate_TablesLogos ($id);}
    elseif ($itemtype == "TABLES_MAPS_UPLOAD"){AdminViewItemNameToUpdate_TablesAfricanVilages ($id);}
    elseif ($itemtype == "TABLES_GUITAR_AMPLIFIED_UPLOAD"){AdminViewItemNameToUpdate_TablesAfricanAnimals ($id);}

    elseif ($itemtype == "WALL_HANGINGS_LOGOS_UPLOAD"){AdminViewItemNameToUpdate_WallHangingsLogos ($id);}
    elseif ($itemtype == "WALL_HANGINGS_MAPS_UPLOAD"){AdminViewItemNameToUpdate_WallHangingsAfricanVilages ($id);}
    elseif ($itemtype == "WALL_HANGINGS_GUITAR_AMPLIFIED_UPLOAD"){AdminViewItemNameToUpdate_WallHangingsAfricanAnimals ($id);}

    elseif ($itemtype == "CHAIRS_LOGOS_UPLOAD"){AdminViewItemNameToUpdate_ChairsLogos ($id);}
    elseif ($itemtype == "CHAIRS_MAPS_UPLOAD"){AdminViewItemNameToUpdate_ChairsAfricanVilages ($id);}
    elseif ($itemtype == "CHAIRS_GUITAR_AMPLIFIED_UPLOAD"){AdminViewItemNameToUpdate_ChairsAfricanAnimals ($id);}

    elseif ($itemtype == "DOORS_UPLOAD"){AdminViewItemNameToUpdate_Doors ($id);}
    elseif ($itemtype == "ELECTRONICS_USB_UPLOAD"){AdminViewItemNameToUpdate_Statues ($id);}
    elseif ($itemtype == "ELECTRONICS_CHARGER_BULBS_UPLOAD"){AdminViewItemNameToUpdate_LampHolders ($id);}
    elseif ($itemtype == "ELECTRONICS_FLASH_DISKS_UPLOAD"){AdminViewItemNameToUpdate_WalkingSticks ($id);}
    elseif ($itemtype == "ELECTRONICS_PORTABLE_SPEAKER_UPLOAD"){AdminViewItemNameToUpdate_Cups ($id);}
    elseif ($itemtype == "ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD"){AdminViewItemNameToUpdate_AshTreys ($id);} 
}

function AdminAddItemEndPoint ()
{
    
    global $file_upload_dir_array; 
    global $adminpin;
    global $response;
    // $file_upload_dir = $_SERVER['DOCUMENT_ROOT'].$file_upload_dir_array; 
    $itemtype = $_POST["itemtype"];
    $itemname = $_POST["itemname"];
    $img_name = $_POST["code"]; 
    $description = $_POST["description"];
    $img = $_FILES["file"]["code"];
    $password = $_POST["password"];


    if (empty($itemtype)||empty($img_name)||empty($description)||empty($img)||empty($password))
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
            //<<<6/7/2021>>> $target_dir = array_search($itemtype,$file_upload_dir_array);
            $target_dir = array_search($itemtype,$file_upload_dir_array);
            if(!empty($_FILES["file"]["name"]))
            { 
                $uploadStatus = 1;

                
                $target_file = $target_dir."/".$img_name; // rename the file add / be4 name
                // $file_type=$_FILES['file']['type']; // defining file type


                // $fileType = pathinfo($img, PATHINFO_EXTENSION);
                // $allowTypes = array('jpg', 'png', 'jpeg');

                // if($file_type!="image/jpg" || $file_type!="image/jpeg" || $file_type!="image/png")
                // if(!in_array($fileType, $allowTypes))

                // // check weather the file ends with g 
                // $g = substr($img, -1);
                // if ($g!=='S')
                // {$uploadStatus = 0;$response['message'] = "Sorry, $img <br>Only<br> JPG, JPEG, & PNG Files Are Allowed.";}

                // check if it already in db
                if (file_exists($target_file)) 
                {$uploadStatus = 0; $response['message'] = "Sorry,<br> $img_name <br> File Already Exists.";}
                else
                {
                    $id = date("dh-is");
                    // $upload_date = date("d/m/Y");
                    // insert function call

                    if ($itemtype == "GUITAR_BASS_UPLOAD"){InsertInto_Boxes($id,$img_name ,$description);}
                    elseif ($itemtype == "GUITAR_ELECTRIC_UPLOAD"){InsertInto_Logos($id,$img_name ,$description);}
                    elseif ($itemtype == "GUITAR_ACOUSTIC_UPLOAD"){InsertInto_Maps($id,$img_name,$description);}
                    elseif ($itemtype == "GUITAR_AMPLIFIED_UPLOAD"){InsertInto_Last_Supper($id,$img_name,$description);}

                    elseif ($itemtype == "ELECTRONICS_USB_UPLOAD"){InsertInto_Statues_People($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_CHARGERS_UPLOAD"){InsertInto_Statues_Animals($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_LED_BULBS_UPLOAD"){InsertInto_Tables_Round($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_BATTERIES_UPLOAD"){InsertInto_Tables_Square($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_ADAPTERS_UPLOAD"){InsertInto_Tables_Dainning($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_CARD_READER_UPLOAD"){InsertInto_Doors_Plain($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_FORM_CLEANER_UPLOAD"){InsertInto_Doors_Design($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_IPHONE_USB_UPLOAD"){InsertInto_Trofhies($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_WALL_MOUNT_UPLOAD"){InsertInto_WallHangings($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_BANANA_PIN_UPLOAD"){InsertInto_Chairs($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_CHARGER_BULBS_UPLOAD"){InsertInto_LampHolders($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_FLASH_DISKS_UPLOAD"){InsertInto_WalkingSticks($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_PORTABLE_SPEAKER_UPLOAD"){InsertInto_Cups($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD"){InsertInto_AshTreys($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_MEMORY_CARDS_UPLOAD"){InsertInto_WalkingSticks($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_UNIVERSAL_CHARGER_UPLOAD"){InsertInto_Cups($id,$img_name,$description);}
                    elseif ($itemtype == "EELECTRONICS_RECIEVER_HEADSET_UPLOAD"){InsertInto_AshTreys($id,$img_name,$description);}
                    elseif ($itemtype == "ELECTRONICS_WIRELESS_HEADPHONES_UPLOAD"){InsertInto_AshTreys($id,$img_name,$description);}
                    
                    // Upload file to the folder
                    if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file))
                    {$response['message'] = "$img_name <br>$description<br> Data Submitted Successfully!";}
                    else 
                    {$response['message'] = " Error On Uploading A file ".$_FILES["file"]["error"];}
                }
            }
            else{$uploadStatus = 0;$response['message'] = 'Sorry, <br>Type ,Name<br>Description,Picture <br> All Inputs Are Required.';} 
        }
    }
    // Return response
    echo json_encode($response);
}


function AdminUpdateItemEndPoint ()
{
    // Renaming a file
    global $file_upload_dir_array; 
    global $adminpin;
    global $response;


    $itemtype = $_POST["type"];
    $oldname = $_POST["oldname"]; 
    $newname = $_POST["newname"]; 
    $password = $_POST["password"];
    
    if (empty($itemtype)||empty($oldname)||empty($newname)||empty($password))
    {$response['message'] = "Sorry, <br>All <br> Fields Required";}
    else
    {
        if ($password != $adminpin) // validate admin
        {$response['message'] = "Sorry, <br> $password <br> Invalid Admin Password,<br>Try Again";}
        else
        {
            $target_dir = array_search($itemtype,$file_upload_dir_array);
            $old_file_name = $target_dir."/".$oldname;
            $new_file_name = $target_dir."/".$newname;
            

            if (!file_exists($old_file_name)) 
            {$response['message'] = "Sorry,<br> $oldname <br> File Do not Exists..";}

            // Update db
            if ($itemtype == "BOXES_LOGOS_UPLOAD"){AdminUpdateItem_BoxesLogos ($oldname,$newname);}
            elseif ($itemtype == "BOXES_MAPS_UPLOAD"){AdminUpdateItem_BoxesAfricanVilages ($oldname,$newname);}
            elseif ($itemtype == "BOXES_GUITAR_AMPLIFIED_UPLOAD"){AdminUpdateItem_BoxesAfricanAnimals ($oldname,$newname);}

            elseif ($itemtype == "TABLES_LOGOS_UPLOAD"){AdminUpdateItem_TablesLogos ($oldname,$newname);}
            elseif ($itemtype == "TABLES_MAPS_UPLOAD"){AdminUpdateItem_TablesAfricanVilages ($oldname,$newname);}
            elseif ($itemtype == "TABLES_GUITAR_AMPLIFIED_UPLOAD"){AdminUpdateItem_TablesAfricanAnimals ($oldname,$newname);}

            elseif ($itemtype == "WALL_HANGINGS_LOGOS_UPLOAD"){AdminUpdateItem_WallHangingsLogos ($oldname,$newname);}
            elseif ($itemtype == "WALL_HANGINGS_MAPS_UPLOAD"){AdminUpdateItem_WallHangingsAfricanVilages ($oldname,$newname);}
            elseif ($itemtype == "WALL_HANGINGS_GUITAR_AMPLIFIED_UPLOAD"){AdminUpdateItem_WallHangingsAfricanAnimals ($oldname,$newname);}

            elseif ($itemtype == "CHAIRS_LOGOS_UPLOAD"){AdminUpdateItem_ChairsLogos ($oldname,$newname);}
            elseif ($itemtype == "CHAIRS_MAPS_UPLOAD"){AdminUpdateItem_ChairsAfricanVilages ($oldname,$newname);}
            elseif ($itemtype == "CHAIRS_GUITAR_AMPLIFIED_UPLOAD"){AdminUpdateItem_ChairsAfricanAnimals ($oldname,$newname);}

            elseif ($itemtype == "DOORS_UPLOAD"){AdminUpdateItem_Doors ($oldname,$newname);}
            elseif ($itemtype == "ELECTRONICS_USB_UPLOAD"){AdminUpdateItem_Statues ($oldname,$newname);}
            elseif ($itemtype == "ELECTRONICS_CHARGER_BULBS_UPLOAD"){AdminUpdateItem_LampHolders ($oldname,$newname);}
            elseif ($itemtype == "ELECTRONICS_FLASH_DISKS_UPLOAD"){AdminUpdateItem_WalkingSticks ($oldname,$newname);}
            elseif ($itemtype == "ELECTRONICS_PORTABLE_SPEAKER_UPLOAD"){AdminUpdateItem_Cups ($oldname,$newname);}
            elseif ($itemtype == "ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD"){AdminUpdateItem_AshTreys ($oldname,$newname);}

            // Update files in pic dir
            if(!rename($old_file_name,$new_file_name))
            {$response['message'] = "Sory, <br>  An Error <br> When Editing File";}
            else
            {$response['message'] = "$oldname <br>  Edited To <br> $newname <br>Successfully!";}
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


    $itemtype = $_POST["type"];
    $oldname = $_POST["oldname"]; 
    $password = $_POST["password"];
    
    if (empty($itemtype)||empty($oldname)||empty($password))
    {$response['message'] = "Sorry, <br>All <br> Fields Required";}
    else
    {
        if ($password != $adminpin) // validate admin
        {$response['message'] = "Sorry, <br> $password <br> Invalid Admin Password,<br>Try Again";}
        else
        {
            $target_dir = array_search($itemtype,$file_upload_dir_array);
            $old_file_name = $target_dir."/".$oldname;
            

            if (!file_exists($old_file_name)) 
            {$response['message'] = "Sorry,<br> $oldname <br> File Do not Exists..";}
                
            // Delete from db
            if ($itemtype == "BOXES_LOGOS_UPLOAD"){AdminDeleteItem_BoxesLogos ($oldname);}
            elseif ($itemtype == "BOXES_MAPS_UPLOAD"){AdminDeleteItem_BoxesAfricanVilages ($oldname);}
            elseif ($itemtype == "BOXES_GUITAR_AMPLIFIED_UPLOAD"){AdminDeleteItem_BoxesAfricanAnimals ($oldname);}

            elseif ($itemtype == "TABLES_LOGOS_UPLOAD"){AdminDeleteItem_TablesLogos ($oldname);}
            elseif ($itemtype == "TABLES_MAPS_UPLOAD"){AdminDeleteItem_TablesAfricanVilages ($oldname);}
            elseif ($itemtype == "TABLES_GUITAR_AMPLIFIED_UPLOAD"){AdminDeleteItem_TablesAfricanAnimals ($oldname);}

            elseif ($itemtype == "WALL_HANGINGS_LOGOS_UPLOAD"){AdminDeleteItem_WallHangingsLogos ($oldname);}
            elseif ($itemtype == "WALL_HANGINGS_MAPS_UPLOAD"){AdminDeleteItem_WallHangingsAfricanVilages ($oldname);}
            elseif ($itemtype == "WALL_HANGINGS_GUITAR_AMPLIFIED_UPLOAD"){AdminDeleteItem_WallHangingsAfricanAnimals ($oldname);}

            elseif ($itemtype == "CHAIRS_LOGOS_UPLOAD"){AdminDeleteItem_ChairsLogos ($oldname);}
            elseif ($itemtype == "CHAIRS_MAPS_UPLOAD"){AdminDeleteItem_ChairsAfricanVilages ($oldname);}
            elseif ($itemtype == "CHAIRS_GUITAR_AMPLIFIED_UPLOAD"){AdminDeleteItem_ChairsAfricanAnimals ($oldname);}

            elseif ($itemtype == "DOORS_UPLOAD"){AdminDeleteItem_Doors ($oldname);}
            elseif ($itemtype == "ELECTRONICS_USB_UPLOAD"){AdminDeleteItem_Statues ($oldname);}
            elseif ($itemtype == "ELECTRONICS_CHARGER_BULBS_UPLOAD"){AdminDeleteItem_LampHolders ($oldname);}
            elseif ($itemtype == "ELECTRONICS_FLASH_DISKS_UPLOAD"){AdminDeleteItem_WalkingSticks ($oldname);}
            elseif ($itemtype == "ELECTRONICS_PORTABLE_SPEAKER_UPLOAD"){AdminDeleteItem_Cups ($oldname);}
            elseif ($itemtype == "ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD"){AdminDeleteItem_AshTreys ($oldname);}

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