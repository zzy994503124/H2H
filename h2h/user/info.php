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
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		
    </head>
    <body>
		<header>
			<a href="index.html"><img src="img/LOGO1.png"></a>
		</header>
		<nav class="menu-container">
			<div class="menu">
				<ul>
                    <!--书包-->
					<li>
                        <a href="#" id="cart"><i class="icon-shopping-cart"></i>我的书包</a>
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
		</nav>
		<div id="content" >			
			<div id="bookPicture" class="clearfix">
				<!--图片url-->
				<img id = "img1" src = "">
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
				<a href="Order.php" class="commonBtn">
					<p>我 要 租 书</p>
				</a>
				<a href="#" class="commonBtn">
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
		<!--<a href="index.html" id="back"><p>返 回 首 页</p></a>-->
    </body>
    <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
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
