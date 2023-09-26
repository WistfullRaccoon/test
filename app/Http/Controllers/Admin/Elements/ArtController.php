<?php

namespace App\Http\Controllers\Admin\Elements;

use App\Models\Elements\Art;
use App\Assistants\Arts\ArtService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Arts\CreateRequest;
use App\Http\Requests\Arts\EditRequest;
use App\Models\Subcategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArtController extends Controller
{
    private $service;

    /**
     * @param ArtService $service
     */

    public function __construct(ArtService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Factory|View
     */

    public function index()
    {
        $arts = Art::all();

        return view('admin.arts.index', ['arts' => $arts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */

    public function create()
    {
        $subcategories = Subcategory::getSubcategoriesTitles();

        return view('admin.arts.create', ['subcategories' => $subcategories]);
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */

    public function store(CreateRequest $request)
    {
        try {
            $this->service->create($request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.arts.index');
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
        $art = Art::find($id);
        $usedTags = $this->service->getTags($art);
        $subcategories = Subcategory::getSubcategoriesTitles();

        return view('admin.arts.edit', compact('art', 'subcategories', 'usedTags'));
    }

    /**
     * @param EditRequest $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(EditRequest $request, $id)
    {
        try {
            $this->service->edit($request, $id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.arts.index');
    }

    /**
     * @param  int  $id
     * @return RedirectResponse
     */

    public function destroy($id)
    {
        try {
            Art::find($id)->remove();
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.arts.index');
    }


}
