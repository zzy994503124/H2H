<!DOCTYPE html>

<html>
    <head>
        <title>Information</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/info.css" />
    </head>
    <body>
		<header>
			<a><img src="img/LOGO1.png"></a>
		</header>
		<div id="content" >
			<div id="detail">
				<!--书名-->
				<h1 id = "bookname"></h1>
				<!--租金-->
				<h2 >￥<span id = "price"></span>/d</h2>
				<!--这里放详细介绍-->
				<article id = "description">
					
				</article>
				<a onclick = "rent()">
					<p>租      书</p>
				</a>
			</div>
			<div id="bookPicture" class="clearfix">
				<!--图片url-->
				<img id = "img1" src=""/>
				<img id = "img2" src=""/>
			</div>
		</div>
		<a href="index.html" id="back"><p>返 回 首 页</p></a>
    </body>
    
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
		window.onload = function() {
		document.getElementById("description").innerHTML = description;
		document.getElementById("bookname").innerHTML = bookName;
		document.getElementById("price").innerHTML = price;
		
	}
	
		function rent(){
			var url = location.search;
			var id =  url.split("=")[1];
			window.location.href="order.php?bookid="+id+"&price=" + document.getElementById("price").innerHTML;
		
		}
		
	</script>
</html>
