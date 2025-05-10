<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.home', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'expire_date' => 'required|date',
            'min_stock' => 'required|integer',
            'stock' => 'required|integer',
            'brand' => 'required|string|max:255',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'expire_date' => 'required|date',
            'min_stock' => 'required|integer',
            'stock' => 'required|integer',
            'brand' => 'required|string|max:255',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    public function reduceStock(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if ($product->stock < $request->quantity) {
            return redirect()->route('products.index')->with('error', 'Not enough stock to reduce.');
        }

        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Stock reduced successfully.');
    }


    public function plusStock(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Add the quantity to the current stock
        $product->stock += $request->quantity;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Stock increased successfully.');
    }

    public function show()
    {
        // Fetch products below minimum stock or expired
        $products = Product::whereColumn('stock', '<', 'min_stock') // Compare columns
        ->orWhere('expire_date', '<', now()) // Check expired products
        ->get();
            \Log::info($products);

        // Load the view for the PDF
        $html = view('products.pdf', compact('products'))->render();

        // Configure Dompdf options
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Stream the generated PDF
        return $dompdf->stream('products_report.pdf', ['Attachment' => false]);
    }
}
