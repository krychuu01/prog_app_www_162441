<?php

  class CategoryQueries {

    function addCategoryQuery() {

      include('cfg.php'); // include cfg.php to obtain $link variable

      if(empty($_POST['name'])) {
        return "Please fill category name.";
      }
    
      // if mother id is not given by user, then it is a mother category, so it has id = 0
      $mother_id = empty($_POST['mother']) ? 0 : htmlspecialchars($_POST['mother']);
      $name = htmlspecialchars($_POST['name']);

      $query = "INSERT INTO category(mother, name) VALUES('$mother_id', '$name') LIMIT 1";
      $result = mysqli_query($link, $query);
        
      if($result) {
        $message = "Successfully added new category. Refresh page, to see changes on categories list.";
      }
      else {
        $message = "Error while adding new page.";
      }

      return $message;
    }

    function editCategoryQuery() {
      include('cfg.php'); // include cfg.php to obtain $link variable

      if(empty($_POST['id'])) {
        return "Please specify id of a category you want to edit.";
      }

      if(!$this->checkIfRecordWithGivenIdExists(($_POST['id']))) {
        return "Record with given id doesn't exists!";
      }
      
      $id = htmlspecialchars($_POST['id']);
      $mother_id = empty($_POST['mother']) ? 0 : htmlspecialchars($_POST['mother']);
      $name = empty($_POST['name']) ? " " : htmlspecialchars($_POST['name']);

      $query = "UPDATE category SET mother='$mother_id', name='$name' where id='$id' LIMIT 1";
      $result = mysqli_query($link, $query);

      if($result) {
        $message = "Successfully edited category with id: '$id' to '$name'. Refresh page, to see changes on category list.";
      }
      else {
        $message = "Error while editing category with given id.";
      }

      return $message;
    }

    function deleteCategoryQuery() {

      include('cfg.php');

      if(empty($_POST['id'])) {
        return "Please specify id of a category you want to delete.";
      }

      if(!$this->checkIfRecordWithGivenIdExists(($_POST['id']))) {
        return "Record with given id doesn't exists!";
      }
  
      $id = htmlspecialchars($_POST['id']);
  
      $query = "DELETE FROM category WHERE id = $id LIMIT 1";
      $result = mysqli_query($link, $query);
  
      if($result) {
        $message = "Successfully deleted category with id: $id. Refresh page, to see changes on category list.";
      }
      else {
        $message = "Error while deleting category. Check if category with given id exists.";
      }
  
      return $message;
  
    }


    private function checkIfRecordWithGivenIdExists(int $recordId) {
      include('cfg.php'); // include cfg.php to obtain $link variable

      $result = mysqli_query($link, "SELECT COUNT(*) from category WHERE id = '$recordId'");
      $count = mysqli_fetch_array($result)[0];

      return $count > 0 ? true : false;
    } 

    static function getCategoryName(int $category_id){
      include('cfg.php'); // include cfg.php to obtain $link variable

      $query = "SELECT name FROM category WHERE id='$category_id' LIMIT 1";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      return $row['name'];
    }
  

    function categoryTree() {
      include('cfg.php'); // include cfg.php to obtain $link variable

      $query = "SELECT id, name FROM category where mother = 0"; // query to get all mothers
      $mothers = mysqli_query($link, $query);

      $table='
        <div class="card mt-3">
          <div class="card-body" style="background-color:rgb(130, 180, 253)"> 
          <h2 style="color:black">Category tree</h2>
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
      while($row = mysqli_fetch_array($mothers)) {
        $id = $row['id'];
        $motherCategoryName = $row['name'];
              $table = $table .'
                <tr>
                  <td>'.$id.'</td>
                  <td> mother category </td>
                  <td>'.$motherCategoryName.'</td>
                </tr>';
        
        // append children for each mother
        $query = "SELECT id, name FROM category where mother = '$id'"; // query to get all children for mother with specified id
        $children = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($children)) {
          $id = $row['id'];
          $name = $row['name'];
                $table = $table .'
                  <tr>
                    <td>'.$id.'</td>
                    <td>'.$motherCategoryName.'</td>
                    <td>'.$name.'</td>
                  </tr>';
        }

      }
      $table .= '</table>
            </div>
          </div>';

      echo $table;
    }

  }

?>