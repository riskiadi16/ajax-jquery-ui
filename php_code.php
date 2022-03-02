<?php
// Include db connection file
require_once "connection.php";
if(isset($_POST["action"]))
{
 if($_POST["action"] == "insert")
 {
 // Dapatkan data yang dikirimkan
 $full_name = $_POST["full_name"];
 $email = $_POST["email"];
 $address = $_POST["address"];
 // Insert Query
 $query = "INSERT INTO users (nama, email, alamat)
 VALUES ('".$full_name."', '".$email."', '".$address."')";
 //prepare the query and execute
 $statement = $connection->prepare($query);
 $statement->execute();
 echo '<p>Data Inserted...</p>';
 }
 // dapatkan satu baris dengan id dan kembalikan dan masukkan ke dari data
 if($_POST["action"] == "get_record")
 {
 //Get the post id
 $id = $_POST["id"];
 $query = "SELECT * FROM users WHERE id = '".$id."'";
 $result = mysqli_query($connection, $query);
 foreach($result as $row) 
 {
 $output['full_name'] = $row['nama'];
 $output['email'] = $row['email'];
 $output['address'] = $row['alamat'];
 }
 echo json_encode($output);
 }
 // atur dan perbarui data ke database
 if($_POST["action"] == "update")
 {
 $full_name = $_POST["full_name"];
 $email = $_POST["email"];
 $address = $_POST["address"];
 $id = $_POST["hidden_id"];
 $query = "
 UPDATE users
 SET nama = '".$full_name."',
 email = '".$email."',
 alamat = '".$address."'
 WHERE id = '".$id."'
 ";
 $statement = $connection->prepare($query);
 $statement->execute();
 echo '<p>Data Updated</p>';
 }
 // Hapus data dari database
 if($_POST["action"] == "delete")
 {
 //Get the post id
 $id = $_POST["id"];
 $query = "DELETE FROM users WHERE id = '".$id."'";
 $statement = $connection->prepare($query);
 $statement->execute();
 echo '<p>Data Has Been Deleted</p>';
 }
}
?>