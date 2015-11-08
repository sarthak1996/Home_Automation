function setSec(s1){
    var checkbox = document.getElementById("securityBtn");
    if(s1==1)
		checkbox.checked=1;
    else 
		checkbox.checked=0;
}
function updateSec(user){
    var site="http://localhost/EHDLOGIN_rpi/updatesecurity.php?userid="+user;     
    
    window.open(site,"_self")
}