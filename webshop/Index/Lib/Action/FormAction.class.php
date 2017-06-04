

<?php

   class FormAction extends Action{

   
   	  public function _empty($name){
   	  	    $method = $_GET['_URL_'][1];
   	   	    $this->form();
   	  }


   	  public function form(){
        
           $this->display("enroll");
   	  }


   	   public function handleEnroll(){
          $this->display("enroll");/**
           * 
           */
   	   }

      
      public function handleEnrollOk(){

             if ($this->isPost()){

                  $phone = $this->_post("phone");
                  $username = $this->_post("username");
                  $checkcode = $this->_post("checkcode");
                  $password = $this->_post("password");

                  $user = M("User");
                  $datacount = 
                  $user->where(" username='$username' or phone='$phone' ")->count();
                  if($datacount<=0){
                     $data = array("username"=>$username ,
                     "password" => $password , "phone"=>$phone); 
                      $user->data($data)->add();
                       echo "<script>alert('注册成功!');".
                              "window.location.href= '/webshop/index.php'".
                          "</script>";
                  }else{
                     echo "<script>alert('该用户名或电话已经被注册，请重新选一个用户名或电话');".
                              "window.history.back();".
                          "</script>";
                  }
          // $this->redirect('Form/handleLogin', array('cate_id' => 2), 2, '页面跳转中...');
          // $this->success('注册成功',"Form/handleLogin");
            }else{
                $this->error('非法请求',"Index/index");
            }
          
      }

      public function isUserNameEnroll(){
          $user  = M("User");
          if(isset($_POST['phone']) && $_POST['phone']!=""){
             $phone = $this->_post("phone");
             $num = $user->where("phone='$phone'")->count();
          }else if(isset($_POST['username']) && $_POST['username']!=""){
               $username = $this->_post("username");
               $num = $user->where("username='$username'")->count();
           }
          if($num>=1){
            echo "error";
          }else echo "ok";
      }


   	   public function handleLogin(){
             $this->display("login");
   	   }
       public function handlePwd(){
            $this->display("pwd");
       }
       public function handlePwd1(){
            $this->display("pwd1");
       }

       public function checkCode(){
           echo ",<script>alert('修改成功')</script>";
           header("Location:../Index/index");
       }

       public function handleForm(){
 
        if($this->isPost()){

          $username = $this->_post("username");
          $password = $this->_post("password");
          $password1 = md5($this->_post("password"));


          if(!empty($username) && !empty($password)){
                $user  = M("user");
                $password1 = md5($this->_post("password"));

                $temp  =$user->
                where("username='$username' AND password='$password' AND frozen=1")->count();
                if($temp>=1) {  echo 'frozen';exit();}

                $data = $user->
                where("username='$username' AND password='$password' AND frozen!=1")->select();
               
               if($data == array())
                  echo json_encode(array("error"=>"error"));
               else {

                    session('username',$username);
                    session('password',$password);
                     
                    // setcookie('username',md5($username),15*60);
                    // setcookie('password',md5($password),15*60);
                    setcookie('username', md5($username), time()+3600);
                    setcookie('password', md5($password), date()+3600);

                    $this->success('success');

               }


          }else{
              $this->error('用户名或密码不能为空!');
          }
        }else{
           $this->error('非法请求');
        }

       }
   }

?>