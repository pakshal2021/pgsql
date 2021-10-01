<?php include 'header.php';?>
<form name ="myform" action="manage_category.php" method="post" enctype="multipart/form-data" onsubmit="return validate1()">
<input type="hidden" name="check" value="insert">
    <h2 style="margin-left: 210px;">Add New Category </h2><br>
  <div class="form-group">
    <label for="name" style="margin-left: 20px;">Name : </label>
    <input type="text" name="cname" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Name"><span style="color: red;margin-left: 20px;" id="name"></span>  </div>
  <div class="form-group">
    <label for="price" style="margin-left: 20px;">Description : </label>
    <textarea type="text" name="description" class="form-control" rows="3" cols="5" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Description"></textarea><span style="color: red;margin-left: 20px;" id="description"></span><br>
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
    <label for="image" style="margin-left: 20px;">Select An image : </label>
    <input type="file" name="image" class="pull-right" style="margin-right: 1110px;"><span style="color: red;margin-left: 20px;"></span><br>
  </div>
  <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 250px;">Submit</button>
</form>
<?php include 'footer.php';?>