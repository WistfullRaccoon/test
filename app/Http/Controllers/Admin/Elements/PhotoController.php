<?php

namespace App\Http\Controllers\Admin\Elements;

use App\Http\Controllers\Controller;
use App\Models\Elements\Photo;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $photos = Photo::all();
        return view('admin.photos.index', ['photos' => $photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $subcategories = Subcategory::pluck('title', 'id')->all();
        return view('admin.photos.create', ['subcategories' => $subcategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'date'  => 'required',
        ]);

        $tags = explode(' ', $request->get('tags'));

        $photo = Photo::add($request->all());
        $photo->uploadImage($request->file('image'));
        $photo->setSubcategory($request->get('subcategory_id'));
        $photo->syncTags($tags);

        return redirect()->route('photos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $photo = photo::find($id);
        $usedTags = '';
        foreach ($photo->tags as $tag) {
            $usedTags .= $tag->name . ' ';
        }
        $subcategories = Subcategory::pluck('title', 'id')->all();
        return view('admin.photos.edit', [
            'photo' => $photo,
            'subcategories' => $subcategories,
            'usedTags' => $usedTags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $tags = explode(' ', $request->get('tags'));

        $this->validate($request, [
            'title' =>'required',
            'description' => 'required',
            'date'  => 'required',
            'image' => 'nullable|image'
        ]);

        $photo = Photo::find($id);
        $photo->edit($request->all());
        $photo->uploadImage($request->file('image'));
        $photo->setSubcategory($request->get('subcategory_id'));
        $photo->syncTags($tags);

        return redirect()->route('photos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Photo::find($id)->remove();
        return redirect()->route('photos.index');
    }
}
