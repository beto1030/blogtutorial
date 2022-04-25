<?php
include_once("project-id.php");
use Sanity\Client as SanityClient;

$client = new SanityClient([
  'projectId' => $project_id,
  'dataset' => 'production',
  'useCdn' => true,
  'apiVersion' => '2022-02-17',
]);

$results = $client->fetch(
  //'*[_type == "post"]'
    '*[_type == "post"] | order(_createdAt desc)
    {
        _createdAt,
        _id,
        _rev,
        _type,
        _updatedAt,
        author->,
        body,
        categories[0]->,
        mainImage,
        publishedAt,
        slug,
        summary,
        title
    }'
  //'*[_type == "post"] | order(_createdAt desc){categories[0]->}'
  //'*[_type == "post"].categories[0]-> | order(_createdAt desc) {title}'
);
//echo "results varible";
//print_r($results);

//$arr = array();

//for($i=0; $i<sizeof($results); $i++){
    //array_push($arr,$results[$i]);
//}

$cardImage = $results[0]['mainImage']['asset']['_ref']; 
$cardImageArr = explode("-", $cardImage);
$cardImageFile = $cardImageArr[1]."-".$cardImageArr[2].".".$cardImageArr[3];
?>
