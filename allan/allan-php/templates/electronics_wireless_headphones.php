
<?php
echo "<link rel='stylesheet' type='text/css' href='main.css'>";

$image_dir_path = "../fileuploads/electronics/wireless_headphones/";
$image_names = array_diff(scandir($image_dir_path),array('.','..'));

foreach ($image_names as $name)
{
    $image_file = $image_dir_path.$name;
    echo "
        <center>
            <table class='php-imgs-table'>
                <tr class='php-imgs-table-tr'> 
                    <td>
                        <img class='php-imgs-table-img'  src='" . $image_file . "'/></td>
                    <td>
                        <label class='php-imgs-table-label'>
                        $name
                        </label>
                    </td>
                </tr><br>
            </table>
        <center>
        ";
}

?>