<?php
    if (isset($_POST["submit"])){
    /*$fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatpassword = $_POST["repeatpassword"];
    
    $passwordharsh = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();

    if (empty($fullname) OR empty($email) OR empty($password) OR empty($repeatpassword)) {
      array_push($errors,"All fields required");

      if (count($errors)>0) {
         foreach ($errors as $error) {
            echo "div class='alert alert-danger'>$error</div>";
         }
      }
    }else{
      
    $sql = "INSERT INTO users (fullname, email, password) VALUES ( ?, ?, ? )";
    $stmt = mysqli_stmt_init($conn);
    $preparestmt = mysqli_stmt_prepare($stmt,$sql);
    if ($preparestmt) {
        mysqli_stmt_bind_param($stmt,"sss",$fullname, $email, $passwordharsh);
        mysqli_stmt_execute($stmt);
        echo alert("Success");
    }else{
        die("something went wrong");
    }

   }*/
}
?>