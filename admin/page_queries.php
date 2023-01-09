<?php

class PageQueries {

  function addPageQuery() {

    include('cfg.php');

    $title = htmlspecialchars($_POST['title']);
    $context = htmlspecialchars($_POST['context']);
    $status = $_POST['status'];

    if(isset($status)){
      $status = 1;
    }
    else {
      $status = 0;
    }

    $query = "INSERT INTO page_list(page_title, page_context, status) VALUES('$title', '$context', '$status') LIMIT 1";
    $result = mysqli_query($link, $query);
    
    if($result) {
      $message = "Successfully added new page. Refresh page, to see changes on page list.";
    }
    else {
      $message = "Error while adding new page.";
    }

    return $message;

  }

  function editPageQuery() {

    include('cfg.php');

    if(empty($_POST['id'])) {
      return "Please specify id of a page you want to edit.";
    }

    if(!$this->checkIfRecordWithGivenIdExists(($_POST['id']))) {
      return "Record with given id doesn't exists!";
    }

    $id = htmlspecialchars($_POST['id']);
    $title = htmlspecialchars($_POST['title']);
    $context = htmlspecialchars($_POST['context']);
    $status = $_POST['status'];

    if(isset($status)){
      $status = 1;
    }
    else {
      $status = 0;
    }

    $query = "UPDATE page_list SET page_title='$title', page_context='$context', status='$status' WHERE id='$id' LIMIT 1";
    $result = mysqli_query($link, $query);
    
    if($result) {
      $message = "Successfully edited page with id: '$id' to '$title'. Refresh page, to see changes on page list.";
    }
    else {
      $message = "Error while editing page given id.";
    }

    return $message;

  }

  function deletePageQuery() {

    include('cfg.php');

    if(empty($_POST['page_id'])) {
      return "Please specify id of a page you want to delete.";
    }

    if(!$this->checkIfRecordWithGivenIdExists(($_POST['page_id']))) {
      return "Record with given id doesn't exists!";
    }

    $id = htmlspecialchars($_POST['page_id']);

    // $id = 11 is id for admin page, it should never be deleted, so if user choose to delete that page, 
    // he will be given an output, that he cant delete it.
    // NOTE: if user want to delete admin page, he must to do it strictly in database 
    if($id != 11){
      $query = "DELETE FROM page_list WHERE id = $id LIMIT 1";
      $result = mysqli_query($link, $query);
    }

    if($result) {
      $message = "Successfully deleted page with id: $id. Refresh page, to see changes on page list.";

    }
    else {
      $message = "Error while deleting page. Check if page with given id exists. (You can't delete admin page)";
    }

    return $message;

  }

  private function checkIfRecordWithGivenIdExists(int $recordId) {
    include('cfg.php');
    $result = mysqli_query($link, "SELECT COUNT(*) from page_list WHERE id = '$recordId'");
    $count = mysqli_fetch_array($result)[0];

    return $count > 0 ? true : false;
  } 

}

?>