var expires = new Date();
expires.setTime(expires.getTime() + 2592000000);
function getHTTPRequest()
{
    var req = false;
    try {
        req = new XMLHttpRequest();
    } catch(err) {
        try {
            req = new ActiveXObject("MsXML2.XMLHTTP");
        } catch(err) {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(err) {
                req = false;
            }
        }
    }
    return req;
}
function set_param(val)
{
    document.cookie="set_games="+val+"; path=/; expires="+expires;
    window.location.reload(true);
    return true;
} 
function followersval(doc){
 var name = doc.forms['followersform'].name.value;
 var email = doc.forms['followersform'].email.value;
 if(name == '') {
   alert('Укажите пожалуйста как вас зовут!');
   doc.forms['followersform'].name.focus();   
   return false;	 
 }   
 if(email == '') {
   alert('Укажите пожалуйста ваш E-mail!');	
   doc.forms['followersform'].email.focus();     
   return false;	 
 }
 var myReq = getHTTPRequest();
 var params = "name="+name+"&email="+email;
    function setstate(){
       if((myReq.readyState == 4)&&(myReq.status == 200)) {
           var resvalue = myReq.responseText;
           if(resvalue == 100){
			 alert('Чтобы подтвердить подписку, пожалуйста посетите ваш E-mail, и перейдите по ссылке которую мы вам отправили!');  
		   }else{
			 alert(resvalue);   
		   }      
       }
    } 
    myReq.open("POST", "/module/val-followers.php", true);
    myReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myReq.setRequestHeader("Content-lenght", params.length);
    myReq.setRequestHeader("Connection", "close");
    myReq.onreadystatechange = setstate;
    myReq.send(params);
}
/*
$(function(){
  $('#gs_banners_top').jrumble();
     var logoStart = function(){
  $('#gs_banners_top').trigger('startRumble');
	 setTimeout(logoStop, 300);
  };
     var logoStop = function(){
  $('#gs_banners_top').trigger('stopRumble');
	 setTimeout(logoStart, 8000);
  };
logoStop();
});
*/
jQuery( document ).ready(function() {
	jQuery('#scrollup img').mouseover( function(){
		jQuery( this ).animate({opacity: 0.65},100);
	}).mouseout( function(){
		jQuery( this ).animate({opacity: 1},100);
	}).click( function(){
		window.scroll(0 ,0); 
		return false;
	});
	jQuery(window).scroll(function(){
		if ( jQuery(document).scrollTop() > 0 ) {
			jQuery('#scrollup').fadeIn('fast');
		} else {
			jQuery('#scrollup').fadeOut('fast');
		}
	});
});
		