<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // SHOW all products (homepage / listing)
    public function index(Request $request)
    {
        $query = Product::query();

        // Simple search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->paginate(9);

        return view('products.index', compact('products'));
    }

    // SHOW one product detail
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // SHOW form to create a new product
    public function create()
    {
        return view('products.create');
    }

    // SAVE new product to database
    public function store(Request $request)
    {
        // Validate the form input
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required|string',
            'size'        => 'required|string',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|max:2048', // max 2MB
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // SHOW form to edit an existing product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // SAVE changes to an existing product
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required|string',
            'size'        => 'required|string',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // DELETE a product
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}