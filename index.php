<?php 
if(file_exists("vendor/sanity/") && file_exists("node_modules/@sanity/")){
    include('./vendor/autoload.php');
    include('./sanity/connect.php');
    include(__DIR__.'/templates/top.php');
    ?>
    
    <div class="container mt-4"> 
                   <pre><?php //print_r($results);?></pre>
                    <div class="grid-container">
                      <?php for($i = 0; $i<sizeof($results); $i++){ ?>
                              <div id="card" class="grid-item">
                                 <a  class="col-sm-3 text-decoration-none" href="<?= $upFolderPlaceholder."post/index.php?post=".$results[$i]['slug']['current'];?>">
                                     <div class="card h-100 text-dark">
    
                                            <div class="card-header text-uppercase"><?= $results[$i]['categories']["title"] ?></div>
    
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $results[$i]['title'] ?></h5>
                                                <p class="card-text ellipsis"><?= $results[$i]['summary'] ?></p>
                                            </div>
    
                                            <div class="card-footer border-0 bg-white pt-0 text-uppercase" >
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
    
                                     </div><!-- .card -->
                                 </a><!-- col-sm-3 -->
                              </div><!-- #card.grid-item -->
                      <?php } ?>
                    </div><!-- .grid-container -->
    </div><!-- .container -->
    
    <?php include_once($upFolderPlaceholder."templates/bottom.php"); 
} else if(!(file_exists("vendor/sanity/") && file_exists("node_modules/@sanity/"))){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Instructions after downloading this git repo</title>
        <style>
            code{
                padding: 1px 2px;
                background-color: lightgrey;
            }
        </style>
    </head>
    <body>
    <ul>
        <?php if(!file_exists("vendor/sanity")){?>
            <div class="alert alert-danger">
                <li>Composer
                <ul>
                    <li>I provided a bash script here named install_composer.sh and to run the script run the command <code>sh install_composer.sh</code> </li>
                    <li>Now use the composer command to install php's library for sanity <code>composer require sanity/sanity-php</code></li>
                </ul>
                </li>
            </div>
        <?php } else if(file_exists("vendor/sanity")){ ?>
            <div class="alert alert-success">
                <li>Composer
                <ul>
                    <li>I provided a bash script here named install_composer.sh and to run the script run the command <code>sh install_composer.sh</code> </li>
                    <li>Now use the composer command to install php's library for sanity <code>composer require sanity/sanity-php</code></li>
                </ul>
                </li>
            </div>
        <?php } ?> 
        <?php if(!file_exists("node_modules/@sanity")){?>
            <div class="alert alert-danger">
                <li>Sanity Client
                <ul>
                    <li>use node to install <code>npm install -g @sanity/cli</code> if you do not have node installed, <a href="https://www.sanity.io/help/a5f6caba-53c9-4a9f-96ef-1bd1ae8f5c10">here</a> is a link to install it </li>
                    <li>Now use the sanity command to initialize a project <code>sanity init -y --project your-project-id-here --dataset production --template blog --output-path .</code></li>
                </ul>
                </li>
            </div>
        <?php } else if(file_exists("node_modules/@sanity")){ ?>
            <div class="alert alert-success">
                <li>Sanity Client
                <ul>
                    <li>use node to install <code>npm install -g @sanity/cli</code> if you do not have node installed, <a href="https://www.sanity.io/help/a5f6caba-53c9-4a9f-96ef-1bd1ae8f5c10">here</a> is a link to install it </li>
                    <li>Now use the sanity command to initialize a project <code>sanity init -y --project your-project-id-here --dataset production --template blog --output-path .</code></li>
                </ul>
                </li>
            </div>
        <?php } ?> 
        <?php if(!file_exists("sanity/project-id.php")){?>
            <div class="alert alert-danger">
                <li>You need to add file project-id.php and just write <code>&lt;?php $project_id = ""; ?&gt;</code> inside of sanity folder</li>
            </div>
        <?php } else if(file_exists("sanity/project-id.php")){ ?>
            <div class="alert alert-success">
                <li>You need to add file project-id.php and just write <code>&lt;?php $project_id = ""; ?&gt;</code> inside of sanity folder</li>
            </div>
        <?php } ?> 
    </ul>
    </body>
    </html>
<?php } ?>
