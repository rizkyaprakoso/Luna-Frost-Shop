<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    //product category list
    public function category()
    {
        $data = [
            'title' => 'Product List', 
            'category_list' => $this->ProductModel->orderBy('product_id', 'DESC')->findAll()
        ];
        
        return view('admin/product/category', $data);
    }

    //add product category 
    public function store()
    {
        //take slug 
        $slug = url_title($category_name ??'','-', TRUE);

        //Save data ke database
        $data = [
            'category_name' => esc($this->request->getPost('category_name')),
            'slug_product' => $slug,
            'gender' => esc($this->request->getPost('gender')),
            'product_name' => esc($this->request->getPost('product_name')),
            'description' => esc($this->request->getPost('description')),
            'size' => esc($this->request->getPost('size')),
            'price' => esc($this->request->getPost('price')),
            'stock' => esc($this->request->getPost('stock')),
            'image' => esc($this->request->getPost('image')),
        ];

        $this->ProductModel->insert($data);

        return redirect()->back()->with('success', 'Product data has been successfully added.');
    }

    //to edit the product category
    public function update($product_id)
    {
        //take slug 
        $slug = url_title($category_name ??'','-', TRUE);

        //Save data ke database
        $data = [
            'category_name' => esc($this->request->getPost('category_name')),
            'slug_product' => $slug,
            'gender' => esc($this->request->getPost('gender')),
            'product_name' => esc($this->request->getPost('product_name')),
            'description' => esc($this->request->getPost('description')),
            'size' => esc($this->request->getPost('size')),
            'price' => esc($this->request->getPost('price')),
            'stock' => esc($this->request->getPost('stock')),
            'image' => esc($this->request->getPost('image')),
        ];
 
        $this->ProductModel->update($product_id, $data);
 
        return redirect()->back()->with('success', 'Product data has been successfully updated.');

    }

    //to delete the product category
    public function destroy($product_id)
    {
        $this->ProductModel->where('product_id', $product_id)->delete();
 
        return redirect()->back()->with('success', 'Product data has been successfully deleted.');

    }
}
