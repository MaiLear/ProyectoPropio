<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $url = env('URL_SERVER_API');
        $values = Http::get($url . '/products', [
            'value' =>  $request->search
        ]);
        $data = $values['products'];
        $newProducts = $values['newProducts'];
        return view('admin.products', compact('data', 'newProducts'));
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
            'img' => $urlImage ?? ''
        ]);
        $msg = $response['msg'];
        return to_route('products.create')->with('msg', $msg);
    }

    public function destroy($idProduct)
    {
        $url = env('URL_SERVER_API');
        $response = Http::delete($url . "/products/{$idProduct}");
        $msg = $response['msg'];
        return to_route('products.create')->with('msg', $msg);
    }
}
