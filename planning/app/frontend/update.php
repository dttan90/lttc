<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Update</title>
</head>

<body>

      <?php

      // include
      include_once('../../database/accounts.php');
      include_once('../../database/users.php');

      //     get GET data
      $username = isset($_GET['username']) ? trim($_GET['username']) : ' ';
      $act = isset($_GET['act']) ? trim($_GET['act']) : ' ';

      // get data from server
      $where = "`username`='$username' ";
      $acc_data = accReadItem($__tb_accounts, $where);

      $user_code = '';
      if (!empty($acc_data)) {
            $user_code = $acc_data['user_code'];
      }

      // get users data from server
      $where = "`user_code`='$user_code' ";
      $users_data = usersReadItem($__tb_users, $where);

      // print_r($users_data); exit();

      // set data
      $user_code = $users_data['user_code'];
      $full_name = $users_data['full_name'];
      $permission = $users_data['permission'];
      $production_line = $users_data['production_line'];


      ?>

      <form action="../backend/update.php" method="post" target="_blank">

            <label for="user_code">User Code</label>
            <input type="text" name="user_code" value="<?php echo $user_code; ?>" readonly> <br>

            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>"> <br>

            <label for="permission">permission</label>
            <input type="text" name="permission" value="<?php echo $permission; ?>"> <br>

            <label for="production_line">production Line</label>
            <input type="text" name="production_line" value="<?php echo $production_line; ?>"> <br>

            <input type="submit" name="s" value="UPDATE">
      </form>



</body>

</html>