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
