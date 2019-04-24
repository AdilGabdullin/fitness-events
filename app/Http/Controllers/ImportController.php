<?php

namespace App\Http\Controllers;

use App\Media;
use App\Tag;
use App\Blog;
use App\Event;
use App\Charity;
use App\Contact;
use App\CsvData;
use App\EventProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CsvImportRequest;

class ImportController extends Controller
{

    public function getImport()
    {
        return view('imports.import');
    }

    public function parseImport(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();

        if ($request->has('header')) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            //$data = array_map('str_getcsv', file($path));
            if (($handle = fopen($path, "r")) !== FALSE) {
                $row = 0;
                $pdata = [];
                $data = [];
                while (($adata = fgetcsv($handle, 1000, ",")) !== FALSE) {
                     $data[] = $adata;
                }
            }
        }
        if (count($data) > 0) {
            if ($request->type == 'special') {
                $this->processEventData($data);
            } else {
                if ($request->has('header')) {
                    $csv_header_fields = [];
                    foreach ($data[0] as $key => $value) {
                        $csv_header_fields[] = $key;
                    }
                } else {
                    $csv_header_fields = [];
                    foreach ($data[0] as $key => $value) {
                        $csv_header_fields[] = $value;
                    }
                }
                $csv_data = array_slice($data, 0, 2);
                $csv_data_file = CsvData::create([
                    'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                    'csv_header' => $request->has('header'),
                    'csv_data' => serialize($data)
                ]);
            }
            
        } else {
            return redirect()->back();
        }
        //dd($csv_data);
        if ($request->type == 'blog') {
            return view('imports.blog_import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));
        } elseif( $request->type == 'event') {
            return view('imports.event_import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));
        } else {
            return view('imports.import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));
        }
        
    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = unserialize($data->csv_data);
        foreach ($csv_data as $row) {
            $contact = new EventProvider();
            foreach (config('app.db_fields') as $index => $field) {
                
                if ($data->csv_header) {
                    $contact->$field = $row[$request->fields[$field]];
                } else {
                        $contact->$field = $row[$request->fields[$index]]; 
                }
            }
            $contact->save();
            if (!empty($contact->logo_path)) {
                $info = pathinfo($contact->logo_path);
                if (file_get_contents($contact->logo_path)) {
                    $contents = file_get_contents($contact->logo_path);
                    $file = '/tmp/' . $info['basename'];
                    file_put_contents($file, $contents);
                    $contact->addMedia($file)->toMediaCollection('event_provider_image');
                }   
            }  
        }
        return view('import_success');
    }

    public function processBlogImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        //dd($csv_data);
        foreach ($csv_data as $row) {
            $contact = new Blog();
            foreach (config('app.blog_fields') as $index => $field) {
                if ($row[$request->fields[$field]] == 'Videos') {
                    $row[$request->fields[$field]] = 1;
                } elseif ($row[$request->fields[$field]] == 'News') {
                    $row[$request->fields[$field]] = 2;
                } elseif ($row[$request->fields[$field]] == 'Discounts') {
                    $row[$request->fields[$field]] = 3;
                } elseif ($row[$request->fields[$field]] == 'Gear') {
                    $row[$request->fields[$field]] = 4;
                } elseif ($row[$request->fields[$field]] == 'Fitness') {
                    $row[$request->fields[$field]] = 5;
                }
                if ($data->csv_header) {
                    $contact->$field = $row[$request->fields[$field]];
                } else {
                        $contact->$field = $row[$request->fields[$index]]; 
                }
            }
            $contact->save();
            if (!empty($contact->image)) {
                $info = pathinfo($contact->image);
                if (file_get_contents($contact->image)) {
                    $contents = file_get_contents($contact->image);
                    $file = '/tmp/' . $info['basename'];
                    file_put_contents($file, $contents);
                    $contact->addMedia($file)->toMediaCollection('blog_image');
                }   
            }  
        }
        return view('import_success');
    }

    public function processEventImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        dd($csv_data);
        foreach ($csv_data as $row) {
            $contact = new Event();
            $charity = [];
            foreach (config('app.event_fields') as $index => $field) {
                if ($data->csv_header) {
                    if ($field == "date_time") {
                        $date = date('Y-m-d h:i:s', strtotime($row[$request->fields[$field]]));
                        $contact->$field = $date;
                    } elseif ($field == "event_provider_id" ) {
                        $event_provider = EventProvider::where('company_name', $row[$request->fields[$field]])->first();
                        if ($event_provider) {
                            $contact->$field = $event_provider->id;
                        } else {
                            $contact->$field = 2;
                        }
                    } elseif ($field == "charity_sponsors") {
                        $charity['name'] = $row[$request->fields[$field]];
                    } elseif ($field == "charity_email") {
                        $charity['email'] = $row[$request->fields[$field]];
                    } elseif ($field == "phone_number") {
                        $charity['phone'] = $row[$request->fields[$field]];
                    } elseif ($field == "charity_url") {
                        $charity['url'] = $row[$request->fields[$field]];
                    } elseif ($field == "cost") {
                        $contact->cost = $row[$request->fields[$field]];
                        echo $row[$request->fields[$field]];
                    } else {
                        $contact->$field = $row[$request->fields[$field]];
                    }
                } else {
                    if ($field == "date_time") {
                        $date = date('Y-m-d h:i:s', strtotime($row[$request->fields[$field]]));
                        $contact->$field = $date;
                    } elseif ($field == "event_provider_id" ) {
                        $event_provider = EventProvider::where('company_name', $row[$request->fields[$field]])->first();
                        if ($event_provider) {
                            $contact->$field = $event_provider->id;
                        } else {
                            $contact->$field = 2;
                        }
                    } elseif ($field == "charity_sponsors") {
                        $charity['name'] = $row[$request->fields[$field]];
                    } elseif ($field == "charity_email") {
                        $charity['email'] = $row[$request->fields[$field]];
                    } elseif ($field == "phone_number") {
                        $charity['phone'] = $row[$request->fields[$field]];
                    } elseif ($field == "charity_url") {
                        $charity['url'] = $row[$request->fields[$field]];
                    } elseif ($field == "cost") {
                        $contact->cost = $row[$request->fields[$field]];
                        echo $row[$request->fields[$field]];
                    } else {
                        $contact->$field = $row[$request->fields[$field]];
                    } 
                }
            }
            if (!empty($charity['name'])) {
                $new_charity = new Charity();
                $new_charity->name = isset($charity['name']) ? $charity['name'] : '';
                $new_charity->email = isset($charity['email']) ? $charity['email'] : '';
                $new_charity->phone = isset($charity['phone']) ? $charity['phone'] : '';
                $new_charity->website_link = isset($charity['url']) ? $charity['url'] : '';
                $new_charity->save();
                $contact->charity_sponsors = $new_charity->id;
            }
            $contact->save();
            if (!empty($contact->image)) {
                $info = pathinfo($contact->image);
                if (file_get_contents($contact->image)) {
                    $contents = file_get_contents($contact->image);
                    $file = '/tmp/' . $info['basename'];
                    file_put_contents($file, $contents);
                    $contact->addMedia($file)->toMediaCollection('event_image');
                }   
            }  
        }
        return view('import_success');
    }

