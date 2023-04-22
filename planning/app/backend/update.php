<?php

include_once('../../database/users.php');

$user_code = isset($_POST['user_code']) ? trim($_POST['user_code']) : '';
$full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';

$permission = isset($_POST['permission']) ? trim($_POST['permission']) : '';
$production_line = isset($_POST['production_line']) ? trim($_POST['production_line']) : '';

// save update
$data = array(
      'user_code' => $user_code,
      'full_name' => $full_name,
      'permission' => $permission,
      'production_line' => $production_line
);

// execute update
$where = "`user_code` = '$user_code'";
$result = usersUpdate($__tb_users, $data, $where);

// message
$message = ($result) ? 'Cập nhật thành công' : 'Cập nhật lỗi rồi';


?>


<script>
      var message = '<?php echo $message; ?>';

      alert(message);
      location.href = '../../';
</script>