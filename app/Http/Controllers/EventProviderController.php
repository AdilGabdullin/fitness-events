<?php

namespace App\Http\Controllers;

use App\EventProvider;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventProviderController extends Controller
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
        $eventproviders = EventProvider::all();
        return view('EventProviders.index', compact('eventproviders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('EventProviders.create');
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
            'logo_path'=>'mimes:jpeg,bmp,png|max:2048kb'
        ]);
        $input = $request->all();
        //dd($input);
        if(!empty($input['logo_path'])) {
            //$input['logo_path'] = $this->upload($input['logo_path'], 'images/eventproviders/');
        }
        $eventprovider = EventProvider::create($input);
        if ($eventprovider) {
            if (!empty($input['logo_path'])) {
                $image_name = !empty($input['logo_name']) ? $input['logo_name'] : '';
                $eventprovider->addMedia($input['logo_path'])->usingName($image_name)->toMediaCollection('event_provider_image');
            }
            Session::flash('message', 'You have successfully added Event Providers');
        }
        return redirect('eventproviders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventprovider = EventProvider::findOrFail($id);
        return view('EventProviders.show', compact('eventprovider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventprovider = EventProvider::findOrFail($id);
        return view('EventProviders.edit', compact('eventprovider'));
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
            'logo_path'=>'mimes:jpeg,bmp,png|max:2048kb'
        ]);
        $eventprovider = EventProvider::findOrFail($id);
        $input = $request->all();
        if(!empty($input['logo_path'])) {
            //$input['logo_path'] = $this->upload($input['logo_path'], 'images/eventproviders/');
        }
        $result = $eventprovider->update($input);
        if ($result) {
            if (!empty($input['logo_path'])) {
                if (!empty($eventprovider->getMedia('event_provider_image'))) {
                    $allmedias = $eventprovider->getMedia('event_provider_image');
                    if (!empty($allmedias[0])) {
                        $allmedias[0]->delete();
                    }
                }
                $blog_image_name = !empty($input['logo_name']) ? $input['logo_name'] : '';
                $eventprovider->addMedia($input['logo_path'])->usingName($blog_image_name)->toMediaCollection('event_provider_image');
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
        $eventprovider = EventProvider::findOrFail($id);
        if ($eventprovider->delete()) {
            unlink(public_path($eventprovider->logo_path));
        }
        return redirect()->back();
    }
}
