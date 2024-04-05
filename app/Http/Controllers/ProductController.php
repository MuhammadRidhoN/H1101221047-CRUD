<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return response(view('products.create', ['categories' => $categories]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
      if (Product::create($request->validated())) {
          return redirect(route('index'))->with('success2', 'Added!');
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
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return response(view('products.edit', ['product' => $product], ['categories' => $categories]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        if ($product->update($request->validated())) {
            return redirect(route('index'))->with('berhasil', 'Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return redirect(route('index'))->with('berhasil', 'Deleted!');
        }
        return redirect(route('index'))->with('error2', 'Sorry, unable to delete this!');
    }
}
