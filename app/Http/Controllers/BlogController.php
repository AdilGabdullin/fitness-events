<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
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
    public function index(Request $request)
    {
        $selected_blog_category = $request->blog_category_id;
        if ($selected_blog_category != null) {
            $blogs = Blog::whereIn('blog_category_id', $selected_blog_category)->get();
        } else {
            $selected_blog_category = [];
            $blogs = Blog::all();
        }
        $blog_categories = BlogCategory::all();
        $filter_action = route('blogs.index');
        return view('Blogs.index', compact('blogs', 'blog_categories', 'selected_blog_category', 'filter_action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = BlogCategory::pluck('name', 'id');
        return view('Blogs.create', compact('blog_categories'));
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
            'image'=>'mimes:jpeg,bmp,png|max:2048kb'
        ]);
        $input = $request->all();
        //dd($input);
        
            //$input['image'] = $this->upload($input['image'], 'images/blogs/');
        $blog = Blog::create($input);
        if ($blog) {
            if (!empty($input['image'])) {
                $blog_image_name = !empty($input['image_name']) ? $input['image_name'] : '';
                $blog->addMedia($input['image'])->usingName($blog_image_name)->toMediaCollection('blog_image');
            }
            Session::flash('message', 'You have successfully added Blog');
        }
        return redirect('blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $blog_categories = BlogCategory::pluck('name', 'id');
        return view('Blogs.show', compact('blog', 'blog_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $blog_categories = BlogCategory::pluck('name', 'id');
        return view('Blogs.edit', compact('blog', 'blog_categories'));
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
        $this->validate($request,[
            'image'=>'mimes:jpeg,bmp,png|max:2048kb'
        ]);
        $blog = Blog::findOrFail($id);
        $input = $request->all();
        if(!empty($input['image'])) {
            //$input['image'] = $this->upload($input['image'], 'images/blogs/');
        }
        $result = $blog->update($input);
        if ($result) {
            if (!empty($input['image'])) {
                $blog_image_name = !empty($input['image_name']) ? $input['image_name'] : '';
                $blog->addMedia($input['image'])->usingName($blog_image_name)->toMediaCollection('blog_image');
            }
            Session::flash('message', 'You have successfully updated Event Providers');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        // if ($blog->delete()) {
        //     unlink(public_path($blog->image));
        // }
        return redirect()->back();
    }
}
