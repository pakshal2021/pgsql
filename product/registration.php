<?php include 'header.php';?>
<form name ="myform" action="save.php" method="post" onsubmit="return validatation()">
<input type="hidden" name="check" value="registration">
    <h3 style="margin-left: 210px;">Registration Form </h3>
  <div class="form-group">
    <label for="name" style="margin-left: 20px;">Name : </label>
    <input type="text" name="name" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Name"><span style="color: red;margin-left: 20px;" id="name"></span>
  </div>
  <div class="form-group">
    <label for="email" style="margin-left: 20px;">Email : </label>
    <input type="text" name="email" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Email"><span style="color: red;margin-left: 20px;" id="email"></span>
  </div>
  <div class="form-group">
    <label for="password" style="margin-left: 20px;">Password : </label>
    <input type="password" name="password" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Password"><span style="color: red;margin-left: 20px;" id="password"></span>
  </div>
  <div class="form-group">
    <label for="phone no" style="margin-left: 20px;">Phone Number : </label>
    <input type="text" name="phone_no" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Phone No"><span style="color: red;margin-left: 20px;" id="phone_no"></span>
  </div>
  <div class="form-group">
    <label for="address" style="margin-left: 20px;">Address : </label>
    <textarea type="text" name="address" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Address"></textarea><span style="color: red;margin-left: 20px;" id="address"></span>
  </div>
  <div class="form-group">
    <label for="gender" style="margin-left: 20px;">Gender : </label>
    <input style="margin-left: 20px;" type="radio" name="gender" value="male"> Male
  	<input type="radio" name="gender" value="female"> Female<span style="color: red;margin-left: 20px;" id="gender"></span>
  </div>
  <div class="form-group">
    <label for="status" style="margin-left: 20px;">Select A Status : </label>
    <select name="status">
        <option></option>
        <option value="active">Active</option>
        <option value="not active">Not Active</option>
    </select>
    <span style="color: red;margin-left: 20px;" id="status"></span>
  </div>
  <button style="margin-left: 20px;" type="submit" name="submit" class="btn btn-info">Sign up</button>
  <h4><p style="margin-left: 200px;">Already Have account?<a href="login.php"> Log in</a></p></h4>
</form>
<?php
include 'footer.php';
?>