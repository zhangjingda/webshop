<?php
   header("Content-type: text/html; charset=utf-8"); 
   class ShopCartAction extends Action{
       public static $allpage = -1;

   	   public function money(){

   	   	   $phoneid = $this->_get("phoneid");
           $num = $this->_get("num");
           // $allmoney = $this->_get("allmoney");


   	   	   $username = $_SESSION['username'];
   	   	   $addr = D("addr");
   	   	   if($addr->where("username='$username'")->count()>0)
              $result = $addr->where("username='$username'")->field("addr")->select();
           else $result = array();
           $this->assign("phoneid",$phoneid);
           $this->assign("address",$result);
           $this->assign("num",$num);
           $this->assign("allmoney",$allmoney);
           $this->display();
   	   }
       public function money2(){
           
           $phoneid = $this->_get("phoneid");
           $num = $this->_get("num");
           $address = $this->_get("address");
           $a_phoneid = explode("_",$phoneid);
           $a_num  = explode("_",$num);
           
           $phone  = D("phone");
           $result = array();
           for($i=0;$i<count($a_phoneid);$i++){
               $result[$i]=$phone->where("phoneid='$a_phoneid[$i]'")->select(); 
           }

           $this->assign("result" ,$result);
           $this->assign("num" ,$a_num);
           $this->assign("address",$address);

           $this->display();
           
       }

       public function buySuccess(){
           
            $username = $_SESSION['username'];

            if(!isset($username) || $username==""){
                echo "fail";
                die();
            }

           $phoneid = $this->_post("phoneid");
           $arr = explode("@",$phoneid);

           $num = $this->_post("num");
           $arr1 = explode("@",$num);

           $addr = $this->_post("addr");
           $content = $this->_post("content");


           $buy  = D("buy");
           $shopcart = D("shopcart");
           $orders = D("orders");
           $allnum = D("allnum");

           for($i=0;$i<count($arr);$i++){

              $data['username'] = $username;
              $data['phoneid'] = $arr[$i];

              $result = $buy->data($data)->add(); 
              $shopcart->where("username='$username' and phoneid='".$arr[$i]."'")->delete();


              $data1['username'] = $username;;
              $data1['phoneid'] = $arr[$i];
              $data1['num'] = (int)$arr1[$i];
              $data1['addr'] = $addr;
              $data1['content'] = $content;

              $re = $orders->data($data1)->add();//订单表更新





              $abc=  $allnum->query("update allnum set num=num-".$data1['num']." where ".
               " phoneid='$arr[$i]'");


        
           }

           if($result && $re){
              echo "success";
           }
           else
            echo "fail";
       }


       public function shopcart(){

           $username = $_SESSION['username'];
           $shopcart  = M("shopcart");
           $comment = D("comment");

           $key= $this->_get("key");
           

           $sql = 
           "select phone.phoneid,phone.proname,phone.protitle,".
           " phone.provtitle,phone.neicun,phone.cunchu,phone.color,phone.price,phone.imgsrc1". 
           " from phone,shopcart ".
           " where phone.phoneid = shopcart.phoneid ".
           " and username='$username'";
           $result = $shopcart->query($sql);




      $buy = D("buy");
      $page = $this->_get("page");
      if(!isset($page) || !$page || $page<1){
          $page = 1;
      }
      $pernum = 5;
      $sql = "select buy.id,buy.time,phone.proname,phone.color,phone.neicun,phone.cunchu, ".
             "phone.imgsrc1 ,phone.phoneid from phone,buy where buy.username='$username' ".
           " and phone.phoneid = buy.phoneid order by time desc limit ".($page-1)*$pernum.",".$pernum;
      $buydata = $buy->query($sql);
      $num = $buy->count();   
      if($num==0)$this->assign("allpage",0);
      else $this->assign("allpage",ceil($num/$pernum));
      self::$allpage = ceil($num/$pernum);

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











           // print_r($buydata);

           $store = D("store");
           $mysql1  = "select phone.proname,phone.color,phone.neicun,phone.cunchu,store.time, ".
                     "phone.imgsrc1 ,phone.phoneid from phone,store 
                     where store.username='$username' ".
                     " and phone.phoneid = store.phoneid";
           $storedata = $store->query($mysql1);





       	   $this->assign("item" ,$result); 
           $this->assign("buydata" ,$buydata); 
           $this->assign("storedata" ,$storedata); 
       	   $this->display();



       }

       public function saveUserShopCart(){
           
           $username = $this->_post("username","",$_SESSION['username']);
           $phoneid = $this->_post("phoneid");
           
           if(!isset($_SESSION['username']) || $_SESSION['username']==""){
           	  echo "请先登录";return;
           }else{
           	  $shopcart  = D("shopcart");
           	  $data['username'] = $username;
           	  $data['phoneid'] = $phoneid; 
           	  $num = $shopcart->where("username='$username' and phoneid = '$phoneid'")->count();
           	  if($num>0){
           	  	echo "该商品已经在购物车，不用重新加入";
           	  	return;
           	  }
           	  $result = $shopcart->data($data)->add();
           	  if($result)echo "成功加入到了购物车";
           	  else
           	  	echo "出现错误";
           }


       }


       public function delShopCart(){

       	   $phoneid = $this->_get("phoneid");
       	   $shopcart  = M("shopcart");
       	   $username = $_SESSION['username'];
       	   $res = $shopcart->where("phoneid = '$phoneid'and username='$username'")->delete();
       	   if($res)echo "success";
       	   else echo "fail";
       }


       public function storeProduct(){

       	   $phoneid = $this->_get("phoneid");
       	   $username = $_SESSION['username'];
       	   $store = D("store");
       	   if(!isset($username) || $username==""){
           	  echo "请先登录";return;
           }else{
               $data['username'] = $username;
           	   $data['phoneid'] = $phoneid; 
           	   $num = $store->where("username='$username' and phoneid = '$phoneid'")->count();
           	   if($num>0){
           	  	  echo "你已经收藏了该商品，不用重新收藏";
           	  	   return;
           	   }
           	   $result = $store->data($data)->add();
           	   if($result)echo "成功收藏";
           	   else echo "出现错误";

           }


       }


       public function storeAddr(){
           $username = $_SESSION['username'];
           $myaddr = $this->_get("addr");

           if(!isset($username) || $username==""){
           	    echo "请先登录";return;
           }else{
           	  if(!isset($myaddr) || $myaddr==""){
           	  	 echo "最终地址为空或出错，请检查";return;
           	  }
           	  else{
                  $addr = D("addr");
                  $num = $addr->where("username='$username' and addr='$myaddr'")->count();
                  if($num>0){
                  	  echo "地址已经存在，请重新输入不同地址";
                  	  return;
                  }
                  $data['username'] = $username;
                  $data['addr'] = $myaddr;
                  $addr->data($data)->add();
                  echo "success";
           	  }
           }


       }


       public function delAddr(){

       	    $username = $_SESSION['username'];
       	    $addr = $this->_get("addr");

       	    $data['username'] = $username;
       	    $data['addr'] = $addr;

            $addr = D("addr");
            $addr->where($data)->delete();


       }

       public function delBuy(){

              $phoneid = $this->_get("phoneid");
              $username = $_SESSION['username'];

              $buy  = D("buy");
              $res = $buy->where("phoneid='$phoneid' and username='$username'")->delete();

              if($res) echo "success";
              else echo "fail";
       }

      public function delStore(){

              $phoneid = $this->_get("phoneid");
              $username = $_SESSION['username'];

              $store = D("store");
              $res = $store->where("phoneid='$phoneid' and username='$username'")->delete();

              if($res) echo "success";
              else echo "fail";
       }


       public function saveComement(){

           $phoneid =  $this->_get("phoneid");
           $username = $_SESSION['username'];
           $phone  = D("phone");
           $result = $phone->where("phoneid='$phoneid'")->select();

           $data['username'] = $username;
           $data['phoneid'] = $phoneid;
           $data['proname'] = $result[0]["proname"];
           $data['content'] = $this->_get("comment");
           $data['star'] = $this->_get("star");
           $data['img'] = $this->_get("img");
           $data['buyid'] = $this->_get("buyid");
           $data['color'] = $result[0]['color'];
           $data['neicun'] = $result[0]['neicun'];
           $data['cunchu'] = $result[0]['cunchu'];

           $comment = D("comment");
           $res = $comment->data($data)->add();
           if($res)echo "success";
           else echo "error";

       }


       public function getComment(){

           $buyid_array = $this->_post("buyid");
           $temp_arr = explode("@",$buyid_array);
           $comment = D("comment");
           $username = $_SESSION['username'];
           $arr = array();
           for($i=0;$i<count($temp_arr);$i++){
             $temp = $comment->where("username='$username' and buyid ='".$temp_arr[$i]."'")
             ->field("phoneid,content,time,star")->order("time")->select();
             $temp = $temp[0];
             $arr[$i] = $temp;
           }
           echo json_encode($arr);
       }







}
?>