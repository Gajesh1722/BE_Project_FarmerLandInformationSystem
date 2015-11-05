

<?php 
$country=intval($_GET['country']);
include("connect.php");

$query="SELECT * FROM village_mngt WHERE did='$country'";

$result=mysql_query($query);

?>
<select name="state" >
<option>Select Taluka</option>
<?php
while($row=mysql_fetch_array($result)) 
{ 
 	?>
	<option value=<?php echo $row['vid']; ?>>
	<?php echo $row['village']; ?>
	</option>
	<?php 
} ?>
</select>
