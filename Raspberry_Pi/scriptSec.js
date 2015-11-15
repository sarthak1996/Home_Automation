function setSec(s1){
    var checkbox = document.getElementById("securityBtn");
    if(s1==1)
		checkbox.checked=1;
    else 
		checkbox.checked=0;
}
function updateSecurity(){
	site="/EHDLOGIN_rpi/updatesecurity.php";
	window.open(site,"_self");
}