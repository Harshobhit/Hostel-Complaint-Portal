<?php
session_start();
echo "<style>/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}</style>";
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
 $euser=$_SESSION['euname'];
$query="SELECT  COUNT(*) from  main where employeeid='$euser'";
$res=@mysql_query($query);
$flag1=0;
while($row=@mysql_fetch_array($res))
{
	$flag=$row[0];
}
echo '<!DOCTYPE html>
<html>
   <head>
      <title>User Page</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">    
	  <link rel="stylesheet" href="External/bootstrap.css">
		<script src="External/jquery2.js"></script>
		<script src="External/bootstrap.js"></script>  
		<link rel="stylesheet" href="External/material.css">
		<link rel="stylesheet" href="External/materialize.css">
		<script type="text/javascript" src="External/jquery.js"></script>           
		<script src="External/materialize.js"></script> 
        <script>
         $(document).ready(function() {
         $("select").material_select();
      });</script>
       
   </head>
   <body margin=0px>
   <div class="nav-wrapper" style="background-color:green ;height:100px;padding:0px;vertical-align:middle"><h1 align="center" style="color:white;text-decoration:strong">Employee Workspace</h1> 
   </div>
   <div align="right">
   <a class="waves-effect waves-light btn red" href = "logout.php"><i class="material-icons left">power_settings_new</i>logout</a>
   </div>
   <div class="container">
      <div class="row">
      <div class="col l9"><p>';
if($flag==0)
	echo 'No active and past complaints';

else
{	
 
  echo ' <ul class="collapsible" data-collapsible="accordion">';
	
  $sql="SELECT regno,complaintid FROM main WHERE employeeid='$euser' and regno<>'15bce0000' and status<>'Done'";
	$res=@mysql_query($sql);
	while($r=@mysql_fetch_array($res))
	{
		$s=$r['regno'];
    	$q=$r['complaintid'];
		$sq="SELECT room,block from student  where regno='$s'";
		$q="SELECT behalf,complaintid,type,description FROM  complaint WHERE complaintid='$q'";
		$m=@mysql_query($sq);
		$d=@mysql_fetch_array($m);
		$t=@mysql_query($q);
		$y=@mysql_fetch_array($t);
		 echo"  <li>
	      <div class='collapsible-header'><div class='col s3'><i class='material-icons'>label</i>Token no: ".$y['complaintid']."</div><div class='col s3'><i class='material-icons'>place</i>".$y['behalf']." No: ".$d['room']."</div><div class='col s3'>Block: ".$d['block']."</div></div>";
	      echo "<div class='collapsible-body'><p>Type:".$y['type']."<br>Description: ".$y['description']."</p></div>";
	      echo '</li>';
	    
  	}
  	echo '</ul></div>';
}
echo"
    <div class='col l3'>
    	<div class='row'>
   		<form method='post' action='history_employee_check.php'>
	   		<br>Enter Complaint ID:
			<input type='text' name='compid' placeholder='Enter Complaint ID'><br>
			Enter registration number:<input type='text' name='regno' placeholder='Enter reg. no.'>  <br>
			<button class='btn waves-effect waves-light' type='submit' name='action'>Submit
    		<i class='material-icons right'>send</i>
 			 </button>
    	</form>
    </div></div>";



?>