    public function processEventData($data)
    {
        $csv_data = $data;
        $count = 1;
        foreach ($csv_data as $row) {
            if($count > 1) {
                $contact = new Event();
                $charity = [];
                foreach (config('app.event_fields') as $index => $field) {
                //if ($data->csv_header) {
                    if ($field == "date_time") {
                        $dat_time = explode(',', $row[$request[$field]]);
                        $date = date('Y-m-d h:i:s', strtotime($dat_time[0]));
                        $contact->$field = $date;
                    } elseif ($field == "event_provider_id" ) {
                        $event_provider = EventProvider::where('company_name', $row[$request[$field]])->first();
                        if ($event_provider) {
                            $contact->$field = $event_provider->id;
                        } else {
                            $contact->$field = 2;
                        }
                    } elseif ($field == "charity_sponsors") {
                        $charity['name'] = $row[$request[$field]];
                    } elseif ($field == "charity_email") {
                        $charity['email'] = $row[$request[$field]];
                    } elseif ($field == "is_featured") {
                        $charity['is_featured'] = !empty($row[$request[$field]]) ? $row[$request[$field]] : 0;
                    } elseif ($field == "phone_number") {
                        $charity['phone'] = $row[$request[$field]];
                    } elseif ($field == "charity_url") {
                        $charity['url'] = $row[$request[$field]];
                    } elseif ($field == "cost") {
                        $contact->cost = utf8_encode($row[$request[$field]]);
                    } elseif ($field == "short_description") {
                        $contact->short_description = utf8_encode($row[$request[$field]]);
                    } elseif ($field == "long_description") {
                        $contact->long_description = utf8_encode($row[$request[$field]]);
                    } elseif ($field == "meta_description") {
                        $contact->meta_description = utf8_encode($row[$request[$field]]);
                        //echo $row[$request[$field]];
                    } else {
                        $contact->$field = $row[$request[$field]];
                    }
                //} 
                }
                if (!empty($charity['name'])) {
                    $new_charity = new Charity();
                    $new_charity->name = isset($charity['name']) ? $charity['name'] : '';
                    $new_charity->email = isset($charity['email']) ? $charity['email'] : '';
                    $new_charity->phone = isset($charity['phone']) ? $charity['phone'] : '';
                    $new_charity->website_link = isset($charity['url']) ? $charity['url'] : '';
                    $new_charity->save();
                    $contact->charity_sponsors = $new_charity->id;
                }
                $contact->save();
                if (!empty($contact->image)) {
                    $info = pathinfo($contact->image);
                    if (file_get_contents($contact->image)) {
                        $contents = file_get_contents($contact->image);
                        $file = '/tmp/' . $info['basename'];
                        file_put_contents($file, $contents);
                        $contact->addMedia($file)->toMediaCollection('event_image');
                    }   
                } 
            } else {
                $request = array_flip(config('app.event_fields'));
            }
            $count++;
        }
        return view('import_success');
    }

