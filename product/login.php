<?php include 'header.php';?>
<form name ="myform" action="save.php" method="post" onsubmit="return validatation1()">
<input type="hidden" name="check" value="login">
    <h3 style="margin-left: 210px;">Login Form </h3>
  <div class="form-group">
    <label for="email" style="margin-left: 20px;">Email : </label>
    <input type="text" name="email" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Email"><span style="color: red;margin-left: 20px;" id="email"></span>
  </div>
  <div class="form-group">
    <label for="password" style="margin-left: 20px;">Password : </label>
    <input type="password" name="password" class="form-control" style="width: 300px;width: 600px;margin-left: 20px;" placeholder="Enter Password"><span style="color: red;margin-left: 20px;" id="password"></span>
  </div>
  <button style="margin-left: 20px;" type="submit" name="submit" class="btn btn-info">Log in</button>
  <h4><p style="margin-left: 200px;">Don't have account?<a href="registration.php"> Sign up</a></p></h4>
</form>
<?php include 'footer.php';?>