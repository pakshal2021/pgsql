<?php
include 'header.php';
include 'category.php';
$obj = new category();
$obj->select();
?>
<div class="container">
  <center><h1>Category Page</h1><br></center>
  <button class="btn btn-primary"><a style="color: white" href="insert.php">Add New Category</a></button>  
  <form class="form-group pull-right" style="margin-right: 670px;">
    <label for="search">Search : </label>
    <input type="text" name="search" placeholder="Search Category">
    <button type="submit" name="submit" class="btn-primary">Search</button>
</form>
  <table class="table">    
    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          <?php
          foreach($obj->data as $datas)
          {?>
        <td><?php echo $datas['id'];?></td>
        <td><img src="<?php echo $datas['image'];?>" style="width:100px;height: 70px"></td>
        <td><?php echo $datas['cname'];?></td>
        <td><?php echo $datas['description'];?></td>
        <td><?php echo $datas['status'];?></td>
        <td><?php $d=strtotime($datas['created_date']);echo date("d-m-y h:i:s A", $d) ?></td>
        <td><?php $d=strtotime($datas['updated_date']);echo date("d-m-y h:i:s A", $d) ?></td>
        <td><button class="btn btn-info"><a style="color: white" href="edit.php?id=<?php echo $datas['id'];?>">Edit</a></button>
        <button class="btn btn-danger"><a style="color: white" href="manage_category.php?id=<?php echo $datas['id'];?>&check=delete" onclick="return confirm('Are you sure you want to delete?')">Delete</a></button>
    </form>
        </div>
      </td>
      </tr>
    </tbody>
    <?php }?>
</table>
<nav aria-label="...">
  <ul class="pagination pagination-lg">
    <li class="page-item disabled">
    	<?php  for($i=1;$i<=$obj->totalPage;$i++)
    	{?>
       <a class="active" href="index.php?page=<?php echo $i?>&search=<?php if(isset($_REQUEST['submit']) && $_REQUEST['search']){ echo $_GET['search'];}?>" tabindex="-1"><?php  echo $i?></a>
  <?php } ?>
    </li>
</nav>
</div>