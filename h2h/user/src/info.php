<!DOCTYPE html>

<html>
    <head>
        <title>Information</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/common.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/info/info.css" />
        <link rel="stylesheet" href="css/info/style.css">

		<script src="js/vender/modernizr-2.8.3.min.js"></script>
	    <script type="text/javascript" src="js/vender/jquery.min.js" ></script>
    	<script type="text/javascript" src="js/vender/jquery.fly.min.js" ></script>
		<link rel="stylesheet" href="css/vender/bootstrap.min.css" />
		<link rel="stylesheet" href="css/vender/font-awesome.min.css" />

		<link rel="stylesheet" href="css/info/abprule.css" />
		<link rel="stylesheet" href="css/info/csshide1.css" />

		<script src="js/vender/modernizr.js"></script>
		
    </head>
    <body>
    	<div class="main">
		<header>
			<a href="/"><img src="img/logo.jpg"></a>
		</header>
		<nav class="menu-container">
			<div class="menu">
				<ul>
                    <!--书包-->
					<li id="cd-cart-trigger">
                        <a href="#" id="cart cd-img-replace">
                        	<i class="icon-shopping-cart" id="end">
                        	</i>我的书包
                        </a>
                        <!--
                        	作者：994503124@qq.com
                        	时间：2016-04-27
                        	描述：购物车内数量
                        -->
                        <span id="cartNum" class="noBook">0</span>
                    </li>
                    <!--消息-->
					<li>
                        <a href="" id="message"><i class="icon-bell-alt"></i>消  息</a>
					</li>
					<li>
                        <!--用户名-->
                        <a href="login.html" id="userName"><i class="icon-user"></i>请登录</a>
						<ul>
							<li><a href="#">个人信息</a></li>
							<li><a href="#">历史订单</a></li>
						</ul>
					</li>
					<li>
                        <a href="/" id="homePage"><i class="icon-home"></i>主  页</a>
					</li>
				</ul>
			</div>
			<div id="msg">已成功加入购物车！</div>
		</nav>
		<div id="content" >			
			<div id="bookPicture" class="clearfix">
				<!--图片url-->
				<img id = "img1" src = "">
				<img id = "img2" src = "">
			</div>
			<div id="detail">
				<!--书名-->
				<h1 id="bookName"></h1>
				<!--作者-->
				<h2 id="author">蒋彪</h2>
				<!--这里放详细介绍-->
				<article>
					<ul>
						<li>
							<h3>出版社</h3>
							<span id="publisher"></span>
						</li>
						<li>
							<h3>出版年份</h3>
							<span id="publishYear">2015年</span>
						</li>
						
						<li>
							<h3>原价</h3>
							<span>￥<span id="totalprice">40</span></span>
						</li>
						<li>
							<h3>租金</h3>
							<span>￥<span id="price">0.3</span>/d</span>
						</li>
						<li>
							<h3>库存</h3>
							<span id="stock">10</span>
						</li>
						<li>
							<h3>简介</h3>
							<p id="intro">这是一本好书</p>
						</li>
					</ul>
				</article>

				<a href="#" class="commonBtn addcar" id="addCar">
					<p>加 入 书 包</p>
				</a>
				<!--评论-->
				<div class="commentsContainer">
					<h3>评论</h3>
					<div class="comments">
						<div class="leftPart">
                            <i class="icon-user"></i>
                            <h4 id="userName">张利高</h4>
                            <p>评分：<span id="point">3.5</span></p>
                        </div>
                        <div class="rightPart">
                            <p class="commentInfo" id="commentInfo">这书很不错！</p>
                        </div>
					</div>
                    <div class="comments">
						<div class="leftPart">
                            <i class="icon-user"></i>
                            <h4 id="userName">张利高</h4>
                            <p>评分：<span id="point">3.5</span></p>
                        </div>
                        <div class="rightPart">
                            <p class="commentInfo" id="commentInfo">这书很不错！</p>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div id="cd-cart">
			<h2>购物车</h2>
			<ul class="cd-cart-items">
				
			</ul> <!-- cd-cart-items -->
	
			<div class="cd-cart-total">
				<p>Total<span id="total">0</span></p>
			</div> <!-- cd-cart-total -->
	
			<a href="Order.html" class="checkout-btn">结算</a>
		</div> <!-- cd-cart -->
		<!--<a href="index.html" id="back"><p>返 回 首 页</p></a>-->
		</div>
    </body>

    <script src="js/info/info.js"></script>
	<script src="js/info/main.js"></script>
	<script src="js/info/megamenu.js"></script>
     <script type="text/javascript">
	//var bookIds = new Array();

		var bookNum = 0;
		var url = location.search;
		var id =  url.split("=")[1];
		document.getElementById("img1").src = "img//books//" + id+"//2.jpg";
		document.getElementById("img2").src = "img//books//" + id+"//3.jpg";
		
		<?php 
		require_once dirname(__FILE__)."/../../db/DBBooks.php";
		$dbbooks = new DBBooks();
		$bookInfos = $dbbooks->getBookIds();
		$id = $_SERVER["QUERY_STRING"]; 
		$id = explode("=",$id); 
		$bookInfos = $dbbooks->getDetails($id[1]);
		?>
		
		var bookName = <?php echo json_encode($bookInfos[0][0])?>;
		var price = <?php echo json_encode($bookInfos[0][1])?>;
		var description = <?php echo json_encode($bookInfos[0][2])?>;
		var stock = <?php echo json_encode($bookInfos[0][3])?>;
		var publisher = <?php echo json_encode($bookInfos[0][4])?>;
		var useremail = getCookie("email") +"@bjtu.edu.cn";
		
		window.onload = function(){
			document.getElementById("bookName").innerHTML = bookName;
			document.getElementById("price").innerHTML = price;
			document.getElementById("stock").innerHTML = stock;
			document.getElementById("publisher").innerHTML = publisher;
		}
		
		function rent(){
			var url = location.search;
			var id =  url.split("=")[1];
			window.location.href="order.html?bookid="+id+"&price=" + document.getElementById("price").innerHTML;
		
		}
		
		//获取订单
		function cookie(name){    
	 
	   var cookieArray=document.cookie.split("; "); //得到分割的cookie名值对    
	 
	   var cookie=new Object();    
	 
	   for (var i=0;i<cookieArray.length;i++){    
	 
	      var arr=cookieArray[i].split("=");       //将名和值分开    
	 
	      if(arr[0]==name)return unescape(arr[1]); //如果是指定的cookie，则返回它的值    
	 
	   } 
	 
	   return ""; 
	 
	} 
	 
	  
	 
	function delCookie(name)//删除cookie
	 
	{
	 
	   document.cookie = name+"=;expires="+(new Date(0)).toGMTString();
	 
	}
	 
	  
	 
	function getCookie(objName){//获取指定名称的cookie的值
	 
	    var arrStr = document.cookie.split("; ");
	 
	    for(var i = 0;i < arrStr.length;i ++){
	 
	        var temp = arrStr[i].split("=");
	 
	        if(temp[0] == objName) return unescape(temp[1]);
	 
	   } 
	 
	}
	 
	  
	 
	function addCookie(objName,objValue,objHours){      //添加cookie
	 
	    var str = objName + "=" + escape(objValue);
	 
	    if(objHours > 0){                               //为时不设定过期时间，浏览器关闭时cookie自动消失
	 
	        var date = new Date();
	 
	        var ms = objHours*3600*1000;
	 
	        date.setTime(date.getTime() + ms);
	 
	        str += "; expires=" + date.toGMTString();
	 
	   }
	 
	   document.cookie = str;
	 
	}
	 
	  
	 
	function SetCookie(name,value)//两个参数，一个是cookie的名子，一个是值
	 
	{
	 
	    var Days = 30; //此 cookie 将被保存 30 天
	 
	    var exp = new Date();    //new Date("December 31, 9998");
	 
	    exp.setTime(exp.getTime() + Days*24*60*60*1000);
	 
	    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
	 
	}
	 
	function getCookie(name)//取cookies函数        
	 
	{
	 
	    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
	 
	     if(arr != null) return unescape(arr[2]); return null;
	 
	  
	 
	}
	 
	function delCookie(name)//删除cookie
	 
	{
	 
	    var exp = new Date();
	 
	    exp.setTime(exp.getTime() - 1);
	 
	    var cval=getCookie(name);
	 
	    if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
	 
	}
	
    function checkLogin(){
    	
        if(getCookie("login") == null){
			
		}
		if((getCookie("login")) == "true"){
//			alert(getCookie("login"));
			var $i = $("<i class=\"icon-user\"></i>");
			$('#userName').text(getCookie("email"));
			$('#userName').prepend($i);
			$('#userName').attr("href","#");
			getCart();
		}
    }
    checkLogin();
    /* $(".addcar").click(function(event){
        var book_added = false;
        var bookName = $("#bookName").text();
        $(".cd-cart-items li p").each(function(){
            var cart_bookName = $(this).text();
            if(bookName === cart_bookName){
                book_added = true;
            }
        });
        if(book_added === true){
            $("#msg").text("已在购物车！").show().animate({width: '250px'}, 200).fadeOut(1000);
        }else{
            var offset = $("#end").offset();
            var addcar = $(this);
            var img = $("#img1").attr('src');
            var flyer = $('<img class="u-flyer" src="'+img+'">');
            flyer.fly({
                start: {
                    left: event.pageX,
                    top: event.pageY
                },
                end: {
                    left: offset.left+10,
                    top: offset.top+10,
                    width: 0,
                    height: 0
                },
                onEnd: function(){
                    $("#msg").text("已成功加入购物车！").show().animate({width: '250px'}, 200).fadeOut(1000);
                    this.destory();
                }
            });
            //var oldNum = $("#cartNum").text();
            //var currentNum;
            //if(oldNum === 0){
            //    currentNum = 1;
            //}else{
            //    currentNum = parseInt(oldNum) + 1;
            //}
            //if(currentNum > 0){
            //    $("#cartNum").removeClass("noBook");
            //}
            //$("#cartNum").text(currentNum);
        }

    }); */

    $("#addCar").click(function(){
        var book_added = false;
        var bookName = $("#bookName").text();
        var rentPrice = $("#price").text();
        $(".cd-cart-items li p").each(function(){
            var cart_bookName = $(this).text();
            if(bookName === cart_bookName){
                book_added = true;
            }
        });
        
        if(!(getCookie("login") == "true"))
            {
            //跳转到登陆界面
            window,location.href="login.html";
            }
        else{
            //从cookie获取邮箱，先假设为13301054@bjtu.edu.cn

            $.post("logic/addToCart.php",{email:useremail,bookid:id},function(msg)
                    {
                //alert("enter cart");
                if(msg == 1)
                    {
	                	var offset = $("#end").offset();
	                    var addcar = $(this);
	                    var img = $("#img1").attr('src');
	                    var flyer = $('<img class="u-flyer" src="'+img+'">');
	                    flyer.fly({
	                        start: {
	                            left: event.pageX,
	                            top: event.pageY
	                        },
	                        end: {
	                            left: offset.left+10,
	                            top: offset.top+10,
	                            width: 0,
	                            height: 0
	                        },
	                        onEnd: function(){
	                            $("#msg").text("已成功加入购物车！").show().animate({width: '250px'}, 200).fadeOut(1000);
	                            this.destory();
	                        }
	                    });
	                    addToCart(bookName,rentPrice);
	                    getCart();
                        // alert("添加成功");
                        //购物车为空
                    }
                else{
                        $("#msg").text("此书已存在!").show().animate({width: '250px'}, 200).fadeOut(1000);
                        // alert("此书已存在");                
                }
            });
            
        }
        
/*          if(book_added === true){
            
         }
         else{
             //var bookName = $("#bookName").text();
        	 
         } */
    });
    function addToCart(name,price){
                   var rentDay = 1;
        var rentPrice = price;
        var $li = $("<li></li>");
        var $p = $("<p></p>");
        $p.text(name);
        $li.append($p);
        var $div1 = $("<div></div>");
        $div1.addClass("cd-price");
        var $span1 = $("<span></span>");
        $span1.text("￥");
        var $span2 = $("<span></span>");
        $span2.addClass("cart-bookPrice");
        $span2.text(rentPrice);
        var $span3 = $("<span></span>");
        $span3.text("/d");
        $div1.append($span1).append($span2).append($span3);

        var $div2 = $("<div></div>");
        var $a_minus = $("<a></a>");
        $a_minus.addClass("minusDay");
        var $i_minus = $("<i></i>");
        $i_minus.addClass("icon-minus");
        $a_minus.append($i_minus);
        $a_minus.click(function(){
            var rentDay	= $(this).parents("div.cd-price").find("input.cart-rentDays").val();
            var minusDay = parseInt(rentDay) - 1;
            var rentPrice = $(this).parents("div.cd-price").find("span.cart-bookPrice").text();
            var subTotal = minusDay * parseFloat(rentPrice);
            var total = 0;
            if(minusDay <= 0){
                $(this).parents("div.cd-price").find("input.cart-rentDays").val(0);
                $(this).parents("li").find("span.subTotal").text(0);
            }else{
                $(this).parents("div.cd-price").find("input.cart-rentDays").val(minusDay);
                $(this).parents("li").find("span.subTotal").text(subTotal.toFixed(2));
            }
            $(".subTotal").each(function(){
                var sub = $(this).text();
                total = parseFloat(sub) + total;
                total = parseFloat(total);
            });
            $("#total").text("￥ " + total.toFixed(2));
        });
        var $input = $("<input />");
        $input.attr("type","text").attr("value","0");
        $input.addClass("cart-rentDays");
        var $a_plus = $("<a></a>");
        $a_plus.addClass("plusDay");
        var $i_plus = $("<i></i>");
        $i_plus.addClass("icon-plus");
        $a_plus.append($i_plus);
        $a_plus.click(function(){
            var rentDay	= $(this).parents("div.cd-price").find("input.cart-rentDays").val();
            var plusDay = parseInt(rentDay) + 1;
            var rentPrice = $(this).parents("div.cd-price").find("span.cart-bookPrice").text();
            var subTotal = plusDay * parseFloat(rentPrice);
            $(this).parents("div.cd-price").find("input.cart-rentDays").val(plusDay);
            $(this).parents("li").find("span.subTotal").text(subTotal.toFixed(2));
            var total = 0;
            $(".subTotal").each(function(){
                var sub = $(this).text();
                total = parseFloat(sub) + total;
                total = parseFloat(total);
            });
            $("#total").text("￥ " + total.toFixed(2));
        });
        $div2.append($a_minus).append($input).append($a_plus);
        $div1.append($div2);
        $li.append($div1);
        $span_subTotal = $("<span></span>");
        $span_subTotal.addClass("subTotal");
        $span_subTotal.text(0);
        $li.append($span1);
        $li.append($span_subTotal);
        $a_remove = $("<a></a>");
        $a_remove.addClass("cd-item-remove").addClass("cd-img-replace");
        $a_remove.text("Remove");
        $a_remove.click(function(){
        	var name = $(this).parent().children("p").text();
        	$(this).parent().remove();
			var total = 0;
            $(".subTotal").each(function(){
                var sub = $(this).text();
                total = parseFloat(sub) + total;
                total = parseFloat(total);
            });
            
            $("#total").text("￥ " + total.toFixed(2));
        	name.replace(/\r\n/g,"");
        	$.post("logic/deleteFromCart.php",{email:useremail,bookname:name},function(msg)
    				{
    			//alert("enter cart");
    			if(msg == 1)
    				{
    				$.post("logic/getCart.php",{email:useremail},function(msg)
    						{
    					//alert("enter cart");
    					if(msg == "null")
    						{
    						///alert("no books");
    						//购物车为空
    						}
    					else{
    						
    						
    						while(msg.indexOf("[")!= -1)
    							msg = msg.replace("[","");
    						while(msg.indexOf("]")!= -1)
    							msg = msg.replace("]","");
    						while(msg.indexOf("\"")!= -1)
    							msg = msg.replace("\"","");
    						var booknames = msg.toString().split("|")[0];
    						var prices = msg.toString().split("|")[1];
    						
    						var bookNames = booknames.toString().split(",");
    						var prs = prices.toString().split(",");
    						
    						
    						$('.cd-cart-items li').remove();
    						//booknames就是购物车里所有书籍的名称数组
    						//prs就是购物车里所有书籍的价格数组
    						bookNum = 0;
    						$.each(bookNames,function(i){
    	                       addToCart(unescape(bookNames[i].replace(/\u/g, "%u")).replace(/\\/g,""),prs[i]); 
    	                       ++bookNum;
    	                       
    	                    });
    	                    $("#cartNum").text("" + bookNum);
    	                    if(bookNum!=0){
    	                    	$("#cartNum").removeClass("noBook");
    	                    }
    	                    
    						//更新订单部分
    						
    					}
    				});
    				}
    			else{
    				
    				alert("wrong");
    			}
    		});
            
            
            /* var oldNum = $("#cartNum").text();
            var currentNum = parseInt(oldNum) - 1;
            if(currentNum <= 0){
                currentNum = 0;
                $("#cartNum").addClass("noBook");
                $("#cartNum").text(currentNum);
            }else{
                $("#cartNum").text(currentNum);
            } */
            
        });
        $li.append($a_remove);
        $(".cd-cart-items").append($li);
    }
    
    function getCart(){
			$.post("logic/getCart.php",{email:useremail},function(msg)
					{
				//alert("enter cart");
				if(msg == "null")
					{
					///alert("no books");
					//购物车为空
					}
				else{
					
					
					while(msg.indexOf("[")!= -1)
						msg = msg.replace("[","");
					while(msg.indexOf("]")!= -1)
						msg = msg.replace("]","");
					while(msg.indexOf("\"")!= -1)
						msg = msg.replace("\"","");
					var booknames = msg.toString().split("|")[0];
					var prices = msg.toString().split("|")[1];
					
					var bookNames = booknames.toString().split(",");
					var prs = prices.toString().split(",");
					
					
					$('.cd-cart-items li').remove();
					//booknames就是购物车里所有书籍的名称数组
					//prs就是购物车里所有书籍的价格数组
					bookNum = 0;
					$.each(bookNames,function(i){
                       addToCart(unescape(bookNames[i].replace(/\u/g, "%u")).replace(/\\/g,""),prs[i]); 
                       ++bookNum;
                       
                    });
                    $("#cartNum").text("" + bookNum);
                    if(bookNum!=0){
                    	$("#cartNum").removeClass("noBook");
                    }
                    
					//更新订单部分
					
				}
			});
	}
    
    function deleteFromCart(){
    	
    	
    }
		
		
	</script>
</html>
