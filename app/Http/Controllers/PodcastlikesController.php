<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Podcastlikes;
use App\Podcast;
use Auth;
use DB;
class PodcastlikesController extends Controller
{
    public function addLike(Request $request,$podcast_id){
       try {
        $like = Podcastlikes::where('user_id',$request->user_id)->where('podcast_id',$podcast_id)->get();
        if(count($like)>0){
            $likes =Podcast::where('id',$podcast_id)->decrement('likes',1);
            Podcastlikes::where('user_id',$request->user_id)->where('podcast_id',$podcast_id)->delete();
            return response()->json(['status'=>'decrease','code'=>200,'data'=>$likes]);
        }

        Podcastlikes::create(['user_id'=>$request->user_id,'podcast_id'=>$podcast_id]);
        $likes=Podcast::where('id',$podcast_id)->increment('likes',1);
        return response()->json(['status'=>'increase','code'=>200,'data'=>$likes]);
        //return url()->previous();  //redirect('/products')->with('msg','product added to likes');
       } catch (\Throwable $th) {
        return response()->json(['status'=>'failed','code'=>400,'error'=>'something went wrong']);
       }
    }

    public function userLikes(){
        $data['userlikes'] = DB::table('podcastlikes')
        ->join('podcasts','podcastlikes.podcast_id','podcasts.id')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        )->where('podcastlikes.user_id',Auth::id())->paginate(10);
        return view('podcast.likes', $data);
    }
}
