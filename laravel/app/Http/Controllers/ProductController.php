<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Retrieve search query
    $search = $request->input('search');

    // Fetch products with search functionality
    if ($search) {
        // Filter by name or other attributes (e.g., price, detail)
        $products = Product::where('name', 'like', "%{$search}%")
                            ->orWhere('detail', 'like', "%{$search}%")
                            ->orderBy('id', 'ASC')
                            ->paginate(5);
    } else {
        // Fetch all products if no search query
        $products = Product::orderBy('id', 'ASC')->paginate(5);
    }

    return view('products.index', compact('products'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //VALIDATE THE INPUT
        $request->validate([
            'name'=>'required',
            'price'=>'required|integer',
            'detail'=>'required',
            'publish'=>'required'

        ],[
            'price.required' => 'The price field is required.',
            'price.integer' => 'The price must be a valid integer.',
            'publish.required' => 'Please select whether the product should be published.',

        ]);

        //create new product
        Product::create($request->all());

        //redirect the user and send message
        return redirect()->route('products.index')->with('success','Product created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|integer',
            'detail'=>'required',
            'publish'=>'required'

        ],[
            'price.required' => 'The price field is required.',
            'price.integer' => 'The price must be a valid integer.',
            'publish.required' => 'Please select whether the product should be published.',

        ]);
        $product->update($request->all());
        //create new product
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');

        //redirect the user and send message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
