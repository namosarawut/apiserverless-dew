<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");    
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Accept");
      include 'classconectdatabase.php';
      $user_username = $_POST['username'];
      $user_firstname = $_POST['firstname'];
      $user_lastname = $_POST['lastname'];
      $user_email = $_POST['email'];
      $user_password = $_POST['password'];
      $user_layer = $_POST['layer'];
      $currentDateTime = date('Y-m-d H:i:s');


      $check_username_already = "SELECT * FROM datauser WHERE username ='".$user_username."'";
      $result_username_already = $connect->query($check_username_already);

       if($result_username_already->num_rows > 0 ){
       while ($row = mysqli_fetch_array($result_username_already)){
        $json = array("status" => "unsuccessful", "message" => "username is already");
        echo json_encode($json);
       }
       }else{
        $check_email_already = "SELECT * FROM datauser WHERE email ='".$user_email."'";
        $result_email_already = $connect->query($check_email_already);
  
         if($result_email_already->num_rows > 0 ){
         while ($row = mysqli_fetch_array($result_email_already)){
          $json = array("status" => "unsuccessful", "message" => "email is already");
          echo json_encode($json);
         }
         }else{
            $response = $connect->query(" INSERT INTO datauser (username, firstname, lastname, email, password, layer, datetime) 
            VALUES  ('".$user_username."','".$user_firstname."','".$user_lastname."','".$user_email."','".$user_password."','".$user_layer."','".$currentDateTime."')");
          
          if($response){
             $json = array("status" => "successful", "message" => "insert successfully!");
             echo json_encode($json);
             }else{
             $json = array("status" => "unsuccessful", "message" => "insert fail!");
              echo json_encode($json);
           }
         }
       }






 
?>