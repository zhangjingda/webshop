<?php

header("Content-type: text/html; charset=utf-8"); 

class OrderAction extends Action {

   public static $allpage = -1;

   public function order(){

   	  $orders = M("orders");
   	  $phone = M("phone");

      $num = $orders->where("tip=0")->count();
      $pernum = 3;
      if($num==0)$this->assign("allpage",0);
      else $this->assign("allpage",ceil($num/$pernum));

      // if(self::$allpage==-1)
      self::$allpage = ceil($num/$pernum);

      $page = $this->_get("page");
      if(!isset($page) || !$page || $page<1){
          $page = 1;
      }


      $sql = "select orders.id,orders.phoneid,orders.addr,orders.content,orders.num ,".
       " orders.username,orders.time,phone.color,".
       " phone.proname,phone.neicun,phone.cunchu from orders,phone ".
       " where orders.phoneid = phone.phoneid and tip=0 limit ".($page-1)*$pernum.",".$pernum;
       $result = $orders->query($sql);
      
    
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
      $this->assign("result",$result);
      $this->display();

          
   }


   public function hasOrder(){

      $orders = M("orders");
   	  $phone = M("phone");
   	  
      $num = $orders->where("tip=1")->count();
      $pernum = 5;
      if($num==0)$this->assign("allpage",0);
      else $this->assign("allpage",ceil($num/$pernum));

      // if(self::$allpage==-1)
      self::$allpage = ceil($num/$pernum);

      $page = $this->_get("page");
      if(!isset($page) || !$page || $page<1){
          $page = 1;
      }


      $sql = "select orders.id,orders.phoneid,orders.addr,orders.content,orders.num ,".
       " orders.username,orders.time,phone.color,".
       " phone.proname,phone.neicun,phone.cunchu from orders,phone ".
       " where orders.phoneid = phone.phoneid and tip=1 limit ".($page-1)*$pernum.",".$pernum;
       $result = $orders->query($sql);
      
    
      $pagestr = "";
      if(self::$allpage<=0){
          $pagestr = "<div id='pagebox'>没有匹配的搜索结果,请换过不同的词试一下!</div>";
      }else if(self::$allpage == 1){
        $pagestr = "<div id='pagebox'><button class='page' disabled='disabled'>1</button></div>";
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


        if($page<=8){
             $max_page = self::$allpage>=8?8:self::$allpage;
             for($i=1;$i<=$max_page;$i++){
                if($i==$page){$pagestr=$pagestr.$nowpagestr;continue;}
                $pagestr.=$normalpage1.$i.$normalpage2;
             }
             
        }else if(self::$allpage>8){
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


   public function tip(){

   	  $orders = M("orders");
   	  $id = (int)$this->_get("id");
   	  $sql = "update orders set tip = tip+1 where id='$id'";
   	  $result = $orders->query($sql);
   	  echo "success";
   	  

   }

   private function my_print($arr){
        echo "<pre>";
   	    print_r($arr)."\n";
   }

   public function test(){
        // echo date("Y-m-d h:i:s",time()); 
        $orders = M("orders");
   	    $phone = M("phone");

   	    $sql = 
   "select phone.proname,phone.price,orders.num from ".
  " phone,orders where phone.phoneid = orders.phoneid";
   	    $result = $orders->query($sql);

   	    $arr = $result;
   	    $temp = array();
   	
   	    foreach ($arr as $key => $value) {
            
            for ($i=0;$i<count($temp);$i++) {
            	if(in_array($value['proname'],$temp[$i])){
                       break;
            	}
            }

            if($i==count($temp)){
            	array_push($temp,$value);
            }else{
               $temp[$i]['num']= $temp[$i]['num']+$arr[$key]['num'];
            }

   	    
   	    }
  
   	    $this->assign("result",$temp);
   	    $this->display();

   }

   public function count(){

      //商标相关
   	  $brand  = $this->_get("brand");

   	  if(!isset($brand) || $brand==""){
   	  	 $brand = "";
   	  }else{
   	  	$this->assign("brand",$brand);
   	  }
      //时间相关
   	  $fromtime = $this->_get("fromtime");
   	  $totime = $this->_get("totime");
   	  if($fromtime =="" || !isset($fromtime)){
          $fromtime ="2016-01-01 00:00:00";
   	  }else{
   	  	 $fromtime.="-01 00:00:00";
   	  }

   	  $this->assign("fromtime",$fromtime);

  
   	  
   	  if($totime=="" || !isset($totime)){
   	  	  $totime = date("Y-m-d h:i:s",time()+3600*24); 
   	  	  $this->assign("totime",date("Y-m-d h:i:s",time()));
   	  }else{

   	  	  $t = (int)substr($totime,5,2);
   	  	  if($t==1 || $t==3 || $t==5 || $t==7 ||$t==8 || $t==10 || $t==12){
   	  	  	$totime.= "-31 23:59:59";
   	  	  }else if($t==4 || $t==6 || $t==9 ||$t==11){
   	  	  	$totime.= "-30 23:59:59";
   	  	  }else {
            $totime.= "-29 23:59:59";
   	  	  }
   	  	    $this->assign("totime",$totime);
   	  	  
   	  }
     

   	 

   	  $orders = M("orders");
   	  $phone = M("phone");


      $sql = "select phone.proname,phone.price,orders.num from ".
             " phone,orders where phone.phoneid = orders.phoneid and phone.brand ".
             " like '%".$brand."%' and time between '$fromtime' and '$totime' and tip=1";

   	  $result = $orders->query($sql);

   	  $arr = $result;
   	  $temp = array();
   
   	  foreach ($arr as $key => $value) {
            
            for ($i=0;$i<count($temp);$i++) {
            	if(in_array($value['proname'],$temp[$i])){
                       break;
            	}
            }

            if($i==count($temp)){
            	array_push($temp,$value);
            }else{
               $temp[$i]['num']= $temp[$i]['num']+$arr[$key]['num'];
            }

   	    
   	   }

   	  $result = $temp;

      $this->assign("result",$result);
      $this->display();
   }

 


}

?>