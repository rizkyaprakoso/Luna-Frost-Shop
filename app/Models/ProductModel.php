<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'product_lunafrost';
    protected $primaryKey       = 'product_id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['slug_product', 'gender', 'category_name', 'product_name', 'description', 'size', 'price', 'stock', 'image'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    

    
}
