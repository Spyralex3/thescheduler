$(document).ready(function() {
	if(navigator.cookieEnabled!=true){
		$("span#cookie_msg").html('<p align="center" style="color:#ff0000;border:1px solid #ff0000;padding:4px;font-size:14px;">Ενεργοποιήστε πρώτα τα Cookies στον περιηγητή σας για να κάνετε Log in.</p>');
	} 
	$("div").on("click","a#cr", function(){
		alert("This site was created by Grigoris Mastoras and Alexandros Spyropoulos.");
	});
});