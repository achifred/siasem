<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\Podcast;
use App\Events\Newcomment;
use Validator;
use DB;
class CommentController extends Controller
{
    public function fetchComment($podcast_id){
        $data= DB::table('comments')
        ->join('users','comments.user_id','users.id')
        ->select('comments.id','comments.body','comments.created_at','comments.podcast_id','users.username','users.picture','users.id as  commenter')
        ->where('comments.podcast_id',$podcast_id)
        ->orderBy('comments.id','DESC')->get();
        return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
    }
    public function addComment(Request $request, $podcast_id){
        $rules =['body'=>'required','user_id'=>'required'];
        $data = $request->only(['body','user_id']);
        $isValid = Validator::make($data, $rules);
        if($isValid->fails()){
         return response()->json(['status'=>'failed','code'=>400,'error'=>'comment body cannot be empty']);
        }
        
        
        $data['podcast_id'] =$podcast_id;
        $comment = Comment::create($data);
        
       $res= DB::table('comments')
        ->join('users','comments.user_id','users.id')
        ->select('comments.id','comments.body','comments.created_at','comments.podcast_id','users.username','users.picture','users.id as commenter')
        ->where('comments.id',$comment->id)
        ->get();
        broadcast(new Newcomment($res))->toOthers();
        return response()->json(['status'=>'success','code'=>200,'data'=>$res]);
    }

    public function destroy($id){
        Comment::destroy($id);
        return response()->json(['status'=>'success','code'=>200,'message'=>'comment deleted']);
    }
}
