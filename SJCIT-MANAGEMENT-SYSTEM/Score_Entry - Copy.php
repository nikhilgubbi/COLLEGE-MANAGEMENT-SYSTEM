<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
						
if(isset($_POST['btn_sub'])){
	$stu_name=$_POST['sudenttxt'];
	$fa_name=$_POST['factxt'];
	$sub_name=$_POST['subjecttxt'];
	$ia1=$_POST['midermtxt'];
	$ia2=$_POST['midermtxt'];
	$ia3=$_POST['finaltxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysqli_query($conn,"INSERT INTO stu_score_tbl 
						VALUES(
							NULL,
							'$stu_name',
							'$fa_name' ,
							'$sub_name',
							'$ia1',
							'$ia2',
							'$ia3',
							'$note'
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$stu_id=$_POST['sudenttxt'];
	$faculties_id =$_POST['factxt'];
	$sub_id=$_POST['subjecttxt'];
	$ia1=$_POST['midermtxt'];
	$ia2=$_POST['midermtxt'];
	$ia3=$_POST['finaltxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysqli_query($conn,"UPDATE stu_score_tbl SET
							stu_id='$stu_id' ,
							faculties_id='$faculties_id' ,
							sub_id='$sub_id' ,
							ia1='$ia1' ,	
							ia2='$ia2' ,
							ia3='$ia3',
							note='$note' 
						WHERE ss_id=$id

					");
					
if($sql_update==true)
	header("location:?tag=view_scores");
else
	$msg="Update Fail!...";
	
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. Build Bright University .::</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>
<?php
if($opr=="upd")
{
	$sql_upd=mysqli_query($conn,"SELECT * FROM stu_score_tbl WHERE ss_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

	<div id="top_style">
        <div id="top_style_text">
      		Scores Update
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_scores"><input type="button" name="btn_view" value="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0">
        	<tr>
            	<td>Students's Name</td>
            	<td>
                	<select name="sudenttxt" id="textbox">
                    	<option>---- Students's Name -----</option>
                            <?php
                          		$student_name=mysqli_query("SELECT * FROM stu_tbl");
								while($row=mysqli_fetch_array($student_name)){
									 if($row['stu_id']==$rs_upd['stu_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option value="<?php echo $row['stu_id'];?>" <?php echo $iselect ;?> > <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Faculties's Name</td>
            	<td>
                	<select name="factxt" id="textbox">
                    	<option>---- Faculties's Name   ------</option>
                            <?php
                               $fac_name=mysqli_query($conn,"SELECT * FROM facuties_tbl");
							   while($row=mysqli_fetch_array($fac_name)){
								    if($row['faculties_id']==$rs_upd['faculties_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['faculties_id'];?>" <?php echo $iselect ;?> > <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Subjects's Name</td>
            	<td>
                	<select name="subjecttxt" id="textbox">
                    	<option>------------ Sujects -----------</option>
                            <?php
                               $subject=mysqli_query($conn,"SELECT * FROM sub_tbl");
							   while($row=mysqli_fetch_array($subject)){
								   if($row['sub_id']==$rs_upd['sub_id'])
								   		$iselect="selected";
									else
										$iselect="";
							?>
                            <option value="<?php echo $row['sub_id'];?>" <?php echo $iselect ;?> > <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>IA1</td>
            	<td>
                	<input type="text" name="midermtxt" id="textbox" value="<?php echo $rs_upd['ia1'];?> "/>
                </td>
            </tr>
            
            <tr>
            	<td>IA2</td>
                <td>
                	<input type="text" name="midermtxt"  id="textbox" value="<?php echo $rs_upd['ia2'];?>" />
                </td>
            </tr>
			<tr>
            	<td>IA3</td>
                <td>
                	<input type="text" name="finaltxt"  id="textbox" value="<?php echo $rs_upd['ia3'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_upd" value="Update" id="button-in" title="Update"  />
                </td>
            </tr>
		</table>

   </div>
    </form>

</div><!-- end of style_informatios -->
<?php	
}
else
{
?>
	
    <div id="top_style">
        <div id="top_style_text">
      		Scores Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_scores"><input type="button" name="btn_view" value="View_Scores" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0">
        	<tr>
            	<td>Students's Name</td>
            	<td>
                	<select name="sudenttxt" id="textbox">
                    	<option>---- Students's Name -----</option>
                            <?php
                          		$student_name=mysqli_query($conn,"SELECT * FROM stu_tbl");
								while($row=mysqli_fetch_array($student_name)){
								?>
                                <option value="<?php echo $row['stu_id'];?>"> <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Faculties's Name</td>
            	<td>
                	<select name="factxt" id="textbox">
                    	<option>---- Faculties's Name   ------</option>
                            <?php
                               $fac_name=mysqli_query($conn,"SELECT * FROM facuties_tbl");
							   while($row=mysqli_fetch_array($fac_name)){
								?>
                        		<option value="<?php echo $row['faculties_id'];?>"> <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Subjects's Name</td>
            	<td>
                	<select name="subjecttxt" id="textbox">
                    	<option>------------ Sujects -----------</option>
                            <?php
                               $subject=mysqli_query($conn,"SELECT * FROM sub_tbl");
							   while($row=mysqli_fetch_array($subject)){
							?>
                            <option value="<?php echo $row['sub_id'];?>"> <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>IA1</td>
            	<td>
                	<input type="text" name="midermtxt" id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>IA2</td>
                <td>
                	<input type="text" name="midermtxt"  id="textbox" />
                </td>
            </tr>
			<tr>
            	<td>IA3</td>
                <td>
                	<input type="text" name="finaltxt"  id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="3"></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Add Now" id="button-in"  />
                </td>
            </tr>
		</table>

   </div>
    </form>

</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>