<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
		$searchVal = $request->search ?? null;

        //fetch all contacts
        //$categories = Category::all();

        //fetch all categories
        //return view('category.index', compact('categories'));

		$categories = Category::where('category_name', 'LIKE', '%' . $searchVal . '%')->whereNot('id', auth()->user()->id)->paginate(10)->withQueryString();

        return view('category.index', compact('categories','searchVal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
		return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        //insert data
        $category                   = new Category;
        $category->category_name    = $data['category_name'];
        $category->description      = $data['description'];
        $category->save();

        //return back();
        return redirect()->route('categories.index')->with('status', $data['category_name'] . ' has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
		return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        //
        $data = $request->validated();

        //insert data
        $category->category_name    = $data['category_name'];
        $category->description      = $data['description'];
        $category->save();

        //return back();
        return redirect()->route('categories.index')->with('status', $data['category_name'] . ' has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
		// delete contact
		$category->delete();
        $message = $category->category_name . " has been successfully deleted.";
		// redirect to contact page
		return redirect()->route('categories.index')->with('status', $message);
    }
}
