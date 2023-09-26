<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Subcategories\CreateRequest;
use App\Http\Requests\Subcategories\EditRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubcategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-subcategories');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $subcategories = Subcategory::all();

        return view('admin.subcategories.index', ['subcategories' => $subcategories]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $categories = Category::getAllCategories();
        return view('admin.subcategories.create', ['categories' => $categories]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $subcategory = Subcategory::add($request->all());
        $subcategory->uploadPreview($request->file('preview'));

        return redirect()->route('admin.subcategories.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::getAllCategories();

        return view('admin.subcategories.edit', ['subcategory' => $subcategory, 'categories' => $categories]);
    }

    /**
     * @param EditRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(EditRequest $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->update($request->all());
        $subcategory->uploadPreview($request->file('preview'));

        return redirect()->route('admin.subcategories.index');
    }

    /**
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Subcategory::find($id)->remove();
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.subcategories.index');
    }
}
