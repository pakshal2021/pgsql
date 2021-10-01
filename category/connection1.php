<?php
$conn = pg_connect("host=localhost port=5432 dbname=product user=postgres password=pakshal@123");
if($conn)
{
    echo "connection successful";
}
else
{
    echo "connection failed";
}
$sql = "SELECT * FROM category";
$result = pg_query($sql);
if(pg_numrows($result) > 0)
{
    while($rows = pg_fetch_assoc($result))
    {
        $data[] = $rows;
    }
}   
echo "<pre>";
print_r($data);
?>