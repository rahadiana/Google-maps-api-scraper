<?php

#include "function/autoload.php";


foreach (glob("function/function_*.php") as $filename)
{
  include $filename;
}





$StartDirection ='kelapa bakar k3ju';
$EndDirection ='klinik puri intan bekasi';
$lat="-6.243310";
$long= "106.993720";

//tes data uncomment for use

//echo LatLongAddres($lat,$long);
//echo RouteSearch($StartDirection,$EndDirection);

//echo PlaceDetails("klinik puri intan bekasi");