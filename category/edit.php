<?php
include 'header.php';
include 'category.php';
$obj = new category();
$obj->edit();
?>
<form name="myform" action="" method="post" enctype="multipart/form-data" onsubmit="return validate1()">
    <h2 style="margin-left: 210px;">Edit Category </h2><br>
    <div class="form-group pull-right" style="margin-right: 500px;" >
    <img src="<?php echo $obj->data['image'];?>" style="height: 200px;width :300px;"></div>
  <div class="form-group">
    <label for="name" style="margin-left: 20px;">Name : </label>
    <input type="text" name="cname" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" value="<?php echo $obj->data['cname']; ?>"><span style="color: red;margin-left: 20px;" id="name"></span></div>
  <div class="form-group">
  <label for="price" style="margin-left: 20px;">Description : </label>
    <textarea type="text" name="description" class="form-control" rows="3" cols="5" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Description"><?php echo $obj->data['description']; ?></textarea><span style="color: red;margin-left: 20px;" id="description"></span><br>
  </div>
  <div class="form-group">
    <label for="status" style="margin-left: 20px;">Select A Status : </label>
    <?php
    $selected = $obj->data['status'];
    $options = array('available','not available');
    ?>
    <select name="status">
    <?php
    foreach($options as $option)
    {
        if($selected == $option)
        {
        echo "<option selected='selected' value='$option'>$option</option>";
        }
        else
        {
            echo "<option value='$option'>$option</option>";
        }
        
    }
    echo "</select>";
    ?><span style="color: red;margin-left: 20px;" id="status"></span>
  </div>
  <div class="form-group">
    <label for="image" style="margin-left: 20px;">Select An image : </label>
    <input type="file" name="image" class="pull-right" style="margin-right: 1110px;"><span style="color: red;margin-left: 20px;"></span><br>
  </div>
  <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 250px;">Submit</button>
</form>
<?php include 'footer.php';?>