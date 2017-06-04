<?php

  class SearchAction extends Action{



  	 public function search(){

  	 	$key = $this->_get("key");
  	 	$phone  = D("phone");

        $sql = "proname like '%".$key."%' ";
  	 	$result = $phone->where($sql)->select();

  	 	$recommend = D("recommend");

        
      if($username!="" && isset($username))
      $recom = $recommend
     ->query("select recommend.time,phone.phoneid,phone.proname,phone.imgsrc1,".
     " phone.color from phone  ". ",recommend ".
      " where username='$username'".
      " order by recommend.time desc");

     else{
         $recom = $recommend
     ->query("select recommend.time,phone.phoneid,phone.proname,".
      " phone.imgsrc1,phone.color from phone,recommend ".
     "  order by recommend.time desc");
     }


      $this->assign("recommend" , $recom);
  	  $this->assign("result" , $result);
      $this->display();


  	 }





  }

?>