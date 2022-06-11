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
    //'*[_type == "post"] | order(_createdAt desc)
    //{
    //    _createdAt,
    //    _id,
    //    _rev,
    //    _type,
    //    _updatedAt,
    //    author->,
    //    body,
    //    categories[0]->,
    //    mainImage,
    //    publishedAt,
    //    slug,
    //    summary,
    //    title
    //}'
    
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
//for($i = 0; $i < sizeof($results[0]['body']); $i++){
//    if($results[0]['body'][$i]['children'][0]['_type'] == 'span'){
//        $results[0]['body'][$i]['children'][0]['_type'] = 'p';
//    }
//}
echo "<pre>";
//print_r($results);
echo "</pre>";

$results_copy = $results;
array_multisort($results_copy);

echo "<pre>";
//echo "array_multisort<br>";
//print_r($results_copy);
echo "</pre>";


function val_sort($array, $key){
    foreach($array as $k=>$v){
        $b[] = strtolower($v[$key]);
    }

    //print_r($b);

    asort($b);

    //echo "<br />";
    //print_r($b); 

    foreach($b as $k=>$v){
        $c[] = $array[$k];
    }
     
    return $c;
}

$sorted = val_sort($results_copy, 'title');

echo "<pre>";
//echo "sorted array<br>";
//print_r($sorted);
echo "</pre>";

//$arr = array();

//for($i=0; $i<sizeof($results); $i++){
    //array_push($arr,$results[$i]);
//}

$cardImage = $results[0]['mainImage']['asset']['_ref']; 
$cardImageArr = explode("-", $cardImage);
$cardImageFile = $cardImageArr[1]."-".$cardImageArr[2].".".$cardImageArr[3];
?>
