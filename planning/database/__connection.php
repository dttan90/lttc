<?php



function __conn($db = null)
{
      if ($db == null) $db = "planning"; // mặc định
      $host = "127.0.0.1";
      $username = "root";
      $password = "";
      $conn = mysqli_connect($host, $username, $password, $db) or die('Không thể kết nối tới Server ' . $host);
      $conn->query("SET NAMES 'utf8'");

      return $conn;
}

function fetchAll($query, $__conn = null)
{
      // default connection
      if ($__conn == null) $__conn = __conn();

      // init 
      $results = array();

      // query
      $query = mysqli_query($__conn, $query);

      // check 
      if (!$query)
            $results = array();
      else
            $results = mysqli_fetch_all($query, MYSQLI_ASSOC);

      // close db
      if ($__conn)
            mysqli_close($__conn);

      // return
      return $results;
}

// sử dụng mysqli_fetch_array để có thể truy vấn và trả về 1 dòng dữ liệu
function fetchItem($query, $__conn = null)
{
      // default connection
      if ($__conn == null) $__conn = __conn();

      // init 
      $result = array();

      // query
      $query = mysqli_query($__conn, $query);

      // check 
      if (!$query)
            $result = array();
      else
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

      // close db
      if ($__conn)
            mysqli_close($__conn);

      // return
      return $result;
}


function execQuery($query, $__conn = null)
{
      // default connection
      if ($__conn == null) $__conn = __conn();

      // init 
      $result = false;

      // query
      $query = mysqli_query($__conn, $query);
      
      // check 
      if ($query)
          $result = true;

      // close db
      if ($__conn)
            mysqli_close($__conn);

      // return
      return $result;
}