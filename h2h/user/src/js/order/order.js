/**
 * Created by msi on 2016/5/3.
 */
function gotoHome(){
    window.location.href="/";
}
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
        $('#number').css("border","1px solid crimson");
        success = false;
    }else{
        $('#number').css("border","1px solid darkturquoise");
    }
    //j检查是否为空
    if(isNull(name)){
        $('.nameContainer').addClass("has-error");
        $('#name').css("border","1px solid crimson");
        success = false;
    }
    else{
        $('.nameContainer').addClass("has-success").removeClass("has-error");
        $('#name').css("border","1px solid darkturquoise");
    }
    if(isNull(address)){
        $('.addressContainer').addClass("has-error");
        $('#address').css("border","1px solid crimson");
        success = false;
    }else{
        $('.addressContainer').addClass("has-success").removeClass("has-error");
        $('#address').css("border","1px solid darkturquoise");
    }
    if(isNull(phoneNum)){
        $('.phoneNumContainer').addClass("has-error");
        $('#phoneNumber').css("border","1px solid crimson");
        success =false;
    }else if(!(/^(13[0-9]{9})|(15[89][0-9]{8})$/.test(phoneNum))){
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