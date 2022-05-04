    <div class="container" style="padding-top: 3.5rem">

        <div class="d-flex dropdown-hover-all">
                <div class="dropdown mt-3">

                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton222" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <?php echo isset($_GET["articles"])? $_GET["articles"]: "*"; ?>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton222">
                                <a class="dropdown-item" href="<?= $upFolderPlaceholder. "index.php" ?>">*</a>
                                <a class="dropdown-item" href="<?= $upFolderPlaceholder. "categories/index.php?articles=html" ?>">HTML</a>
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

                                <a class="dropdown-item" href="<?= $upFolderPlaceholder. "categories/index.php?articles=css" ?>"
>CSS</a>
                                <a class="dropdown-item" href="<?= $upFolderPlaceholder. "categories/index.php?articles=javascript" ?>">JAVASCRIPT</a>
                                <a class="dropdown-item" href="<?= $upFolderPlaceholder. "categories/index.php?articles=php" ?>">PHP</a>
                                <a class="dropdown-item" href="<?= $upFolderPlaceholder. "categories/index.php?articles=sql" ?>">SQL</a>
                                <a class="dropdown-item" href="<?= $upFolderPlaceholder. "categories/index.php?articles=sanity" ?>">SANITY</a>

                        </div><!-- .dropdown-menu -->
                </div><!-- .dropdown.mt-3-->
        </div><!-- .d-flex.dropdown-hover-all -->

    </div><!-- .container -->
