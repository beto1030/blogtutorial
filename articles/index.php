    <?php
    include_once('../vendor/autoload.php');
    include_once('../productionData/connect.php');
    include_once("../templates/top.php"); ?>

<?php if(isset($_GET["articles"])){ 
        $articles = $_GET["articles"];
        echo $articles;
?>
        <div class="container">
                        <div class="container m-5 p-5">
                            <pre>
                             <?php 
                             //for($i = 0; $i<sizeof($results); $i++){
                             //echo "<p>".$results[$i]['categories']["title"]."</p>";
                             //}
                             //print_r($results); 
                             ?>
                            </pre>
                        </div>
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
<?php } ?>

<?php include_once("./templates/bottom.php"); ?>
