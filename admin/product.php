<?php

  class Product {

    public $name;
    public $description;
    public $expire_at;
    public $netto_price;
    public $vat_tax;
    public $quantity;
    public $is_available;
    public $category_id;
    public $weight;
    public $image;

    function __construct($name, $description, $expire_at, $netto_price, $vat_tax,
                     $quantity, $is_available, $category_id, $weight, $image) {
      $this->name = $name;
      $this->description = $description;
      $this->expire_at = $expire_at;
      $this->netto_price = $netto_price;
      $this->vat_tax = $vat_tax;
      $this->quantity = $quantity;
      $this->is_available = $is_available;
      $this->category_id = $category_id;
      $this->weight = $weight;
      $this->image = $image;
    }

    function isAllFieldsFilled() {
      $fields = array($this->name, $this->description, $this->expire_at, $this->netto_price,
                      $this->vat_tax, $this->quantity, $this->is_available, $this->category_id,
                      $this->weight, $this->image);

      foreach($fields as $field) {
        if (empty($field)) {
          return false;
        }
      }
      
      return true;
    }

    function sanitizeFields() {
      $this->name = htmlspecialchars($this->name);
      $this->description = htmlspecialchars($this->description);
      $this->name = htmlspecialchars($this->name);
      $this->image = htmlspecialchars($this->image);
    }

  }

?>