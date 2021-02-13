<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    protected $id=5;
    protected $products="https://gorest.co.in/public-api/products";
    protected $productCategories="https://gorest.co.in/public-api/product-categories";
    protected $categories="https://gorest.co.in/public-api/categories";

    public function index(){
        return view('welcome');

    }
    public function getCategories(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->categories,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return response()->json($err);

        } else {
            return response()->json(json_decode($response));
        }
    }
    public function getIndexData($page=1){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->products."?page=".$page,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return response()->json($err);

        } else {
            return response()->json(json_decode($response));
        }
    }
    public function getProductDetail($id=0){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->products."?id=".$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return response()->json($err);

        } else {
            return response()->json(json_decode($response));
        }
    }
    public function getCategoryData($id,$page){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->products."?categories[]=".$id."&page=".$page,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return response()->json($err);

        } else {
            return response()->json(json_decode($response));
        }
    }
}
