
<?php
$adminpin ="2022";

$GUITAR_BASS_UPLOAD_FOLDER='fileuploads/guitar/bass'; 
$GUITAR_ELECTRIC_UPLOAD_FOLDER='fileuploads/guitar/electric'; 
$GUITAR_ACOUSTIC_UPLOAD_FOLDER='fileuploads/guitar/acoustic'; 
$GUITAR_AMPLIFIED_UPLOAD_FOLDER='fileuploads/guitar/amplified';

$ELECTRONICS_USB_UPLOAD_FOLDER='fileuploads/electronics/usb';	
$ELECTRONICS_CHARGERS_UPLOAD_FOLDER='fileuploads/electronics/chargers';	
$ELECTRONICS_LED_BULBS_UPLOAD_FOLDER='fileuploads/electronics/led_bulbs'; 
$ELECTRONICS_BATTERIES_UPLOAD_FOLDER='fileuploads/electronics/batteries'; 
$ELECTRONICS_ADAPTERS_UPLOAD_FOLDER='fileuploads/electronics/adapters';
$ELECTRONICS_CARD_READER_UPLOAD_FOLDER='fileuploads/electronics/card_reader';	
$ELECTRONICS_FORM_CLEANER_UPLOAD_FOLDER='fileuploads/electronics/form_cleaner';	
$ELECTRONICS_IPHONE_USB_UPLOAD_FOLDER='fileuploads/electronics/iphone_usb';	
$ELECTRONICS_WALL_MOUNT_UPLOAD_FOLDER='fileuploads/electronics/wall_mount';
$ELECTRONICS_BANANA_PIN_UPLOAD_FOLDER='fileuploads/electronics/banana_pin';
$ELECTRONICS_CHARGER_BULBS_UPLOAD_FOLDER='fileuploads/electronics/charger_bulbs';
$ELECTRONICS_FLASH_DISKS_UPLOAD_FOLDER='fileuploads/electronics/flash_disks';
$ELECTRONICS_PORTABLE_SPEAKER_UPLOAD_FOLDER='fileuploads/electronics/portable_speakers';
$ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD_FOLDER='fileuploads/electronics/bluetooth_speaker';
$ELECTRONICS_MEMORY_CARDS_UPLOAD_FOLDER='fileuploads/electronics/memory_cards';
$ELECTRONICS_UNIVERSAL_CHARGER_UPLOAD_FOLDER='fileuploads/electronics/universal_charger';
$ELECTRONICS_RECIEVER_HEADSET_UPLOAD_FOLDER='fileuploads/electronics/reciever_headset';
$ELECTRONICS_WIRELESS_HEADPHONES_UPLOAD_FOLDER='fileuploads/electronics/wireless_headphones';

