<?php

  class ProductForms {

    function addProductForm() {

      $addForm = 
      '
          <div class="container mt-2 text-dark">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h1> Create product </h1>
                  </div>
  
                  <div class="card-body">
  
                    <form method="POST">
                    
                      <div class="mb-3">
                        <label for="name">Product name</label>
                        <input type="text" name="name" class="form-control" placeholder="Title">
                      </div>

                      <div class="mb-3">
                        <label for="description">Product description</label>
                        <input type="text" name="description" class="form-control" placeholder="Description">
                      </div>

                      <div class="mb-3">
                        <label for="expire_at">Product expire date</label>
                        <input type="datetime-local" name="expire_at" class="form-control" placeholder="Expire date">
                      </div>

                      <div class="mb-3">
                        <label for="netto_price">Product netto price</label>
                        <input type="number" name="netto_price" class="form-control" placeholder="Netto price" min=1>
                      </div>

                      <div class="mb-3">
                        <label for="vat_tax">Product vat tax</label>
                        <input type="number" name="vat_tax" class="form-control" placeholder="Vat tax" min=1>
                      </div>

                      <div class="mb-3">
                        <label for="quantity">Product quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="quantity" min=0>
                      </div>

                      <div class="mb-3">
                        <label for="is_available">Product availability</label>
                        <input type="checkbox" name="is_available" class="form-check-input">
                      </div>

                      <div class="mb-3">
                        <label for="category_id">Product category</label>
                        <input type="number" name="category_id" class="form-control" placeholder="Category id" min=0>
                      </div>

                      <div class="mb-3">
                        <label for="weight">Product weight</label>
                        <input type="number" name="weight" class="form-control" placeholder="Weight" min=0>
                      </div>

                      <div class="mb-3">
                        <label for="description">Product image</label>
                        <input type="text" name="image" class="form-control" placeholder="Enter the path to the image, e.g. : ../img/product/product_image.jpg">
                      </div>
  
                      <div class="mb-3">
                        <button type="submit" name="add_product" class="btn btn-success">Save product</button>
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

    function editProductForm() {

      $editForm = 
      '
          <div class="container mt-2 text-dark">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h1> Edit product </h1>
                  </div>
  
                  <div class="card-body">
  
                    <form method="POST">

                      <div class="mb-3">
                        <label for="id">Product id</label>
                        <input type="number" name="id" class="form-control" placeholder="Product id" min=1>
                      </div>
                    
                      <div class="mb-3">
                        <label for="name">Product name</label>
                        <input type="text" name="name" class="form-control" placeholder="Title">
                      </div>

                      <div class="mb-3">
                        <label for="description">Product description</label>
                        <input type="text" name="description" class="form-control" placeholder="Description">
                      </div>

                      <div class="mb-3">
                        <label for="description">Product expire date</label>
                        <input type="datetime-local" name="expire_at" class="form-control" placeholder="Expire date">
                      </div>

                      <div class="mb-3">
                        <label for="netto_price">Product netto price</label>
                        <input type="number" name="netto_price" class="form-control" placeholder="Netto price" min=1>
                      </div>

                      <div class="mb-3">
                        <label for="vat_tax">Product vat tax</label>
                        <input type="number" name="vat_tax" class="form-control" placeholder="Vat tax" min=1>
                      </div>

                      <div class="mb-3">
                        <label for="quantity">Product quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="quantity" min=0>
                      </div>

                      <div class="mb-3">
                        <label for="is_available">Product availability</label>
                        <input type="checkbox" name="is_available" class="form-check-input">
                      </div>

                      <div class="mb-3">
                        <label for="category_id">Product category</label>
                        <input type="number" name="category_id" class="form-control" placeholder="Category id" min=0>
                      </div>

                      <div class="mb-3">
                        <label for="weight">Product weight</label>
                        <input type="number" name="weight" class="form-control" placeholder="Weight" min=0>
                      </div>

                      <div class="mb-3">
                        <label for="description">Product image</label>
                        <input type="text" name="image" class="form-control" placeholder="Enter the path to the image, e.g. : ../img/product/product_image.jpg">
                      </div>
  
                      <div class="mb-3">
                        <button type="submit" name="edit_product" class="btn btn-success">Edit product</button>
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

    function deleteProductForm() {

      $deleteForm = 
      '
          <div class="container mt-5 text-dark">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h1> Delete product </h1>
                  </div>
  
                  <div class="card-body">
  
                    <form method="POST">
                    
                      <div class="mb-3">
                        <label for="page_id">Product id</label>
                        <input type="number" name="id" class="form-control" placeholder="Product id" min=1>
                      </div>
  
                      <div class="mb-3">
                        <button type="submit" name="delete_product" class="btn btn-success">Delete product</button>
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