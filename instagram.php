<?php
$post = array (
  'fields' => 'id,media_type,media_url,permalink,thumbnail_url,username,caption', 
  'access_token' => 'IGQVJVQUV5S2lvYjczYkw1bzZAsVDE3eTlLR1lCd191TFRySGdDNkZAra2NoaXFub3ZA1SmQ3NEhHOHBWZATM5OHdyNGlCUWdpMTdtTkwwdzlvS3BUSENzWEZA5djFYUktiTm5JOTNOZAm5fSGo3OUlQVG9VTGJ4cG5aN05Td3dR', 
);
$url = "https://graph.instagram.com/17841404963834899/media?".http_build_query($post); 
try {
  $curl_connection = curl_init($url);
  curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
  curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($curl_connection);
  curl_close($curl_connection);
} catch(Exception $e) {
  return $e->getMessage();
}

$data = json_decode($result, true);
$image_array= array();

foreach ($data['data'] as $key => $row) {
  $code = $row['id'];  $username = $row['username'];
  $type = $row['media_type'];
  $link = $row['permalink'];
  $thum = ($type === 'VIDEO') ? $row['thumbnail_url'] : $row['media_url'];
  $text = $row['caption'];
  array_push($image_array, array('username'=>$username, 'link'=>$link, 'thum'=>$thum, 'text'=>$text));
}

echo json_encode($image_array);
?>