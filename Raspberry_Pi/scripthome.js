/* Change all states to false*/
function changeAllStatesToFalse(){
    var globalCheckBox = 0;
    var checkbox1 = document.getElementById("button1");
    checkbox1.checked=globalCheckBox;
    var checkbox2 = document.getElementById("button2");
    checkbox2.checked=globalCheckBox;
    var checkbox3 = document.getElementById("button3");
    checkbox3.checked=globalCheckBox;
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


    var site="http://localhost/EHDLOGIN_rpi/updatestate.php?q=0";     
    
    window.open(site,"_self")



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
    alert(alertString);
}

/* Set the states when opoening the home or the member page*/
function setStates(s1,s2,s3){
   alert("dsfsdfs");
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

}

/* Update the table whenever a checkbox is clicked*/
function updateTable(app_n){
    
    if(app_n==1)
    alert("yello");
    if(app_n==2)
        alert("hello");
    var site="http://localhost/EHDLOGIN_rpi/updatestate.php?q="+app_n;     
    
    window.open(site,"_self")
}
