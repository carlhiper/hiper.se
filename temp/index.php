<?php
switch($_SERVER['GEOIP_COUNTRY_CODE'])
{
    case 'SE' :
        include_once('about.html');
    break;
    case 'EN' :
    default: 
        include_once('en/index.html');
    break;
}
?>