<html>
	<head>			
		<link rel="stylesheet" href="css/order.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/common.css"/>
        <link rel="stylesheet" href="css/jquery.datetimepicker.css"/>       
		<meta charset="utf-8"/>
	</head>
	
	
<body>
	<header>
		<a href="/"><img src="img/LOGO1.png"></a>
	</header>
	<div class="content">		
			<div class="summary">
				<div class="title">
					<h1>结 算</h1>
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
							<td><span id = "price">2.00</span></td>
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
                <br/>
                <!--
                
                <div class="datetimepicker"  data-date="16-04-2016" data-date-format="dd-mm-yyyy">
                    <label for="startDate">租借时间</label>
                    <input id="startDate" size="16" type="text" class="form-control">
                    <br />
                    <p class="hint">aaaaa</p>
                </div>
                
                
                <div class="datetimepicker"  data-date="16-04-2016" data-date-format="dd-mm-yyyy">
                    <label for="endDate">归还时间</label>
                    <input id="endDate" size="16" type="text" class="form-control" readonly="true">
                    <br />
                    <p class="hint">aaaaa</p>
                </div>
                -->
			</div>
			<form id="cotactInfo">
				<fieldset class="text-center">
					<h2>联系信息</h2> 
                    <div class="nameContainer">
                        <input class="form-control" placeholder="姓名" type="text" id="name"/>
                    </div>
					<div class="phoneNumContainer">
                        <input class="form-control" placeholder="手机号码" type="text" id="phoneNumber"/><br />
                    </div>
					<div class="addressContainer">
                        <input class="form-control" placeholder="地址" type="text" id="address"/><br />
                    </div>
					
                    <p class="hint">aaaaa</p>
					<button type="button" class="orderBtn" data-toggle="modal" data-target="" id="submit" onclick="">提  交</button>					
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
 	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.datetimepicker.js"></script>
   
    <script type="text/javascript">
        window.onload = function(){
            var url = location.search;
            var parameters =  url.split("=")[1];
            var id = parameters.split("&price")[0];
            var price = url.split("=")[2];
            
            //alert(number);
            var sumPrice = price*number;
            document.getElementById("price").innerHTML = sumPrice;
            document.getElementById("sumPrice").innerHTML = sumPrice;
            mentById("totalPrices").innerHTML = sumPrice;
        }
        function gotoHome(){
            window.location.href="/";
       }
        $('#startDate').datetimepicker();
        $('#number').change(function(){
            var rentDayStr = $('#number').val();
            var priceStr = $('#price').html();
            var rentDayInt = parseInt(rentDayStr);
            var priceFloat = parseFloat(priceStr);
            $('#sumPrice').html(parseFloat(rentDayInt * priceFloat).toFixed(2));
            $('#totalPrices').html(parseFloat(rentDayInt * priceFloat).toFixed(2));
        });
        function isNull(str){
            if ( str == "" ) return true;
            var regu = "^[ ]+$";
            var re = new RegExp(regu);
            return re.test(str);
        }
        $('#submit').click(function(){
            var rentDay = $('#number').val();
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            var name = $('#name').val();
            var address = $('#address').val();
            var phoneNum = $('#phoneNumber').val();
            
            var success = true;
            if(parseInt(rentDay)<=0){
                $('#number').css("border","2px solid crimson");                
                success = false;
            }else{
                $('#number').css("border","1px solid darkturquoise");
            }
            //j检查是否为空
            if(isNull(name)){
                $('.nameContainer').addClass("has-error");
                $('#name').css("border","2px solid crimson");                
                success = false;
            }
            else{
                $('.nameContainer').addClass("has-success").removeClass("has-error");
                $('#name').css("border","2px solid darkturquoise");
            }
            if(isNull(address)){
                $('.addressContainer').addClass("has-error");
                $('#address').css("border","2px solid crimson");
                success = false;
            }else{
                $('.addressContainer').addClass("has-success").removeClass("has-error");
                $('#address').css("border","1px solid darkturquoise");
            }
            if(isNull(phoneNum)){
                $('.phoneNumContainer').addClass("has-error"); 
                $('#phoneNumber').css("border","2px solid crimson");
                success =false;
            }else if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(phoneNum))){
                $('.phoneNumContainer').addClass("has-error"); 
                $('#cotactInfo .hint').html("* 手机号码格式不对！");                
                $('#cotactInfo .hint').css("visibility","visible");
                success = false;                
            }else{
                $('.phoneNumContainer').addClass("has-success").removeClass("has-error");
                $('#cotactInfo .hint').html("");                
                $('#cotactInfo .hint').css("visibility","hideen");
                $('#phoneNumber').css("border","1px solid darkturquoise");
            }           
            if(success){
                $('#submit').attr("data-target","#myModal");
            }
        });
	</script>
</html>