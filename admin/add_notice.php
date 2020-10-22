<?php 
require('../connection.php');

extract($_POST);
if(isset($add))
{

	if($details=="" || $sub=="" || $user=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
		foreach($user as $v)
		{

            //mysqli_query($conn,"insert into notice values('$a','$v','$sub','$details','$a')");
            mysqli_query($conn,"insert into notice (user, subject, Description) VALUES ('$v','$sub','$details')");

		}
		
		$err="<font color='green'>Notice added Successfully</font>";	
	}
}

?>
<h2>Add New Notice</h2>
<form method="post">

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><?php echo @$err;?></div>
    </div>



    <div class="row">
        <div class="col-sm-4">Enter Subject</div>
        <div class="col-sm-5">
            <input type="text" name="sub" class="form-control" />
        </div>
    </div>


    <div class="row" style="margin-top:10px">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        </div>

        <div class="row">
            <div class="col-sm-4">Enter Details</div>
            <div class="col-sm-5">
                <textarea name="details" class="form-control"></textarea>
            </div>
        </div>


        <div class="row" style="margin-top:10px">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            </div>

            <div class="row">
                <div class="col-sm-4">Select User</div>
                <div class="col-sm-5">
                    <select name="user[]" multiple="multiple" class="form-control">
                        <?php 
	$sql=mysqli_query($conn,"select name,email from user");
	while($r=mysqli_fetch_array($sql))
	{
		echo "<option value='".$r['email']."'>".$r['name']."</option>";
	}
			?>
                    </select>
                </div>
            </div>

            <div class="row" style="margin-top:10px">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                </div>

                <div class="row" style="margin-top:10px">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <input type="submit" value="Add New Notice" name="add" class="btn btn-success" />
                        <input type="reset" class="btn btn-success" />
                    </div>
                </div>
</form>