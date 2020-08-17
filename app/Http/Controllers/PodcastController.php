<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Podcast;
use DB;
use Auth;
use Validator;
use App\Events\Addfile;
use App\Category;
class PodcastController extends Controller
{
    private $helpers;
    public function __construct(){
        $this->helpers = new Helpers();
    }
    public function index(){
        $data['newpodcasts'] = DB::table('podcasts')
        ->join('users','podcasts.author','=','users.id')
        ->join('categories','podcasts.category_id','=','categories.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        'users.username',
        'categories.name'
        )
        ->where('ispublished',1)
        ->limit(4)
        ->orderBy('id','DESC')->get();

        $data['popularpodcasts'] = DB::table('podcasts')
        ->join('users','podcasts.author','=','users.id')
        ->join('categories','podcasts.category_id','=','categories.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        'users.username',
        'categories.name'
        )
        ->where('ispublished',1)
        ->where('plays','>',0)
        ->limit(4)
        ->get();

        return view('podcast.index', $data);
    }

    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }

    public function podcasts(){
        $data['podcasts'] = DB::table('podcasts')
        ->join('users','podcasts.author','=','users.id')
        ->join('categories','podcasts.category_id','=','categories.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        'users.username',
        'categories.name'
        )
        ->where('ispublished',1)
        ->orderBy('id','DESC')->paginate(20);
        return view('podcast.podcast', $data);
    }

    public function podcastCategory($category){
        $podcasts = DB::table('podcasts')
        ->join('users','podcasts.author','=','users.id')
        ->join('categories','podcasts.category_id','=','categories.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        'users.username',
        'categories.name'
        )
        ->where('ispublished',1)
        ->where('categories.name',$category)
        ->orderBy('id','DESC')->paginate(20);
        return view('podcast.category', ['podcasts'=>$podcasts,'category'=>$category]);
    }

    public function userPodcast(){
        $data['publishedpodcasts'] = DB::table('podcasts')
        ->join('users','podcasts.author','=','users.id')
        ->join('categories','podcasts.category_id','=','categories.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        'users.username',
        'categories.name'
        )
        ->where('ispublished',1)
        ->where('author',Auth::id())
        ->orderBy('id','DESC')->get();

        $data['unpublishedpodcasts'] = DB::table('podcasts')
        ->join('users','podcasts.author','=','users.id')
        ->join('categories','podcasts.category_id','=','categories.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        'users.username',
        'categories.name'
        )
        ->where('ispublished',0)
        ->where('author',Auth::id())
        ->orderBy('id','DESC')->get();

        return view('dashboard.podcast.index', $data);
    }

    public function create(){
        $data['categories'] = Category::all();
        return view('dashboard.podcast.create',$data);
    }
    public function addPodcast(Request $request){
        
        if(!$request->hasFile('audio')){
            
            return redirect()->back()->withErrors(['errors'=>'no audio file selected']);
        }

        $rules =[
            'description'=>'required',
         
        ];
        
        $data = $request->only(['description','category_id']);
        $isValid = Validator::make($data,$rules);
        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid);
        }
        $file = $request->file('audio');
       
        $cover_art = $request->file('cover_art');
        $path = $this->helpers->addFile('audios/',$file,'http://localhost:8000/');
        $storagePath = $this->helpers->addFile('cover/',$cover_art,'http://localhost:8000/');
        event(new Addfile($file->getClientOriginalName()));
        $data['audio'] =$path;
        $data['cover_art']= $storagePath;
        $data['author']=Auth::id(); 
       
        Podcast::create($data);
        return redirect('/dashboard/podcast')->with('msg','audio upload successful');


       
    }

    public function listen($id){
        $data['podcast'] = DB::table('podcasts')
        ->join('users','podcasts.author','=','users.id')
        ->join('categories','podcasts.category_id','=','categories.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        
        'podcasts.likes',
        'podcasts.created_at',
        'users.username',
        'users.id as userid',
        'users.picture',
        'categories.name'
        )
        ->where('ispublished',1)
        ->where('podcasts.id',$id)->get();

        $data['nextpodcasts'] = DB::table('podcasts')
        ->join('users','podcasts.author','=','users.id')
        ->join('categories','podcasts.category_id','=','categories.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        'users.picture',
        'users.username',
        'categories.name'
        )
        ->inRandomOrder()
        ->where('ispublished',1)
        ->where('podcasts.id','!=',$id)->get();
        return view('podcast.listen', $data);
    }

    public function publish($id){
        $podcast = Podcast::where('id',$id);
        $podcast->update(['ispublished'=>1]);
        return redirect('/dashboard/podcast')->with('msg','podcast published');
    }


    public function edit($id){
        $data['podcast'] = DB::table('podcasts')
        ->join('users','podcasts.author','=','users.id')
        ->join('categories','podcasts.category_id','=','categories.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        'podcasts.category_id',
        'users.username',
        'categories.name'
        )->where('podcasts.id',$id)->where('author',Auth::id())->get();
        $data['categories'] = Category::all();
        return view('dashboard.podcast.edit', $data);
    }

    public function update(Request $request, $id){
        $rules =['description'=>'required'];
        $data = $request->only(['description','category_id']);
        $isValid = Validator::make($data,$rules);
        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid);
        }
        $data['cover_art']= $request->hasFile('cover_art')?$this->helpers->addFile('cover/',$request->file('cover_art'),'http://localhost:8000/'):$request->old_cover_art;
        //return $data['cover_art'];
        $podcast = Podcast::where('id',$id)->where('author',Auth::id());
        if(!$request->hasFile('audio')){
            $podcast->update($data);
            return redirect('/dashboard/podcast')->with('msg','podcast updated');
        }

        

        $file = $request->file('audio');
        $path = $this->helpers->addFile('audios/',$file,'http://localhost:8000/');
    
        $data['audio'] =$path;
        $podcast->update($data);
        return redirect('/dashboard/podcast')->with('msg','podcast updated');

    }

    public function destroy($id){
        Podcast::destroy($id);
        return redirect('/dashboard/podcast')->with('msg','podcast updated');
    }
}
