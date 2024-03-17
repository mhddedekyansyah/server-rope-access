<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.app.product.index', \compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('pages.app.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
         $path = 'upload/images/';
        if($request->file('image')){
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);

            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'stok' => $request->stok,
                'image' => $path . $filename
            ]);

            return \to_route('produk.index')->with(['success' => 'Berhasil Menambahkan Produk']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.app.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $path = 'upload/images/';
        if($request->file('image')){
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);

             Product::findOrFail($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'stok' => $request->stok,
                'image' => $path . $filename
            ]);
            return to_route('produk.index')->with(['success' => 'Berhasil Mengupdate Produk']);
        }else{
            Product::findOrFail($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'stok' => $request->stok,
            ]);
            return to_route('produk.index')->with(['success' => 'Berhasil Mengupdate Produk']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with(['success' => 'Berhasil Hapus Produk']);
    }
}
