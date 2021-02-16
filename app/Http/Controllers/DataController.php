<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    protected $id=5;
    protected $products="https://gorest.co.in/public-api/products";
    protected $productCategories="https://gorest.co.in/public-api/product-categories";
    protected $categories="https://gorest.co.in/public-api/categories";
    protected $request;
    public function __construct(RequestController $request)
    {
        $this->request=$request;
    }

    public function index(){
        return view('welcome');

    }
    public function getCategories(){
        $url=$this->categories;
        $response=$this->request->request($url);
        return response()->json(json_decode($response));

    }
    public function getIndexData($page=1){
        $url= $this->products."?page=".$page;
        $response=$this->request->request($url);
        return response()->json(json_decode($response));
    }
    public function getProductDetail($id=0){
        $url=$this->products."?id=".$id;
        $response=$this->request->request($url);
        return response()->json(json_decode($response));


    }
    public function getCategoryData($id,$page){
        $url=$this->products."?categories[]=".$id."&page=".$page;
        $response=$this->request->request($url);
        return response()->json(json_decode($response));

    }
}
