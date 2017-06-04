<?php

class IndexAction extends Action {
public static $allpage = -1;

public function test(){
    
$user = M("user");

$pernum = 5;

if(self::$allpage==-1)
self::$allpage = ceil($user->count()/$pernum);

$page = $this->_get("page");
if(!isset($page) || !$page || $page<1){
    $page = 1;
}


$result = $user->limit(($page-1)*$pernum,$pernum)->order("id desc")->select();

$pagestr = "";
if(self::$allpage==1){
  $pagestr = "<div id='pagebox'><button class='page' disabled='disabled'>1</button></div>";
}else{
  

  $pageboxbegin = "<div id='pagebox'>";
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
$this->assign("result",$result);
$this->display();

}







    public function index(){

      $username = $_SESSION['username'];
      if(isset($username) && $username!=""){
           $shopcart = M("shopcart");
           $phone = M("phone");
           $sql ="select phone.phoneid,".
           " phone.proname,phone.color,phone.imgsrc1,phone.neicun,phone.cunchu,phone.price ".
           " from phone,shopcart where phone.phoneid = shopcart.phoneid ".
                 " and shopcart.username = '$username'";
           $res = $shopcart->query($sql);
           $this->assign("res",$res);
           $this->assign("account",count($res));
           
      }





      $mylist = D("mylist");

      $sql = 
      "select mylist.id,".
      " phone.phoneid,phone.proname,phone.provtitle,phone.color,phone.price,phone.size,".
      "phone.neicun,phone.cunchu,phone.dianchi,phone.brand from phone ,mylist where ".
      " phone.phoneid = mylist.phoneid order by  mylist.id";

      $listdata = $mylist->query($sql);


      for($i=1;$i<=5;$i++){
          $this->assign("listdata".$i,$listdata);
      }

       $broadcast = D("broadcast");

       $num = $broadcast->count();
       $this->assign("num" ,$num);

       $result = $broadcast->select();
       $this->assign("result" ,$result);

       $menu = D("menu");
       $menu1 = $menu->select();
       $this->assign("menu",$menu1);
       for($i=1;$i<=8;$i++){
          $this->assign("menu".$i,$menu1); 
       }

       $this->display();
	}

	public function showProduct(){
    $phone = D("phone");


		$phoneid = $this->_get("phoneid");
    $username = $_SESSION['username'];

    $recommend  = D("recommend");
    $recNum = $recommend->where("username='$username' and phoneid='$phoneid'")->count();
    
    if($username!="" && isset($username))
    
    $data['username'] =$username;
    $data['phoneid'] = $phoneid;
    $recommend->data($data)->add();
      
    if($username!="" && isset($username))
      $recom = $recommend
     ->query("select recommend.time,phone.phoneid,phone.proname,phone.imgsrc1,".
     " phone.color from phone  ". ",recommend ".
      " where username='$username'".
      " and phone.phoneid = recommend.phoneid order by recommend.time desc");

    else{
         $recom = $recommend
     ->query("select recommend.time,phone.phoneid,phone.proname,".
      " phone.imgsrc1,phone.color from phone ".",recommend where ".
     "   phone.phoneid = recommend.phoneid order by recommend.time desc");
     }


    $this->assign("recommend" , $recom);


		$comment = D("comment");
    $proname = $phone->where("phoneid='$phoneid'")->field("proname")->select();
    $temp =  $proname[0]['proname'];

    $allcomment = $comment->where("proname='$temp'")->count();
    $goodcomment = $comment->where("proname='$temp' and star>=4")->count();
    $mediumcomment = $comment->where("proname='$temp' and star between 2 and 3 ")->count();
    $badcomment = $comment->where("proname='$temp' and star=1 ")->count();

    $goodrate = round($goodcomment/$allcomment,2)*100;
    $mediumrate = round($mediumcomment/$allcomment,2)*100;
    $badrate = round($badcomment/$allcomment,2)*100;
		
		
		$result = $phone->where("phoneid='$phoneid'")->select();

		$color = $this->_get("color","htmlspecialchars,strip_tags",$result[0]['color']);
		$neicun = $this->_get("neicun","htmlspecialchars,strip_tags",$result[0]['neicun']);
		$cunchu = $this->_get("cunchu","htmlspecialchars,strip_tags",$result[0]['cunchu']);
        
    $color_config = $phone
        ->where("proname='".$result[0]['proname']."'and phoneid!='$phoneid' and color!='$color'")
        ->field("phoneid,color")->select();

   $neicun_cunchu = $phone
        ->where("proname='".$result[0]['proname']."' and phoneid!='$phoneid' and color='$color' ")
        ->field("phoneid,neicun,cunchu")->select();


   $this->assign("color_config" , $color_config);
   $this->assign("neicun_cunchu" , $neicun_cunchu);

	 $picnum = 0;
	 if($result) 
	 for($i=0;$i<count($result[0]);$i++) {
		  if($result[0]['imgsrc'.($i+1)]!="" ){
				  $picnum++;
				  $this->assign("imgsrc".($i+1),$result[0]['imgsrc'.($i+1)]);
			}
		}

    $getphoneid = D("allnum");
    $number = $getphoneid->where("phoneid='$phoneid'")->select();

		$this->assign("picnum",$picnum);
		$this->assign("result" , $result);
    $this->assign("result1" , $result);
		$this->assign("phoneid" , $phoneid);
		$this->assign("allcomment",$allcomment);
    $this->assign("number",$number);

    $this->assign("goodcomment",$goodcomment);
    $this->assign("mediumcomment",$mediumcomment);
    $this->assign("badcomment",$badcomment);

    $this->assign("goodrate",$goodrate);
    $this->assign("mediumrate",$mediumrate);
    $this->assign("badrate",$badrate);


		$this->display();



	}





	public function proCategory(){

      $recommend  = D("recommend");
      if($username!="" && isset($username))
      $recom = $recommend
     ->query("select recommend.time,phone.phoneid,phone.proname,".
      "phone.imgsrc1,phone.color from phone ,recommend "." where username='$username'".
      " and phone.phoneid = recommend.phoneid order by recommend.time desc");

     else{
         $recom = $recommend
     ->query("select recommend.time,phone.phoneid,phone.proname,".
      " phone.imgsrc1,phone.color from phone ,recommend where ".
     "   phone.phoneid = recommend.phoneid order by recommend.time desc");
     }


      $this->assign("recommend" , $recom);




        $phone = D("phone");
        $brand = $this->_get("brand");

        if($brand==null){$brand="华为";}

        $color_result = $phone->where("brand='$brand'")->field("color")->select();

        $arr = array();
        foreach ($color_result as $key => $value) {
            
            if(in_array($color_result[$key],$arr)){

                array_splice($color_result,$key,1);
            }
            else array_push($arr, $color_result[$key]);
           
        } 

        $size = $this->_get("size");
        $neicun = $this->_get("neicun");
        $cunchu = $this->_get("cunchu");
        $color = $this->_get("color");
        $price = $this->_get("price");
        $dianchi = $this->_get("dianchi");
       
        $sql = " brand='$brand' ";

        if($size!=null){  

           if($size=='5'){
              $sql.=" and size <='$size' ";
           } 
           else if($size=='6'){
               $sql.=" and size >='$size' ";
           }
           else{
               $temparr = explode("_",$size);
               $a = $temparr[0];
               $b = $temparr[1];
               $sql.=" and size between '$a' and '$b' ";
           }

           
        }

        if($neicun!=null){
            $sql.=" and neicun='$neicun' ";
        }

        if($cunchu!=null){
            $sql.=" and cunchu='$cunchu' ";
        }

        if($color!=null){
            $sql.=" and color='$color' ";
        }

        if($price!=null){
            if($price=="1000"){
                 $sql.=" and price<='$price' ";
            }else if($price=="4000"){
                 $sql.=" and price>='$price' ";
            }
            else{
               $temparr2 = explode("_",$price);
               $a2 = $temparr2[0];
               $b2 = $temparr2[1];  
               $sql.=" and price between '$a2' and '$b2' ";
            }
            
        }

        if($dianchi!=null){

            if($dianchi=="4000"){
                $sql.=" and dianchi >='$dianchi' ";
            }else{
                   $temparr1 = explode("_",$dianchi);
                   $a1 = $temparr1[0];
                   $b1 = $temparr1[1];
                   $sql.=" and dianchi between '$a1' and '$b1' "; 
            }

          
        }

        $result = $phone->where($sql)->select();

        $this->assign("result",$result);
        $this->assign("sql",$sql);
        $this->assign("color",$color_result);

        $this->assign("brand",$brand);
		   $this->display();
	}

    public function showComment(){

    	$phoneid = $this->_post("phoneid");
    	$page = $this->_post("page","",1);
    	$index = $this->_post("index");

      $index = (int)trim($index);
        
        
      $pernum = 5;
      $begin = ($page-1)*$pernum;

    	$comment = D("comment");

       $phone = D("phone");

    	 $proname = $phone->where("phoneid='$phoneid'")->field("proname")->select();
    	 $temp =  trim($proname[0]['proname']);
       
      if($index==5)
           $result = $comment->where("proname='".$temp."' and star>=4 ")
                  ->limit($begin,$pernum)->order("id desc")->select();
      else if($index==3){
           $result = $comment->where("proname='".$temp."' and star between 2 and 3 ")
                    ->limit($begin,$pernum)->order("id desc")->select();  
      }else if($index==1){
           $result = $comment->where("proname='".$temp."' and star=1 ")
                    ->limit($begin,$pernum)->order("id desc")->select(); 
      }

      echo json_encode($result);
    	

    }

    public function getPageNum(){

      	$phoneid = $this->_get("phoneid");
        $index = $this->_get("index");
        $index = (int)trim($index);


    	$comment = D("comment");
      $phone = D("phone");
    	$proname = $phone->where("phoneid='$phoneid'")->field("proname")->select();
    	$temp =  $proname[0]['proname'];

        if($index==5)
            $result = $comment->where("proname='$temp' and star>=4 ")->count();
        else if($index==3){
            $result = $comment->where("proname='$temp' and star between 2 and 3 ")->count();
        }else if($index==1){
            $result = $comment->where("proname='$temp' and star=1 ")->count();
        }

    	echo $result;
    }


    public function addGoodNum(){
         
         $username = $_SESSION['username'];
         if(!isset($username) || $username==""){
             echo "请先登录";die();
         }
         $buyid =  $this->_get("buyid");
         $goodluck = D("goodluck");

         $res = $goodluck->where("username='$username' and buyid='$buyid'")->count();
         if($res==0){
             $data['username']= $username;
             $data['buyid'] = $buyid;
             $goodluck->data($data)->add();
         }else{
            echo "你已经赞过了";die();
         }
     
         $comment = D("comment");
         $comment->query("update comment set goodnum=goodnum+1 where buyid='$buyid' ");
         echo "success";
    }



}

?>