<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\Tag;
use App\Blog;
use App\Page;
use App\Event;
use App\Charity;
use App\EventProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class FrontController extends Controller
{
    public function index($page_url= null)
    {
        if ($page_url == url('/') || $page_url == null) {
            $tag_sports = Tag::whereIn('id', [1,3,4,5,6,7,36,38])->get();
            $page = Page::where('url', '/')->first();
            $featured_events = Event::where('is_featured', 1)->latest('id')->limit(3)->get();
            return view('fronts.index', compact('latest_events', 'featured_events', 'tag_sports', 'page'));
        } else {
            dd($page_url);
        }
    }

    public function getPage($page_url)
    {
        if ($page_url == 'events') {
            return $this->allEvents();
        } elseif ( $page_url== 'contact-us') {
            return $this->contactUs();
        } elseif ( $page_url == 'home') {
            return view('home');
        } elseif($page_url != 'home') {
            $page = Page::where('url', 'LIKE', '/'.$page_url)->orWhere('url', 'LIKE', url('/').'/'.$page_url)->orWhere('url', 'LIKE', 'https://www.ukfitnessevents.co.uk/'.$page_url)->first();
            if (!empty($page)) {
               return view('fronts.page', compact('page')); 
            } else {
                return redirect('/');
            }
        }
    }

    public function contactUs()
    {
        return view('fronts.contact');
    }

    public function addEvent()
    {
        return view('fronts.add_event');
    }

    public function allArticles(Request $request)
    {
        $blog_category_id = $request->blog_category_id;
        if ($blog_category_id != null) {
            $blogs = Blog::whereIn('blog_category_id', $blog_category_id)->latest()->paginate(12);
        } else {
            $blog_category_id = [];
            $blogs = Blog::latest()->paginate(12);
        }
        $blog_categories = BlogCategory::all();
        $filter_action = route('articles.all');
        return view('fronts.articles', compact('blogs', 'blog_category_id', 'blog_categories', 'filter_action'));
    }

    public function allEvents()
    {   
        $s = '';
        $selected_sport_tags = [];
        $selected_region_tags = [];
        $selected_distance_tags = [];
        $selected_charity_sponsors = [];
        $selected_event_providers = [];
        $all_events = Event::where('date_time', '>=', Carbon::now())->latest('id')->paginate(12);
        $all_tags = Tag::where('tag_category_id', 1)->pluck('name', 'id');
        $sports_tag = Tag::where('tag_category_id', 1)->get();
        $region_tags = Tag::where('tag_category_id', 2)->get();
        $distance_tags = Tag::where('tag_category_id', 3)->get();
        $charity_sponsors = Charity::latest('id')->limit(20)->get();
        $providers = EventProvider::oldest('id')->limit(20)->get();
        return view('fronts.events.index', compact('all_events', 'all_tags', 'sports_tag', 'region_tags', 'distance_tags', 'charity_sponsors', 'providers', 'selected_event_providers', 'selected_charity_sponsors', 'selected_distance_tags', 'selected_region_tags', 'selected_sport_tags', 's'));
    }

    public function filterEvents(Request $request)
    {
        $s = $request->input('s');
        $filter_string = '';
        $selected_sport_tags = [];
        $selected_region_tags = [];
        $selected_distance_tags = [];
        $selected_charity_sponsors = [];
        $selected_event_providers = [];
        if (!empty($request->sport_tags)) {
            foreach($request->sport_tags as $tag) {
                // $event = Event::whereRaw("FIND_IN_SET($tag, tags_sport)")->get();
                if(empty($filter_string)) {
                    $filter_string = "FIND_IN_SET($tag, tags_sport) ";
                } else {
                    $filter_string .= "AND FIND_IN_SET($tag, tags_sport) ";
                }
            }
            $selected_sport_tags = $request->sport_tags;
        }
        if (!empty($request->region_tags)) {
            foreach($request->region_tags as $tag) {
                if(empty($filter_string)) {
                    $filter_string = "FIND_IN_SET($tag, tags_sport) ";
                } else {
                    $filter_string .= "AND FIND_IN_SET($tag, tags_sport) ";
                }
            }
            $selected_region_tags = $request->region_tags;
        }
        if (!empty($request->distance_tags)) {
            foreach($request->distance_tags as $tag) {
                //$event = Event::whereRaw("FIND_IN_SET($tag, tags_sport)")->get();
                if(empty($filter_string)) {
                    $filter_string = "FIND_IN_SET($tag, tags_sport) ";
                } else {
                    $filter_string .= "AND FIND_IN_SET($tag, tags_sport) ";
                }
            }
            $selected_distance_tags = $request->distance_tags;
        }
        if (!empty($request->charity_sponsors)) {
            foreach($request->charity_sponsors as $tag) {
                //$event = Event::whereRaw("FIND_IN_SET($tag, charity_sponsors)")->get();
                if(empty($filter_string)) {
                    $filter_string = "FIND_IN_SET($tag, charity_sponsors) ";
                } else {
                    $filter_string .= "AND FIND_IN_SET($tag, charity_sponsors) ";
                }
            }
            $selected_charity_sponsors = $request->charity_sponsors;
        }
        if (!empty($request->event_providers)) {
            foreach($request->event_providers as $tag) {
                //$event = Event::where('event_provider_id', $tag)->get();
                if(empty($filter_string)) {
                    $filter_string = "event_provider_id = ".$tag." ";
                } else {
                    $filter_string .= "OR event_provider_id = ".$tag." ";
                }
            }
            $selected_event_providers = $request->event_providers;
        }
        if (!empty($filter_string) || !empty($s)) {
            if (empty($filter_string)) {
                $all_events = Event::where('date_time', '>=', Carbon::now())->latest('id')->Search($s)->paginate(12);
            } else {
                $all_events = Event::where('date_time', '>=', Carbon::now())->whereRaw($filter_string)->Search($s)->paginate(12);
            }
        } else {
            return redirect('/events');
        }
        
        $all_tags = Tag::where('tag_category_id', 1)->pluck('name', 'id');
        $sports_tag = Tag::where('tag_category_id', 1)->get();
        $region_tags = Tag::where('tag_category_id', 2)->get();
        $distance_tags = Tag::where('tag_category_id', 3)->get();
        $charity_sponsors = Charity::latest('id')->limit(20)->get();
        $providers = EventProvider::oldest('id')->limit(20)->get();
        return view('fronts.events.index', compact('all_events', 'all_tags', 'sports_tag', 'region_tags', 'distance_tags', 'charity_sponsors', 'providers', 'selected_event_providers', 'selected_charity_sponsors', 'selected_distance_tags', 'selected_region_tags', 'selected_sport_tags', 's'));
    }

    public function singleEvent($sport_tag, $event_name)
    {
        $url = 'https://www.ukfitnessevents.co.uk/event/'.$sport_tag.'/'.$event_name;
        $event = Event::where('page_url', 'LIKE', $url)->first();
        $charity_sponsors = explode(',', $event->charity_sponsors);
        $charities = Charity::whereIn('id',  $charity_sponsors)->get();
        $page = Page::where('event_category_id', 4)-first();
        return view('fronts.events.show', compact('event', 'charities', 'page'));
    }

    public function showArticle($article_name)
    {
        $url = 'https://www.ukfitnessevents.co.uk/article/'.$article_name;
        $blog = Blog::where('url', 'LIKE', $url)->first();
        $related_articles = Blog::where('blog_category_id', $blog->blog_category_id)->latest()->limit(10)->get();
        return view('fronts.blogs.index', compact('blog', 'related_articles'));
    }

    public function showArticleWithId($id, $article_name) 
    {
        $url = 'https://www.ukfitnessevents.co.uk/article/'.$id.'/'.$article_name;
        $blog = Blog::where('url', 'LIKE', $url)->first();
        $related_articles = Blog::where('blog_category_id', $blog->blog_category_id)->latest()->limit(10)->get();
        return view('fronts.blogs.index', compact('blog', 'related_articles'));
    }

    public function showBlog($article_name)
    {
        $url = 'https://www.ukfitnessevents.co.uk/blog/'.$article_name;
        $blog = Blog::where('url', 'LIKE', $url)->first();
        $related_articles = Blog::where('blog_category_id', $blog->blog_category_id)->latest()->limit(10)->get();
        return view('fronts.blogs.index', compact('blog', 'related_articles'));
    }

    public function showBlogWithId($id, $article_name)
    {
        $url = 'https://www.ukfitnessevents.co.uk/blog/'.$id.'/'.$article_name;
        $blog = Blog::where('url', 'LIKE', $url)->first();
        $related_articles = Blog::where('blog_category_id', $blog->blog_category_id)->latest()->limit(10)->get();
        return view('fronts.blogs.index', compact('blog', 'related_articles'));
    }

    public function eventsBySportTag($csport_tag)
    {
        $url = 'https://www.ukfitnessevents.co.uk/event/'.$csport_tag;
        $all_events = Event::where('page_url', 'LIKE', $url.'%')->latest('id')->paginate(12);
        $all_tags = Tag::where('tag_category_id', 1)->pluck('name', 'id');
        $csports_tag = Tag::where('slug', $csport_tag)->first();
        $s = '';
        $selected_sport_tags = [];
        $selected_sport_tags[] = $csports_tag->id;
        $selected_region_tags = [];
        $selected_distance_tags = [];
        $selected_charity_sponsors = [];
        $selected_event_providers = [];
        $sports_tag = Tag::where('tag_category_id', 1)->get();
        $region_tags = Tag::where('tag_category_id', 2)->get();
        $distance_tags = Tag::where('tag_category_id', 3)->get();
        $charity_sponsors = Charity::latest('id')->limit(20)->get();
        $providers = EventProvider::oldest('id')->limit(20)->get();
        return view('fronts.events.event_tags_sport', compact('all_events', 'all_tags', 'csports_tag', 'sports_tag', 'region_tags', 'selected_event_providers', 'distance_tags', 'charity_sponsors', 'providers', 'selected_charity_sponsors', 'selected_distance_tags', 'selected_region_tags', 'selected_sport_tags', 's'));
    }
}
