<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Trang chủ</title>

      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

      <link href="app/fontend/css/style.css" rel="stylesheet">
</head>

<body>

      <div class="container-fluid title">
            <h2>CHƯƠNG TRÌNH LẬP KẾ HOẠCH SẢN XUẤT</h2>
      </div>


      <div class="container">
            <div class="row">
                  <div class="col-md-12">
                        <div class="card">
                              <div class="card-body">
                                    <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
                              </div>
                              <div class="table-responsive">
                                    <table class="table no-wrap user-table mb-0">
                                          <thead>
                                                <tr>
                                                      <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                                                      <th scope="col" class="border-0 text-uppercase font-medium">USERNAME</th>
                                                      <th scope="col" class="border-0 text-uppercase font-medium">FULL NAME</th>
                                                      <th scope="col" class="border-0 text-uppercase font-medium">PERMISSION</th>
                                                      <th scope="col" class="border-0 text-uppercase font-medium">PRODUCTION LINE</th>
                                                      <th scope="col" class="border-0 text-uppercase font-medium">UPDATED BY</th>
                                                      <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                <?php
                                                include_once("database/users.php");
                                                include_once("database/accounts.php");

                                                $data = usersReadAll($__tb_users);

                                                $index = 0;
                                                foreach ($data as $key => $value) {

                                                      

                                                      // set data
                                                      $user_code = $value['user_code'];
                                                      $full_name = $value['full_name'];
                                                      $permission = $value['permission'];
                                                      $production_line = $value['production_line'];
                                                      $updated_by = $value['updated_by'];

                                                      // xử lý hiển thị permission
                                                      $permission_2 = substr($permission, 0, 2);
                                                      $permission_view = '';
                                                      switch ($permission_2) {
                                                            case "SU":
                                                                  $permission_view = 'Supper AD';
                                                                  break;
                                                            case "AD":
                                                                  $permission_view = 'Supper AD';
                                                                  break;

                                                            default:
                                                                  $permission_view = 'Standard';
                                                                  break;
                                                      }


                                                      /*
                                                                  để lấy username
                                                            */
                                                      $where = "`user_code`='$user_code'";
                                                      $account = accReadItem($__tb_accounts, $where);
                                                      if (!empty($account)) {

                                                            $index++;

                                                            $username = $account['username'];

                                                            echo '<tr>';
                                                                  echo '<td class="pl-4">' . $index . '</td>';
                                                                  echo '<td><h5 class="font-medium mb-0">' . $username . '</h5></td>';

                                                                  echo '<td><span class="text-muted">' . $full_name . '</span></td>';

                                                                  echo '<td><span class="text-muted">' . $production_line . '</span></td>';

                                                                  echo '<td><span class="text-muted">' . $permission_view . '</span></td>';

                                                                  echo '<td><span class="text-muted">' . $updated_by . '</span></td>';

                                                                  echo '<td>';
                                                                        echo '<button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>';
                                                                        echo '<button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>';
                                                                  echo '</td>';
                                                            echo '</tr>';
                                                      }

                                                      // -------------



                                                }


                                                ?>
                                                




                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
            </div>
      </div>


      <!-- bootstrap -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>