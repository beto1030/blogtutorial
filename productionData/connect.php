<?php
include_once("./productionData/project-id.php");
use Sanity\Client as SanityClient;

$client = new SanityClient([
  'projectId' => $project_id,
  'dataset' => 'production',
  'useCdn' => true,
  'apiVersion' => '2022-02-17',
]);

$results = $client->fetch(
  '*[_type == "post"]'
);

$arr = array();

for($i=0; $i<sizeof($results); $i++){
    array_push($arr,$results[$i]);
}

$cardImage = $arr[0]['mainImage']['asset']['_ref']; 
$cardImageArr = explode("-", $cardImage);
$cardImageFile = $cardImageArr[1]."-".$cardImageArr[2].".".$cardImageArr[3];
?>
