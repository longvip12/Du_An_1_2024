<?php

 class ProductController{
    // hàm list sẽ láy sản phẩm theo danh mục
    public function list(){
        $id = $_GET['id']; // id danh mục
        // lấy sản phẩm theo danh mục
        $products = (new Product)->listProductInCategory($id);
        $title = '';
        if ($products) {
            $title = $products[0]['cate_name'];
        }
        // lấy danh mục
        $categories = (new Category)->all();
        return view(
            'clients.products.category',
            compact('products', 'categories', 'title')
        );
    }
 }