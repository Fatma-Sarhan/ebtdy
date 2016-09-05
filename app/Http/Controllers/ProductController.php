<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::orderBy('id', 'desc')->paginate(10);

		return view('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$cats = Category::all();
		// return $cats;
		return view('products.create', compact('cats'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user = Auth::user();
		$product = new Product();

		$product->name = $request->input("name");
        $product->cat_id = $request->cat_id;
        $product->user_id = $user->id;

		$product->save();
		// return $request->cat_id;

		return redirect()->route('products.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);

		return view('products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		$cats = Category::all();

		return view('products.edit', compact('product','cats'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$user = Auth::user();
		$product = Product::findOrFail($id);

		$product->name = $request->name;
        $product->cat_id = $request->cat_id;
        $product->user_id = $user->id;

		$product->save();

		return redirect()->route('products.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);
		$product->delete();
		$products = Product::orderBy('id', 'desc')->paginate(10);

		return [$products];
		// return redirect()->route('products.index')->with('message', 'Item deleted successfully.');
	}

}
