<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($conn,"DELETE FROM   article_tbl WHERE a_id=$id");
	if($del_sql)
		$msg="1 Record Deleted... !";
	else
		$msg="Could not Delete :".mysqli_error();	
			
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<title>SJCIT MANAGEMENT SYSTEM</title>
</head>

<body>
	<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="200px" style="font-size:18px; color:#006; text-indent:30px;">View Article</td>
        <td><a href="?tag=artical_entry"><input type="button" title="Add new Article" name="butAdd" value="Add New" id="button-search" /></a></td>
        <td><input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Article" /></td>
    </tr>
</table>
</form>

</div><!--end of style_div -->
<br />

<div id="content-input">
	<form method="post">
    <table border="1" width="805px" align="center" cellpadding="3" class="mytable" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Location ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Status</th>
            <th>Note</th>
            <th colspan="2">Operation</th>
      	</tr>
        <?php
			 $key="";
			if(isset($_POST['searchtxt']))
				$key=$_POST['searchtxt'];
			
			if($key !="")
				$sql_sel=mysqli_query($coon,"SElECT * FROM article_tbl WHERE  title  like '%$key%' ");
			else
		 $sql_sel=mysqli_query($conn,"SELECT * FROM article_tbl");
			 
			 $i=0;
			while($row=mysqli_fetch_array($sql_sel)){
				$i++;
				$color=($i%2==0)?"lightblue":"white";
			?>	 
			<tr bgcolor="<?php echo $color;?>">
				<td align="center"><?php echo $i;?></td>
				<td><?php echo $row['loca_id'];?></td>
				<td><?php echo $row['title'];?></td>
                <td><?php echo $row['content'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><?php echo $row['note'];?></td>
				<td align="center"><a href="?tag=artical_entry&opr=upd&rs_id=<?php echo $row['a_id'];?>" title="Upate"><img src="picture/update.png" /></a></td>
            <td align="center"><a href="?tag=view_artical&opr=del&rs_id=<?php echo $row['a_id'];?>" title="Delete"><img src="picture/delete.png" /></a></td>
			</tr>
<?php
} 
?>   
      </table>
   </form>
</div>
        
</body>
</html>