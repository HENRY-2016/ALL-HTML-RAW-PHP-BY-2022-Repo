


<?php

// $url = 'https://mogahenze.com';
$url = 'http://10.42.0.1'; 



// dirs
$html_pages_source_dir = '/adrace-dir/adrace-repo/';
$php_scripts_dir = '/adrace-dir/adrace-php/';




// PHP GUIS
$AdminLogIn = $url.$php_scripts_dir.'adminlogin.php';



// HTML FILES GUI.....
$ClientIndexPage = $url.$html_pages_source_dir.'index.html';
$AdminIndexPage = $url.$html_pages_source_dir.'admin_booking.html';



/* 

    Configuring apach2 to run php inside .html file
        cd /etc/apache2/mods-available$ sudo nano php7.0.conf

            # Then add the following at the top of the file
            <FilesMatch ".+\.html$">
                SetHandler application/x-httpd-php
            </FilesMatch>

*/

?>

