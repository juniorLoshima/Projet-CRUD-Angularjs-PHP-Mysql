<?php
include('connect.php');
 
$message = '';
 
$form_data = json_decode(file_get_contents("php://input"));
    $data = array(
     ':prenom'  => $form_data->prenom,
     ':nom'  => $form_data->nom,
     ':email'  => $form_data->email
    ); 
         
    $query = "INSERT INTO users (prenom, nom,email) VALUES (:prenom, :nom, :email)";
 
    $statement = $connect->prepare($query); 
    if($statement->execute($data))
        {
        $message = 'Enregistrement effectué avec succès';
        }else {
        $message = 'Erreur';    
        }   
    echo $message; 
/*
    else {
        $data = array(
            ':prenom'  => $form_data->prenom,
            ':nom'  => $form_data->nom,
            ':email'  => $form_data->email,
            ':txtid'  => $form_data->txtid
           ); 
            
           $query = " UPDATE users SET prenom = :prenom, nom = :nom, email=:email WHERE id = :txtid";
        
           $statement = $connect->prepare($query);
           if($statement->execute($data))
           {
            $message = 'Modification effectué avec succès';
           }
    }
    */
?>