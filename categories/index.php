<?php
include_once('../vendor/autoload.php');
include_once('../sanity/connect.php');
include_once("../templates/top.php"); 
?>

<?php 
if(isset($_GET["articles"])){ 
    $articles = $_GET["articles"]; 
?>
     <div class="container mt-4">
        <div class="grid-container">
            <?php 
            for($i = 0; $i<sizeof($results); $i++) { 
                if($results[$i]['categories']['title'] == $articles) {
            ?>
                     <div id="card" class="grid-item">
                            <a class="col-sm-3 text-decoration-none" href="<?= $upFolderPlaceholder."post/index.php?post=".$results[$i]['slug']['current'];?>">
                                    <div class="card h-100 text-dark">

                                           <div class="card-header text-uppercase">
                                                <?= $results[$i]['categories']["title"] ?>
                                           </div>

                                           <div class="card-body d-flex flex-column">
                                               <h5 class="card-title"><?= $results[$i]['title'] ?></h5>
                                               <p class="card-text ellipsis"><?= $results[$i]['summary'] ?></p>
                                           </div>

                                           <div class="card-footer border-0 bg-white pt-0 ms-1 text-uppercase">
                                               <p class="card-text text-muted">
                                                   <?php
                                                   $publishedAt_date = new DateTime($results[$i]["publishedAt"]);
                                                   $updatedAt_date = new DateTime($results[$i]["_updatedAt"]);
                                                   if($publishedAt_date < $updatedAt_date){
                                                       echo "<small>".$updatedAt_date->format('M j, Y')."</small>";
                                                   }else {
                                                       echo "<small>".$publishedAt_date->format('M j, Y')."</small>";
                                                   }
                                                   ?>
                                               </p>
                                           </div><!-- .card-footer -->
                                    
                                    </div><!-- card -->
                            </a><!-- #card -->
                     </div><!-- .grid-item -->
            <?php 
                }//if
            }//for 
            ?>
        </div><!-- .grid-container -->
     </div><!-- .container -->

        
<?php
}
?>

<?php include_once("../templates/bottom.php"); ?>
