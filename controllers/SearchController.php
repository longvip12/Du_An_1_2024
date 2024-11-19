<?php
class SearchController{
    public function search(){
        // lấy từ khóa tìm kiếm
        $keyword = $_GET['keyword'];
        // lấy dữ liệu tìm kiếm được
        $products = (new Product)->search($keyword);
        return view("clients.search", compact('keyword', 'products'));
    }
}