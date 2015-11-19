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
    updateTable(0);
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
    updateTable(5);
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

function updateTable(app_n){

	site="/EHDLOGIN_rpi/updatestate.php?app_n="+app_n;
	window.open(site,"_self");

}