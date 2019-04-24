<?php

namespace App\Http\Controllers;

use App\Tag;
use App\TagCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag_categories = TagCategory::all();
        return view('Tags.index', compact('tag_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag_categories = TagCategory::pluck('name', 'id');
        return view('Tags.create',  compact('tag_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['slug']= str_slug($input['name']);
        $tag = Tag::create($input);
        if ($tag) {
            Session::flash('message', 'You have successfully added Tag');
        }
        return redirect(route('tags.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        $tag_categories = TagCategory::pluck('name', 'id');
        return view('Tags.edit', compact('tag', 'tag_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $tag_categories = TagCategory::pluck('name', 'id');
        return view('Tags.edit', compact('tag', 'tag_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $input = $request->all();
        $input['slug']= str_slug($input['name']);
        $atag = $tag->update($input);
        if (!empty($input['tag_image'])) {
            $tag->addMedia($input['tag_image'])->toMediaCollection('tag_image');
        }
        if ($tag) {
            Session::flash('message', 'You have successfully updated Tag');
        }
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return redirect()->back();
    }
}
