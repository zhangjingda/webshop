<?php
header("Content-type: text/html; charset=utf-8"); 

class AdminAction extends Action {



    // 每页显示的条数
    public static $allpage = -1;
  


    /**
     * [admin description]登录界面
     * @return [type] [description]
     */
    public function admin(){
        $this->display();
    }
    
  
    /**
     * [handleAdminLogin description]处理管理员验证的相关信息
     * @return [type] [description]
     */
    public function handleAdminLogin(){
    	
        if($this->isPost()){

          $account = $this->_post("account");
          $password = $this->_post("password");

          if(!empty($account) && !empty($password)){

               $admin  = M("Admin");
               $num = $admin->
               where("account='$account' AND password='$password'")->count();
               if($num>=1){
                   // $this->success("登陆成功","Admin/adminHome");
                  $this->redirect('Admin/adminHome', array(), 0, '页面跳转中...');
               }else{
                  echo "<script>alert('账号或密码不存在');window.location.href=".
                       "'Admin/adminHome';</script>";
               }
             
          }else{
              $this->error('账号或密码不能为空');
          }
        }else{

             $this->error('非法请求');
        }
    }


   /**
    * [adminHome description]后台正式页面
    * @return [type] [description]
    */
   
    public function adminHome(){
     
      $user = D("User");
      $searchVal = $this->_get("searchval");
      if(isset($searchVal) && $searchVal!=""){
        $num = $user->where("username like '%".$searchVal."%' or ".
               " id like '%".$searchVal."%' or phone like '%".$searchVal."%'")->count(); 
        self::$allpage=-1;
      }else{
         $num = $user->count();
         self::$allpage=-1;
      }
      $pernum = 5;
      if($num==0)$this->assign("allpage",0);
      else $this->assign("allpage",ceil($num/$pernum));

      if(self::$allpage==-1)
      self::$allpage = ceil($num/$pernum);

      $page = $this->_get("page");
      if(!isset($page) || !$page || $page<1){
          $page = 1;
      }
      
      if(isset($searchVal) && $searchVal!=""){
        $result = $user->where("username like '%".$searchVal."%' or ".
               " id like '%".$searchVal."%' or phone like '%".$searchVal."%'")
        ->field("id,username,phone,frozen,time")->limit(($page-1)*$pernum,$pernum)
        ->select();
      }else{
          $result = $user->field("id,username,phone,frozen,time")->limit(($page-1)*$pernum,$pernum)
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
      $this->assign("result",$result);
      $this->display();

    }





    // public function getUserData(){

    //       $user = M("User");
    //       $userdata = $user->field("id,username,phone,frozen,time")->limit(0,5)->select();
    //       echo json_encode($userdata);

    // }


   /**
    * 用于用户管理提取数据
    */
   //date_format(time,'%Y-%m-%d')时间截取的函数操作，备用
    // public function postData(){

    // 	if($this->isPost()){

    //       $user = D("User");
    //       $page = (int)$this->_post("page");
    //       if(!isset($page) || $page==0 || $page =="")$page = 1;
    //       $page = $page-1;
    //       $userdata = $user->field("id,username,password,phone,frozen,time")
    //       ->limit($page*$this->pernum,$this->pernum)->select();   
    //       echo json_encode($userdata);         
    // 	}else{
    // 		$this->error("数据请求出错");
    // 	}
    // }

    /**
     * [searchHandle description]搜索处理
     * @return [type] [description]
     */
    public function searchHandle(){

    	if($this->isPost()){
     
          $user = D("User");

          $page = (int)$this->_post("page");
          if(!isset($page) || $page==0 || $page =="")$page = 1;
          $page = $page-1;

          $searchVal = $this->_post("searchVal","htmlspecialchars,strip_tags","1");
         
          $userdata = 
          $user->query("select id,username,password,phone,".
          	"frozen, time from user where  username like '%".$searchVal."%' or ".
          	 " id like '%".$searchVal."%' or phone like '%".$searchVal."%' order by id desc".
              " limit ".$page*$this->pernum.",".$this->pernum);

           $allnum = $user->where(" username like '%".$searchVal."%' or ".
             " id like '%".$searchVal."%' or phone like '%".$searchVal."%' ")->count();

           $allpage = ceil($allnum /$this->pernum);

           $arr = array('userdata'=>$userdata,"allpage" => $allpage);

           echo json_encode($arr);


    	}else{
    		$this->error("数据请求出错");
    	}

    }

    /**
    * 用于是否冻结用户
    */
   public function frozenUser(){

   	   $user = D("User");
   	   $dataid = (int)$this->_get("id"); 

   	   $frozen = $user->where("id=$dataid")->getField("frozen");
   	   if($frozen == '1')$frozen = '0';
   	   else $frozen = '1';
   	   
   	   $data['frozen'] = (int)$frozen;
   	   $res =  $user->where("id=$dataid")->save($data);
       if($res)echo "success";
       else echo "fail";
   }




/**
 * [handlePwdChange description]处理密码修改中的用户名和密码验证的表单 
 * @return [type] [description]
 */
   public function handlePwdChange(){

        if($this->isPost()){
        	 $username = $this->_post("username");
   	         $password = $this->_post("pass");
   	         if($username!="" && $password!=""){
   	       
   	         	 $user  = M("Admin");
   	         	 $num = $user->where("account='".$username."' and password='".$password."'")->count();
   	         	
   	         	 if($num>=1){
   	         	 	$this->redirect("Admin/changPwd",array("username"=>$username), 0, '页面跳转中...');
   	         	 }else{
   	         	 	$this->error("账号或密码错误");
   	         	 }
   	         }
        }else{
        	$this->error("格式不对或其他出错");
        }
   	   
   	    
   }
  /**
   * [changPwd description]管理员密码重置界面
   * @return [type] [description]
   */
   public function changPwd(){
   	   $username = $this->_param("username");
   	   $this->assign("username",$username);
   	   $this->display();
   }
  /**
   * [changPwd description]管理员密码修改提交判断
   * @return [type] [description]
   */
    public function changPwd1(){
      if($this->isPost()){
     	  $account  = $this->_post("username");
        $password = $this->_post("password");
        if($account!="" && $password!=""){
            $data["password"] = $password;
            $admin = M("Admin");
            $result = $admin->where("account = '$account'")->data($data)->save();
            if($result == 0){
                 $this->error("出错或密码相同，请检查!");   
            }else{
                  $this->success('密码修改成功,页面跳转中...',"adminHome",3);
            }
            
        }
      }else{
        $this->error("出错");
      }
   }


}

?>