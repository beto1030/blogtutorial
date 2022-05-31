<?php

include_once('../vendor/autoload.php');
include_once('../sanity/connect.php');
include_once("../templates/top.php"); 
use Demyanovs\PHPHighlight\Highlighter;


if(isset($_GET['post'])){
    $currentPost =  $_GET['post'];

    $results = $client->fetch(
        '*[slug.current == "'.$currentPost.'"]'
    );

    $arr = array();
    
    
    for($i=0; $i<sizeof($results); $i++){
        array_push($arr,$results[$i]);
    } 

    /* here i format the mainImage */ 
    $image = $arr[0]['mainImage']['asset']['_ref']; 
    $imageArr = explode("-", $image);
    $imageFile = $imageArr[1]."-".$imageArr[2].".".$imageArr[3];


    /* Stiching the text and images in the body */
    $imgFileNamesArray = array();

    for($i = 0; $i < sizeof($arr[0]['body']); $i++){
        if($arr[0]['body'][$i]['_type'] == 'image'){
            $bodyImageUrl = $arr[0]['body'][$i]['asset']['_ref'];
            $bodyImageArr = explode("-", $bodyImageUrl);
            $bodyImageFile = $bodyImageArr[1]."-".$bodyImageArr[2].".".$bodyImageArr[3]."-imgFile";
            array_push($imgFileNamesArray,$bodyImageFile);
    
        }
    }
    
}
?>
    <div class="container mb-5 pb-5">
        <?= "<pre>" ?>
        <?php print_r($arr); ?>
        <?= "</pre>" ?>
        <h1><?php echo $arr[0]['title']; ?></h1>
        
        <?php if($arr[0]['mainImage'] != null){?>
            <img src="https://cdn.sanity.io/images/oongt7y8/production/<?= $imageFile;  ?>" class="mt-1 w-100" alt="image here">
        <?php } ?>

        <?php 
            for($i=0; $i<sizeof($arr[0]['body']); $i++){
        ?>

              <?php 
                //if body has an image do this:
                if(strpos($imgFileNamesArray[$i], "imgFile") !== false){ 
              ?>
                <img src="https://cdn.sanity.io/images/oongt7y8/production/<?php echo str_replace('-imgFile', '', $imgFileNamesArray[$i]) ; ?>" class="w-100 border border-1 border-dark" alt="image here">
            <?php }
                //if body has a blank line do this:
                if($arr[0]['body'][$i]['children'][0]['text'] == ""){
                    echo "<br>";
                }
                //if body has unordered list do this:
                if($arr[0]['body'][$i]['listItem'] == "bullet"){
                ?>
                    <ul>
                         <li><?php echo $arr[0]['body'][$i]['children'][0]['text']; ?></li>
                    </ul>
                    
             <?php } 
                if($arr[0]['body'][$i]['_type'] == "code"){
                    $code = '<pre data-file="" data-lang="php">'.$arr[0]['body'][$i]['code']."</pre>";
   
                    $highlighter = new Highlighter($code, 'railscasts');
                    // Configuration
                    $highlighter->setShowLineNumbers(true);
                    $highlighter->setShowActionPanel(true);

                    echo $highlighter->parse();
             ?>        
             <?php
                }
                //else its just text do this:
                if($arr[0]['body'][$i]['children'][0]['text']){
                 echo "<".$arr[0]['body'][$i]['style'].">";
                    if($arr[0]['body'][$i]['children'][0]['marks'][0] == 'strong'){
                        echo "<b>".$arr[0]['body'][$i]['children'][0]['text']."</b>";
                    } else {
                        echo $arr[0]['body'][$i]['children'][0]['text'];
                    }  
                 echo "</".$arr[0]['body'][$i]['style'].">"; 
            } ?>

        <?php } ?> 

<?php include_once("../templates/bottom.php"); ?>
