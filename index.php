<?php

#include "function/autoload.php";


foreach (glob("function/function_*.php") as $filename)
{
  include $filename;
}





$StartDirection ='cluster hibiscus bekasi';
$EndDirection ='kantor walikota kota indramayu';
$lat="-6.243310";
$long= "106.993720";
$Adress = "jKantor Imigrasi Kelas II Non TPI Bekasi, Jalan Perjuangan, RT.002\/RW.001, Teluk Pucung, Kota Bekasi, Jawa Barat";

//tes data uncomment for use

/** convert Lat Long to Address **/


//echo LatLongToAddres($lat,$long);

/** convert Address to Lat Long **/

//echo AddresToLatLong("jl a yani no 1 kota bekasi").PHP_EOL;








/** Search Suggested Place **/
//echo PlacePredictions("kantor imigrasi bekasi");

//echo PlaceDetails("Kantor Imigrasi Kelas II Non TPI Bekasi, Jalan Perjuangan, RT.002\/RW.001, Teluk Pucung, Kota Bekasi, Jawa Barat");



//echo RouteSearch($StartDirection,$EndDirection);

//echo PlaceDetails("Kantor Imigrasi Kelas II Non TPI Bekasi, Jalan Perjuangan, RT.002\/RW.001, Teluk Pucung, Kota Bekasi, Jawa Barat");


/** Search Elevation **/
/*
$lngOrig ="cluster hibiscus bekasi";  //OR "$lat,$long";
$lngDest ="jl kh agus salim no 20 kota bekasi" //OR "$lat,$long";;
$Num = 2; //num of sample

echo Elevation($lngOrig,$lngDest,$Num);
*/