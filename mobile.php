<?php
//Check whether the submission is made
if(!isset($_POST["hidSubmit"])){

//Declarate the necessary variables
$intisd="";
$intccode="";
$intphone="";
DisplayForm();
}
else{

//Assign the entered values to variables for validation
$intisd=$_POST["txtisdcode"];
$intccode=$_POST["txtcitycode"];
$intphone=$_POST["txtphone"];

//The entered value is checked for proper format
if(substr_count($intisd,"+")>0){
if(strpos($intisd,"+")==0)
$intisd=substr($intisd,1,strlen($intisd));
}
$result=ereg("^[0-9]+$",$intisd,$trashed);
$result=ereg("^[0-9]+$",$intisd,$trashed);
if(!($result)){echo "Enter Valid ISDCODE";}
$result=ereg("^[0-9]+$",$intccode,$trashed);
if(!($result)){echo "Enter Valid CITY CODE";}
$result=ereg("^[0-9]+$",$intphone,$trashed);
if(!($result)){echo "Enter Valid Phone Number";}
DisplayForm();
}

//User-defined Function to display the form in case of Error
function DisplayForm(){
global $intisd,$intccode,$intphone;
?>