<?php
session_start();?>

<html>
<head>
 <title>Employee Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="External/bootstrap.css">
		<script src="External/jquery2.js"></script>
		<script src="External/bootstrap.js"></script>  
		<link rel="stylesheet" href="External/material.css">
		<link rel="stylesheet" href="External/materialize.css">
		<script type="text/javascript" src="External/jquery.js"></script>           
		<script src="External/materialize.js"></script> 
        <style>
        td{text-align: left; padding: 5px;}
        .right{text-align: right; padding: 5px;}
        tr:nth-child(even) {background-color: #f2f2f2}
        </style>
        <script>
         $(document).ready(function() {
         $("select").material_select();
      });</script>
</head>
<body>
	<div class="navbar-fixed">
	<nav>
	  <div class="nav-wrapper">
	    <a href="admin_home.php" class="brand-logo" margin="10px">Admin Page</a>
	    <ul class="right hide-on-med-and-down">
	      <li><a href="admin_home.php"><i class="material-icons left">person_pin</i>Home</a></li>
	      <li><a href="employeedetails.php"><i class="material-icons left">list</i>Employee Details</a></li>
	      <li><a href="admin.php"><i class="material-icons left">error_outline</i>Unsolved Complaints</a></li>
	    </ul>
	  </div>
	</nav>
	</div>
	<div style="padding:10px">
		<h3>Employee details</h1>
	<?php
	$dbc=@mysql_connect("localhost","root","shobhit");
	@mysql_select_db('database1',$dbc);
	$s="SELECT * from employee";
	$r=@mysql_query($s);
	while($row=@mysql_fetch_array($r))
	{
		echo "<table style = 'border: 1px solid black; width: 50%;'>";
		echo "<tr>";
		echo "<td>Employee name:</td><td class='right'>".$row['emp_name']."</td></tr><tr>";
		echo "<td>Employee Id:</td><td class='right'>".$row['emp_id']."</td></tr><tr>";
		echo "<td>Block:</td><td class='right'>".$row['block']."</td></tr><tr>";
		echo "<td>Category:</td><td class='right'>".$row['category']."</td></tr><tr>";
		echo "<td>Points:</td><td class='right'>".$row['points']."</td>";
		echo "</tr>";
		echo "</table><br/>";
	}
	?>
	</div>
</body>
</html>
