<?php

 header('Access-Control-Allow-Origin: *');
 //header('Content-Type: multipart/form-data');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


  include '../../config-esp/database.php';
  
  if (!empty($_POST)) {
    $id=$_POST["id"];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT mode,state FROM pump WHERE id = ?';
    
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
    
    echo $data['mode'];
    echo " ";
    echo $data['state'];
    echo " ";

  }
?>