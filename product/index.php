<?php
include 'header.php';
include 'product.php';
$obj = new product();
$obj->select();
?>
<div class="container">
  <center><h1>Product Page</h1><br></center>
  <button class="btn btn-primary"><a style="color: white" href="insert.php">Add New Product</a></button>
  <?php if(isset($_SESSION['name']))
    { ?>
      <button class="pull-right" style="margin-right: 600px;" type="logout" name="logout"><a href="save.php?check=logout">Logout</a></button>
    <?php } 
    ?>  
  <form class="form-group pull-right" style="margin-right: 20px;">
    <label for="search">Search : </label>
    <input type="text" name="search" placeholder="Search Product">
    <button type="submit" name="submit" class="btn-primary">Search</button>
</form>
  <table class="table">    
    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Category Name</th>
        <th>Price</th>
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
        <td><?php echo $datas['name'];?></td>
        <td><?php echo $datas['cname'];?></td>
        <td><?php echo $datas['pirce'];?></td>
        <td><?php echo $datas['status'];?></td>
        <td><?php $d=strtotime($datas['created_date']);echo date("d-m-y h:i:s A", $d) ?></td>
        <td><?php $d=strtotime($datas['updated_date']);echo date("d-m-y h:i:s A", $d) ?></td>
        <td><button class="btn btn-info"><a style="color: white" href="edit.php?id=<?php echo $datas['id'];?>">Edit</a></button>
        <button class="btn btn-danger"><a style="color: white" href="save.php?id=<?php echo $datas['id'];?>&check=delete" onclick="return confirm('Are you sure you want to delete?')">Delete</a></button>
    </form>
        </div>
      </td>
      </tr>
    </tbody>
    <?php }?>
</table>
<nav aria-label="...">
<center><ul class="pagination pagination-lg">
    <li class="page-item disabled">
    	<?php  for($i=1;$i<=$obj->totalPage;$i++)
    	{?>
       <a class="active" href="index.php?page=<?php echo $i?>&search=<?php if(isset($_REQUEST['submit']) && $_REQUEST['search']){ echo $_GET['search'];}?>" tabindex="-1"><?php  echo $i?></a>
  <?php } ?>
    </li>
</nav>
</div>