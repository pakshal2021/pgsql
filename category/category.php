<?php
include 'connection.php';
class category
{
    public $conn;
    public $data;
    public $limit;
    public $offset;
    public $totalPage;
    public function __construct()
    {
        $obj = new connection();
        $this->conn =$obj->connection();
    }
    public function insert()
    {
        if(isset($_POST['submit']))
        {
             $name = $_POST['cname'];
             $description = $_POST['description'];
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
             $sql = "INSERT INTO category (cname,description,image,status,created_date,updated_date,created_ip,updated_ip) VALUES ('$name','$description','$image','$status','$created_date','$updated_date','$created_ip','$updated_ip')";
             $result = pg_query($sql);
             if($result)
             {
                header('Location:index.php');
             }
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM category WHERE id=$id";
        $result = pg_query($sql);
        if(pg_numrows($result) >=1)
        {
            $this->data = pg_fetch_assoc($result);
        }
        if(isset($_POST['submit']))
        {
            $name = $_POST['cname'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $updated_date = date('y-m-d h:i:s');
            $updated_ip = $_SERVER['SERVER_ADDR'];
            if(empty($_FILES['image']['tmp_name']))
            {
                $sql = "UPDATE category SET cname='$name',description='$description',status='$status',updated_date='$updated_date',updated_ip='$updated_ip' WHERE id='$id'";
            }
            else
            {
                $temp = $_FILES['image']['tmp_name'];
                $image_name = $_FILES['image']['name'];
                $directory = "images/";
                $image = $directory.$image_name;
                move_uploaded_file($temp,$image);
                $sql = "UPDATE category SET cname='$name',description='$description',image='$image',status='$status',updated_date='$updated_date',updated_ip='$updated_ip' WHERE id='$id'";
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
        $sql = "DELETE FROM category WHERE id=$id";
        $result = pg_query($sql);
        if($result)
        {
            header('Location:index.php');
        }
    }
    public function select()
    {
        $this->paginate();
        if(isset($_REQUEST['submit']) && $_REQUEST['search'])
        {
            $name = $_REQUEST['search'];
            $sql = "SELECT * FROM category WHERE cname ILIKE '%{$name}%' LIMIT $this->limit OFFSET $this->offset";
        }
        else
        {
            $sql = "SELECT * FROM category ORDER BY id LIMIT $this->limit OFFSET $this->offset";
        }
        $result = pg_query($sql);
        if(pg_numrows($result) > 0)
        {
            while($rows = pg_fetch_assoc($result))
            {
                $this->data[] = $rows;
            }
        }
    }
    public function paginate()
    {
        $this->limit = 2;
        $sql = "SELECT * FROM category";
        if(isset($_REQUEST['submit']) && $_REQUEST['search'])
        {
            $name = $_REQUEST['search'];
            $sql .= " WHERE cname ILIKE '%{$name}%'";
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
}
?>