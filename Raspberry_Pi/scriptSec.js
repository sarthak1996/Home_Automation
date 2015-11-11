function setSec(s1){
    var checkbox = document.getElementById("securityBtn");
    if(s1==1)
		checkbox.checked=1;
    else 
		checkbox.checked=0;
}
$(document).on('click','#securityBtn',function(){

$.post('updatestate.php', function(data){
});

});

$(document).on('click','#allOff',function(){

	$.post('updatestate.php',{app_n:0}, function(data){
	});

});

$(document).on('click','#allOn',function(){

	$.post('updatestate.php',{app_n:5}, function(data){
	});

});