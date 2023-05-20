


<?php

// $url = 'https://mogahenze.com';
// $url = 'http://10.42.0.1';
$url = 'http://localhost';



$html_pages_source_dir = '/hdf-dir/hdf-repo/';
$php_pages_source_dir = '/hdf-dir/hdf-php/';



// PHP GUIS
$AdminLogIn = $url.$php_pages_source_dir.'processlogin.php'; 


// HTML FILES GUI.....
$ClientIndexPage = $url.$html_pages_source_dir.'maps.html';
$AdminIndexPage = $url.$html_pages_source_dir.'index_orders.html'; // Entery Point ..... 



?>

<!-- 

    Configuring apach2 to run php inside .html file
        cd /etc/apache2/mods-available$ sudo nano php7.0.conf

            # Then add the following at the top of the file
            <FilesMatch ".+\.html$">
                SetHandler application/x-httpd-php
            </FilesMatch>

-->