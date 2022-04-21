    <?php
    include_once(__DIR__.'/vendor/autoload.php');
    include_once('./productionData/connect.php');
    include_once("./templates/top.php"); ?>

<<<<<<< HEAD
    <div class="container">
                <pre><?php //print_r($results) ?></pre>
                 
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php for($i = 0; $i<sizeof($results); $i++){ ?>
                       <div class="col">
                           <div class="card">
                                 <img src="https://cdn.sanity.io/images/oongt7y8/production/<?= $cardImageFile  ?>" class="card-img-top" alt="">
                                 <div class="card-body">
                                       <h5 class="card-title"><?= $results[$i]['title'] ?></h5>
                                       <p class="card-text"><small class="text-muted"><?= $formatedDate ?></small></p>
                                       <a href="./post/index.php?post=<?php echo $results[$i]['slug']['current']; ?>" class="btn btn-primary">View Post</a>
                                 </div>
                           </div>
                       </div>
                    
                       <?php $i++; ?>
                    
                       <div class="col">
                           <div class="card">
                                 <img src="https://cdn.sanity.io/images/oongt7y8/production/<?= $cardImageFile  ?>" class="card-img-top" alt="">
                                 <div class="card-body">
                                       <h5 class="card-title"><?= $results[$i]['title'] ?></h5>
                                       <p class="card-text"><small class="text-muted"><?= $formatedDate ?></small></p>
                                       <a href="./post/index.php?post=<?php echo $results[$i]['slug']['current']; ?>" class="btn btn-primary">View Post</a>
                                 </div>
                           </div>
                       </div>
                    <?php } ?>
                </div>

    </div>
=======
        <div class="container">
                    <pre><?php //print_r($results); ?></pre>
                        <div class="row">
                            <?php for($i = 0; $i<sizeof($results); $i++){ ?>
                            <a id="card" style="text-decoration: none;"class="col-sm-3"href="./post/index.php?post=<?php echo $results[$i]['slug']['current'];?>">
                                <div class="">
                                    <div class="card text-dark">
                                        <div class="card-header">HTML</div>
                                        <div class="card-body">
                                        <h5 class="card-title"><?= $results[$i]['title'] ?></h5>
                                            <p class="card-text">Card Text</p>
                                        </div>
                                    </div>
                                </div>    
                            </a>
                            <?php } ?>
                        </div>
        </div>
>>>>>>> email-subscription-feature

<?php include_once("./templates/bottom.php"); ?>
