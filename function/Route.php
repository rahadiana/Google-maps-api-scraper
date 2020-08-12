
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.google.com/maps/preview/directions?pb=!1m5!1s$StartDirection!2s!3m2!3d-0!4d0!1m5!1s$EndDirection!2s!3m2!3d-0!4d0!3m12!1m3!1d14!2d0!3d0!2m3!1f0!2f0!3f0!3m2!1i1396!2i356!4f13.1!6m23!1m1!18b1!2m3!5m1!6e2!20e3!6m11!4b1!23b1!26i1!27i1!41i2!45b1!49b1!67b1!74i1!75b1!89b1!10b1!16b1!20m2!1e6!2e1!8m0!15m4!1sH!4m1!2i12491!7e81!20m28!1m6!1m2!1i0!2i0!2m2!1i458!2i356!1m6!1m2!1i1346!2i0!2m2!1i1396!2i356!1m6!1m2!1i0!2i0!2m2!1i1396!2i20!1m6!1m2!1i0!2i336!2m2!1i1396!2i356&hl=en",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
   //"Cookie: SID=qgcTyVaDWsY_IFEfBvidAqJq9178Yif3Xy9X9MqWRRsCFHmM1D_iMVL3VDvh9Ahb12CkTw.; Cookie_3=value; NID=204=ynKfkpEPZRaZ4_wf62ThlwksfRpmRbwKyShre1QeJpXcLZWKhFqfyegFJTaFZrFYXWRawj2H8BmAvZlkHy9gqiBwowUldFd4i5gnxhzce-zsc6QApWGKtaTm3Rvx3kS1Tt7d9ICIcLJbNz_0OBxH41nl0nR8mXwY7jWMbJJDQUM; 1P_JAR=2020-07-27-19"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$results =  json_decode(str_replace(")]}'",'',$response),true);

$hasil ['sss']['sssd'] = array([
  'tujuan' => $results[0][0][0][0][0][0],
  'kode' => $results[0][0][0][0][0][1]

]);

echo json_encode($hasil);