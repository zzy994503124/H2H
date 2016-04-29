<!DOCTYPE html>

<html>
    <head>
        <title>Information</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/common.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/info.css" />
        <link rel="stylesheet" href="css/style.css">
		<script src="js/modernizr-2.8.3.min.js"></script>
	    <script type="text/javascript" src="js/jquery.min.js" ></script>
    	<script type="text/javascript" src="js/jquery.fly.min.js" ></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="stylesheet" href="css/abprule.css" />
		<link rel="stylesheet" href="css/csshide1.css" />
		<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
		<script>
			$(function() {
				$(".addcar").click(function(event){
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
							$("#msg").show().animate({width: '250px'}, 200).fadeOut(1000);
							this.destory();
						}
					});
					var oldNum = $("#cartNum").text();
					var currentNum ;
					if(oldNum == 0){
						currentNum = 1;
					}else{
						currentNum = parseInt(oldNum) + 1;
					}
					if(currentNum > 0){
						$("#cartNum").removeClass("noBook");
					}
				  	$("#cartNum").text(currentNum);
				});

				$("#addCar").click(function(){
					var bookName = $("#bookName").text();
					var rentDay = 0;
					var rentPrice = $("#price").text();
					var $li = $("<li></li>");
					var $p = $("<p></p>");
					$p.text(bookName);
					$li.append($p);	
					var $div1 = $("<div></div>")
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
						$(this).parent().remove();
					var total = 0;
					$(".subTotal").each(function(){
						var sub = $(this).text();
						total = parseFloat(sub) + total;
						total = parseFloat(total);
					});
					var oldNum = $("#cartNum").text();
					var currentNum = parseInt(oldNum) - 1;
					if(currentNum <= 0){
						currentNum = 0;
						$("#cartNum").addClass("noBook");
						$("#cartNum").text(currentNum);
					}else{
						$("#cartNum").text(currentNum);
					}
					$("#total").text("￥ " + total.toFixed(2));
					});
					$li.append($a_remove);
					$(".cd-cart-items").append($li);
				});
			});
		</script>
		<style>
			.u-flyer{display: block;width: 50px;height: 50px;border-radius: 50px;position: fixed;z-index: 9999;}
			span#cartNum{
				display: block;
				width: 18px;
				height: 18px;
				border-radius: 18px;
				line-height: 18px;
				background-color: red;
				color: white;
				position: absolute;
				top: 0;
				right: 0;
				font-size: 14px;
			}
			span.noBook{
				visibility: hidden;
			}
			#msg{position:fixed; top:300px; right:35px; z-index:10000; width:1px; height:52px; line-height:52px; font-size:20px; text-align:center; color:#fff; background:#360; display:none}
			.main{
				width: 70%;
				height: auto;
				margin: 0 auto;
			}
		</style>
    </head>
    <body>
    	<div class="main">
		<header>
			<a href="/"><img src="img/LOGO1.png"></a>
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
                        <a href="#" id="userName"><i class="icon-user"></i>周志勇</a>
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
				<img id = "img1" src = "img/books/00000001/2.jpg">
				<img id = "img2" src = "">
			</div>
			<div id="detail">
				<!--书名-->
				<h1 id="bookName">古镇足迹</h1>
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
				<a href="Order.php" class="commonBtn ">
					<p>我 要 租 书</p>
				</a>
				<a href="#" class="commonBtn addcar" id="addCar">
					<p>加 入 书 包</p>
				</a>
				<!--评论-->
				<div class="commentsContainer">
					<h3>评论</h3>
					<div class="comments">
						<div class="leftPart">
                            <i class="icon-user"></i>
                            <h4 id="userName">张立高</h4>
                            <p>评分：<span id="point">3.5</span></p>
                        </div>
                        <div class="rightPart">
                            <p class="commentInfo" id="commentInfo">这书很不错！</p>
                        </div>
					</div>
                    <div class="comments">
						<div class="leftPart">
                            <i class="icon-user"></i>
                            <h4 id="userName">张立高</h4>
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
			<h2>Cart</h2>
			<ul class="cd-cart-items">
				
			</ul> <!-- cd-cart-items -->
	
			<div class="cd-cart-total">
				<p>Total<span id="total">0</span></p>
			</div> <!-- cd-cart-total -->
	
			<a href="Order.php" class="checkout-btn">Checkout</a>
		</div> <!-- cd-cart -->
		<!--<a href="index.html" id="back"><p>返 回 首 页</p></a>-->
		</div>
    </body>
    <!--<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>-->
	<script src="js/main.js"></script>
	<script src="js/megamenu.js"></script>
     <script type="text/javascript">
	//var bookIds = new Array();

		var url = location.search;
		var id =  url.split("=")[1];
		document.getElementById("img1").src = "img//books//" + id+"//2.jpg";
		document.getElementById("img2").src = "img//books//" + id+"//3.jpg";
		
		<?php 
		require_once dirname(__FILE__)."/../db/DBBooks.php";
		$dbbooks = new DBBooks();
		$bookInfos = $dbbooks->getBookIds();
		$id = $_SERVER["QUERY_STRING"]; 
		$id = explode("=",$id); 
		$bookInfos = $dbbooks->getDetails($id[1]);
		?>;
		var bookName = <?php echo json_encode($bookInfos[0][0])?>;
		var price = <?php echo json_encode($bookInfos[0][1])?>;
		var description = <?php echo json_encode($bookInfos[0][2])?>;
		var stock = <?php echo json_encode($bookInfos[0][3])?>;
		var publisher = <?php echo json_encode($bookInfos[0][4])?>;
		
		window.onload = function() {
		//document.getElementById("description").innerHTML = description;
		document.getElementById("bookName").innerHTML = bookName;
		document.getElementById("price").innerHTML = price;
		document.getElementById("stock").innerHTML = stock;
		document.getElementById("publisher").innerHTML = publisher;
		
		}
	
		function rent(){
			var url = location.search;
			var id =  url.split("=")[1];
			window.location.href="order.php?bookid="+id+"&price=" + document.getElementById("price").innerHTML;
		
		}
		
	</script>
</html>
