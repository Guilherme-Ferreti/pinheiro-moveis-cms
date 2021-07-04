<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index() : View
    {
        $products = Product::latest()->filter(request(['search']))
                        ->paginate()
                        ->withQueryString();

        return view('products.index', compact('products'));
    }

    public function create() : View
    {
        return view('products.create');
    }

    public function store(ProductRequest $request) : RedirectResponse
    {
        Product::create($request->validated());

        return redirect()->route('products.index');
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

    public function edit(Product $product) : View
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->validated());

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
