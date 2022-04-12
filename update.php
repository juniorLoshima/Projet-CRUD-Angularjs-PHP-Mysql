<?php
include('connect.php');
 
$message = '';
 
$form_data = json_decode(file_get_contents("php://input"));
 $data = array(
    ':prenom'  => $form_data->prenom,
    ':nom'  => $form_data->nom,
    ':email'  => $form_data->email,
    ':id'  => $form_data->id
   ); 
    
   $query = "UPDATE users SET prenom = :prenom, nom = :nom, email=:email WHERE id = :id";

   $statement = $connect->prepare($query);
   if($statement->execute($data))
   {
    $message = 'modification effectuée avec succès';
   }
echo $message; 
?>