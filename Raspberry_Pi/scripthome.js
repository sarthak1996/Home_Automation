/* Change all states to false*/
function changeAllStatesToFalse(){
    var globalCheckBox = 0;
    var checkbox1 = document.getElementById("button1");
    checkbox1.checked=globalCheckBox;
    var checkbox2 = document.getElementById("button2");
    checkbox2.checked=globalCheckBox;
    var checkbox3 = document.getElementById("button3");
    checkbox3.checked=globalCheckBox;
    var checkbox4 = document.getElementById("button4");
    checkbox4.checked=globalCheckBox;
}

/* Change all states to true*/
function changeAllStatesToTrue(){
    var globalCheckBox = 1;
    var checkbox1 = document.getElementById("button1");
    checkbox1.checked=globalCheckBox;
    var checkbox2 = document.getElementById("button2");
    checkbox2.checked=globalCheckBox;
    var checkbox3 = document.getElementById("button3");
    checkbox3.checked=globalCheckBox;
    var checkbox4 = document.getElementById("button4");
    checkbox4.checked=globalCheckBox;
}

/* Return an alert of all the states*/
function getStates(){
	
    var checkbox1 = document.getElementById("button1");
    var alertString="";
    if(checkbox1.checked){
    	alertString="Appliance 1 is ON";
    }else{
    	alertString="Appliance 1 is OFF";
    }
    var checkbox2 = document.getElementById("button2");
    
    if(checkbox2.checked){
    	alertString+="\nAppliance 2 is ON";
    }else{
    	alertString+="\nAppliance 2 is OFF";
    }
    var checkbox3 = document.getElementById("button3");

    if(checkbox3.checked){
    	alertString+="\nAppliance 3 is ON";
    }else{
    	alertString+="\nAppliance 3 is OFF";
    }
    var checkbox4 = document.getElementById("button4");

    if(checkbox4.checked){
    	alertString+="\nAppliance 4 is ON";
    }else{
    	alertString+="\nAppliance 4 is OFF";
    }
    alert(alertString);
}

/* Set the states when opoening the home or the member page*/
function setStates(s1,s2,s3,s4){
    var checkbox1 = document.getElementById("button1");
    if(s1==1)
		checkbox1.checked=1;
	else 
		checkbox1.checked=0;
    var checkbox2 = document.getElementById("button2");
    if(s2==1)
		checkbox2.checked=1;
	else 
		checkbox2.checked=0;
    var checkbox3 = document.getElementById("button3");
    if(s3==1)
		checkbox3.checked=1;
	else 
		checkbox3.checked=0;

    var checkbox4 = document.getElementById("button4");
    if(s4==1)
		checkbox4.checked=1;
	else 
		checkbox4.checked=0;

}



$(document).on('click','#button1',function(){

$.post('updatestate2.php',{app_n:1}, function(data){
});

});



$(document).on('click','#button2',function(){

$.post('updatestate2.php',{app_n:2}, function(data){
});

});



$(document).on('click','#button3',function(){

$.post('updatestate2.php',{app_n:3}, function(data){
});

});



$(document).on('click','#button4',function(){

$.post('updatestate2.php',{app_n:4}, function(data){
});

});


$(document).on('click','#allOff',function(){

	$.post('updatestate2.php',{app_n:0}, function(data){
	changeAllStatesToFalse();
	});

});

$(document).on('click','#allOn',function(){

	$.post('updatestate2.php',{app_n:5}, function(data){
		changeAllStatesToTrue();
	});

});