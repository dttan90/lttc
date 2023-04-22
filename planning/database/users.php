<?php

include_once("__connection.php");

// table cần sử dụng
$__tb_users = 'users';

// Hàm đọc tất cả dữ liệu trong bảng
function usersReadAll($__tb_users, $order_by = null)
{
      // thay thế cột order by này khi áp dụng cho các bảng khác
      $order_by = ($order_by == null) ? 'user_code ASC' : $order_by;

      // thay thế các cột này khi sử dụng hàm này cho các bảng khác
      $select = "`user_code`, `full_name`, `permission`, `production_line`, `updated_by`, `updated_date`";

      // query string
      $query = "SELECT $select FROM $__tb_users ORDER BY $order_by;";

      // result
      return fetchAll($query);
}

// Hàm chỉ đọc 1 dòng dữ liệu trong bảng
function usersReadItem($__tb_users, $where, $order_by = null)
{
      // thay thế cột order by này khi áp dụng cho các bảng khác
      $order_by = ($order_by == null) ? 'user_code ASC' : $order_by;

      // thay thế các cột này khi sử dụng hàm này cho các bảng khác
      $select = "`user_code`, `full_name`, `permission`, `production_line`, `updated_by`, `updated_date`";

      // query string
      $query = "SELECT $select FROM $__tb_users WHERE $where ORDER BY $order_by LIMIT 1;";

      // result
      return fetchItem($query);
}

// hàm insert dữ liệu
// data truyền vào nên là mảng kết hợp (có key la string)
function usersInsert($__tb_users, $data)
{

      // Thay các nội dung phù hợp
      $user_code = trim($data['user_code']);
      $full_name = trim($data['full_name']);
      $permission = trim($data['permission']);
      $production_line = trim($data['production_line']);
      $updated_by = trim($data['updated_by']);

      // query string
      $query = "INSERT INTO $__tb_users 
                        (`user_code`, `full_name`, `permission`, `production_line`, `updated_by`) 
                  VALUES 
                        ('$user_code', '$full_name', '$permission', '$production_line', '$updated_by');";
      // end query

      // execute
      return execQuery($query);
}


// hàm cập nhật dữ liệu
function usersUpdate($__tb_users, $data, $where = null)
{

      // Thay các nội dung phù hợp
      $user_code = trim($data['user_code']);
      if ($where == null) $where = "`user_code`='$user_code'";

      /*
            Đoạn code xử lý các cột dữ liệu cần thay đổi
      */

      $update_set = "";

      // Kiểm tra lần lượt các cột, nếu cột nào có thì UPDATE
      if (isset($data['full_name'])) {

            // lấy giá trị cột
            $full_name = trim($data['full_name']);

            // kiểm tra dữ liệu có rỗng
            if (!empty($full_name)) {
                  // Kiểm tra nếu lần đầu thêm thì không cần thêm dấu phẩy phía trước để đảm bảo đúng cú pháp
                  $update_set .= empty($update_set) ? "`full_name`='$full_name'" : ", `full_name`='$full_name'";
            }
      }

      if (isset($data['permission']) ) {
            // lấy giá trị cột
            $permission = trim($data['permission']);

            // kiểm tra dữ liệu có rỗng
            if (!empty($permission)) {
                  // Kiểm tra nếu lần đầu thêm thì không cần thêm dấu phẩy phía trước để đảm bảo đúng cú pháp
                  $update_set .= empty($update_set) ? "`permission`='$permission'" : ", `permission`='$permission'";
            }
      }

      if (isset($data['production_line'])) {
            // lấy giá trị cột
            $production_line = trim($data['production_line']);

            // kiểm tra dữ liệu có rỗng
            if (!empty($production_line)) {
                  // Kiểm tra nếu lần đầu thêm thì không cần thêm dấu phẩy phía trước để đảm bảo đúng cú pháp
                  $update_set .= empty($update_set) ? "`production_line`='$production_line'" : ", `production_line`='$production_line'";
            }
      }

      if (isset($data['updated_by'])) {
            // lấy giá trị cột
            $updated_by = trim($data['updated_by']);

            // kiểm tra dữ liệu có rỗng
            if (!empty($updated_by)) {
                  // Kiểm tra nếu lần đầu thêm thì không cần thêm dấu phẩy phía trước để đảm bảo đúng cú pháp
                  $update_set .= empty($update_set) ? "`updated_by`='$updated_by'" : ", `updated_by`='$updated_by'";
            }
      }
      // ----------------------------------

      // query string
      $query = "UPDATE $__tb_users SET $update_set WHERE $where;";


      // execute
      return execQuery($query);
}


// hàm xóa dữ liệu với điều kiện là khóa chính
function usersDelete($__tb_users, $user_code)
{
      // Thay các nội dung phù hợp
      $where = "`user_code`='$user_code'";

      // query string
      $query = "DELETE FROM $__tb_users WHERE $where;";

      return execQuery($query);
}

// hàm kiểm tra tồn tại của dữ liệu là khóa chính
function usersIsAlreadyExists($__tb_users, $user_code)
{
      // Thay các nội dung phù hợp
      $where = "`user_code`='$user_code'";

      // query string
      $query = "SELECT `user_code` FROM $__tb_users WHERE $where LIMIT 1;";

      return execQuery($query);
}
