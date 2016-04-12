



function AddtoCart(sth){
    var d=new Date();
    d.setTime(d.getTime()+(60*60*1000));
    var expires="expires="+d.toGMTString();  
    var cookie=document.cookie;
    var goods="goods"+sth+"="+sth;
    if(cookie=="")
    document.cookie="1/"+goods+";"+expires;
    else{
        if(cookie.indexOf(goods)==-1)
            document.cookie=("1/"+goods+";"+cookie);
        else{
            var number=cookie.substring(cookie.indexOf(goods)-2,cookie.indexOf(goods)-1);
            number=parseInt(number);
            var goodsBefore=number+"/"+goods;
            var next=number+1;
            var goodsAfter=next+"/"+goods;
            deleteCookie(goodsBefore);
            var cookies=document.cookie;
            document.cookie=goodsAfter+";"+cookies;
        }
    }
    window.location="order.html";
}


function deleteCookie(goodsBefore){
    var mydate=new Date();  
    mydate.setDate(mydate.getDate()-1000);  
    str=document.cookie;  
    str=goodsBefore+";expires="+mydate.toGMTString();  
    document.cookie=str; 
}


function moreDetail(a,b){
   if(a.innerHTML=="More Details》》》》"){
                a.innerHTML="Smaller《《《《";
       document.getElementById(b).hidden=false;
   }else{
       a.innerHTML="More Details》》》》";
       document.getElementById(b).hidden=true;
   }
}


