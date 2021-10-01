<?php 
include 'header.php';
include 'product.php';
$obj = new product();
$obj->category();
$obj->check_user();
?>
<form name ="myform" action="save.php" method="post" enctype="multipart/form-data" onsubmit="return validate()">
<input type="hidden" name="check" value="insert">
    <h2 style="margin-left: 210px;">Add New Product </h2><br>
  <div class="form-group">
    <label for="name" style="margin-left: 20px;">Name : </label>
    <input type="text" name="name" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Name"><span style="color: red;margin-left: 20px;" id="name"></span>  </div>
  <div class="form-group">
    <label for="price" style="margin-left: 20px;">Price : </label>
    <input type="text" name="price" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Price"><span style="color: red;margin-left: 20px;" id="price"></span><br>
  </div>
  <div class="form-group">
    <label for="status" style="margin-left: 20px;">Select A Status : </label>
    <select name="status">
        <option></option>
        <option value="available">Available</option>
        <option value="not available">Not Available</option>
    </select><span style="color: red;margin-left: 20px;" id="status"></span>
  </div>
  <div class="form-group">
    <label for="category" style="margin-left: 20px;">Select A Category : </label>
    <select name="category_id">
        <option></option>
        <?php foreach($obj->value as $datas) {?>
        <option value="<?php echo $datas['id']?>"><?php echo $datas['cname']?></option><?php }?>
    </select><span style="color: red;margin-left: 20px;" id="category"></span>
  </div>
  <div class="form-group">
    <label for="image" style="margin-left: 20px;">Select An image : </label>
    <input type="file" name="image" class="pull-right" style="margin-right: 1110px;"><span style="color: red;margin-left: 20px;"></span><br>
  </div>
  <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 250px;">Submit</button>
</form>
<?php
include 'footer.php';
?>