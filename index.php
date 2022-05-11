<?php
include_once(__DIR__.'/vendor/autoload.php');
include_once('./sanity/connect.php');
include_once("./templates/top.php"); 
?>




<div class="container mt-4" style="">
                <div class="grid-container">
                  <?php for($i = 0; $i<sizeof($results); $i++){ ?>
                            <div class="grid-item" style="height: 90%;">
                                <a id="card" style="text-decoration: none;"class="col-sm-3" href="<?= $upFolderPlaceholder."post/index.php?post=".$results[$i]['slug']['current'];?>">
                                    <div class="card h-100 text-dark">
                                           <div class="card-header" style="padding-left: 20px;"><?= strtoupper($results[$i]['categories']["title"]); ?></div>
                                           <div class="card-body d-flex flex-column" style="padding: 0px 20px 0px;">
                                               <h5 class="card-title"><?= $results[$i]['title'] ?></h5>
                                               <p class="card-text ellipsis"><?= $results[$i]['summary'] ?></p>
                                           </div>
                                           <div class="card-footer" style="border: none; background-color: #fff; margin-left: 5px; padding-top: 0;">
                                               <p class="card-text text-muted" style="">
                                                   <?php
                                                   $publishedAt_date = new DateTime($results[$i]["publishedAt"]);
                                                   $updatedAt_date = new DateTime($results[$i]["_updatedAt"]);
                                                   if($publishedAt_date < $updatedAt_date){
                                                       echo "<small>".strtoupper($updatedAt_date->format('M j, Y'))."</small>";
                                                   }else {
                                                       echo "<small>".strtoupper($publishedAt_date->format('M j, Y'))."</small>";
                                                   }
                                                   ?>
                                               </p>
                                           </div>

                                           
                                    </div>
                                </a>
                            </div>
                  <?php } ?>
                </div>
                
</div>

<?php include_once("./templates/bottom.php"); ?>
