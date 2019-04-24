<?php

namespace App\Http\Controllers;

use App\Add;
use App\Page;
use App\TagCategory;
use App\PageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Traits\FileUploadTrait;

class PageController extends Controller
{
    use FileUploadTrait;
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
        $pages = Page::all();
        $page_categories = PageCategory::pluck('name', 'id');
        return view('Pages.index', compact('pages', 'page_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag_categories = TagCategory::all();
        $page_categories = PageCategory::pluck('name', 'id');
        return view('Pages.create', compact('tag_categories', 'page_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'banner_image'=>'mimes:jpeg,bmp,png|max:2048kb'
        ]);
        $input = $request->all();
        if (!empty($input['tag_ids'])) {
            $input['tag_ids'] = implode(',', $input['tag_ids']);
        }
       
        $page = Page::create($input);
        if ($page) {
            if(!empty($input['banner_image'])) {
               $banner_image_name = !empty($input['banner_image_name']) ? $input['banner_image_name'] : '';
               $page->addMedia($input['banner_image'])->usingName($banner_image_name)->toMediaCollection('page_thumb');
            }
            for ($i=1; $i<=3; $i++) {
                if (!empty($input['add_image_'.$i])) {
                    if (!empty($input['add_image_'.$i])) {
                        $add = new Add();
                        //$add->image = $this->upload($input['add_image_'.$i], 'images/add_images/');
                        $add_image_name = '';
                        if (!empty($input['add_image_name_'.$i])) {
                            $add_image_name = $add->image_name = $input['add_image_name_'.$i];
                        }
                        if (!empty($input['add_image_alt_tag_'.$i])) {
                            $add->image_alt_tag = $input['add_image_alt_tag_'.$i];
                        }
                        if (!empty($input['add_image_link_'.$i])) {
                            $add->image_link = $input['add_image_link_'.$i];
                        }
                        $add->page_id = $page->id;
                        $add->save();

                        $add->addMedia($input['add_image_'.$i])->usingName($add_image_name)->toMediaCollection('add_image');
                    }
                }
            }
            Session::flash('message', 'You have successfully added Page');
        }
        return redirect(route('pages.index'));
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $add_images = [];
        $tag_categories = TagCategory::all();
        $atag_ids = explode(',', $page->tag_ids);
        $add_ids = Add::where('page_id', $page->id)->get();
        $page_categories = PageCategory::pluck('name', 'id');
        if (!empty($add_ids)) {
            $i = 1;
            foreach ($add_ids as $add) {
                //$add = Add::findOrFail($atag_id);
                $add_images['add_image_'.$i] = $add->getMedia('add_image')->first()->getUrl();
                $add_images['add_image_name_'.$i] = $add->image_name;
                $add_images['add_image_alt_tag_'.$i] = $add->image_alt_tag;
                $add_images['add_image_link_'.$i] = $add->image_link;
                $i++;
            }
        }
        return view('Pages.edit', compact('page', 'tag_categories', 'atag_ids', 'add_images', 'page_categories'));
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
        $page = Page::findOrFail($id);
        $input = $request->all();
        if (!empty($input['tag_ids'])) {
            $input['tag_ids'] = implode(',', $input['tag_ids']);
        }
       
        $apage = $page->update($input);
        if ($apage) {
            if(!empty($input['banner_image'])) {
                if (!empty($page->getMedia('page_thumb'))) {
                    $allmedias = $page->getMedia('page_thumb');
                    if (!empty($allmedias[0])) {
                        $allmedias[0]->delete();
                    }
                }
                $banner_image_name = !empty($input['banner_image_name']) ? $input['banner_image_name'] : '';
                $page->addMedia($input['banner_image'])->usingName($banner_image_name)->toMediaCollection('page_thumb');
            }
            $add_ids = Add::where('page_id', $page->id)->delete();
            for ($i=1; $i<=3; $i++) {
                if (!empty($input['add_image_'.$i]) || !empty($input['hidden_add_image_'.$i])) {
                    $add = new Add();
                    $add_image_name = '';
                    /*if (empty($input['add_image_'.$i])) {
                        $add->image = $input['hidden_add_image_'.$i];
                    } else {
                        $add->image = $this->upload($input['add_image_'.$i], 'images/add_images/');
                    }*/
                    if (!empty($input['add_image_name_'.$i])) {
                        $add_image_name = $add->image_name = $input['add_image_name_'.$i];
                    }
                    if (!empty($input['add_image_alt_tag_'.$i])) {
                        $add->image_alt_tag = $input['add_image_alt_tag_'.$i];
                    }
                    if (!empty($input['add_image_link_'.$i])) {
                        $add->image_link = $input['add_image_link_'.$i];
                    }
                    $add->page_id = $page->id;
                    $add->save();
                    $add->addMedia($input['add_image_'.$i])->usingName($add_image_name)->toMediaCollection('add_image');
                }
            }
            Session::flash('message', 'You have successfully added Page');
        }
        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id)->delete();
        return back();
    }
}
