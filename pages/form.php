
<?php
include("connect.php");
include("new1.php");


if(isset($_POST['edit']))
{ 
$id=$_POST['id'];
$result = mysqli_query($con, 
"SELECT * FROM movies where id='$id'");

$row = mysqli_fetch_row($result);
}

	
?>
<head>

		<link rel="stylesheet" href="../css/style1.css" type="text/css" />
</head>
	<body style="background: url(../image/bg04.jpg);" class="form"><div class="thali_form">moviezoot
	
	
			<div id="tooplate_menu">
				<ul>
					<li><a href="../home.php">Home</a></li>
					<li><a href="form.php">Rate Movies</a></li>
					<li><a href="view.php">View</a></li>
					
				</ul>    	
			</div> 
		</div>
		
				
				<div class="form"><div class="mathu">Let's Rate New Movies
					<form action="store.php"  method="POST" enctype="multipart/form-data">
						
						<label class="header">Movie Name <span>*</span></label>
						<input type="text" id="name" name="name" placeholder="enter the movie name" value="<?php if(isset($row)) echo $row[1];?>"/>
						
						<label class="header">Year <span>*</span></label>
						<input type="text" id="year" name="year" placeholder="yyyy" value="<?php if(isset($row)) echo $row[2];?>"/>
							
						<label class="header">Genre <span>*</span></label>
						<select name="genre">
								<option value="none" selected="" disabled=""><?php if(isset($row)) echo $row[3];?></option>
								
								<?php
							 

$var=mysqli_query($con,"select name from genres");

while($row=mysqli_fetch_array($var))
{
	?><option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
								<?php

}


?>
							</select>
							<input type="button" onclick="window.location='genre.php';" value="Add new genre" id="genre"/>
							
						
						
						<label class="header">Rating <span>*</span></label>
						<input type="text" id="rating" name="rating" placeholder="ranging from 1 to 5 where 5 is best" value="<?php if(isset($row)) echo $row[4];?>"/>
						
						<label class="header">Upload image <span>*</span></label>
						<input type="file" id="path" name="myimage" /><br>
						<input type="button" onclick="document.getElementById('path').click()" value="Upload" id="upload"/>
						<input type="reset"  value="Reset" id="reset"/>
						<br><br>
						<center><input type="submit" value="Save rating details" name="save" id="save"/></center>
					</form>
				</div>
			</div>	
	
	
	
	</body>
