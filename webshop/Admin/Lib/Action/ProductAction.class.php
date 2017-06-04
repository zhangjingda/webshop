

<?php 
/**
 * @Author: zhang
 * @Date:   2017-04-12 21:36:49
 * @Last Modified by:   zhang
 * @Last Modified time: 2017-04-24 21:29:32
 */

header("Content-type: text/html; charset=utf-8"); 

class ProductAction extends Action {
public static $allpage = -1;

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

public function product(){
     $len = 10;
     $ss = random($len);
     $this->assign("name1",$ss);

     
      $phone = D("phone");
      $searchVal = $this->_get("searchval");
      if(isset($searchVal) && $searchVal!=""){
        $num = $phone->where("proname like '%".$searchVal."%' or ".
               " protitle like '%".$searchVal."%' or provtitle like '%".$searchVal."%'")->count(); 
        self::$allpage=-1;
      }else{
         $num = $phone->count();
         self::$allpage=-1;
      }
      $pernum = 3;
      if($num==0)$this->assign("allpage",0);
      else $this->assign("allpage",ceil($num/$pernum));

      // if(self::$allpage==-1)
      self::$allpage = ceil($num/$pernum);

      $page = $this->_get("page");
      if(!isset($page) || !$page || $page<1){
          $page = 1;
      }
      
      if(isset($searchVal) && $searchVal!=""){
        $result = $phone->where("proname like '%".$searchVal."%' or ".
               " protitle like '%".$searchVal."%' or provtitle like '%".$searchVal."%'")
        ->limit(($page-1)*$pernum,$pernum)
        ->select();
      }else{
          $result = $phone->limit(($page-1)*$pernum,$pernum)
         ->select();
      }


      $pagestr = "";
      if(self::$allpage<=0){
          $pagestr = "<div id='pagebox'>没有匹配的搜索结果,请换过不同的词试一下!</div>";
      }else if(self::$allpage == 1){
        $pagestr = "";
      }else{
         
        $pageboxbegin = "<div id='pagebox'><span>共".self::$allpage."页,第{$page}页</span>";
        $pageboxend = "</div>";

        $prevenable = "<button class='page1'>上一页</button>";
        $prevdisabled = "<button class='page1' disabled='disabled'>上一页</button>";

        $nextenable = "<button class='page1'>下一页</button>";
        $nextdisabled = "<button class='page1' disabled='disabled'>下一页</button>";

        $nowpagestr = "<button class='page' disabled='disabled'>".$page."</button>";

        $normalpage1 = "<button class='page'>";
        $normalpage11 = "<button class='page' disabled='disabled'>";
        $normalpage2 = "</button>";

        $ellipsis = "<span class='page2'>...</span>";

        $pagestr = $pageboxbegin;

        if($page!=1)$pagestr.=$prevenable;
        else $pagestr.=$prevdisabled;


        if($page<=6){
             $max_page = self::$allpage>=6?6:self::$allpage;
             for($i=1;$i<=$max_page;$i++){
                if($i==$page){$pagestr=$pagestr.$nowpagestr;continue;}
                $pagestr.=$normalpage1.$i.$normalpage2;
             }
             
        }else if(self::$allpage>6){
            $pagestr.= "<button class='page'>1</button><button class='page'>2</button><button class='page'>3</button>";
            $pagestr.= $ellipsis;

           if(self::$allpage-$page>=2){
              $pagestr.=$normalpage1.($page-1).$normalpage2;
              $pagestr.=$normalpage11.$page.$normalpage2;
              $pagestr.=$normalpage1.($page+1).$normalpage2;
              $pagestr.= $ellipsis;
              $pagestr.=$normalpage1.self::$allpage.$normalpage2;
           }else{
               if($page==self::$allpage-1){
                  $pagestr.=$normalpage11.(self::$allpage-1).$normalpage2;
                  $pagestr.=$normalpage1.self::$allpage.$normalpage2;
               }else if($page==self::$allpage){
                  $pagestr.=$normalpage1.(self::$allpage-1).$normalpage2; 
                  $pagestr.=$normalpage11.self::$allpage.$normalpage2;
               }

           }      
          
        }

        if($page==self::$allpage)$pagestr.=$nextdisabled;
        else $pagestr.=$nextenable;     
        $pagestr.=$pageboxend;

      } 

      $this->assign("pagestr",$pagestr) ;
      $this->assign("page",$page);
      $this->assign("allpage",self::$allpage);
      $this->assign("result",$result);

      $this->display();
}


public function changeProduce(){

  $data['id'] = $this->_get("id");
  $data['phoneid'] = $this->_get("phoneid");
  $data['proname'] = $this->_get("proname");
  $data['protitle'] = $this->_get("protitle");
  $data['color'] = $this->_get("color");
  $data['neicun'] = $this->_get("neicun");
  $data['cunchu'] = $this->_get("cunchu");
  $data['size'] = $this->_get("size");
  $data['dianchi'] = $this->_get("dianchi");
  $data['tedian'] = $this->_get("tedian");
  $data['price'] = $this->_get("price");

  $phone = M("phone");
  $res = $phone->where("id=".$data['id'])->data($data)->save();
  if($res)echo "success";
  else echo "fail or no change";

  // echo json_encode($data);

}

public function getPhoneid(){

    $phoneid = D("phoneid");
    $len = 10;
    $temp = false;
    $ss = "";
    while(!$temp){
        $ss = random($len);
        $num = $phoneid->where("name='$ss'")->count();
        if($num=='0'){
            $data['name'] =$ss;
            $phoneid->data($data)->add();
            $temp = true;  
        }
    }
    if($temp) echo $ss;
    else echo "error";

}

public function fileUpload(){
              if (($_FILES["file"]["type"] == "image/gif")
               || ($_FILES["file"]["type"] == "image/jpeg")){

                    if($_FILES["file"]["error"] > 0){
                      echo "Error: " . $_FILES["file"]["error"] . "<br />";
                    }else{

                         $changname = $this->changeFileName($_FILES["file"]["name"]);

                         if (file_exists(C('FIlE_PATH')."/upload/" . $changname)){
                              echo $_FILES["file"]["name"] . " already exists. ";
                         }else{
                             move_uploaded_file($_FILES["file"]["tmp_name"],
                                  C('FIlE_PATH')."/upload/" . $changname); 
                                  echo "success store in ".
                                  C('FIlE_PATH')."/upload/" . $changname; 
                         }
                    }

              }else{
                 echo "文件格式不对(*.jpeg , *.gif)";
              }
}
public function fileUpload1(){


    if (($_FILES["file1"]["type"] == "image/gif")|| ($_FILES["file1"]["type"] == "image/jpeg")){

                    if($_FILES["file1"]["error"] > 0){
                      echo "Error: " . $_FILES["file1"]["error"] . "<br />";
                    }else{

                         $changname = $this->changeFileName($_FILES["file1"]["name"]);

                         if (file_exists(C('FIlE_PATH')."/upload1/" . $changname)){
                              echo $_FILES["file1"]["name"] . " already exists. ";
                         }else{
                             move_uploaded_file($_FILES["file1"]["tmp_name"],
                                  C('FIlE_PATH')."/upload1/" . $changname); 
                                  echo "success store in ".
                                  C('FIlE_PATH')."/upload1/" . $changname; 
                         }
                    }

    }else{
        echo "文件格式不对(*.jpeg , *.gif)";
    }
}

public function productMes(){

     $phone  = D("phone");
     $phoneid = D("phoneid");
     $allnum = D("allnum");

     $data['phoneid']  = $this->_post("phoneid");


     //判断phoneid是否存在,保证唯一性
     $temp = $this->_post("phoneid");
     if( $phoneid->where("name='$temp'")->count()>0){
        echo "error";
        return;
     }
     $data2['name'] = $temp;
     $phoneid->data($data2)->add();


     $data['proname'] =$this->_post("proname");
     $data['protitle'] = $this->_post("protitle");
     $data['provtitle'] = $this->_post("provtitle");
     $data['brand'] = $this->_post("brand");
     $data['neicun'] =$this->_post("neicun");
     $data['cunchu'] = $this->_post("cunchu");
     $data['color'] = $this->_post("color");
     $data['price'] = $this->_post("price");
     $data['size'] = $this->_post("size");
     $data['dianchi'] = $this->_post("dianchi");
     

     $tedian = $this->_post("tedian");
     $data['tedian'] = $tedian;

     $data['imgsrc1'] = $this->_post("imgsrc1");
     $data['imgsrc2'] = $this->_post("imgsrc2");
     $data['imgsrc3'] = $this->_post("imgsrc3");
     $data['imgsrc4'] = $this->_post("imgsrc4");
     $data['imgsrc5'] = $this->_post("imgsrc5");
     $data['imgsrc6'] = $this->_post("imgsrc6");

     $bigimgs =  $this->_post("filebox");
     $bigimgs = substr($bigimgs,0,strlen($bigimgs)-1);
     $arr = explode("@",$bigimgs);
     
     for($i=0;$i<count($arr);$i++){
         $data['bigimg'.($i+1)] = $arr[$i]; 
     }


     //数量表allnum插入
     $num = (int)$this->_post("number");
     $data1['phoneid'] = $temp;
     $data1['num'] = $num;
     $allnum->data($data1)->add();


     $result = $phone->data($data)->add();	
     if($result)
      echo 
    "<script>alert('success');window.location.href='/webshop/admin.php/Product/product';</script>";
}







}
?>