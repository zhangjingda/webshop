<?php
   function handle(){
   
   }

 function random($len) {
    $srcstr = "1a2s3d4f5g6hj8km9qwe7rtyupz4xcv0bnm";
    $strs = "";
    for ($i = 0; $i <$len ; $i++) {
        $strs .= substr($srcstr,rand(0,$len-1),1);
    }
    return $strs;
}


?>