<?php
include 'connection.php';
class product
{
    public $conn;
    public $data;
    public $limit;
    public $offset;
    public $totalPage;
    public $value;
    public function __construct()
    {
        $obj = new connection();
        $this->conn = $obj->connection();
    }
    public function select()
    {
        $this->check_user();
        $this->paginate();
        if(isset($_REQUEST['submit']) && $_REQUEST['search'])
        {
            $name = $_REQUEST['search'];
            $sql = "SELECT category.cname, product.id,product.name,product.image,product.pirce,product.status,product.created_date,product.updated_date FROM category JOIN product ON category.id = product.category_id  WHERE product.name ILIKE '%{$name}%' LIMIT $this->limit OFFSET $this->offset";
        }
        else
        {
            $sql = "SELECT category.cname,product.id,product.name,product.image,product.pirce,product.status,product.created_date,product.updated_date FROM category JOIN product ON category.id = product.category_id ORDER BY product.id LIMIT $this->limit OFFSET $this->offset";
        }
        $result = pg_query($sql);
        if(pg_numrows($result) > 0)
        {
            while($row = pg_fetch_assoc($result))
            {
                $this->data[] = $row;
            }
        }
    }
    public function insert()
    {
        if(isset($_POST['submit']))
        {
             $name = $_POST['name'];
             $category_id = $_POST['category_id'];
             $price = $_POST['price'];
             $temp = $_FILES['image']['tmp_name'];
             $image_name = $_FILES['image']['name'];
             $directory = "images/";
             $image = $directory.$image_name;
             move_uploaded_file($temp,$image);
             $status = $_POST['status'];
             $created_date = date('y-m-d h:i:s');
             $updated_date = date('y-m-d h:i:s');
             $created_ip = $_SERVER['SERVER_ADDR'];
             $updated_ip = $_SERVER['SERVER_ADDR'];
             $sql = "INSERT INTO product (name,category_id,pirce,image,status,created_date,updated_date,created_ip,updated_ip) VALUES ('$name',$category_id,'$price','$image','$status','$created_date','$updated_date','$created_ip','$updated_ip')";
             $result = pg_query($sql);
             if($result)
             {
                header('Location:index.php');
             }
        }
    }
    public function update()
    {
        $id = $_GET['id'];
        $sql = "SELECT category.cname, product.id,product.category_id,product.name,product.image,product.pirce,product.status,product.created_date,product.updated_date FROM category JOIN product ON category.id = product.category_id WHERE product.id = $id";
        $result = pg_query($sql);
        if(pg_numrows($result) >=1)
        {
            $this->data = pg_fetch_assoc($result);
        }
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $updated_date = date('y-m-d h:i:s');
            $updated_ip = $_SERVER['SERVER_ADDR'];
            if(empty($_FILES['image']['tmp_name']))
            {
                $sql = "UPDATE product SET name='$name',category_id='$category_id',pirce='$price',status='$status',updated_date='$updated_date',updated_ip='$updated_ip' WHERE id='$id'";
            }
            else
            {
                $temp = $_FILES['image']['tmp_name'];
                $image_name = $_FILES['image']['name'];
                $directory = "images/";
                $image = $directory.$image_name;
                move_uploaded_file($temp,$image);
                $sql = "UPDATE product SET name='$name',category_id='$category_id',pirce='$price',image='$image',status='$status',updated_date='$updated_date',updated_ip='$updated_ip' WHERE id='$id'";
            }
            $result = pg_query($sql);
            if($result)
            {
                header('Location:index.php');
            }
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM product WHERE id=$id";
        $result = pg_query($sql);
        if($result)
        {
            header('Location:index.php');
        }
    }
    public function paginate()
    {
        $this->limit = 3;
        $sql = "SELECT * FROM product";
        if(isset($_REQUEST['submit']) && $_REQUEST['search'])
        {
            $name = $_REQUEST['search'];
            $sql .= " WHERE name ILIKE '%{$name}%'";
        }
        $result = pg_query($sql);
        $records = pg_numrows($result); 
        $this->totalPage = ceil($records/$this->limit);
        if(isset($_REQUEST['page']))
        {
            $page = $_REQUEST['page'];
        }
        else
        {
            $page = 1;
        }
        $this->offset = $this->limit * ($page-1);
    }
    public function category()
    {
        $sql = "SELECT * FROM category";
        $result = pg_query($sql);
        if(pg_numrows($result) >=1)
        {
            while($row = pg_fetch_assoc($result))
            {
                $this->value[] = $row;
            }
        }
    }
    public function register()
    {
        if(isset($_POST['submit']))
        {
             $name = $_POST['name'];
             $email = $_POST['email'];
             $password = $_POST['password'];
             $phone_no = $_POST['phone_no'];
             $gender = $_POST['gender'];
             $address = $_POST['address'];
             $status = $_POST['status'];
             $created_date = date('y-m-d h:i:s');
             $updated_date = date('y-m-d h:i:s');
             $created_ip = $_SERVER['SERVER_ADDR'];
             $updated_ip = $_SERVER['SERVER_ADDR'];
             $sql = "INSERT INTO users (name,email,password,phone_no,gender,address,status,created_date,updated_date,created_ip,updated_ip) VALUES ('$name','$email','$password','$phone_no','$gender','$address','$status','$created_date','$updated_date','$created_ip','$updated_ip')";
             $result = pg_query($sql);
             if($result)
             {
                header('Location:login.php');
             }
        }
    }
    public function login()
    {
        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = pg_query($sql);
            if(pg_numrows($result) >=1)
		    {
                session_start();
                $data = pg_fetch_assoc($result);
                $_SESSION['name'] = $data['name'];
                header('Location:index.php');
            }
            else
            {?>
                <script>
                    alert("Login Wrong");
                    window.location.href = 'login.php'
                </script>
                <?php
            }
        }
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location:index.php');
    }
    public function check_user()
    {
        session_start();
        if(!isset($_SESSION['name']))
        {
            header('Location:login.php');
        }
    }
}
?>