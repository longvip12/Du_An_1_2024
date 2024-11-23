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
        $totalQuantity = (new CartController)->totalQuantityCart();

        return view(
            'clients.products.category',
            compact('products', 'categories', 'title', 'totalQuantity')
        );
    }
        public function show()
    {
        //Lấy id của sản phẩm
        $id = $_GET['id'];
        //Lấy ra sản phẩm theo id
        $product = (new Product)->find($id);
        //Lấy tên sản phẩm đưa và title
        $title = $product['name'] ?? '';
        //lấy danh mục
        $categories = (new Category)->all();
        //Lưu URI vào session
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];
        $totalQuantity = (new CartController)->totalQuantityCart();
        return view(
            'clients.products.detail',
            compact('product', 'title', 'categories', 'totalQuantity')
        );
    }
 }