    <?php
    include_once(__DIR__.'/vendor/autoload.php');
    include_once('./productionData/connect.php');
    include_once("./templates/top.php"); 
    $results = $client->fetch(
      //'*[_type == "post"]'
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

<?php include_once("./templates/bottom.php"); ?>
