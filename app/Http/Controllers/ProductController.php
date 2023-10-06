<?php

namespace App\Http\Controllers;

use App\Rules\NotNumbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function productsIndex(Request $request)
    {
        $url = env('URL_SERVER_API');
        $values = Http::get($url . '/products',[
            'value' =>  $request->search
        ]);
        $data = $values['products'];
        $newProducts = $values['newProducts'];
        return view('admin.products', compact('data', 'newProducts'));
    }

    public function productsCreate(){
        return view('admin.create_products');
    }


    public function productsStore(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['string', 'required'],
            'brand' => ['required', 'string'],
            'unit_price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'category' => ['required'],
            'img'  => ['required', 'image', 'max:200']
        ]);
        $imgs = $request->file('img')->store('public/images');
        $urlImage = Storage::url($imgs);
        $url = env('URL_SERVER_API');
        $response = Http::post($url . '/products', [
            'name' => $credentials['name'],
            'brand' => $credentials['brand'],
            'unit_price' => $credentials['unit_price'],
            'stock' => $credentials['stock'],
            'category' => $credentials['category'],
            'new_product' => $request->new_product,
            'img' => $urlImage
        ]);
        $msg = $response['msg'];
        return to_route('admin.products.create')->with('msg', $msg);
    }

    public function productView($idProduct)
    {

        $url = env('URL_SERVER_API');
        $response = Http::get($url ."/products/{$idProduct}");
        $productsResponse = $response['product'];
        $nameCategory = $response['category']['name'] ?? null;
        return view('admin.edit_products', compact('productsResponse', 'nameCategory'));
    }

    public function productsEdit($idProduct, Request $request)
    {
        if ($request->img !== null) {
            $images = $request->file('img')->store('public/images');
            $urlImage = Storage::url($images);
        }

        $url = env('URL_SERVER_API');
        $credentials = $request->validate([
            'name' => [new NotNumbers],
            'unit_price' => ['numeric'],
            'stock' => ['numeric'],
            'category' => ['string'],
            'img'  => ['image']
        ]);
        $response = Http::put($url . "/products/{$idProduct}", [
            'name' => $credentials['name'],
            'unit_price' => $credentials['unit_price'],
            'stock' => $credentials['stock'],
            'category' => $credentials['category'],
            'img' => $urlImage ?? ''
        ]);
        $msg = $response['msg'];
        return to_route('admin.products.create')->with('msg', $msg);
    }

    public function productsDelete($idProduct)
    {
        $url = env('URL_SERVER_API');
        $response = Http::delete($url . "/products/{$idProduct}");
        $msg = $response['msg'];
        return to_route('admin.products.create')->with('msg', $msg);
    }
}
