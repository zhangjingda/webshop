$(function(){

   var  allmoney =0;  

   function shoppingCart(){
   	 for(var i=0;i<$(".add").length;i++){
   	 	    (function(i){
  	   
   	 	   	    $(".add").eq(i).click(function(e){
   	 	   	    	var i = $(".add").index(e.target);
   	 	   	    	e.preventDefault();
			       	var val = $(".number").eq(i).val();
			       	val = parseInt(val,10)+1;
		       	    $(".number").eq(i).val(val.toString());
	     		});

     		     
     		    $(".miu").eq(i).click(function(e){
     		    	var i = $(".miu").index(e.target);
     		     	e.preventDefault();
			       	var val = $(".number").eq(i).val();
			       	val = parseInt(val,10)-1;
			       	if(val>0)
		       	    $(".number").eq(i).val(val.toString());
     		    });

     		    $(".number").eq(i).change(function(e){
     		    	var i = $(".mumber").index(e.target);
                      var value = $(this).val();
                      if(!/\d/.test(value)){
                      	 alert("数量必须为正整数");
                      	 $(this).val("1");
                      }else if(parseInt(value, 10)<1){
                          alert("数量必须大于等于1");
                          $(this).val("1");
                      }
     		    });


     		    $(".container").eq(i).mouseover(function(e){
     		    	var i = $(".container").index(e.target);
                       $(this).css("background-color","#ffd");
     		    }).mouseout(function(){
     		    	   $(this).css("background-color","#fff");
     		    })


     		    $(".store input[type='checkbox']").eq(i).change(function(e){
     		    	var i = $(".store input[type='checkbox']").index(e.target);
     		    	var ss = $(".choice input[type='checkbox']").eq(i)[0];
     		    	if(!ss.checked)
     		    	   ss.checked = true;
     		        else 
     		        	ss.checked = false;
     		    })

     		    $(".choice input[type='checkbox']").eq(i).change(function(e){
     		    	var i =  $(".choice input[type='checkbox']").index(e.target);
     		    	var ss = $(".store input[type='checkbox']").eq(i)[0];
     		    	if(!ss.checked)
     		    	   ss.checked = true;
     		        else 
     		        	ss.checked = false;
     		     })


     		    $("#t1").change(function(){
     		    	for(var i=0;i<$(".store").length;i++){
 		    			$(".store input[type='checkbox']")[i].checked = true;
 		    	        $(".choice input[type='checkbox']")[i].checked = true;	

 		    	        if(!$('#t1')[0].checked){
	     		    		$(".store input[type='checkbox']")[i].checked = false;
	 		    	        $(".choice input[type='checkbox']")[i].checked = false;
     		         	}	
     		    	}	    

     		    	
     		    })


     		    $("#t2").change(function(){

     		    	for(var i=0;i<$(".store").length;i++){
     		    		if(!$(".store input[type='checkbox']")[i].checked){
     		    			$(".store input[type='checkbox']")[i].checked = true;
     		    	        $(".choice input[type='checkbox']")[i].checked = true;
     		    		}else{
     		    			$(".store input[type='checkbox']")[i].checked = false;
     		    	        $(".choice input[type='checkbox']")[i].checked = false;
     		    		}
     		    		
     		    	}

     		    	
     		    })


                $(".deldiv button").eq(i).click(function(){
                 	   var index = $(".deldiv button").index($(this));
                 	   if(confirm("确认删除吗?"))
                 	   $("#box").children().eq(index).remove();
                 })

                
                setInterval(function(){
                	var allmoney =0;
                	$(".allmoney").html("￥0.00元");
                	for(var i=0;i<$(".container").length;i++){
                		if($(".choice input[type='checkbox']")[i].checked){
                			var num = parseFloat($(".number").eq(i).val());
			    			var cont = $.trim($(".price").eq(i).text());
			    			var begin = cont.indexOf("元",0);
                            var per_pri = cont.substr(1,begin-1);
                            per_pri = parseFloat(per_pri);

                            if(isNaN(per_pri)){
                            	per_pri = 0;
                            }

                            allmoney = num*per_pri + allmoney;

                            $(".allmoney").html("");
                            allmoney = allmoney.toString();
                            if(/\./.test(allmoney)){
                            	if(/\.\d{2}/.test(allmoney)){
                            		allmoney = parseFloat(allmoney);
                            		$(".allmoney").html("￥"+allmoney+"元");
                            	}else if(/\.\d{1}/.test(allmoney)){
                            		allmoney = parseFloat(allmoney);
                            		$(".allmoney").html("￥"+allmoney+"0元");
                            	}
                         	   
                            }else{
                            	allmoney = parseFloat(allmoney);
                            	$(".allmoney").html("￥"+allmoney+".00元");
                            }
                            
                		}
                		if(!$(".choice input[type='checkbox']")[i].checked){
                			$("#t1")[0].checked =false;
                		}
                	}



                }, 300);


   	 	   })(i);
   	 }   
   }
   shoppingCart();
})

