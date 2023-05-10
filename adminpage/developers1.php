<?php
include("database.php");
$db= $conn;
$tableName="books";
$columns= ['id', 'book_title', 'genre', 'author','description','book_cover'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
   if(empty($db)){
   $msg= "Database connection error";
   }elseif (empty($columns) || !is_array($columns)) {
   $msg="columns Name must be defined in an indexed array";
   }elseif(empty($tableName)){
      $msg= "Table Name is empty";
   }else{
   $columnName = implode(", ", $columns);
   $query = "SELECT $columnName FROM $tableName ORDER BY `id` DESC";
   $result = $db->query($query);
   if($result== true){ 
   if ($result->num_rows > 0) {
      $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
      $msg= $row;
   } else {
      $msg= "No Data Found"; 
   }
   }else{
   $msg= mysqli_error($db);
   }
   }
   return $msg;
   }

?>



<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `books` WHERE CONCAT(`id`, `book_cover`, `book_title`, `genre`, `author`, `description`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `books` ORDER BY `id` DESC";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "tsbr_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>