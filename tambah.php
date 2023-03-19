<?php 
  include ('conn.php'); 

  $status = '';
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
      $query = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) 
      VALUES('$productCode' , '$productName' , '$productLine' , '$productScale' , '$productVendor' , '$productDescription' , '$quantityInStock' , '$buyPrice' , '$MSRP')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ADD</title>
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
                <a href="<?php echo "tambah.php"; ?>">Tambah Data Products</a>
              </li>
            </ul>
        </nav>

        <main role="main">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Products berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Products gagal disimpan</div>';
              }
           ?>

          <h3>Form Tambah Data Products</h3>
          <form action="tambah.php" method="POST">
            
            <div>
              <label>productCode</label>
              <input type="text" placeholder="productCode" name="productCode" required="required">
            </div>
            <div>
              <label>productName</label>
              <input type="text" placeholder="productName" name="productName" required="required">
            </div>
            <div>
              <label>productLine</label>
              <input type="text" placeholder="productLine" name="productLine" required="required">
            </div>
            <div>
              <label>productScale</label>
              <input type="text" placeholder="productScale" name="productScale" required="required">
            </div>
            <div>
              <label>productVendor</label>
              <input type="text" placeholder="productVendor" name="productVendor" required="required">
            </div>
            <div>
              <label>productDescription</label>
              <textarea name="productDescription" required="required"></textarea>
            </div>
            <div>
              <label>quantityInStock</label>
              <input type="text" placeholder="quantityInStock" name="quantityInStock" required="required">
            </div>
            <div>
              <label>buyPrice</label>
              <input type="text" placeholder="buyPrice" name="buyPrice" required="required">
            </div>
            <div>
              <label>MSRP</label>
              <input type="text" placeholder="MSRP" name="MSRP" required="required">
            </div>
            
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>