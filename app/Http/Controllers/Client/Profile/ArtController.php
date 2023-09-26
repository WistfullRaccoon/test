<?php

namespace App\Http\Controllers\Client\Profile;

use App\Assistants\Arts\ArtService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Arts\CreateRequest;
use App\Http\Requests\Arts\EditRequest;
use App\Models\Elements\Art;
use App\Models\Subcategory;
use App\Models\User;
use Auth;
use Gate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $user = Auth::user();
        $subcategories = Subcategory::getSubcategoriesTitles();

        return view('client.profile.arts.create', compact('subcategories', 'user'));
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

        return redirect()->back();
    }

    /**
     * @param  int  $id
     * @return Factory|View
     */

    public function edit(Art $art)
    {
        $this->checkAccess($art);

        $user = Auth::user();
        $subcategories = Subcategory::getSubcategoriesTitles();
        $usedTags = $this->service->getTags($art);

        return view('client.profile.arts.edit',
            compact('art', 'subcategories', 'usedTags', 'user'));
    }

    /**
     * @param EditRequest $request
     * @param Art $art
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Art $art)
    {
        $this->checkAccess($art);

        try {
            $this->service->edit($request, $art);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('own.profile');
    }

    /**
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function checkAccess(Art $art): void
    {
        if (!Gate::allows('manage-own-art', $art)) {
            abort(403);
        }
    }
}
