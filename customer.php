<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Customers</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>

    <div>
      <div>
        <nav>
          <ul class="pemweb">
                <li class="pemweb"><a>Pemrograman Web</a></li>
          
                <li class="navi"><a href="<?php echo "customer.php"; ?>">Data Customers</a></li>
                <li class="navi"><a href="<?php echo "product.php"; ?>">Data Products</a></li>
                <li class="navi"><a href="<?php echo "add.php"; ?>">Tambah Data</a></li>
          </ul>
        </nav>

        <main role="main">
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Customers berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Customers gagal di-update</div>';
              }

            }
           ?>

          <h2 align="center">Customers</h2>
          <div>
            <table border="1" align="center">
              <thead>
                <tr>
                  <th>customerNumber</th>
                  <th>customerName</th>
                  <th>contactLastName</th>
                  <th>contactFirstName</th>
                  <th>phone</th>
                  <th>addressLine1</th>
                  <th>addressLine2</th>
                  <th>city</th>
                  <th>state</th>
                  <th>postalCode</th>
                  <th>country</th>
                  <th>salesRepEmployeeNumber</th>
                  <th>creditLimit</th>
                  <th>akses</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM customers";
                  $result = mysqli_query(connection(),$query);
                 ?>
                
                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['customerNumber'];  ?></td>
                    <td><?php echo $data['customerName'];  ?></td>
                    <td><?php echo $data['contactLastName'];  ?></td>
                    <td><?php echo $data['contactFirstName'];  ?></td>
                    <td><?php echo $data['phone'];  ?></td>
                    <td><?php echo $data['addressLine1'];  ?></td>
                    <td><?php echo $data['addressLine2'];  ?></td>
                    <td><?php echo $data['city'];  ?></td>
                    <td><?php echo $data['state'];  ?></td>
                    <td><?php echo $data['postalCode'];  ?></td>
                    <td><?php echo $data['country'];  ?></td>
                    <td><?php echo $data['salesRepEmployeeNumber'];  ?></td>
                    <td><?php echo $data['creditLimit'];  ?></td>
                    <td>
                      <a href="<?php echo "update.php?customerNumber=".$data['customerNumber']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete.php?customerNumber=".$data['customerNumber']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
