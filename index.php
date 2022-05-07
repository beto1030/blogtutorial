<?php
include_once(__DIR__.'/vendor/autoload.php');
include_once('./sanity/connect.php');
include_once("./templates/top.php"); 
?>



<div class="container mt-4">
                <div class="row">
                    <?php for($i = 0; $i<sizeof($results); $i++){ ?>
                    <a id="card" style="text-decoration: none;"class="col-sm-3"href="./post/index.php?post=<?php echo $results[$i]['slug']['current'];?>">
                        <div class="">
                            <div class="card text-dark">
                                <div class="card-header"><?= strtoupper($results[$i]['categories']["title"]); ?></div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $results[$i]['title'] ?></h5>
                                    <p class="card-text"><?= $results[$i]['summary'] ?></p>
                                    <p class="card-text">
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
                        </div>    
                    </a>
                    <?php } ?>
                </div>
</div>

<?php include_once("./templates/bottom.php"); ?>
