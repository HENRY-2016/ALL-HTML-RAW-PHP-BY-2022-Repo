

<?php
include "db_read_from.php";

    $request_url = $_SERVER['REQUEST_URI'];
    // echo $request_url;

    $african_animals_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetAfricanAnimalsNamesEndpoit";
    $african_villages_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetAfricanVillageNamesEndpoit";
    $ashtreys_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetAshTreyNamesEndpoint";
    $boxes_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetBoxesNamesEndpoint";
    $chairs_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetChairsNamesEndpoint";
    $cups_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetCupsNamesEndpoint";
    $lamp_holders_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetLampHoldersNamesEndpoint";
    $logos_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetLogosNamesEndpoint";
    $statues_animals_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetStatuesAnimalNamesEndpoint";
    $statues_people_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetStatuesPeopleNamesEndpoint";
    $tables_round_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetTablesRoundNamesEndpoint";
    $tables_dainning_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetTablesDainningNamesEndpoint";
    $tables_square_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetTablesSquareNamesEndpoint";
    $walking_sticks_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetWalkingSticksNamesEndpoint";
    $wall_hanging_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetWallHangingNamesEndpoint";
    $maps_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetMapsNamesEndpoint";
    $doors_plain_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetDoorsPlainNamesEndpoint";
    $doors_design_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetDoorsDesignNamesEndpoint";
    $trofhies_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetTrofhiesNamesEndpoint";
    $last_supper_names_url = "/hdf-dir/hdf-php/routes_outgoing.php/GetLastSupperNamesEndpoint";
    

    if ($request_url === $ashtreys_names_url){GetAshTreyNamesEndpoint ($request_url);}
    elseif ($request_url === $boxes_names_url){GetBoxesNamesEndpoint ($request_url);}
    elseif ($request_url === $maps_names_url){GetMapsNamesEndpoint ($request_url);}
    elseif ($request_url === $doors_plain_names_url){GetDoorsPlainNamesEndpoint ($request_url);}
    elseif ($request_url === $doors_design_names_url){GetDoorsDesignNamesEndpoint ($request_url);}
    elseif ($request_url === $trofhies_names_url){GetTrofhiesNamesEndpoint ($request_url);}
    elseif ($request_url === $tables_round_names_url){GetTablesRoundNamesEndpoint ($request_url);}
    elseif ($request_url === $tables_dainning_names_url){GetTablesDainningNamesEndpoint ($request_url);}
    elseif ($request_url === $tables_square_names_url){GetTablesSquareNamesEndpoint ($request_url);}
    elseif ($request_url === $statues_animals_names_url){GetStatuesAnimalNamesEndpoint ($request_url);}
    elseif ($request_url === $statues_people_names_url){GetStatuesPeopleNamesEndpoint ($request_url);}
    elseif ($request_url === $last_supper_names_url){GetLastSupperNamesEndpoint ($request_url);}
    elseif ($request_url === $chairs_names_url){GetChairsNamesEndpoint ($request_url);}
    elseif ($request_url === $cups_names_url){GetCupsNamesEndpoint ($request_url);}
    elseif ($request_url === $lamp_holders_names_url){GetLampHoldersNamesEndpoint ($request_url);}
    elseif ($request_url === $logos_names_url){GetLogosNamesEndpoint ($request_url);}
    elseif ($request_url === $walking_sticks_names_url){GetWalkingSticksNamesEndpoint ($request_url);}
    elseif ($request_url === $wall_hanging_names_url){GetWallHangingNamesEndpoint ($request_url);}

    else {echo "Invalid Url Specified ...";}


?>