<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $product = Product::all();
        if ($product) {
            return response()->json($product)->setStatusCode(200);
        }else {
            throw new ApiException(404, 'Not Found');
        }

    }
    // Метод для отображения текущего
    public function show($id) {
        $product = Product::find($id);
        if ($product){
            return response()->json($product)->setStatusCode(200);
        } else {
            throw new ApiException(404, 'Not Found');
        }
    }
    // Метод создания
    public function store(CreateProductRequest $request) {
        $product = new Product($request->all());
        $product->save();
        return response()->json($product)->setStatusCode(201);
    }
    // Метод частичного обновления
    public function update(UpdateProductRequest $request, $id) {
        $product = Product::find($id);
        if ($product) {
            $product->update($product->all());
            return response()->json($product)->setStatusCode(200);
        } else {
            throw new ApiException(404, 'Not Found');
        }
    }
    // Метод удаления
    public function destroy($id) {
        $product = Product::find($id);
        if ($product) {
            Product::destroy($id);
            return response()->json($product)->setStatusCode(204);
        } else {
            throw new ApiException(404, 'Not Found');
        }
    }
}
