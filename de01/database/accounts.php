<?php

include_once("__connection.php");

// table cần sử dụng
$__tb_accounts = 'accounts';

// Hàm đọc tất cả dữ liệu trong bảng
function accReadAll($__tb_accounts, $order_by = null)
{
      // thay thế cột order by này khi áp dụng cho các bảng khác
      $order_by = ($order_by == null) ? 'username ASC' : $order_by;

      // thay thế các cột này khi sử dụng hàm này cho các bảng khác
      $select = "`username`, `password`, `user_code`";

      // query string
      $query = "SELECT $select FROM $__tb_accounts ORDER BY $order_by;";

      // result
      return fetchAll($query);
}

// Hàm chỉ đọc 1 dòng dữ liệu trong bảng
function accReadItem($__tb_accounts, $where, $order_by = null)
{
      // thay thế cột order by này khi áp dụng cho các bảng khác
      $order_by = ($order_by == null) ? 'username ASC' : $order_by;

      // thay thế các cột này khi sử dụng hàm này cho các bảng khác
      $select = "`username`, `password`, `user_code`";

      // query string
      $query = "SELECT $select FROM $__tb_accounts WHERE $where ORDER BY $order_by LIMIT 1;";

      // result
      return fetchItem($query);
}

// hàm insert dữ liệu
// data truyền vào nên là mảng kết hợp (có key la string)
function accInsert($__tb_accounts, $data)
{

      // Thay các nội dung phù hợp
      $username = trim($data['username']);
      $password = trim($data['password']);
      $user_code = trim($data['user_code']);
      
      // query string
      $query = "INSERT INTO $__tb_accounts 
                        (`username`, `password`, `user_code`) 
                  VALUES 
                        ('$username', '$password', '$user_code');";
      // end query

      // execute
      return execQuery($query);
}


// hàm cập nhật dữ liệu
function accUpdate($__tb_accounts, $data, $where = null)
{

      // Thay các nội dung phù hợp
      $username = trim($data['username']);
      if ($where == null) $where = "`username`='$username'";

      /*
            Đoạn code xử lý các cột dữ liệu cần thay đổi
      */

      $update_set = "";

      // Kiểm tra lần lượt các cột, nếu cột nào có thì UPDATE
      if (isset($data['password'])) {

            // lấy giá trị cột
            $password = trim($data['password']);

            // kiểm tra dữ liệu có rỗng
            if (!empty($password)) {
                  // Kiểm tra nếu lần đầu thêm thì không cần thêm dấu phẩy phía trước để đảm bảo đúng cú pháp
                  $update_set = empty($update_set) ? "`password`='$password'" : ", `password`='$password'";
            }
      }

      if (isset($data['user_code'])) {
            // lấy giá trị cột
            $user_code = trim($data['user_code']);

            // kiểm tra dữ liệu có rỗng
            if (!empty($user_code)) {
                  // Kiểm tra nếu lần đầu thêm thì không cần thêm dấu phẩy phía trước để đảm bảo đúng cú pháp
                  $update_set = empty($update_set) ? "`user_code`='$user_code'" : ", `user_code`='$user_code'";
            }
      }

      // ----------------------------------

      // query string
      $query = "UPDATE $__tb_accounts SET $update_set WHERE $where;";


      // execute
      return execQuery($query);
}


// hàm xóa dữ liệu với điều kiện là khóa chính
function accDelete($__tb_accounts, $username)
{
      // Thay các nội dung phù hợp
      $where = "`username`='$username'";

      // query string
      $query = "DELETE FROM $__tb_accounts WHERE $where;";

      return execQuery($query);
}

// hàm kiểm tra tồn tại của dữ liệu là khóa chính
function accIsAlreadyExists($__tb_accounts, $username)
{
      // Thay các nội dung phù hợp
      $where = "`username`='$username'";

      // query string
      $query = "SELECT `username` FROM $__tb_accounts WHERE $where LIMIT 1;";

      return execQuery($query);
}
