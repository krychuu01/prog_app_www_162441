<?php 

  class PageForms {
    
  function addPageForm() {

    $addForm = 
    '
        <div class="container mt-2 text-dark">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h1> Create page </h1>
                </div>

                <div class="card-body">

                  <form method="POST">
                  
                    <div class="mb-3">
                      <label for="page_title">Page title</label>
                      <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                    
                    <div class="mb-3">
                      <label for="status">Status Active or not active</label>
                      <input type="checkbox" name="status" class="form-check-input">
                    </div>

                    <div class="mb-3">
                      <label for="page_context">Page context</label>
                      <textarea class="form-control" name="context" id="page_context" rows=5></textarea>
                    </div>

                    <div class="mb-3">
                      <button type="submit" name="add_page" class="btn btn-success">Save page</button>
                    </div>

                  </form>

                </div>

              </div>
            </div>
          </div>
        </div>
      ';
      
    return $addForm;
  }

  function deletePageForm() {

    $deleteForm = 
    '
        <div class="container mt-5 text-dark">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h1> Delete page </h1>
                </div>

                <div class="card-body">

                  <form method="POST">
                  
                    <div class="mb-3">
                      <label for="page_id">Page id</label>
                      <input type="number" name="page_id" class="form-control" placeholder="Page id" min=1>
                    </div>

                    <div class="mb-3">
                      <button type="submit" name="delete_page" class="btn btn-success">Delete page</button>
                    </div>

                  </form>

                </div>

              </div>
            </div>
          </div>
        </div>
      ';
      
    return $deleteForm;
  }

  function editPageForm() {

    $editForm = 
    '
        <div class="container mt-5 text-dark">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h1> Edit page </h1>
                </div>

                <div class="card-body">

                  <form method="POST" onsubmit="return editPageQuery()">

                    <div class="mb-3">
                      <label for="id">Page Id</label>
                      <input type="number" name="id" class="form-control" placeholder="Id" min=1>
                    </div>
                  
                    <div class="mb-3">
                      <label for="page_title">Page title</label>
                      <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                    
                    <div class="mb-3">
                      <label for="status">Status Active or not active</label>
                      <input type="checkbox" name="status" class="form-check-input">
                    </div>

                    <div class="mb-3">
                      <label for="page_context">Page context</label>
                      <textarea class="form-control" name="context" id="page_context" rows=5></textarea>
                    </div>

                    <div class="mb-3">
                      <button type="submit" name="edit_page" class="btn btn-success">Save page</button>
                    </div>

                  </form>

                </div>

              </div>
            </div>
          </div>
        </div>
      ';
      
    return $editForm;
  }

}

?>