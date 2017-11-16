<?php
session_start();
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
echo '
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
<body>
 <div class="navbar-fixed">
<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo" margin="10px">Admin Page</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="employee.html"><i class="material-icons left">person_pin</i>New Employee!</a></li>
        <li><a href="employeedetails.php"><i class="material-icons left">list</i>Employee Details</a></li>
        <li><a href="admin.php"><i class="material-icons left">error_outline</i>Unsolved Complaints</a></li>
      </ul>
    </div>
  </nav>
  </div>
 <div class="row">
 <div class="col l10"><p></p></div>
 <div class="col l2"><br/>
 <a class="waves-effect waves-light btn yellow" href = "logout.php"><i class="material-icons left">power_settings_new</i>logout</a><br/>
</div>
</div>
<div class="container">
<div class="row">
<div class="col l6">
<h4>Employee Summary</h4>
<table><tr><th>Employee Id</th><th>Total jobs</th><th>Completed</th><th> Incomplete</th></tr>';

$sql="SELECT count(*),employeeid from main where regno<>'15bce0000' group by employeeid";
$r=@mysql_query($sql);
while($row=@mysql_fetch_array($r))
{
	echo "<tr><td>".$row['employeeid']."</td><td>".$row[0]."</td>";
	$x=$row['employeeid'];
	$sq="SELECT count(*) from main where status='done' and employeeid='$x' and regno<>'15bce0000'";
	$res=@mysql_query($sq);
	while($t=@mysql_fetch_array($res))
	{
		echo "<td>".$t[0]."</td>";
	}	
	$s="SELECT count(*) from main where status='Notdone' and employeeid='$x' and regno<>'15bce0000'";
	$re=@mysql_query($s);
	while($e=@mysql_fetch_array($re))
	{
		echo "<td>"."$e[0]"."</td></tr>";
	}
}
echo "</table></div><div class='col l6'><h4>Leader Board</h4>
	<table><tr style='background-color:#ff9966;color:#ffffff'><th>Pos</th><th>Name</th><th>Id</th><th>Points</th></tr>";
$q="SELECT *from employee order by points desc";
$y=@mysql_query($q);
$i=0;
while($h=@mysql_fetch_array($y))
{	$i=$i+1;
	if($i==1)
		{echo "<tr style='background-color:#ffffb3;'>";}
	else if ($i==2)
		{echo "<tr style='background-color:#ebebe0;'>";}
	else if ($i==3)
		{echo "<tr style='background-color:	#ffd9b3;'>";}
	else
		{echo "<tr>";}
	echo "<td>".$i."</td>";
	echo "<td>".$h['emp_name']."</td>";
	echo "<td>".$h['emp_id']."</td>";
	echo "<td>".$h['points']."</td></tr>";
}
echo'</table></div></div></div></body></html>';
?>
