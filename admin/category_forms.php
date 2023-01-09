<?php

  class CategoryForms {

    function addCategoryForm() {

      $addForm = 
    '
        <div class="container mt-2 text-dark">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h1> Add new category </h1>
                </div>

                <div class="card-body">

                  <form method="POST">
                  
                    <div class="mb-3">
                      <label for="mother">Category mother (id)</label>
                      <input type="number" name="mother" class="form-control" placeholder="If its mother category, just leave it empty.">
                    </div>

                    <div class="mb-3">
                      <label for="name">Category name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    
                    <div class="mb-3">
                      <button type="submit" name="add_category" class="btn btn-success">Add category</button>
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

    function editCategoryForm() {

      $editForm = 
      '
          <div class="container mt-5 text-dark">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h1> Edit category </h1>
                  </div>
  
                  <div class="card-body">
  
                    <form method="POST">
  
                      <div class="mb-3">
                        <label for="id">Category Id</label>
                        <input type="number" name="id" class="form-control" placeholder="Id" min=1>
                      </div>
                    
                      <div class="mb-3">
                        <label for="mother">Mother</label>
                        <input type="number" name="mother" class="form-control" placeholder="If its mother category, just leave it empty.">
                      </div>
                      
                      <div class="mb-3">
                        <label for="name">Category name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                      </div>
  
                      <div class="mb-3">
                        <button type="submit" name="edit_category" class="btn btn-success">Edit category</button>
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

    function deletePageForm() {

      $deleteForm = 
      '
          <div class="container mt-5 text-dark">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h1> Delete category </h1>
                  </div>
  
                  <div class="card-body">
  
                    <form method="POST">
                    
                      <div class="mb-3">
                        <label for="id">Category id</label>
                        <input type="number" name="id" class="form-control" placeholder="Category id" min=1>
                      </div>
  
                      <div class="mb-3">
                        <button type="submit" name="delete_category" class="btn btn-success">Delete category</button>
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

  }

?>