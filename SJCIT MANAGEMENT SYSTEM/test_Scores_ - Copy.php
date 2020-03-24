<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<title>Untitled Document</title>
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">View Scores</td>
       <!-- <td><a href="?tag=score_entry"><input type="button" title="Add new Scores" name="butAdd" value="Add New" id="button-search" /></a></td>
        <td><input type="text" name="txtsearch" title="Enter name for search " class="search" autocomplete="off"/></td>
       <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search product" /></td>-->
    </tr>
</table>
</form>
</div>
<br />

<div id="content-input">
	 <table border="1" width="1300px" align="center" cellpadding="3" class="mytable" cellspacing="0">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Students Name </th>
            <th rowspan="2">Sex </th>
            <th rowspan="2">Date of Birth </th>
            <th colspan="3">M&E </th>
            <th colspan="3">CN</th>
            <th colspan="3">DBMS</th>
            <th colspan="3">ATC</th>
            <th colspan="3">ST</th>
            <th colspan="3">Cloud</th>
            <th rowspan="2">Note</th>
            <th colspan="2" rowspan="2" >Operation</th>
        </tr>
        
        <tr>
        	<th>IA1</th>
            <th>IA2</th>
            <th> Total</th>
            
            <th>IA1</th>
            <th>IA2</th>
            <th> Total</th>
            
            <th>IA1</th>
            <th>IA2</th>
            <th> Total</th>
            
            <th>IA1</th>
            <th>IA2</th>
            <th> Total</th>
            
            <th>IA1</th>
            <th>IA1</th>
            <th> Total</th>
            
            <th>IA1</th>
            <th>IA2</th>
            <th> Total</th>
        </tr>
        
        <?php
		$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($conn,"SElECT * FROM sub_tbl WHERE f_name  like '%$key%' ");
else
        $sql_sel=mysqli_query($conn,"SELECT * FROM stu_score_tbl GROUP BY stu_id");
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
		$num=$row['stu_id'];
    $i++;
    $color=($i%2==0)?"lightblue":"white";
		
		$sql_stu=mysqli_query($conn,"SELECT * FROM stu_tbl WHERE stu_id=".$row['stu_id']);
		$fec_stu=mysqli_fetch_array($sql_stu);
		
		$sql_me=mysqli_query($conn,"SELECT * FROM stu_score_tbl WHERE stu_id=".$row['stu_id']." AND sub_id=7 AND faculties_id=4");
		$fec_me=mysqli_fetch_array($sql_me);
		
		$sql_cn=mysqli_query($conn,"SELECT * FROM stu_score_tbl WHERE stu_id=".$row['stu_id']." AND sub_id=8 AND faculties_id=4");
		$fec_cn=mysqli_fetch_array($sql_cn);
		
		
		$sql_db=mysqli_query($conn,"SELECT * FROM stu_score_tbl WHERE stu_id=".$row['stu_id']." AND sub_id=9 AND faculties_id=4");
		$fec_db=mysqli_fetch_array($sql_db);
		
		$sql_atc=mysqli_query($conn,"SELECT * FROM stu_score_tbl WHERE stu_id=".$row['stu_id']." AND sub_id=10 AND faculties_id=4");
		$fec_atc=mysqli_fetch_array($sql_atc);
		
		$sql_st=mysqli_query($conn,"SELECT * FROM stu_score_tbl WHERE stu_id=".$row['stu_id']." AND sub_id=11 AND faculties_id=4");
		$fec_st=mysqli_fetch_array($sql_st);
		
		$sql_cc=mysqli_query($conn,"SELECT * FROM stu_score_tbl WHERE stu_id=".$row['stu_id']." AND sub_id=12 AND faculties_id=5");
		$fec_cc=mysqli_fetch_array($sql_cc);
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td align="left"><?php echo $fec_stu['f_name']." ".$fec_stu['l_name'];?></td>
            <td><?php echo $fec_stu['gender'];?></td>
            <td><?php echo $fec_stu['dob'];?></td>
            <td id="center"><?php echo $fec_me['ia1'];?></td>
            <td id="center"><?php echo $fec_me['ia2'];?></td>
            <td id="center"><b><?php echo round($fec_me['ia1']/2+$fec_me['ia2']/2);?></b></td>
            <td id="center"><?php echo $fec_cn['ia1'];?></td>
            <td id="center"><?php echo $fec_cn['ia2'];?></td>
            <td id="center"><b><?php echo round($fec_cn['ia1']/2+$fec_cn['ia2']/2);?></b></td>
            <td id="center"><?php echo $fec_db['ia1'];?></td>
            <td id="center"><?php echo $fec_db['ia2'];?></td>
            <td id="center"><b><?php echo round($fec_db['ia1']/2+$fec_db['ia2']/2);?></b></td>
            <td id="center"><?php echo $fec_atc['ia1'];?></td>
            <td id="center"><?php echo $fec_atc['ia2'];?></td>
            <td id="center"><b><?php echo round($fec_atc['ia1']/2+$fec_atc['ia2']/2);?></b></td>
             <td id="center"><?php echo $fec_st['ia1'];?></td>
            <td id="center"><?php echo $fec_st['ia2'];?></td>
            <td id="center"><b><?php echo round( $fec_st['ia1']/2+$fec_st['ia2']/2);?></b></td>
             <td id="center"><?php echo $fec_cc['ia1'];?></td>
            <td id="center"><?php echo $fec_cc['ia2'];?></td>
            <td id="center"><b><?php echo round($fec_cc['ia1']/2+$fec_cc['ia2']/2);?></b></td>
            <td><?php echo $fec_cc['note'];?></td>
            <td align="center"><a href="?tag=score_entry&opr=upd&rs_id=<?php echo $row['ss_id'];?>"><img src="picture/update.png" /></a></td>
            <td align="center"><a href="?opr=del&rs_id=<?php echo $row['ss_id'];?>"><img src="picture/delete.png" /></a></td>
        </tr>
        
    <?php
		
    }
    ?>
    </table>
</div>
</body>
</html>