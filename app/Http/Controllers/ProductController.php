<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(int $quantity, $paginate = false)
    {
    }

    public function getOldProducts(int $quantity, Request $request)
    {
        $oldProductsUrl = env('URL_SERVER_API') . "/$quantity/products";
        $request = new Request();
        try {
            $oldProducts = $request->search ? Http::get($oldProductsUrl, [
                'value' =>  $request->search
            ]) :  Http::get($oldProductsUrl);
            return $oldProducts;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getNewProducts(int $quantity)
    {
        $newProductsUrl = env('URL_SERVER_API') . "/$quantity/newproducts";
        try {
            $newProducts = Http::get($newProductsUrl);
            return $newProducts;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function getAllProducts()
    {
        $url = env('URL_SERVER_API') . "/allproducts";
        try {
            $response = Http::get($url);
            return $response;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function getFilterProducts(Request $request)
    {
        $url = env('URL_SERVER_API') . "/filterproducts";
        $data = Http::get($url, [
            'value' => $request->search
        ]);
        $data = $data->json();
        return view('admin.products', compact('data'));
    }

    public function store(ProductRequest $request)
    {
        $imgs = $request->file('img')->store('public/images');
        $urlImage = Storage::url($imgs);
        $url = env('URL_SERVER_API');
        $response = Http::post($url . '/products', [
            'name' => $request->name,
            'brand' => $request->brand,
            'unit_price' => $request->unit_price,
            'stock' => $request->stock,
            'category' => $request->category,
            'new_product' => $request->new_product ? true : false,
            'img' => $urlImage
        ]);
        $msg = $response['msg'];
        return to_route('products.create')->with('msg', $msg);
    }


    public function create()
    {
        return view('admin.create_products');
    }



    public function show($idProduct)
    {

        $url = env('URL_SERVER_API');
        $response = Http::get($url . "/products/{$idProduct}");
        $productsResponse = $response['product'];
        $nameCategory = $response['category']['name'] ?? null;
        return view('admin.edit_products', compact('productsResponse', 'nameCategory'));
    }

    public function update($idProduct, ProductRequest $request)
    {
        if ($request->img !== null) {
            $images = $request->file('img')->store('public/images');
            $urlImage = Storage::url($images);
        }
        $url = env('URL_SERVER_API');
        $response = Http::put($url . "/products/{$idProduct}", [
            'name' => $request->name,
            'unit_price' => $request->unit_price,
            'stock' => $request->stock,
            'category' => $request->category,
            'img' => $urlImage ?? '',
            'new_product' => $request->new_product
        ]);
        $msg = $response['msg'];
        return to_route('admin.products')->with('msg', $msg);
    }

    public function destroy($idProduct)
    {
        $url = env('URL_SERVER_API');
        $response = Http::delete($url . "/products/{$idProduct}");
        $msg = $response['msg'];
        return to_route('products.create')->with('msg', $msg);
    }

    public function active($idProduct)
    {
        $url = env('URL_SERVER_API');
        $response = Http::get($url . "/products/active/{$idProduct}");
        $msg = $response['msg'];
        return to_route('admin.products')->with('msg', $msg);
    }

    public function inactive($idProduct)
    {
        $url = env('URL_SERVER_API');
        $response = Http::get($url . "/products/status/{$idProduct}");
        return to_route('admin.products');
    }


    public function paginate($items, $perPage = 4, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentPage = $page;
        $offset = ($currentPage * $perPage) - $perPage;
        $itemsToShow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemsToShow, $total, $perPage);
    }

    public function cart()
    {

        return view('shop_cart');
    }
}
