    <?php
    include_once(__DIR__.'/vendor/autoload.php');
    include_once('./sanity/connect.php');
    include_once("./templates/top.php"); 
    ?>
    
                        <div class="container mt-4">
                            <!--
                            <pre>
                             <?php 
                             //for($i = 0; $i<sizeof($results); $i++){
                             //echo "<p>".$results[$i]['categories']["title"]."</p>";
                             //}
                             //print_r($results); 
                             ?>
                            </pre>
                            -->
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

<?php include_once("./templates/bottom.php"); ?>
