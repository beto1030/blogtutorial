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
    //===============================================================

    $mainImg = $arr[0]['mainImage']['asset']['_ref']; 
    $mainImgArr = explode("-", $mainImg);
    $mainImgFile = $mainImgArr[1]."-".$mainImgArr[2].".".$mainImgArr[3];


    /* Stiching the text and images in the body */
    $imgFileNamesArray = array();

    for($i = 0; $i < sizeof($arr[0]['body']); $i++){
        if($arr[0]['body'][$i]['_type'] == 'image'){
            $bodyImageUrl = $arr[0]['body'][$i]['asset']['_ref'];
            $imageArrFormating = explode("-", $bodyImageUrl);
            $imageFile = $imageArrFormatting[1]."-".$imageArrFormatting[2].".".$imageArrFormatting[3]."-imgFile";
            array_push($imgFileNamesArray,$imageFile);
    
        }
    }
    
    
}
?>
    <div class="container mb-5 pb-5">
        <?php
            //for($i = 0; $i < sizeof($arr[0]['body']); $i++){
            //    echo $i." has";
            //    echo "<br>";
            //    for($j = 0; $j < sizeof($arr[0]['body'][$i]['children']); $j++ ){
            //        echo $j." children";
            //        echo "<br>";
            //        if( $arr[0]['body'][$i]['children'][$j]['_type'] == 'span'){
            //            $arr[0]['body'][$i]['children'][$j]['_type'] = 'p';
            //        }
            //    }
            //}
            //echo "element 26 has ".sizeof($arr[0]['body'][26]['children']);
        ?>
        <?= "<pre>" ?>
        <?php //print_r($arr[0]['body']); ?>
        <?= "</pre>" ?>
        <h1><?php echo $arr[0]['title']; ?></h1>
        
        <?php if($arr[0]['mainImage'] !== null){?>
            <img src="https://cdn.sanity.io/images/oongt7y8/production/<?= $mainImgFile;  ?>" class="mt-1 w-100" alt="image here">
        <?php } ?>

        <?php 
            print_r($bodyImageArr);
            for($i=0; $i<sizeof($arr[0]['body']); $i++){
                //if body has an image do this:
                //if(strpos($imgFileNamesArray[$i], "imgFile") !== false) 
                if($arr[0]['body'][$i]['_type'] == 'image'){ 
                    $imgfile = explode("-", $arr[0]['body'][$i]['asset']['_ref']);
                    $imgfile = $imgfile[1]."-".$imgfile[2].".".$imgfile[3]."-imgFile";
              ?>
                <img src="https://cdn.sanity.io/images/oongt7y8/production/<?php echo str_replace('-imgFile', '', $imgfile); ?>" class="w-100 border border-1 border-dark" alt="image here">
            <?php }
                //if body has a blank line do this:
                //if($arr[0]['body'][$i]['children'][0]['text'] == ""){
                //    echo "<br>";
                //}
            
                //if body has unordered list do this:
                if($arr[0]['body'][$i]['listItem'] == "bullet"){
                    echo "<ul>";
                    while($arr[0]['body'][$i]['listItem'] == true){
                ?>
                    <li><?php echo $arr[0]['body'][$i]['children'][0]['text']; ?></li>
                    
                <?php 
                    $i++;

                    } 
                        echo "</ul>";
                }
                 
                if($arr[0]['body'][$i]['_type'] == "code"){
                    $code = '<pre data-file="" data-lang="php">'.$arr[0]['body'][$i]['code']."</pre>";
   
                    $highlighter = new Highlighter($code, 'railscasts');
                    // Configuration
                    $highlighter->setShowLineNumbers(true);
                    $highlighter->setShowActionPanel(true);

                    echo $highlighter->parse();
                }
                //else its just text do this:
                if($arr[0]['body'][$i]['children'][0]['text'] && $arr[0]['body'][$i]['listItem'] !== "bullet"){
                    if($arr[0]['body'][$i]['style'] == 'normal'){ 
                        echo "<p>";
                                for($j = 0; $j < sizeof($arr[0]['body'][$i]['children']); $j++ ){

                                    if($arr[0]['body'][$i]['children'][$j]['marks'][0] == 'strong'){
                                        echo "<b>".$arr[0]['body'][$i]['children'][$j]['text']."</b>";
                                    } else if($arr[0]['body'][$i]['children'][$j]['marks'][0] == 'code'){
                                        echo "<code>".$arr[0]['body'][$i]['children'][$j]['text']."</code>";
                                    }
                                    else {
                                        echo $arr[0]['body'][$i]['children'][$j]['text'];
                                    }
                                    
                                }
                        echo "</p>"; 
                    }
                    //if($arr[0]['body'][$i]['children'][0]['marks'][0] == 'strong'){ 
                    //    echo "<p><b>p and b tag";
                    //           echo $arr[0]['body'][$i]['children'][0]['text'];
                    //    echo "</b></p>"; 
                    //}
                    if($arr[0]['body'][$i]['style'] == 'h4'){ 
                        echo "<h4>";
                               echo $arr[0]['body'][$i]['children'][0]['text'];
                        echo "</h4>"; 
                    }
                }
            ?>

        <?php } ?> 

<?php include_once("../templates/bottom.php"); ?>
