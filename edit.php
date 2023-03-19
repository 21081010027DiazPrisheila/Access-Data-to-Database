<?php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['productCode'])) {
          //query SQL
          $productCode_upd = $_GET['productCode'];
          $query = "SELECT * FROM products WHERE productCode = '$productCode_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
    //query SQL
    $sql = "UPDATE products SET productName='$productName', productLine='$productLine', productScale='$productScale', productVendor='$productVendor', productDescription='$productDescription', quantityInStock='$quantityInStock', buyPrice='$buyPrice', MSRP='$MSRP' WHERE productCode='$productCode'"; 
    
      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: product.php?status='.$status);
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
                <a href="<?php echo "product.php"; ?>">Data Products</a>
              </li>
              <li>
                <a href="<?php echo "tambah.php"; ?>">Tambah Data Product</a>
              </li>
            </ul>
        </nav>

        <main role="main" >


          <h3>Update Data Products</h3>
          <form action="edit.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>

            <div>
              <label>productCode</label>
              <input type="text" placeholder="productCode" name="productCode" value="<?php echo $data['productCode'];  ?>" required="required" readonly>
            </div>
            <div>
              <label>productName</label>
              <input type="text" placeholder="productName" name="productName" value="<?php echo $data['productName'];  ?>" required="required">
            </div>
            <div>
              <label>productLine</label>
              <input type="text" placeholder="productLine" name="productLine" value="<?php echo $data['productLine'];  ?>" required="required">
            </div>
            <div>
              <label>productScale</label>
              <input type="text" placeholder="productScale" name="productScale" value="<?php echo $data['productScale'];  ?>" required="required">
            </div>
            <div>
              <label>productVendor</label>
              <input type="text" placeholder="productVendor" name="productVendor" value="<?php echo $data['productVendor'];  ?>" required="required">
            </div>
            <div>
              <label>productDescription</label>
              <textarea name="productDescription" required="required"><?php echo $data['productDescription'];  ?></textarea>
            </div>
            <div>
              <label>quantityInStock</label>
              <input type="text" placeholder="quantityInStock" name="quantityInStock" value="<?php echo $data['quantityInStock'];  ?>" required="required">
            </div>
            <div>
              <label>buyPrice</label>
              <input type="text" placeholder="buyPrice" name="buyPrice" value="<?php echo $data['buyPrice'];  ?>" required="required">
            </div>
            <div>
              <label>MSRP</label>
              <input type="text" placeholder="MSRP" name="MSRP" value="<?php echo $data['MSRP'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>