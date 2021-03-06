<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Http\Resources\ProductResource;
 use App\Http\Resources\ProductCollection;

class ProductsController extends Controller
{
    /*
    * @var Product
    */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(1);
       // return response()->json($products);
       return new ProductCollection($products);
    }

    public function show($id)
    {
        $product = $this->product->find($id);
        // return response()->json($product);
        return new ProductResource($product);
    }


    public function save(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $product = $this->product->create($data);

        return response()->json($product);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $product = $this->product->find($data['id']);
        $product->update($data);
        return response()->json($product);
    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();
        // return new ProductResource($product);
        return response()->json(['data' => ['msg' => 'Produto removido com sucesso']]);
    }
}