    public function eventsupdate($type)
    {
        if ($type == 'media_rename') {
            $medias = Media::all();
//            echo "<img src='../../../storage/app/public/25/BogCommanderLogo.png' alt=''/>";
//           exit;
            foreach ($medias as $media) {
                echo url('/').$media->getUrl().'<br>';
                if (!in_array($media->id, [25,26])) {
                    echo $media->getUrl().'<br>';
                    //$rename = rename($media->getPath(), strtolower($media->getPath()));
                    $rename = Storage::move('/public/'.$media->id.'/'.$media->file_name, strtolower('/public/'.$media->id.'/'.$media->file_name));
                    if ($rename) {
                        echo $media->getUrl().'<br>';
                        $media->file_name = strtolower($media->file_name);
                        $media->save();
                    }
                }
            }
            exit;
        } else {
            $events = Event::orderby('id', 'asc')->get();
            foreach ($events as $event) {
                $media = $event->getMedia('event_image')->last();
                if ($media) {
                    echo "Media exist for event id ".$event->id.'<br>';
                } elseif (!empty($event->image)) {
                    $info = pathinfo($event->image);
                    $file_headers = @get_headers($event->image);
                    if ($file_headers || $file_headers[0] != 'HTTP request failed! HTTP/1.0 404 Not Found') {
                        $contents = file_get_contents($event->image);
                        $file = '/tmp/' . $info['basename'];
                        file_put_contents($file, $contents);
                        $event->addMedia($file)->toMediaCollection('event_image');
                        echo "Media has updated for event id ".$event->id.'<br>';
                    }
                }
            }
        }
        echo "Events updated successfully.";
        exit;
    }

    public function eventTagUpdate()
    {
        $events = Event::all();
        $tags = Tag::all();
        foreach($events as $event) {
            $tags_sport = [];
            if ($event->tags_sport != null) {
                $sports = explode(', ', $event->tags_sport);
                foreach($tags as $tag) {
                    if (in_array($tag->name, $sports) && !in_array($tag->id, $tags_sport)) {
                        $tags_sport[] = $tag->id;
                    }
                }
            }
            if ($event->tags_region != null) {
                $regions = explode(', ', $event->tags_region);
                
                foreach($tags as $tag) {
                    if (in_array($tag->name, $regions) && !in_array($tag->id, $tags_sport)) {
                        $tags_sport[] = $tag->id;
                    }
                }
            }
            if ($event->tags_distance != null) {
                $distances = explode(', ', $event->tags_distance);
                foreach($tags as $tag) {
                    if (in_array($tag->name, $distances) && !in_array($tag->id, $tags_sport)) {
                        $tags_sport[] = $tag->id;
                    }
                }
            }
            // if ($event->tags_sport != null) {
            //     $sports = explode(',', $event->tags_sport);
            //     foreach($tags as $tag) {
            //         if (in_array($tag->name, $sports)) {
            //             $tags_sport[] = $tag->id;
            //         }
            //     }
            // }
            if(!empty($tags_sport)) {
                $event->tags_sport = implode(',', $tags_sport);
                $event->save();
            }
        }
    }
}
