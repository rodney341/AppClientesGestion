<?php
include("db.php");
$username = '';
$password= '';
$date= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM users WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $username = $row['username'];
    $password = $row['password'];
    $date = $row['date'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $username= $_POST['username'];
  $password = $_POST['password'];
  $date = $_POST['date'];

  $query = "UPDATE users set username = '$username', password = '$password', date = '$date' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Cita Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="username" type="text" class="form-control" value="<?php echo $username; ?>" placeholder="Update username">
        </div>
        <div class="form-group">
        <textarea name="password" class="form-control" cols="30" rows="1"><?php echo $password;?></textarea>
        </div>
        <div class="form-group">
          <input name="date" type="text" class="form-control" value="<?php echo $date; ?>" placeholder="Update username">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
