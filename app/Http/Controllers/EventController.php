<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Charity;
use App\Event;
use App\EventProvider;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\TagCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
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
        $events = Event::all();
        return view('Events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event_providers = EventProvider::pluck('company_name', 'id');
        $events = Event::all();
        $articles = Blog::all();
        $charities = Charity::all();
        $tag_categories = TagCategory::pluck('name', 'id');
        $atag_categories = TagCategory::all();
        return view('Events.create', compact('event_providers', 'events', 'articles', 'charities', 'tag_categories', 'atag_categories'));
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
        //dd($input);
        if (!empty($input['date_time'])) {
            $input['date_time'] = date('Y-m-d H:i:s', strtotime($input['date_time']));
        }
        if(!empty($input['image'])) {
            //$input['image'] = $this->upload($input['image'], 'images/events/');
        }
        if (!empty($input['related_events'])) {
            $input['related_events'] = implode(',' , $input['related_events']);
        }
        if (!empty($input['related_articles'])) {
            $input['related_articles'] = implode(',', $input['related_articles']);
        }
        if (!empty($input['charity_sponsors'])) {
            $input['charity_sponsors'] = implode(',', $input['charity_sponsors']);
        }
        if (!empty($input['tags_sport'])) {
            $input['tags_sport'] = implode(',', $input['tags_sport']);
        }
        $event = Event::create($input);
        if ($event) {
            if (!empty($input['image'])) {
                $image_name = !empty($input['image_name']) ? $input['image_name'] : '';
                $event->addMedia($input['image'])->usingName($image_name)->toMediaCollection('event_image');
            }
            Session::flash('message', 'You have successfully added Event');
        }
        return redirect('events');
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
        $event = Event::findOrFail($id);
        $event_providers = EventProvider::pluck('company_name', 'id');
        $articles = Blog::pluck('title', 'id');
        $events = Event::pluck('name', 'id');
        $related_articles = [];
        if (!empty($event->related_articles)) {
            $related_articles = explode(',', $event->related_articles);
        }
        $related_events = [];
        if (!empty($event->related_events)) {
            $related_events = explode(',', $event->related_events);
        }
        $charity_sponsors = [];

        $charity_sponsors = Charity::whereIn('id', explode(',', $event->charity_sponsors))->get();
        $charities = Charity::all();
        $tag_categories = TagCategory::pluck('name', 'id');
        $atag_categories = TagCategory::all();
        $tags_sport = explode(',', $event->tags_sport);
        $scharities = Charity::pluck('name', 'id');
        return view('Events.edit', compact('event_providers', 'event', 'articles', 'events', 'related_articles', 'related_events', 'charity_sponsors', 'charities', 'tag_categories', 'atag_categories', 'tags_sport', 'scharities'));
    }

    public function getCharities(Request $request)
    {
        $charity = Charity::findOrFail($request->charity_id);
        return response()->json($charity);
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
        if ($request->ajax()) {

        }
        $this->validate($request,[
            'image'=>'mimes:jpeg,bmp,png|max:2048kb'
        ]);
        $event = Event::findOrFail($id);
        $input = $request->all();
        //dd($input);
        if (!empty($input['date_time'])) {
            $input['date_time'] = date('Y-m-d H:i:s', strtotime($input['date_time']));
        }
        if (!empty($input['image'])) {
            //$input['image'] = $this->upload($input['image'], 'images/events/');
        }
        if (!empty($input['related_events'])) {
            $input['related_events'] = implode(',' , $input['related_events']);
        }
        if (!empty($input['related_articles'])) {
            $input['related_articles'] = implode(',' , $input['related_articles']);
        }
        if (!empty($input['charity_sponsors'])) {
            $input['charity_sponsors'] = implode(',' , $input['charity_sponsors']);
        }
        if (!empty($input['tags_sport'])) {
            $input['tags_sport'] = implode(',' , $input['tags_sport']);
        }
//        for ($i = 0; $i<=10; $i++) {
//            if ($i == 0 && !empty($input['charity_name'])) {
//                Charity::where('event_id', $event->id)->delete();
//                $charity = new Charity();
//                $charity->name = $input['charity_name'];
//                $charity->email = $input['charity_email'];
//                $charity->phone = $input['charity_phone'];
//                $charity->website_link = $input['charity_url'];
//                $charity->event_id = $event->id;
//                $charity->save();
//            }
//            if ($i > 0 && !empty($input['charity_name_'.$i])) {
//                $charity = new Charity();
//                $charity->name = $input['charity_name_'.$i];
//                $charity->email = $input['charity_email_'.$i];
//                $charity->phone = $input['charity_phone_'.$i];
//                $charity->website_link = $input['charity_url_'.$i];
//                $charity->event_id = $event->id;
//                $charity->save();
//            }
//        }
        $result = $event->update($input);
        if ($result) {
            if (!empty($input['image'])) {
                if (!empty($event->getMedia('event_image'))) {
                    $allmedias = $event->getMedia('event_image');
                    if (!empty($allmedias[0])) {
                        $allmedias[0]->delete();
                    }
                }
                $blog_image_name = !empty($input['image_name']) ? $input['image_name'] : '';
                $event->addMedia($input['image'])->usingName($blog_image_name)->toMediaCollection('event_image');
            }
            Session::flash('message', 'You have successfully updated Event');
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
        $event = Event::findOrFail($id);
        $event->delete();
//        if ($eventprovider->delete()) {
//            unlink($eventprovider->logo_path());
//        }
        return redirect()->back();
    }
}
