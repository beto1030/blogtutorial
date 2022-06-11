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
    
    
?>
    <div class="container px-0 mb-5 pb-5">
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
        <?php echo "<pre>"; ?>
        <?php //print_r($arr[0]['body']); ?>
        <?php echo "</pre>"; ?>
        <h1><?php echo $arr[0]['title']; ?></h1>
        
        <?php if($arr[0]['mainImage'] !== null){?>
            <img src="https://cdn.sanity.io/images/oongt7y8/production/<?= $mainImgFile;  ?>"  class="rounded mx-auto d-block img-fluid" style="margin-left: -30px;" alt="image here">
        <?php } ?>

        <?php 
            //print_r($bodyImageArr);
            for($i=0; $i<sizeof($arr[0]['body']); $i++){
                //if body has an image do this:
                //if(strpos($imgFileNamesArray[$i], "imgFile") !== false) 
                if($arr[0]['body'][$i]['_type'] == 'image'){ 
                    $imgfile = explode("-", $arr[0]['body'][$i]['asset']['_ref']);
                    $imgfile = $imgfile[1]."-".$imgfile[2].".".$imgfile[3]."-imgFile";
              ?>
                <img src="https://cdn.sanity.io/images/oongt7y8/production/<?php echo str_replace('-imgFile', '', $imgfile); ?>" class="rounded mx-auto d-block img-fluid mb-3" alt="image here">
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
                    <li>
                        <?php 
                        if($arr[0]['body'][$i]['markDefs'][0]['_type'] == 'link'){
                            echo "<a href=".$arr[0]['body'][$i]['markDefs'][0]['href']." target='_blank'>".$arr[0]['body'][$i]['children'][0]['text']."</a>"; 
                        }else{
                            echo $arr[0]['body'][$i]['children'][0]['text']; 
                        }
                        ?>
                    </li>
                    
                <?php 
                    $i++;

                    } 
                        echo "</ul>";
                }
                 
                //else its just text do this:
                if($arr[0]['body'][$i]['children'][0]['text'] && $arr[0]['body'][$i]['listItem'] !== "bullet"){
                    if($arr[0]['body'][$i]['style'] == 'normal'){ 
                        echo "<p>";
                                for($j = 0; $j < sizeof($arr[0]['body'][$i]['children']); $j++ ){

                                    if($arr[0]['body'][$i]['children'][$j]['marks'][0] == 'strong'){
                                        echo "<b>".$arr[0]['body'][$i]['children'][$j]['text']."</b>";
                                    } else if($arr[0]['body'][$i]['children'][$j]['marks'][0] == 'code'){
                                        echo "<pre><code>".$arr[0]['body'][$i]['children'][$j]['text']."</code></pre>";
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

            <?php //echo "print_r sorted <br>";
                  //print_r($sorted);

                  //echo "<pre>";
                  //echo "sorted <br>";
                  //for($i = 0; $i < sizeof($sorted); $i++){
                  //  echo $sorted[$i]["title"]."<br>";
                  //}
                  //echo "</pre>";
            ?>
        <center>
            <?php //echo $currentPost. " == ". $sorted[0]['slug']['current']; 

                  for($i = 0; $i < sizeof($sorted); $i++){
                    if( $currentPost == $sorted[$i]['slug']['current']){
                        $page = $i;
                        //echo $page;
                    }
                  }


                  if( $currentPost == $sorted[0]['slug']['current']){?>
                    <!--<a href="#" class="previous px-0 left btn disabled">&#8249; Previous Post!!!</a>-->
            <?php }else{ ?>
                    <a href="http://localhost:8887/blogtutorial/post/index.php?post=<?php echo $sorted[$page - 1]['slug']['current']; ?>" class="previous px-0 left">&#8249; Previous Post</a>
                    
            <?php } 
            
             if( $currentPost == $sorted[sizeof($sorted)-1]['slug']['current']){?>
            <!--<a href="http://localhost:8887/blogtutorial/post/index.php?post=<?php //echo $sorted[$page+1]['slug']['current']; ?>" class="next px-0 right btn disabled"><?php //echo $sorted[$page+1]['slug']['current']; ?> &#8250;</a>-->

<?php }else{?>
            <a href="http://localhost:8887/blogtutorial/post/index.php?post=<?php echo $sorted[$page+1]['slug']['current']; ?>" class="next px-0 right">Next Post &#8250;</a>

            <?php }?>
             
        </center>

<?php include_once("../templates/bottom.php"); }?>
