<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    public function showHomeWithProducts()
    {
		$products = Product::with('category')->get();
		return view('index', compact('product'));
    }

	public function getUser(User $user)
	{
		$user = User::get();
		return view('carrito-vista.list-product', compact('user'));
		// dd($user);
	}

	public function homeView()
	{
		return view('productsview.index');
	}

	public function showProducts()
    {
        // $categories = Category::get();
		return view('products.index');
    }

	public function productsTechnology()
    {
		$products = $this->getAllProducts()->original['products'];
        return view('vistas-products.products-technology', compact('products'));
    }

	public function productsVehicle()
    {
		$products = $this->getAllProducts()->original['products'];
        return view('vistas-products.products-vehicle', compact('products'));
    }

	public function productsHomeAppliances()
    {
		$products = $this->getAllProducts()->original['products'];
        return view('vistas-products.products-Home-appliances', compact('products'));
    }

	public function getProduct(Product $product)
	{
		$product->load('Category');
		return view('vistas-products.getAProduct', compact('product'));
	}

	public function getAllProducts()
	{
		$products = Product::get();
		return response()->json(['products' => $products], 200);
	}

	public function getAllProductsForDataTable()
    {
		$product = Product::with('Category');
        return DataTables::of($product)
        ->addColumn('action', function($row){
            return "<a href='#' onclick='event.preventDefault();'
            data-id='{$row->id}'
            role='edit'
            class='btn btn-warning btn-sm'>Edit </a>
            <a href='#' onclick='event.preventDefault();'
            data-id='{$row->id}'
            role='delete'
            class='btn btn-secondary btn-sm'>Delete </a>";
        })
        ->rawColumns(['action'])
        ->make();
    }


    public function getAProduct(Product $product)
    {
        $product->load('Category');
       return response()->json(['product' => $product], 200,);
    }

    // public function getAllUsersWithLends()
    // {
    //     $users = User::With('CustomerLends.Book')->get(); //has('CustomerLends.Book') where('id', 10)
    //     return response()->json(['users' => $users], 200);
    // }

    // public function getAllLendsByUser(User $user)
    // {
    //     $CustomerLends = $user->load('CustomerLends.Book.Category', 'CustomerLends.Book.Author')->CustomerLends;
    //     return response()->json(['customer_lends' => $CustomerLends], 200);
    // }


    // public function getAnBook(Book $book)
    // {
    //     return response()->json(['book' => $book], 200);
    // }

    public function createProduct(CreateProductRequest $request)
    {
        $product = new Product($request->all());
        $product->save();
        return response()->json(['product' => $product], 201);
    }

    public function saveProduct(Request $request)
    {
        $product = new Product($request->all());
        $this->uploadImages($request, $product);
        $product->save();
        return response()->json(['product' => $product], 201);
    }

    public function updateProduct(Product $product, Request $request)
    {
        $requestAll = $request->all();
        $this->uploadImages($request, $product);
        $requestAll['image'] = $product->image;
        $product->update($requestAll);
        return response()->json(['product' => $product->refresh()->load('Category')], 201);
    }


    public function deleteProduct(Product $product)
    {
        $product->delete();
        return response()->json([], 204);
    }

    private function uploadImages($request, &$product)
    {
        if (!isset($request->images)) return;
        $random = Str::random(20);
        $image_name = "{$random}.{$request->images->clientExtension()}";
        $request->images->move(storage_path('app/public/image'), $image_name);
        $product->images = $image_name;
    }
}

