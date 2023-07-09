<?php
include('includes/config.php');
if(!empty($_POST["cat"]))
{
 $cat=intval($_POST['cat']);
echo $cat;
$query=mysqli_query($con,"SELECT * FROM tblsubcategory WHERE Category=$cat and Is_Active=1");
?>
<option value="">Select Subcategory</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['Subcategory']); ?></option>
  <?php
 }
}
?>
