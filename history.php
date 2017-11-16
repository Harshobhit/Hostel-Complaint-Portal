<?php
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
   <body class="container">   
      <div class="row">
      <div class="col l7"><p></p></div>
      <div class="col l5">
        <fieldset class="form-group">
   			 <legend>Book A Complaint</legend>
         <form class="col s12" action="complaintform_php.php">
         	<div class="row">
               <div class="input-field col s12">
                   <p>Affected Area:<br>
                     <input id="room" type="radio" name="area" value="room" checked>
                     <label for="room">Room</label>
                     <input id="floor" type="radio" name="area" value="floor" checked>
                     <label for="floor">Floor</label>
                  </p>
               </div>
            </div> 
           <div class="row">
               <label>Complaint Type:</label>
               <select name="complainttype">
                  <option value="" disabled selected>Complaint Type</option>
                  <option value="1">Electricity</option>
                  <option value="2">AC</option>
                  <option value="3">Washroom</option>
                  <option value="4">Water Cooler</option>
                  <option value="5">Repair</option>
                  <option value="6">Cleaning</option>
               </select>               
            </div>  
            <div class="row">
               <div class="input-field col s12">
			      <i class="material-icons prefix">mode_edit</i>
                  <textarea id="complaint" class="materialize-textarea" name="details"></textarea>
                  <label for="Complaint">Compliant Details</label>
               </div>
            </div>			
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
            </button>  
                     
         </form> 
         </fieldset>  
        </div>    
      </div>
   </body>   
</html>
';
session_start();
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
$user=$_SESSION['reg'];
$query="SELECT  COUNT(*) from  main where regno='$user'";
$res=@mysql_query($query);
$flag1=0;
while($row=@mysql_fetch_array($res))
{
	$flag=$row[0];
}
if($flag==0)
	echo 'No active and past complaints';
else
{
	$sql="SELECT regno,complaintid FROM main WHERE regno='$user'";
	$res=@mysql_query($sql);
	while($r=@mysql_fetch_array($res))
	{
		$s=$r['complaintid'];
		$sq="SELECT room,block from student  where regno='$user'";
		$q="SELECT behalf,complaintid,type,description FROM  complaint WHERE complaintid='$s'";
		$m=@mysql_query($sq);
		while($d=@mysql_fetch_array($m))
		{	
			echo $d['room'];
			echo "<br>";
			echo $d['block'];
			echo "<br>";
			
		}
		$t=@mysql_query($q);
		while($y=@mysql_fetch_array($t))
		{
				
			echo $y['behalf'];
			echo "<br>";	
			echo $y['complaintid'];
			echo "<br>";
			echo $y['type'];
			echo "<br>";
			echo $y['description'];
			echo "<br>";
		
		}
	}
}

?>