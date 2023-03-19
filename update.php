<?php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customerNumber_upd = $_GET['customerNumber'];
          $query = "SELECT * FROM customers WHERE customerNumber = '$customerNumber_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];
    //query SQL
    $sql = "UPDATE customers SET customerName='$customerName', contactLastName='$contactLastName', contactFirstName='$contactFirstName', phone='$phone', addressLine1='$addressLine1', addressLine2='$addressLine2', city='$city', state='$state', postalCode='$postalCode', country='$country', salesRepEmployeeNumber='$salesRepEmployeeNumber', creditLimit='$creditLimit' WHERE customerNumber='$customerNumber'"; 
    
      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: customer.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>UPDATE</title>
  </head>

  <body>
    <nav>
      <h2>Pemrograman Web</h2>
    </nav>

    <div>
      <div>
        <nav>
            <ul>
              <li>
                <a href="<?php echo "customer.php"; ?>">Data Customer</a>
              </li>
              <li>
                <a href="<?php echo "add.php"; ?>">Tambah Data Customers</a>
              </li>
            </ul>
        </nav>

        <main role="main">


          <h3>Update Data Customers</h3>
          <form action="update.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>

            <div>
              <label>customerNumber</label>
              <input type="text" placeholder="customerNumber" name="customerNumber" value="<?php echo $data['customerNumber'];  ?>" required="required" readonly>
            </div>
            <div>
              <label>customerName</label>
              <input type="text" placeholder="customerName" name="customerName" value="<?php echo $data['customerName'];  ?>" required="required">
            </div>
            <div>
              <label>contactLastName</label>
              <input type="text" placeholder="contactLastName" name="contactLastName" value="<?php echo $data['contactLastName'];  ?>" required="required">
            </div>
            <div>
              <label>contactFirstName</label>
              <input type="text" placeholder="contactFirstName" name="contactFirstName" value="<?php echo $data['contactFirstName'];  ?>" required="required">
            </div>
            <div>
              <label>phone</label>
              <input type="text" placeholder="phone" name="phone" value="<?php echo $data['phone'];  ?>" required="required">
            </div>
            <div>
              <label>addressLine1</label>
              <textarea name="addressLine1" required="required"><?php echo $data['addressLine1'];  ?></textarea>
            </div>
            <div>
              <label>addressLine2</label>
              <textarea name="addressLine2" required="required"><?php echo $data['addressLine2'];  ?></textarea>
            </div>
            <div>
              <label>city</label>
              <input type="text" placeholder="city" name="city" value="<?php echo $data['city'];  ?>" required="required">
            </div>
            <div>
              <label>state</label>
              <input type="text" placeholder="state" name="state" value="<?php echo $data['state'];  ?>" required="required">
            </div>
            <div>
              <label>postalCode</label>
              <input type="text" placeholder="postalCode" name="postalCode" value="<?php echo $data['postalCode'];  ?>" required="required">
            </div>
            <div>
              <label>country</label>
              <input type="text" placeholder="country" name="country" value="<?php echo $data['country'];  ?>" required="required">
            </div>
            <div>
              <label>salesRepEmployeeNumber</label>
              <input type="text" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber'];  ?>" required="required">
            </div>
            <div>
              <label>creditLimit</label>
              <input type="text" placeholder="creditLimit" name="creditLimit" value="<?php echo $data['creditLimit'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>