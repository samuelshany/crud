<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::get();
    return view('welcome',get_defined_vars());
});
Route::get('/branches',function(){
    $products = Product::get();
    return response()->json($products);
});
Route::get('/addBranch',function(){
    $product = new Product();
    $product->save();
    $products = Product::get();
    return response()->json($products);
});
Route::post('update/{id}',function(Request $request,$id){
   // dd($request);
Product::where('id',$id)->update($request->except('_token'));
return redirect()->back();
});
