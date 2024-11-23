<?php
class SearchController{
    public function search(){
        // lấy từ khóa tìm kiếm
        $keyword = $_GET['keyword'];
        // lấy dữ liệu tìm kiếm được
        $categories = (new Category)->all();
        $products = (new Product)->search($keyword);
        $totalQuantity = (new CartController)->totalQuantityCart();
        return view("clients.search", compact('keyword', 'products', 'totalQuantity', 'categories'));
    }
}