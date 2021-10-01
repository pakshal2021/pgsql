<?php
include 'header.php';
include 'product.php';
$obj = new product();
$obj->update();
$obj->category();
$obj->check_user();
?>
<form name="myform" action="" method="post" enctype="multipart/form-data" onsubmit="return validate()">
    <h2 style="margin-left: 210px;">Edit Product </h2><br>
    <div class="form-group pull-right" style="margin-right: 500px;" >
    <img src="<?php echo $obj->data['image'];?>" style="height: 200px;width :300px;"></div>
  <div class="form-group">
    <label for="name" style="margin-left: 20px;">Name : </label>
    <input type="text" name="name" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" value="<?php echo $obj->data['name']; ?>"><span style="color: red;margin-left: 20px;" id="name"></span></div>
  <div class="form-group">
    <label for="price" style="margin-left: 20px;">Price : </label>
    <input type="text" name="price" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;"  value="<?php echo $obj->data['pirce']; ?>"><span style="color: red;margin-left: 20px;" id="price"></span><br>
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
    <label for="category" style="margin-left: 20px;">Select A Category : </label>
    <?php
    $select = $obj->data['category_id'];
    $sl = $obj->data['cname'];
    foreach($obj->value as $datas)
    { 
      for ($i=0; $i <$datas['id'] ; $i++) { 
        $new[$datas['id']] = $datas['cname'];
      }
    }
    ?>
    <select name="category_id">
    <?php
    foreach($new as $key => $values)
    {
        if($select == $key && $sl == $values)
        {
            echo "<option selected='select' value='$key'>$values</option>";
        }
        else
        {
            echo "<option value='$key'>$values</option>";
        }
    }?>
    </select><span style="color: red;margin-left: 20px;" id="category"></span>
  </div>
  <div class="form-group">
    <label for="image" style="margin-left: 20px;">Select An image : </label>
    <input type="file" name="image" class="pull-right" style="margin-right: 1110px;"><span style="color: red;margin-left: 20px;"></span><br>
  </div>
  <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 250px;">Submit</button>
</form>
<?php include 'footer.php';?>