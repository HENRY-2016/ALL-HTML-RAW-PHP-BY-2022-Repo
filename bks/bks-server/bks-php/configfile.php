


<?php

// $url = 'http://localhost'; 
$url = 'http://109.237.25.239';
$html_pages_source_dir = '/bks-dir/bks-repo/';
$php_pages_source_dir = '/bks-dir/bks-php/';



// PHP GUIS
$AdminLogIn = $url.$php_pages_source_dir.'processlogin.php'; 


// HTML FILES GUI.....
$ClientIndexPage = $url.$html_pages_source_dir.'jersey.html';
$AdminIndexPage = $url.$html_pages_source_dir.'index.html'; // Entery Point ..... 



?>

<!-- 

    Configuring apach2 to run php inside .html file
        cd /etc/apache2/mods-available$ sudo nano php7.0.conf

            # Then add the following at the top of the file
            <FilesMatch ".+\.html$">
                SetHandler application/x-httpd-php
            </FilesMatch>

-->