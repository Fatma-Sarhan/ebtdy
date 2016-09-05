<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::orderBy('id', 'desc')->paginate(10);

		return view('categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categories.create');
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
		$category = new Category();

		$category->name = $request->input("name");
        $category->user_id = $user->id;

		$category->save();

		return redirect()->route('categories.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::findOrFail($id);

		return view('categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::findOrFail($id);

		return view('categories.edit', compact('category'));
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
		$category = Category::findOrFail($id);

		$category->name = $request->input("name");
        $category->user_id = $user->id;

		$category->save();

		return redirect()->route('categories.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $id;
		$category = Category::findOrFail($id);
		// $category->delete();

		// return redirect()->route('categories.index')->with('message', 'Item deleted successfully.');
	}

}
