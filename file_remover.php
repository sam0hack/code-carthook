<?php 

$prefix = '0aH';
$main_dir = "MultiDir";



/**
 * Main Method for Deleting files that has a prefix
 */
function removeFiles($prefix,$dir){

    //Start scanning dirs
    $scanned_dirs = scandir($dir);

    
    unset($scanned_dirs[array_search('.', $scanned_dirs, true)]);
    unset($scanned_dirs[array_search('..', $scanned_dirs, true)]);

    
    if (count($scanned_dirs) < 1) return;

    //Start Loop
    foreach($scanned_dirs as $scanned_dir){
        
        //Check if this is a directroty 
        if(is_dir($dir.'/'.$scanned_dir)){
            
            removeFiles($prefix,$dir.'/'.$scanned_dir);

        }else{

            //Check if file has a prefix
            if(substr($scanned_dir, 0,3) === $prefix){
                //Remove file
                unlink($dir.'/'.$scanned_dir);
            }
            
        }
        
    }

}




/**
 * For creating files and folders to test
 *
 */
function randomString($n=5){

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 

    return $randomString;
}

function createSampleDirs($prefix,$main_dir){
    
    if(!is_dir($main_dir)){
        mkdir($main_dir);
    }

    for($k=0;$k<=10;$k++){
    
        //Start Creating dir
        $randomString = randomString();
        $create_dir = $randomString ;

            mkdir($main_dir."/".$create_dir);
            
            for($i=0;$i<10;$i++){
            $randomString = randomString();
            $file = $randomString;    
            if($i%2!=0){
                $file = $prefix.$randomString;    
            }
            fopen($main_dir."/".$create_dir.'/'.$file.".txt",'w');
            
            }
            $randomString = randomString();
            $create_dir2 = $randomString;
            


            mkdir($main_dir."/".$create_dir.'/'.$create_dir2);

            
            for($i=0;$i<10;$i++){
                $randomString = randomString();
                $file = $randomString;    
                if($i%2!=0){
                    $file = $prefix.$randomString;    
                }
                fopen($main_dir."/".$create_dir.'/'.$create_dir2.'/'.$file.".txt",'w');
                
                }
        
    }
        
    
    echo "Done!";

}








//createSampleDirs($prefix,$main_dir);

removeFiles($prefix,$main_dir)


?>