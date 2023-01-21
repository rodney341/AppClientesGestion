<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD Cita FORM -->
      <div class="card card-body">
        <form action="save_cita.php" method="POST">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="username" autofocus>
          </div>
          <div class="form-group">
            <textarea name="password" rows="1" class="form-control" placeholder="password"></textarea>
          </div>
          <div class="form-group">
          <input type="text" name="date" class="form-control" placeholder="date">
          </div>
          <input type="submit" name="save_cita" class="btn btn-success btn-block" value="Asignar Cita">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM users";
          $result_Citas = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_Citas)) { ?>
          <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_cita.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
