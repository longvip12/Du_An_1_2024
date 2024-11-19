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

        return view("clients.home",
         compact('cosmetics','list_products' ,'categories'));
         
    }
}