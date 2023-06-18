<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $postImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        }

        Product::create($input);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Post Create Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::find($id);
        return view('admin.products.show')->with(['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        return view('admin.products.edit')->with(['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $postImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        } else {
            unset($input['image']);
        }

        $product->update($input);

        return redirect()
            ->route('home')
            ->with('success', 'Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::where('id', $id)->first();
        if ($products != null) {
            $products->delete();
            return redirect()
                ->back()
                ->with(['message' => 'Successfully deleted!!']);
        }
        return redirect()
            ->back()
            ->with(['message' => 'Wrong ID!!']);
    }
}
