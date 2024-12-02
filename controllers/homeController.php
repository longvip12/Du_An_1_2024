<?php
class homeController
{
    public function index()
    {
        // lấy danh sách Cosmetics
        $product = new Product;
        $cosmetics = $product->listCosmetics();
        $list_products = $product->listBasicCosmetics();

        // danh mục
        $categories = (new Category)->all();

        $totalQuantity = (new CartController)->totalQuantityCart();
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

        return view("clients.home",
         compact('cosmetics','list_products' ,'categories', 'totalQuantity'));
         
    }
    
}
