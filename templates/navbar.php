    <div class="container" style="padding-top: 3.5rem">

        <div class="d-flex dropdown-hover-all">
                <div class="dropdown mt-3">

                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton222" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <?php echo isset($_GET["articles"])? strtoupper($_GET["articles"]): "*"; ?>
                        </button>
                        <?php
                            $duplicate_categories = [];
                            for($i = 0; $i<sizeof($results); $i++){
                                array_push($duplicate_categories, $results[$i]['categories']["title"]);
                            } 
                            //print_r($duplicate_categories);
                            $categories = array_values(array_unique($duplicate_categories));

                            //print_r($categories);
                            for($i = 0; $i<sizeof($categories); $i++){
                                //echo "<p class='m-5 p-5'>".$categories[$i]."</p>";
                            }
                        ?>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton222">
                                <a class="dropdown-item" href="<?= $upFolderPlaceholder. "index.php" ?>">*</a>
                                <?php for($i = 0; $i<sizeof($categories); $i++){ ?>
                                    <a class="dropdown-item" href="<?= $upFolderPlaceholder. "categories/index.php?articles=".$categories[$i]; ?>"><?= strtoupper($categories[$i]); ?></a>
                                <?php } ?>
                                <!--<a class="dropdown-item" href="<?= $upFolderPlaceholder. "categories/index.php?articles=html" ?>">HTML</a>-->
                                <!--
                                <div class="dropdown dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layouts</a>
                                         <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                             <a class="dropdown-item" href="#">Basic</a>
                                             <a class="dropdown-item" href="#">Compact Aside</a>
                                             <div class="dropdown-divider"></div>
                                             <div class="dropdown dropend">
                                                    <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Custom</a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                                             <a class="dropdown-item" href="#">Fullscreen</a>
                                                             <a class="dropdown-item" href="#">Empty</a>
                                                             <div class="dropdown-divider"></div>
                                                             <a class="dropdown-item" href="#">Magic</a>
                                                    </div>
                                             </div>
                                         </div>
                                </div>-->
                                <!--
                                <a class="dropdown-item" href="<?php //$upFolderPlaceholder. "categories/index.php?articles=css" ?>"
>CSS</a>
                                <a class="dropdown-item" href="<?php //$upFolderPlaceholder. "categories/index.php?articles=javascript" ?>">JAVASCRIPT</a>
                                <a class="dropdown-item" href="<?php //$upFolderPlaceholder. "categories/index.php?articles=php" ?>">PHP</a>
                                <a class="dropdown-item" href="<?php //$upFolderPlaceholder. "categories/index.php?articles=sql" ?>">SQL</a>
                                <a class="dropdown-item" href="<?php //$upFolderPlaceholder. "categories/index.php?articles=sanity" ?>">SANITY</a>
                                -->

                        </div><!-- .dropdown-menu -->
                </div><!-- .dropdown.mt-3-->
        </div><!-- .d-flex.dropdown-hover-all -->

    </div><!-- .container -->
