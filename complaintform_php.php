<?php
session_start();
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
$user=$_SESSION['reg'];
$s="SELECT regno FROM main";
$flag=1;
$res=@mysql_query($s);
while($row=@mysql_fetch_array($res))
{
	if($row['regno']==$user)
	{
		$flag++;
	}	
}
if($flag<=3)
{
	$type=$_REQUEST['area'];
	$ctype=$_REQUEST['complainttype'];
	$info=$_REQUEST['details'];
	if($ctype==1)
			{	
				$count="SELECT COUNT(*) FROM complaint WHERE type='Electricity'";
				$result=@mysql_query($count);
				while($row=@mysql_fetch_array($result))
				{
					$c=$row[0];
				}	
				$c+=1;
				$txt=(string)$c;
				$token="E".$txt;
				$ctype="Electricity";
			}
	if($ctype==2)
			{
				$count="SELECT COUNT(*) FROM complaint WHERE type='AC' ";
				$result=@mysql_query($count);
				while($row=@mysql_fetch_array($result))
				{
				$c=$row[0];
				}
				$c+=1;
				$txt=(string)$c;
				$token="AC".$txt;
				$ctype="AC";
			}
	if($ctype==3)
			{
				$count="SELECT COUNT(*) FROM complaint WHERE type='Washroom'";
				$result=@mysql_query($count);
				while($row=@mysql_fetch_array($result))
				{
					$c=$row[0];
				}
				$c+=1;
				$txt=(string)$c;
				$token="W".$txt;
				$ctype="Washroom";
			}
	if($ctype==4)
			{
				$count="SELECT COUNT(*) FROM complaint WHERE type='WaterCooler' ";
				$result=@mysql_query($count);
				while($row=@mysql_fetch_array($result))
				{
					$c=$row[0];
				}
				$c+=1;
				$txt=(string)$c;
				$token="WC".$txt;
				$ctype="WaterCooler";
			}
	if($ctype==5)
			{
				$count="SELECT COUNT(*) FROM complaint WHERE type='Repair' ";
				$result=@mysql_query($count);
				while($row=@mysql_fetch_array($result))
				{
						$c=$row[0];
				}
				$c+=1;
				$txt=(string)$c;
				$token="R".$txt;
				$ctype="Repair";
			}
	if($ctype==6)
			{
				$count="SELECT COUNT(*) FROM complaint WHERE type='Cleaning'";
				$result=@mysql_query($count);	
				while($row=@mysql_fetch_array($result))
				{
					$c=$row[0];
				}
				$c+=1;
				$txt=(string)$c;
				$token="C".$txt;
				$ctype="Cleaning";
			}
echo $token;
$d=date("Y-m-d") ;
$sql="INSERT INTO complaint VALUES('$type','$token','$ctype','$info')";
@mysql_query($sql);

echo "Username:".$user;
$x="SELECT block from student where regno='$user'";
$r=@mysql_query($x);
while($row=@mysql_fetch_array($r))
{
		$block=$row['block'];
}
echo $block;
echo $ctype;
$w="SELECT employeeid from main where employeeid in(SELECT emp_id from employee where block='$block' and category='$ctype') group by employeeid order by count(complaintid)";
echo $w;
$r=@mysql_query($w) or die('not');
$row=@mysql_fetch_array($r);
{
	$m=$row['employeeid'];
	echo 'sdsd';
	echo $m;
}
$query="INSERT INTO main(regno,complaintid,employeeid,status,date_complaint) VALUES('$user','$token','$m','Notdone','$d')";
@mysql_query($query);
echo "<script>window.alert('Complaint successfully registered')";
}
else
{
	echo "<script>window.alert('You have already three pending requests, cannot enter more')</script>";
}
echo "<script>window.location='complaint.php'</script>";
?>


