<?php
include('product.php');

  class ProductQueries {

    function addProductQuery() {

      include('cfg.php');

      $product = new Product($_POST['name'], $_POST['description'], $_POST['expire_at'],
                             $_POST['netto_price'], $_POST['vat_tax'], $_POST['quantity'], 
                             isset($_POST['is_available']) ? 1 : 0, $_POST['category_id'], 
                             $_POST['weight'], $_POST['image']);

      if(!$product->isAllFieldsFilled()) {
        return "Please fill all fields.";
      }

      $product->sanitizeFields();

      $query = "INSERT INTO product(name, description, created_at, modified_at, expire_at, netto_price, 
                                       vat_tax, quantity, is_available, category_id, weight, image) 
                              values('$product->name', '$product->description', CURRENT_TIMESTAMP, null, 
                              '$product->expire_at', '$product->netto_price', '$product->vat_tax', 
                              '$product->quantity', '$product->is_available', '$product->category_id', 
                              '$product->weight', '$product->image') LIMIT 1";

      $result = mysqli_query($link, $query);
        
      if($result) {
        $message = "Successfully added new product. Refresh page, to see changes on products list.";
      }
      else {
        $message = "Error while adding new product.";
      }

      return $message;
    }

    private function checkIfRecordWithGivenIdExists(int $recordId) {
      include('cfg.php'); // include cfg.php to obtain $link variable

      $result = mysqli_query($link, "SELECT COUNT(*) from product WHERE id = '$recordId'");
      $count = mysqli_fetch_array($result)[0];

      return $count > 0 ? true : false;
    }

    function editProductQuery() {

      include('cfg.php');

      if(!$this->checkIfRecordWithGivenIdExists($_POST['id'])) {
        return "Product with given id doesn't exists!";
      }
      
      $product = new Product($_POST['name'], $_POST['description'], $_POST['expire_at'],
      $_POST['netto_price'], $_POST['vat_tax'], $_POST['quantity'], $_POST['is_available'],
      $_POST['category_id'], $_POST['weight'], $_POST['image']);

      if(!$product->isAllFieldsFilled()) {
        return "Please fill all fields.";
      }

      $product->sanitizeFields();

      $id = $_POST['id'];

      $query = "UPDATE product SET name='$product->name',
                                   description='$product->description',
                                   expire_at='$product->expire_at',
                                   netto_price='$product->netto_price',
                                   vat_tax='$product->vat_tax',
                                   quantity='$product->quantity',
                                   is_available='$product->is_available',
                                   category_id='$product->category_id',
                                   weight='$product->weight',
                                   image='$product->image',
                                   modified_at=CURRENT_TIMESTAMP
                                   WHERE id='$id' LIMIT 1";

      $result = mysqli_query($link, $query);

      if($result) {
        $message = "Successfully edited product with id: '$id'. Refresh page, to see changes on product list.";
      }
      else {
        $message = "Error while editing product with given id.";
      }

      return $message;
    }

    function deleteProductQuery() {

      include('cfg.php');

      if(empty($_POST['id'])) {
        return "Please specify id of a category you want to delete.";
      }

      if(!$this->checkIfRecordWithGivenIdExists(($_POST['id']))) {
        return "Record with given id doesn't exists!";
      }
  
      $id = htmlspecialchars($_POST['id']);
  
      $query = "DELETE FROM product WHERE id = $id LIMIT 1";
      $result = mysqli_query($link, $query);
  
      if($result) {
        $message = "Successfully deleted product with id: $id. Refresh page, to see changes on products list.";
      }
      else {
        $message = "Error while deleting product. Check if product with given id exists.";
      }
  
      return $message;
  
    }

    static function checkIfProductIsAvailable(int $product_id) {
      include('cfg.php');

      $availabilityQuery = "SELECT is_available FROM product WHERE id='$product_id' LIMIT 1";
      $result = mysqli_query($link, $availabilityQuery);
      $row = mysqli_fetch_array($result);
      $availability = $row['is_available'];
      
      return $availability == 1 ? true : false;
    }

    static function checkIfProductQuantityIsBiggerThanZero(int $product_id) {
      include('cfg.php');

      $quantityQuery = "SELECT quantity FROM product WHERE id='$product_id' LIMIT 1";
      $result = mysqli_query($link, $quantityQuery);
      $row = mysqli_fetch_array($result);
      $quantity = $row['quantity'];

      return $quantity > 0 ? true : false;
    }

    static function checkIfProductExpiredDateIsAfterTodaysDate(int $product_id) {
      include('cfg.php');

      $expireDateQuery = "SELECT CASE WHEN EXISTS 
                            (SELECT 1 FROM product 
                             WHERE id='$product_id'
                             AND expire_at > CURDATE() )
                             THEN 'true' ELSE 'false' END as is_after_today";

      $result = mysqli_query($link, $expireDateQuery);
      $row = mysqli_fetch_array($result);
      $isProductExpired = $row['is_after_today'];

      return $isProductExpired == "true" ? true : false;
    }


  }


?>