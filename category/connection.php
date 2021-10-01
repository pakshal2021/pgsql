<?php
class connection
{
    public function connection()
    {
        return $conn = pg_connect("host=localhost port=5432 dbname=product user=postgres password=pakshal@123");
        if(!$conn)
        {
            die("Connection failed");
        } 
    }
}
?>