function CreateDirs ()
{
    // Access my defined variabls from outside function    
    global $GUITAR_BASS_UPLOAD_FOLDER; 
    global $GUITAR_ELECTRIC_UPLOAD_FOLDER; 
    global $GUITAR_ACOUSTIC_UPLOAD_FOLDER; 
    global $GUITAR_AMPLIFIED_UPLOAD_FOLDER; 

    global $ELECTRONICS_USB_UPLOAD_FOLDER;
    global $ELECTRONICS_CHARGERS_UPLOAD_FOLDER;
    global $ELECTRONICS_LED_BULBS_UPLOAD_FOLDER; 
    global $ELECTRONICS_BATTERIES_UPLOAD_FOLDER; 
    global $ELECTRONICS_ADAPTERS_UPLOAD_FOLDER; 
    global $ELECTRONICS_CARD_READER_UPLOAD_FOLDER;	
    global $ELECTRONICS_FORM_CLEANER_UPLOAD_FOLDER;	
    global $ELECTRONICS_IPHONE_USB_UPLOAD_FOLDER;	
    global $ELECTRONICS_WALL_MOUNT_UPLOAD_FOLDER;
    global $ELECTRONICS_BANANA_PIN_UPLOAD_FOLDER;
    global $ELECTRONICS_CHARGER_BULBS_UPLOAD_FOLDER;
    global $ELECTRONICS_FLASH_DISKS_UPLOAD_FOLDER;
    global $ELECTRONICS_PORTABLE_SPEAKER_UPLOAD_FOLDER;
    global $ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD_FOLDER;
    global $ELECTRONICS_MEMORY_CARDS_UPLOAD_FOLDER;
    global $ELECTRONICS_UNIVERSAL_CHARGER_UPLOAD_FOLDER;
    global $ELECTRONICS_RECIEVER_HEADSET_UPLOAD_FOLDER;
    global $ELECTRONICS_WIRELESS_HEADPHONES_UPLOAD_FOLDER;

    $upload_dirs = array
                    (
                        $GUITAR_BASS_UPLOAD_FOLDER, 
                        $GUITAR_ELECTRIC_UPLOAD_FOLDER,
                        $GUITAR_ACOUSTIC_UPLOAD_FOLDER, 
                        $GUITAR_AMPLIFIED_UPLOAD_FOLDER,
                    
                        $ELECTRONICS_USB_UPLOAD_FOLDER,
                        $ELECTRONICS_CHARGERS_UPLOAD_FOLDER,
                        $ELECTRONICS_LED_BULBS_UPLOAD_FOLDER,
                        $ELECTRONICS_BATTERIES_UPLOAD_FOLDER,
                        $ELECTRONICS_ADAPTERS_UPLOAD_FOLDER,
                        $ELECTRONICS_CARD_READER_UPLOAD_FOLDER,	
                        $ELECTRONICS_FORM_CLEANER_UPLOAD_FOLDER,	
                        $ELECTRONICS_IPHONE_USB_UPLOAD_FOLDER,	
                        $ELECTRONICS_WALL_MOUNT_UPLOAD_FOLDER,
                        $ELECTRONICS_BANANA_PIN_UPLOAD_FOLDER,
                        $ELECTRONICS_CHARGER_BULBS_UPLOAD_FOLDER,
                        $ELECTRONICS_FLASH_DISKS_UPLOAD_FOLDER,
                        $ELECTRONICS_PORTABLE_SPEAKER_UPLOAD_FOLDER,
                        $ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD_FOLDER,
                        $ELECTRONICS_MEMORY_CARDS_UPLOAD_FOLDER,
                        $ELECTRONICS_UNIVERSAL_CHARGER_UPLOAD_FOLDER,
                        $ELECTRONICS_RECIEVER_HEADSET_UPLOAD_FOLDER,
                        $ELECTRONICS_WIRELESS_HEADPHONES_UPLOAD_FOLDER
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
                        $GUITAR_BASS_UPLOAD_FOLDER => "GUITAR_BASS_UPLOAD", 
                        $GUITAR_ELECTRIC_UPLOAD_FOLDER => "GUITAR_ELECTRIC_UPLOAD",
                        $GUITAR_ACOUSTIC_UPLOAD_FOLDER => "GUITAR_ACOUSTIC_UPLOAD", 
                        $GUITAR_AMPLIFIED_UPLOAD_FOLDER => "GUITAR_AMPLIFIED_UPLOAD",
                    
                        $ELECTRONICS_USB_UPLOAD_FOLDER => "ELECTRONICS_USB_UPLOAD",
                        $ELECTRONICS_CHARGERS_UPLOAD_FOLDER => "ELECTRONICS_CHARGERS_UPLOAD",
                        $ELECTRONICS_LED_BULBS_UPLOAD_FOLDER => "ELECTRONICS_LED_BULBS_UPLOAD",
                        $ELECTRONICS_BATTERIES_UPLOAD_FOLDER => "ELECTRONICS_BATTERIES_UPLOAD",
                        $ELECTRONICS_ADAPTERS_UPLOAD_FOLDER => "ELECTRONICS_ADAPTERS_UPLOAD",
                        $ELECTRONICS_CARD_READER_UPLOAD_FOLDER =>"ELECTRONICS_CARD_READER_UPLOAD",	
                        $ELECTRONICS_FORM_CLEANER_UPLOAD_FOLDER =>"ELECTRONICS_FORM_CLEANER_UPLOAD",	
                        $ELECTRONICS_IPHONE_USB_UPLOAD_FOLDER =>"ELECTRONICS_IPHONE_USB_UPLOAD",	
                        $ELECTRONICS_WALL_MOUNT_UPLOAD_FOLDER=>"ELECTRONICS_WALL_MOUNT_UPLOAD",
                        $ELECTRONICS_BANANA_PIN_UPLOAD_FOLDER=>"ELECTRONICS_BANANA_PIN_UPLOAD",
                        $ELECTRONICS_CHARGER_BULBS_UPLOAD_FOLDER => "ELECTRONICS_CHARGER_BULBS_UPLOAD",
                        $ELECTRONICS_FLASH_DISKS_UPLOAD_FOLDER => "ELECTRONICS_FLASH_DISKS_UPLOAD",
                        $ELECTRONICS_PORTABLE_SPEAKER_UPLOAD_FOLDER => "ELECTRONICS_PORTABLE_SPEAKER_UPLOAD",
                        $ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD_FOLDER => "ELECTRONICS_BLUETOOTH_SPEAKER_UPLOAD",
                        $ELECTRONICS_MEMORY_CARDS_UPLOAD_FOLDER  => "ELECTRONICS_MEMORY_CARDS_UPLOAD",
                        $ELECTRONICS_UNIVERSAL_CHARGER_UPLOAD_FOLDER  => "ELECTRONICS_UNIVERSAL_CHARGER_UPLOAD",
                        $ELECTRONICS_RECIEVER_HEADSET_UPLOAD_FOLDER => "ELECTRONICS_RECIEVER_HEADSET_UPLOAD",
                        $ELECTRONICS_WIRELESS_HEADPHONES_UPLOAD_FOLDER => "ELECTRONICS_WIRELESS_HEADPHONES_UPLOAD",
                    );

// CreateDirs ();
// SetFileUploadsPermissions ();

?>