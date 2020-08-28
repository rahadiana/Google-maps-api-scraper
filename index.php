<?php

#include "function/autoload.php";


foreach (glob("function/function_*.php") as $filename)
{
  include $filename;
}





$StartDirection ='cluster hibiscus bekasi';
$EndDirection ='kantor walikota bekasi';
$lat="-6.243310";
$long= "106.993720";
$Adress = "Jl. Jend. Ahmad Yani, RT.001/RW.005, Marga Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17141";
//tes data uncomment for use

/** convert Lat Long to Address **/
//echo LatLongToAddres($lat,$long);

/** convert Address to Lat Long **/
//echo AddresToLatLong($Adress);

/** Search Suggested Place **/
//echo PlacePredictions($EndDirection);

//echo PlaceDetails("kantor walikota bekasi");
//belom


//echo RouteSearch($StartDirection,$EndDirection);

//echo PlaceDetails("kantor walikota bekasi");

