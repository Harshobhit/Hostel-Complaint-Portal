<?php
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
$compid=$_REQUEST['compid'];
$regno=$_REQUEST['regno'];
$s="SELECT * FROM main";
echo $compid;
echo $regno;
$res=@mysql_query($s) or die('sdsd');
$flag=0;
while($row=@mysql_fetch_array($res))
{	
	if($row['regno']==$regno and $row['complaintid']==$compid)
	{
		echo 'sdsd';
		$flag=1;
	}

}
echo $flag;
if($flag==1)
{
$s="SELECT employeeid FROM main WHERE complaintid='$compid' and regno='$regno'";
echo $s;
$r=@mysql_query($s) or die('sds');
while($row=@mysql_fetch_array($r))
{
	$eid=$row['employeeid'];
	echo $eid;
	
}
$sql="UPDATE employee SET points=points+10 WHERE emp_id='$eid' and status<>'Done'";
	@mysql_query($sql);
	$query="UPDATE main SET status='Done' WHERE complaintid='$compid'";
	@mysql_query($query);
	$today=date('Y-m-d');
	echo $today;
	$q="UPDATE main SET date_address='$today' WHERE complaintid='$compid'";
	@mysql_query($q);
}
if($flag==0)
{
	echo "<script>window.alert('Wrong details entered');</script>";
}
echo "<script>window.location='history_employee.php';</script>";
?>