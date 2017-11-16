<?php
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
echo '
<html>
<head>
 <title>User Page</title>
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
        <li><a href="admin_home.php"><i class="material-icons left">person_pin</i>Home</a></li>
        <li><a href="employeedetails.php"><i class="material-icons left">list</i>Employee Details</a></li>
        <li><a href="admin.php"><i class="material-icons left">error_outline</i>Unsolved Complaints</a></li>
      </ul>
    </div>
  </nav>
  </div>';
$s="SELECT * from main where adminstatus='Notdone' order by date_complaint asc";
$r=@mysql_query($s);
$flag=0;
echo '<div class="conatiner">
<div class ="row">
<div class="col l12"><br/>
<table class="striped ">
<tr><th>Employee Id </th><th>Employee Name</th><th>Complaint id</th><th>Placing date</th><th> </th></tr>';	
while($row=@mysql_fetch_array($r))
{
	$r2=$row['employeeid'];
	$l="SELECT emp_name from employee where emp_id='$r2'";
	$l2=@mysql_query($l);

	$row1=@mysql_fetch_array($l2);
	
	echo '<tr><td>'.$row['employeeid'].' </td><td>'.$row1['emp_name'].'</td><td>'.$row['complaintid'].'</td><td>'.$row['date_complaint'].'</td><td>';
	$flag++;
	echo "<form action='' method='post'>
	<input type='submit' name=$flag value='done'></td></tr>";
}
echo "</table></div></div></div></body></html>";	
for($i=1;$i<=$flag;++$i)
{
	if(isset($_POST[$i]))
	{
		$flag=0;
		$sq="SELECT * from main where adminstatus='Notdone'";
		$rq=@mysql_query($sq);	
		while($row=@mysql_fetch_array($rq))
		{
		$flag++;
		if($flag==$i)
		{
		$x=$row['complaintid'];
		$today=date('Y-m-d');
		$sw="UPDATE main set adminstatus='done' where complaintid='$x'";
		@mysql_query($sw) or die('sds');
		$se="UPDATE main set status='done' where complaintid='$x'";
		@mysql_query($se) or die('sds1');	
		$sr="UPDATE main set date_address='$today' where complaintid='$x'";
		@mysql_query($sr) or die('sds2');
		}
		}
	}
}
?>