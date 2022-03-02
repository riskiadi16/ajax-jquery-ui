<?php
// Include db connection file
require_once "connection.php";
$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);
$res = mysqli_num_rows ( $result );
$output = '
<table class="table table-striped">
 <thead>
 <tr>
 <th>Full Name</th>
 <th>Email</th>
 <th>Address</th>
 <th>Edit</th>
 <th>Delete</th>
 </tr>
 </thead>
<tbody>
';
if($res > 0){
 foreach ($result as $row) {
 $output .='
 <tr>
 <td>'.$row["nama"].'</td>
 <td>'.$row["email"].'</td>
 <td>'.$row["alamat"].'</td>
 <td>
 <button type="button" class="btn btn-primary edit" id="'.$row["id"].'">Edit</button>
 </td>
 <td>
 <button type="button" class="btn btn-danger delete"
 id="'.$row["id"].'">Delete</button>
 </td>
 </tr>
 ';
 }
}else{
 $output .= '
 <tr> 
 <td colspan="4" align="center"> Data Not Found</td>
 </tr>
 ';
}
$output .='</table>';
echo $output;
?> 
