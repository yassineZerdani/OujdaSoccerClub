<?php
//fetch.php
$connect = mysqli_connect("us-cdbr-east-02.cleardb.com", "b757ff0df897f7", "77b62a27", "heroku_85f8cfc15f34318");
$columns = array('product_title', 'total', 'total_price', 'stock');

$query = "SELECT order_products.product_id, SUM(order_products.qty) AS total, order_products.date AS date, product_title, product_price*SUM(order_products.qty) AS total_price, stock FROM products JOIN order_products ON products.product_id = order_products.product_id WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
 product_title LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'GROUP BY order_products.product_id ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'GROUP BY order_products.product_id ORDER BY total DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["product_title"];
 $sub_array[] = $row["total"];
 $sub_array[] = $row["total_price"];
 $sub_array[] = $row["stock"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
$query = "SELECT * FROM products JOIN order_products ON products.product_id = order_products.product_id";
$result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>