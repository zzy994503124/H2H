/**
 * Created by msi on 2016/5/3.
 */
$(function() {
    $(".addcar").click(function(event){
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
            var oldNum = $("#cartNum").text();
            var currentNum;
            if(oldNum === 0){
                currentNum = 1;
            }else{
                currentNum = parseInt(oldNum) + 1;
            }
            if(currentNum > 0){
                $("#cartNum").removeClass("noBook");
            }
            $("#cartNum").text(currentNum);
        }

    });

    $("#addCar").click(function(){
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
        }
        else{
            //var bookName = $("#bookName").text();
            var rentDay = 0;
            var rentPrice = $("#price").text();
            var $li = $("<li></li>");
            var $p = $("<p></p>");
            $p.text(bookName);
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
        }

    });
});
