    <?php
        /* change this */
        $ROOT_DIRECTORY = "blogtutorial";
        
        ini_set('error_reporting', E_ALL);  //short version
        
        // PATH SETUP, (making sure it uses https)
        $domain = "http://";     //commenting out next 5 lines didn't work
        if (isset($_SERVER['HTTPS'])) {   //OLD WAY, DIDN'T USE
            if ($_SERVER['HTTPS']) {
                $domain = "https://";
            }
        }
        
        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");
        $domain .= $server;     //concatenate server to domain yielding "http://[your_domain_here]" or "https://[your_domain_here]"
        
        $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
        $path_parts = pathinfo($phpSelf);
        
        
        $split_url = explode('/', $path_parts['dirname']);
        
        $baseLevelIndex = 0;
        for ($i = 0; $i < count($split_url); $i++){     //loop through the URL
            if ($split_url[$i] == $ROOT_DIRECTORY){     //SUPER IMPORTANT ($ROOT_DIRECTORY must match the BASE folder that the site lives inside)
                $baseLevelIndex = $i;
                 break;    //This stops when the 1st occurence of $ROOT_DIRECTORY is found. COMMENT OUT OR REMOVE THIS  break;  if your actual root directory has a parent folder with the exat same name ()
            }
        }
        $folderCountRaw = count($split_url);
    	$folderCount = $folderCountRaw - $baseLevelIndex - 1;
	
        $split_url_adjusted = $split_url;
        for($i = 0; $i< ($folderCountRaw - $folderCount -1); $i++){   //remove the beginning indices of the array (anything before $ROOT_DIRETORY)
            unset($split_url_adjusted[$i]);     //actually remove the element, but the indices will be messed up
        }
        $split_url_adjusted= array_values($split_url_adjusted);
        //print_r($split_url_adjusted);
        
        $containing_folder =  $split_url_adjusted[count($split_url_adjusted) -1] ;

        if($folderCount == 0){ //special case    
            $containing_folder = 'index';
        }

    	$fileName = $path_parts['filename'];		//not used much
        $dirName = $path_parts['dirname'];          //Not used much
	

        $upFolderPlaceholder='';
        for($i=0; $i<$folderCount; $i++){
            $upFolderPlaceholder.='../';
        }

        //end path setup
        // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
?>
