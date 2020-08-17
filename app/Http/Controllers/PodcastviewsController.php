<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Podcastviews;
use App\Podcast;
use DB;
use Auth;

class PodcastviewsController extends Controller
{
    public function addViews(Request $request,$podcast_id, $user_id){
        $like = Podcastviews::where('user_id',$user_id)->where('podcast_id',$podcast_id)->get();
        if(count($like)>0){
             return response()->json(['status'=>'failed','code'=>400,'error'=>'already liked this']);
        }

        Podcastviews::create(['user_id'=>$user_id,'podcast_id'=>$podcast_id]);
        Podcast::where('id',$podcast_id)->increment('plays',1);
        return response()->json(['status'=>'success','code'=>200,'message'=>'view added']);
    }

    public function userHistory(){
        $data['userhistory'] = DB::table('podcastviews')
        ->join('podcasts','podcastviews.podcast_id','podcasts.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        )->where('podcastviews.user_id',Auth::id())->paginate(10);
        return view('podcast.history', $data);
    }

}
