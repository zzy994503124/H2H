<html>
	<head>			
		<link rel="stylesheet" href="css/order.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<meta charset="utf-8"/>

	</head>
	
	
<body>
	<header>
		<a href="#"><img src="img/LOGO1.png"></a>
	</header>
	<div class="content">		
			<div class="summary">
				<div class="title">
					<h1>支  付</h1>
					<a href="info.html">返  回</a>		
				</div>									
				<table class="table" id="orderTable">
					<h2>订单详情</h2>
					<thead>
						<tr>
							<th>书目</th>
							<th>租金(￥/天)</th>
							<th>天数</th>
							<th>小计(￥)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Data Structure</td>
							<td><span id = "price"></span></td>
							<td><input id = "number" type="text" value="1"/></td>
							<td><span id = "sumPrice"></span></td>
						</tr>
						<tr>
							<td colspan="3">总计</td>
							<td><span id = "totalPrices">2.00</span></td>
						</tr>
					</tbody>
				</table>	
				<textarea id="comment" placeholder="备注"></textarea>
			</div>
			<form id="cotactInfo">
				<fieldset class="text-center">
					<h2>联系信息</h2> 
					<input class="form-control" placeholder="姓名" type="text" id="name"/>
					<input class="form-control" placeholder="手机号码" type="text" id="phoneNumber"/><br />
					<input class="form-control" placeholder="地址" type="text" id="address"/><br />
					<button type="button" class="orderBtn" data-toggle="modal" data-target="#myModal" id="submit" onclick="">提  交</button>					
					<button  class="orderBtn" id="cancel">取 消</button>
				</fieldset>
			</form>		
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">交易成功</h4>
				      </div>
				      <div class="modal-body">
				        订单号：123123123
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="gotoHome()">OK</button>		        
				      </div>
				    </div>
				</div>
			</div>

	</div>
</body>
 	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
     <script type="text/javascript">
		window.onload = function(){
			var url = location.search;
			var parameters =  url.split("=")[1];
			var id = parameters.split("&price")[0];
			var price = url.split("=")[2];
		
			var number = document.getElementById("number").value;
			//alert(number);
			var sumPrice = price*number;
			document.getElementById("price").innerHTML = sumPrice;
			document.getElementById("sumPrice").innerHTML = sumPrice;
			document.getElementById("totalPrices").innerHTML = sumPrice;
		}
		function gotoHome(){
			window.location.href="www.h2h.com";
		}
	</script>
</html>