  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                   <form name="search" action="search.php" method="post">
              <div class="input-group">
           
        <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
              </form>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
<?php $query=mysqli_query($con,"select id, CategoryName from tblcategory where Is_Active=1");
while($row=mysqli_fetch_array($query))
{
?>

                    <li>
                      <a href="category.php?cat=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
                    </li>
<?php } ?>
                  </ul>
                </div>
       
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Recent </h5>
            <div class="card-body">
                      <ul class="mb-0">
<?php
$query=mysqli_query($con,"select tblposts.id, tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.CategoryName=tblposts.Category left join  tblsubcategory on  tblsubcategory.Subcategory=tblposts.SubCategory order by tblposts.PostingDate desc limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

  <li>
                      <a href="news-details.php?post=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                    </li>
            <?php } ?>
          </ul>
            </div>
          </div>


   <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Popular Recent</h5>
            <div class="card-body">
                      <ul >
<?php
$query1=mysqli_query($con,"select tblposts.id, tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.CategoryName=tblposts.Category left join  tblsubcategory on  tblsubcategory.Subcategory=tblposts.SubCategory order by viewCounter desc limit 5");
while ($result=mysqli_fetch_array($query1)) {

?>

  <li>
                      <a href="news-details.php?post=<?php echo htmlentities($result['id'])?>"><?php echo htmlentities($result['posttitle']);?></a>
                    </li>
            <?php } ?>
          </ul>
            </div>
          </div>

        </div>
