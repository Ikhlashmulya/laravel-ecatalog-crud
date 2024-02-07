<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->view('product.index', compact('products'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'qty' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return response()->redirectToRoute('product.create')->with('error', 'validation error: cek kembali data yang anda inputkan');
        }

        $name = $request->input('name');
        $qty = $request->input('qty');
        $price = $request->input('price');
        $pathImage = Storage::put('image', $request->file('image'));

        Product::create(['name' => $name, 'qty' => $qty, 'price' => $price, 'photo' => $pathImage]);

        return response()->redirectTo('/product')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return response()->view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'qty' => 'integer',
            'price' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->redirectToRoute('product.create')->with('error', 'validation error: cek kembali data yang anda inputkan');
        }

        if ($request->file('image') !== null) {
            Storage::delete($product->photo);
            $product->photo = Storage::put('image', $request->file('image'));
        }

        $product->fill($validator->validate());
        $product->save();

        return response()->redirectTo('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->destroy($product->id);
        Storage::delete($product->photo);
        return response()->redirectTo('/product')->with('success', 'data berhasil dihapus');
    }
}
