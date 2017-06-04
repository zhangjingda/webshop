
<?php



header("Content-type: text/html; charset=utf-8"); 
class BroadcastAction extends Action{


   private function changeFileName($filename){
               $newfileName = "";

               $lastindex = strripos($filename,".");

               $suffix  = substr($filename,$lastindex);

               $str= "1a2b3c4d5e67890fghijklmnopqrstuvwxyz";
               $randomstr = "";
               $len = strlen($str);

               for($i=0;$i<18;$i++){
                  $ran = rand(0,$len-2);
                  $randomstr.=substr($str,$ran,1);
               }

               $newfileName = $randomstr.$suffix;
               return $newfileName;
   }


	public function broadcast(){
		$broadcast = M("broadcast");
		$result = $broadcast ->select();
		$this->assign( "result" , $result );
		$this->display();
	}

	public function getDataId1(){

         $dataid = $this->_post("dataid");
         $phone = D("phone");
         $num = $phone->where("phoneid = '$dataid'")->count();
         if($num>0)echo $dataid;
         else echo "dataid error";


	}
	public function getDataId2(){

         $proname = $this->_post("proname");
         $color = $this->_post("color");
         $neicun = $this->_post("neicun");
         $cunchu = $this->_post("cunchu");

         $phone = D("phone");

         $num = $phone->where("proname = '$proname' and color ='$color'")
         ->where("neicun = '$neicun' and cunchu = '$cunchu'")->field("phoneid")->select();

         echo json_encode($num);

         
	}


	public function imgUpload(){

		if (($_FILES["file"]["type"] == "image/gif")
               || ($_FILES["file"]["type"] == "image/jpeg") ){

                    if($_FILES["file"]["error"] > 0){
                      echo "Error: " . $_FILES["file"]["error"] . "<br />";
                    }else{

                         $changname = $this->changeFileName($_FILES["file"]["name"]);

                         if (file_exists(C('FIlE_PATH')."broadcast/" . $changname)){
                              echo $changname . " already exists. ";
                         }else{
                             move_uploaded_file($_FILES["file"]["tmp_name"],
                                  C('FIlE_PATH')."/broadcast/" . $changname); 
                                  echo "success store in ".
                                  C('FIlE_PATH')."/broadcast/" . $changname; 
                         }
                    }

          }else{
                 echo "文件格式或者大小不对(*.jpeg || *.gif && max-size<20000B)";
          }

	}


	public function imgDel(){

		$phoneid = $this->_get("phoneid");
		$broadcast  = M("broadcast");
		$result = $broadcast->where("phoneid='$phoneid'")->delete();
		if($result)
		echo $result;
	    else echo "0";
	}


	public function  postData(){

		  $phoneid = $this->_get('phoneid');
		  $myimg =  $this->_get('myimg');
		  if(!isset($phoneid) || $phoneid=="" || !isset($myimg) || $myimg==""){
		  	   echo "error! can't not be empty.";return;
		  }
          
           $phone  = D("Phone");
           $result = $phone->where("phoneid='$phoneid'")->count();
           if($result>0){
           	  $broadcast  = M("broadcast");
           	  $hh = $broadcast->where("phoneid='$phoneid'")->count();
           	  if($hh==0){
           	  	 $data['phoneid'] = $phoneid;
	           	  $data['img'] = $myimg;
	           	  $res = $broadcast->data($data)->add();
	           	  if($res){
	           	  	echo "success";
	           	  }
	           	  else{
	           	  	 echo "error";
	           	  }
           	  }else{
           	  	echo "id重复了，请检查";
           	  }
           	 

           }else{
           	 echo "产品id出错";
           }

	}









}
?>