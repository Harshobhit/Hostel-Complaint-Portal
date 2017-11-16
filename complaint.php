<?php
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
   <div class="nav-wrapper" style="background-color:blue ;height:100px;padding:0px;vertical-align:middle"><h1 align="center" style="color:white;text-decoration:strong">Student Center</h1> 
   </div>
   <div align = "right">
    <a class="waves-effect waves-light btn red" href = "logout.php"><i class="material-icons left">power_settings_new</i>logout</a><br/>
   </div>
   <div class="container">
      <div class="row">
      <div class="col l7"><p>';
      if($flag==0)
  {echo 'No active and past complaints';}
else
{echo ' <ul class="collapsible" data-collapsible="accordion">';
  $sql="SELECT regno,complaintid FROM main WHERE regno='$user'";
  $res=@mysql_query($sql);
  while($r=@mysql_fetch_array($res))
  {
    $s=$r['complaintid'];
    $sq="SELECT room,block from student  where regno='$user'";
    $q="SELECT behalf,complaintid,type,description FROM  complaint WHERE complaintid='$s'";
    $m=@mysql_query($sq);
    $d=@mysql_fetch_array($m);
    $t=@mysql_query($q);
    $y=@mysql_fetch_array($t);
      echo"  <li>
      <div class='collapsible-header'><div class='col s6'><i class='material-icons'>label</i>Token number: ".$y['complaintid']."</div><div class='col s6'><i class='material-icons'>place</i>For: ".$y['behalf']."</div></div>";
      echo "<div class='collapsible-body'><p>Type:".$y['type']."<br>Description:".$y['description']."</p></div>";
      echo '</li>';
  }
  echo '</ul>';
}
echo '</p></div>
      <div class="col l5">
        <fieldset class="form-group">
   			 <legend>Book A Complaint</legend>
         <form class="col s12" action="complaintform_php.php">
         	<div class="row">
               <div class="input-field col s12">
                   <p>Affected Area:<br>
                     <input id="room" type="radio" name="area" value="room" checked>
                     <label for="room">Room</label>
                     <input id="floor" type="radio" name="area" value="floor">
                     <label for="floor">Floor</label>
                  </p>
               </div>
            </div> 
           <div class="row">
               <label>Complaint Type:</label>
               <select name="complainttype" id="type">
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
                  <label for="Complaint">Complaint Details</label>
               </div>
            </div>			
            <button class="btn waves-effect waves-light" type="submit" onclick="return validate()" name="action">Submit
            <i class="material-icons right">send</i>
            </button>  
         </form> 
         </fieldset>  
        </div>
      </div>
    </div>
    <script>
    function validate(){
      var type = parseInt(document.getElementById("type").value);
      if(!(type > 0 && type < 7)){
        window.alert("Please select one of the complaint types");
        return false;
      }
      if(document.getElementById("complaint").value == ""){
        window.alert("Please fill the complaint details");
        return false;
      }
    }
    </script>
   </body>   
</html>
';
$counter_name = "counter.txt";
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f); 

echo "You are visitor number $counterVal to this site";
?>
