<?php

include('db.php');

if (isset($_POST['save_cita'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $date = $_POST['date'];
  $rep = 0;
  $query = "SELECT * FROM users";
  $result_Citas = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result_Citas)) {

    if ($row['date'] == $date)
      $rep = 1;
      
  }

  if ($rep == 0) {
    $query = "INSERT INTO users(username, password,date) VALUES ('$username', '$password','$date')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      die("Query Failed.");
    }

    $_SESSION['message'] = 'Cita Saved Successfully';
    $_SESSION['message_type'] = 'success';
    
  }else{
    $_SESSION['message'] = 'Cita dont saved';
    $_SESSION['message_type'] = 'danger';
  }
  header('Location: index.php');
}

?>
