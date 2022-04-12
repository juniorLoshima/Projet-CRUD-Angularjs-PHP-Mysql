<?php
include('connect.php');
 
$message = '';
 
$form_data = json_decode(file_get_contents("php://input"));
 $data = array(
        ':id'  => $form_data->id
       ); 
    $query = "DELETE FROM users WHERE id=:id"; 
   $statement = $connect->prepare($query);
   if($statement->execute($data))
   {
    $message = 'Suppression effectuée avec succès';
   }
echo $message; 
?>