
<?php
$adminpin ="2021";

$BOXES_UPLOAD_FOLDER='fileuploads/boxes'; 
$LOGOS_UPLOAD_FOLDER='fileuploads/logos'; 


$MAPS_UPLOAD_FOLDER='fileuploads/maps'; 
$LAST_SUPPER_UPLOAD_FOLDER='fileuploads/last_supper';
$STATUES_PEOPLE_UPLOAD_FOLDER='fileuploads/statues/people';	
$STATUES_ANIMALS_UPLOAD_FOLDER='fileuploads/statues/animals';	
$TABLES_ROUND_UPLOAD_FOLDER='fileuploads/tables/round'; 
$TABLES_SQUARE_UPLOAD_FOLDER='fileuploads/tables/square'; 
$TABLES_DAINNING_UPLOAD_FOLDER='fileuploads/tables/dainning';
$DOORS_PLAIN_UPLOAD_FOLDER='fileuploads/doors/plain';	
$DOORS_DESIGN_UPLOAD_FOLDER='fileuploads/doors/design';	
$TROFHIES_UPLOAD_FOLDER='fileuploads/trofhies';	






$WALL_HANGINGS_UPLOAD_FOLDER='fileuploads/wall_hangings';
$CHAIRS_UPLOAD_FOLDER='fileuploads/chairs';

$LAMP_HOLDERS_UPLOAD_FOLDER='fileuploads/lamp_holders';

$WALKING_STICKS_UPLOAD_FOLDER='fileuploads/walking_sticks';
$CUPS_UPLOAD_FOLDER='fileuploads/cups';
$ASH_TREYS_UPLOAD_FOLDER='fileuploads/ash_treys';

function CreateDirs ()
{
    // Access my defined variabls from outside function    
    global $BOXES_UPLOAD_FOLDER; 
    global $LOGOS_UPLOAD_FOLDER; 

    global $MAPS_UPLOAD_FOLDER; 
    global $LAST_SUPPER_UPLOAD_FOLDER; 
    global $STATUES_PEOPLE_UPLOAD_FOLDER;
    global $STATUES_ANIMALS_UPLOAD_FOLDER;
    global $TABLES_ROUND_UPLOAD_FOLDER; 
    global $TABLES_SQUARE_UPLOAD_FOLDER; 
    global $TABLES_DAINNING_UPLOAD_FOLDER; 
    global $DOORS_PLAIN_UPLOAD_FOLDER;	
    global $DOORS_DESIGN_UPLOAD_FOLDER;	
    global $TROFHIES_UPLOAD_FOLDER;	







    global $WALL_HANGINGS_UPLOAD_FOLDER;
    global $CHAIRS_UPLOAD_FOLDER;

    global $LAMP_HOLDERS_UPLOAD_FOLDER;

    global $WALKING_STICKS_UPLOAD_FOLDER;
    global $CUPS_UPLOAD_FOLDER;
    global $ASH_TREYS_UPLOAD_FOLDER;

    $upload_dirs = array
                    (
                        $BOXES_UPLOAD_FOLDER, 
                        $LOGOS_UPLOAD_FOLDER,

                        $MAPS_UPLOAD_FOLDER, 
                        $LAST_SUPPER_UPLOAD_FOLDER, 
                        $STATUES_PEOPLE_UPLOAD_FOLDER,
                        $STATUES_ANIMALS_UPLOAD_FOLDER,
                        $TABLES_ROUND_UPLOAD_FOLDER,
                        $TABLES_SQUARE_UPLOAD_FOLDER,
                        $TABLES_DAINNING_UPLOAD_FOLDER,
                        $DOORS_PLAIN_UPLOAD_FOLDER,	
                        $DOORS_DESIGN_UPLOAD_FOLDER,	
                        $TROFHIES_UPLOAD_FOLDER,	
                        
                        
                        $WALL_HANGINGS_UPLOAD_FOLDER,
                        $CHAIRS_UPLOAD_FOLDER,

                        $LAMP_HOLDERS_UPLOAD_FOLDER,

                        $WALKING_STICKS_UPLOAD_FOLDER,
                        $CUPS_UPLOAD_FOLDER,
                        $ASH_TREYS_UPLOAD_FOLDER
                    );

        foreach ($upload_dirs as $upload_dir_name)
        {
            if(!is_dir($upload_dir_name))
                {
                    // mkdir ($path,$mode,$recursive) mode always 4 digits
                    mkdir($upload_dir_name,0777,true);
                    echo $upload_dir_name . " ===> Created\n";echo"";echo"";
                }
            else {echo $upload_dir_name . " ===> Exisits\n";echo"";echo"";}
            
        }
}
function SetFileUploadsPermissions ()
{ 
    $permissions = shell_exec('sudo chmod -R +777 fileuploads/*');
    echo "<pre>$permissions</pre>\n\n"; echo "Permissions Given To Dirs\n\n";
}

// array_search — Searches the array for a given value and returns the first corresponding key if successful
$file_upload_dir_array = array
                    (
                        $BOXES_UPLOAD_FOLDER => "BOXES_UPLOAD", 
                        $LOGOS_UPLOAD_FOLDER => "LOGOS_UPLOAD",

                        $MAPS_UPLOAD_FOLDER => "MAPS_UPLOAD", 
                        $LAST_SUPPER_UPLOAD_FOLDER => "LAST_SUPPER_UPLOAD", 
                        $STATUES_PEOPLE_UPLOAD_FOLDER => "STATUES_PEOPLE_UPLOAD",
                        $STATUES_ANIMALS_UPLOAD_FOLDER => "STATUES_ANIMALS_UPLOAD",
                        $TABLES_ROUND_UPLOAD_FOLDER => "TABLES_ROUND_UPLOAD",
                        $TABLES_SQUARE_UPLOAD_FOLDER => "TABLES_SQUARE_UPLOAD",
                        $TABLES_DAINNING_UPLOAD_FOLDER => "TABLES_DAINNING_UPLOAD",
                        $DOORS_PLAIN_UPLOAD_FOLDER =>"DOORS_PLAIN_UPLOAD",	
                        $DOORS_DESIGN_UPLOAD_FOLDER =>"DOORS_DESIGN_UPLOAD",	
                        $TROFHIES_UPLOAD_FOLDER =>"TROFHIES_UPLOAD",	




                        $WALL_HANGINGS_UPLOAD_FOLDER=>"WALL_HANGINGS_UPLOAD",
                        $CHAIRS_UPLOAD_FOLDER=>"CHAIRS_UPLOAD",

                        $LAMP_HOLDERS_UPLOAD_FOLDER => "LAMP_HOLDERS_UPLOAD",

                        $WALKING_STICKS_UPLOAD_FOLDER => "WALKING_STICKS_UPLOAD",
                        $CUPS_UPLOAD_FOLDER => "CUPS_UPLOAD",
                        $ASH_TREYS_UPLOAD_FOLDER => "ASH_TREYS_UPLOAD"
                    );

// CreateDirs ();
// SetFileUploadsPermissions ();

?>