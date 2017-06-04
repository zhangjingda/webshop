<?php

header("Content-type: text/html; charset=utf-8"); 
class MenuAction extends Action{

	public function menu(){

		$menu = D("menu");
		$result = $menu->select();
		for($i=1;$i<=8;$i++){
			$this->assign("result".$i,$result);
		}
		$this->assign("result",$result);
		$this->display();
	}


	public function saveMenuData(){

	   $menu = D("menu");
       $menudata = $_GET['obj'];
       $aa = str_replace("\\", "", $menudata);
       $arr =  json_decode($aa,true);
       for($i=0;$i<count($arr);$i++){
       	    $temp = $arr[$i]['id'];
       	    $data['maintitle'] =$arr[$i]['maintitle'];
       	    $data['subtitle'] = $arr[$i]['subtitle'];
       	    $data['phoneid'] = $arr[$i]['phoneid'];
       	    $result = $menu->where("id='$temp'")->data($data)->save();
       }

      echo "success";
      

	}






	

}


?>