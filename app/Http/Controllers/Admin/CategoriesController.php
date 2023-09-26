<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-categories');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * @return Factory|View
     */

    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $category = Category::add($request->all());
        $category->uploadPreview($request->file('preview'));

        return redirect()->route('admin.categories.index');
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
        $category = Category::find($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * @param EditRequest $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(EditRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        $category->uploadPreview($request->file('preview'));

        return redirect()->route('admin.categories.index');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            Category::find($id)->remove();
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.categories.index');
    }
}
