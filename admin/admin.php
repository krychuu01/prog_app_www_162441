<?php

include('page_forms.php');
include('page_queries.php');
include('login.php');
include('message.php');
include('logout.php');
include('category_forms.php');
include('category_queries.php');
include('product_forms.php');
include('product_queries.php');

  // ==============================
  // This file contain methods for admin page.
  // If there is form for any action on admin page, there are minimum 
  // two method assigned to it. For example, consider having an 'Edit Page' form.
  // An 'Edit Page' form will have method for displaying it: editPageForm(), 
  // and second method, to perform editing page with SQL query: editPageQuery().
  // So each 'action' will have at least two (or more, if needed) methods,
  // first, to display form needed for 'action' - actionForm()
  // and second, to perform query - actionQuery().
  //
  // PS. methods implementation for displaying forms can be found in page_forms.php file (PageForms class), while
  // methods for queries are in page_queries.php file (PageQueries class)
  //===============================

  class AdminPage {

  // main function, to display all needed forms, and perform logic in other methods
  function adminMethods() {
    include('cfg.php'); // used here, to gain access to variables from cfg.php file
    session_start();
    
    // initializing objects which will be used later 
    $pageForms = new PageForms();
    $pageQueries = new PageQueries();
    $categoryForms = new CategoryForms();
    $categoryQueries = new CategoryQueries();
    $productForms = new ProductForms();
    $productQueries = new ProductQueries();
    $login = new Login();
    $logout = new Logout();

    $showPageList = true; // variable storing boolean value that tells if pageList should be displayed or not

    // if admin is not logged in, there will be only login form displayed
    if(!$login->isAdminLoggedIn()) {
      echo $login->loginForm();

      if(isset($_POST['login'])) {
        $result = $login->loginUser();
        $message = new Message($result);
        $message->printMessage();
        if($login->isAdminLoggedIn()) {
          header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
        }
      }

    }

    // if admin is logged in, login form is replaced by logout form, 
    // and other forms will be displayed
    if($login->isAdminLoggedIn()) {
      
      // displaying logout form
      echo $logout->logoutForm();
      if(isset($_POST['logout'])) {
        $logout->logoutUser();
      }
      
      $message = new Message("PAGE METHODS");
      $message->printMessage();
      // method for displaying pageList only once
      if($showPageList) {
        $this->pageList($link);
        $showPageList = false; // setting showPageList to false here, because otherwise, pageList will be shown twice
      }

      // displaying all admin forms
      echo $pageForms->addPageForm();
      echo $pageForms->editPageForm();
      echo $pageForms->deletePageForm();

      $message = new Message("CATEGORY METHODS");
      $message->printMessage();
      $this->categoryList($link);
      echo $categoryForms->addCategoryForm();
      echo $categoryForms->editCategoryForm();
      echo $categoryForms->deletePageForm();
      echo $categoryQueries->categoryTree();
      $message = new Message("PRODUCT METHODS");
      $message->printMessage();
      $this->productList($link);
      echo $productForms->addProductForm();
      echo $productForms->editProductForm();
      echo $productForms->deleteProductForm();

      // page methods
      if(isset($_POST['add_page'])) {
        $result = $pageQueries->addPageQuery();
        $message = new Message($result);
        $message->printMessage();
        header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
      }

      if(isset($_POST['delete_page'])) {
        $result = $pageQueries->deletePageQuery();
        $message = new Message($result);
        $message->printMessage();
        header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
      }

      if(isset($_POST['edit_page'])) {
        $result = $pageQueries->editPageQuery();
        $message = new Message($result);
        $message->printMessage();
        header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
      }

      //category methods
      if(isset($_POST['add_category'])) {
        $result = $categoryQueries->addCategoryQuery();
        $message = new Message($result);
        $message->printMessage();
        header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
      }

      if(isset($_POST['edit_category'])) {
        $result = $categoryQueries->editCategoryQuery();
        $message = new Message($result);
        $message->printMessage();
        header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
      }

      if(isset($_POST['delete_category'])) {
        $result = $categoryQueries->deleteCategoryQuery();
        $message = new Message($result);
        $message->printMessage();
        header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
      }

      //product methods
      if(isset($_POST['add_product'])) {
        $result = $productQueries->addProductQuery();
        $message = new Message($result);
        $message->printMessage();
        header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
      }

      if(isset($_POST['edit_product'])) {
        $result = $productQueries->editProductQuery();
        $message = new Message($result);
        $message->printMessage();
        header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
      }

      if(isset($_POST['delete_product'])) {
        $result = $productQueries->deleteProductQuery();
        $message = new Message($result);
        $message->printMessage();
        header('Location:?idp=admin_page'); // redirect here to avoid not displaying footer and page identifier after sending a request
      }

    }

  }


  // method used for displaying an list of pages from database table named 'page_list'
  // while loop from PHP is used in it, to display every page record from table 'page_list'.

  function pageList(mysqli $link) {

    $query = "SELECT id, page_title, status FROM page_list";
    $result = mysqli_query($link, $query);
    
    $table='
      <div class="card mt-3">
        <div class="card-body" style="background-color:rgb(130, 180, 253)"> 
        <h2 style="color:black">Page list</h2>
          <table class="table table-success table-striped table-hover" style="width: 500px">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>';
    // here we display all pages in a single list with while loop
    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $page_title = $row['page_title'];
      $status = $row['status'];
            $table = $table .'
              <tr>
                <td>'.$id.'</td>
                <td>'.$page_title.'</td>
                <td>'.$status.'</td>
              </tr>';
    }

    $table .= '</table>
          </div>
        </div>';
    echo $table;

  }

  function categoryList(mysqli $link) {

    $query = "SELECT id, mother, name FROM category";
    $result = mysqli_query($link, $query);

    $table='
      <div class="card mt-3">
        <div class="card-body" style="background-color:rgb(130, 180, 253)"> 
        <h2 style="color:black">Category full list</h2>
          <table class="table table-success table-striped table-hover" style="width: 500px">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Mother</th>
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody>';
    // here we display all categories in a single list with while loop
    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $mother = $row['mother'];
      $name = $row['name'];
            $table = $table .'
              <tr>
                <td>'.$id.'</td>
                <td>'.$mother.'</td>
                <td>'.$name.'</td>
              </tr>';
    }

    $table .= '</table>
          </div>
        </div>';
    echo $table;
  }

  function productList(mysqli $link) {

    $query = "SELECT id, name, description, created_at, modified_at, expire_at, netto_price,
              vat_tax, quantity, is_available, category_id, weight, image FROM product";
    $result = mysqli_query($link, $query);
    
    $table='
      <div class="card mt-3">
        <div class="card-body" style="background-color:rgb(130, 180, 253)"> 
        <h2 style="color:black">Page list</h2>
          <table class="table table-success table-striped table-hover" style="width: 1400px">
            <thead>
              <tr>
                <th scope="col" class="text-center">Id</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Description</th>
                <th scope="col" class="text-center">Created at</th>
                <th scope="col" class="text-center">Modified at</th>
                <th scope="col" class="text-center">Expire at</th>
                <th scope="col" class="text-center">Netto price</th>
                <th scope="col" class="text-center">Vat tax</th>
                <th scope="col" class="text-center">Quantity</th>
                <th scope="col" class="text-center">Is available</th>
                <th scope="col" class="text-center">Category</th>
                <th scope="col" class="text-center">Weight</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>';
    // here we display all pages in a single list with while loop
    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $name = $row['name'];
      $description = $row['description'];
      $created_at = $row['created_at'];
      $modified_at = $row['modified_at'];
      $expire_at = $row['expire_at'];
      $netto_price = $row['netto_price'];
      $vat_tax = $row['vat_tax'];
      $quantity = $row['quantity'];
      $is_available = $row['is_available'];
      $category_id = $row['category_id'];
      $category_name = CategoryQueries::getCategoryName($category_id);
      $weight = $row['weight'];
      $image = $row['image'];
            $table = $table .'
              <tr>
                <td class="text-center align-middle">'.$id.'</td>
                <td class="text-center align-middle">'.$name.'</td>
                <td class="text-center align-middle">'.$description.'</td>
                <td class="text-center align-middle"> '.$created_at.'</td>
                <td class="text-center align-middle">'.$modified_at.'</td>
                <td class="text-center align-middle">'.$expire_at.'</td>
                <td class="text-center align-middle">'.$netto_price.'</td>
                <td class="text-center align-middle">'.$vat_tax.'</td>
                <td class="text-center align-middle">'.$quantity.'</td>
                <td class="text-center align-middle">'.$is_available.'</td>
                <td class="text-center align-middle">'.$category_name.'</td>
                <td class="text-center align-middle">'.$weight.'</td>
                <td> <img src="'.$image.'" alt="cant find image here '.$image.'"</td>
              </tr>';
    }

    $table .= '</table>
          </div>
        </div>';
    echo $table;

  }

}
?>