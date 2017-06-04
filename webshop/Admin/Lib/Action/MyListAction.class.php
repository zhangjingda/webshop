<?php
header("Content-type: text/html; charset=utf-8"); 
class MyListAction extends Action{
	public function mylist(){


		$mylist = D("mylist");

		for($i=0;$i<5;$i++){
			$this->assign("result".($i+1),$mylist->select());
		}
       
		$this->display();
	}

    
    public function saveMyListData(){

       $mylist = D("mylist");
       $mylistdata = $_GET['obj'];
       $aa = str_replace("\\", "", $mylistdata);
       $arr =  json_decode($aa,true);
       for($i=0;$i<count($arr);$i++){
       	    $temp = $arr[$i]['id'];
       	    $data['maintitle'] =$arr[$i]['maintitle'];
       	    $data['phoneid'] = $arr[$i]['phoneid'];
       	    $result = $mylist->where("id='$temp'")->data($data)->save();
       }
        echo "success";
    }



}


?>