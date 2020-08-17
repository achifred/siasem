<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Hash;
use Session;
use App\User;
use App\Events\PasswordResetEvent;
use URL;
use Mail;
//use App\Mail\PasswordResetMail;

class UserController extends Controller
{
    private $helpers;
    public function __construct(){
        $this->helpers = new Helpers();
    }
    public function userDashboard(){
        $data['published_podcast']= DB::table('podcasts')->where('ispublished',1)->where('author',Auth::id())->count();
        $data['unpublished_podcast']= DB::table('podcasts')->where('ispublished',0)->where('author',Auth::id())->count();
        $data['total_plays']= DB::table('podcasts')->where('author',Auth::id())->sum('plays');
        
        return view('dashboard.index', $data);
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
        return view('dashboard.podcast.userlikes', $data);
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
        return view('dashboard.podcast.userhistory', $data);
    }

    public function userProfile($id){
        $data['user'] = User::where('id',$id)->get();
        $data['userpodcasts'] = DB::table('podcasts')
        ->select('podcasts.id',
        'podcasts.description',
        'podcasts.audio',
        'podcasts.cover_art',
        'podcasts.plays',
        'podcasts.likes',
        'podcasts.created_at',
        )->where('podcasts.author',$id)->where('ispublished',1)->paginate(10);
        return view('user.profile', $data);
    }
    public function create(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('auth.login');
    }
    public function createSignup(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('auth.signup');
    }
    public function login(Request $request){
        if(Auth::check()){
            return redirect()->back();
        }
        $rules =['email'=>'required|email','password'=>'required|min:6'];
        $data = $request->only(['email','password']);
        $isValid = Validator::make($data,$rules);
        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid);
        }
        if(Auth::attempt($data)){
            if(Session::has('intendedUrl')){
                $url = Session::get('intendedUrl');
                Session::forget('intendedUrl');
                return redirect($url);
            }
            return redirect('/')->with('msg','Welcome back');
        }
        return redirect()->back()->withErrors(['errors'=>'login failed. Check credentials and try again']);
    }

    public function Signup(Request $request){
        $rules =[
            'password'=>'required|min:6|max:32',
        'email'=>'email|required',
        'username'=>'required|min:4'
    ];
        $data = $request->only(['username','email','password']);
        $isValid = Validator::make($data,$rules);
        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid);
        }
            
            $data['password'] = Hash::make($data['password']);
            $data['role']='creator';
            
            User::create($data);
            return redirect('/login')->with('msg','log in with your credentials');
    }

    public function profile(){
        $data['user'] = User::where('id',Auth::id())->get();
        return view('dashboard.profile.show',$data);
    }

    public function profileUpdate(Request $request){
        $rules =[
            'username'=>'required|min:4',
            'email'=>'required|email',
            
        ];
        $data = $request->only(['username','email','profile_slug']);
        $isValid = Validator::make($data,$rules);
        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid);
        }
        $user = User::where('id',Auth::id())->update($data);
        return redirect('/dashboard/profile');
    }

    public function updateAvatar(Request $request){
        if(!$request->hasFile('picture')){
            return redirect()->back()->withErrors('errors','no image selected. Please select one');
        }
        $image = $request->file('picture');
        $path = $this->helpers->addFile('avatar/',$image,'http://localhost:8000/');
        $user= User::where('id',Auth::id())->update(['picture'=>$path]);
        return $user;
    }
    public function logout(){
        Auth::logout();
        return redirect('/')->with('msg','Hi Buddy, Do come back some other time');
    }

    public function reset(){
        return view('auth.reset');
    }

    public function resetMail(Request $request){
        $rules =['email'=>'required|email'];
        $email =$request->only(['email']);
        $isvalid = Validator::make($email,$rules);
        if($isvalid->fails()){
            
            return redirect()->back()->withErrors($isvalid);
        }

        $user = User::where('email',$email)->get();
        if(count($user)<=0){
            return redirect()->back()->withErrors('errors','Wrong email. Something smells fishy');
        }
        $details =[
            'link'=>URL::temporarySignedRoute(
                'newpassword', now()->addMinutes(10)
            ),
            
        ];
        
        event(new PasswordResetEvent($details,$email));
        return redirect('/login')->with('msg', 'A reset link has been sent to your mail');
    }

    public function newPassword(Request $request){
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        return view('auth.newpassword');
    }

    public function resetPassword(Request $request){
        $rules =['email'=>'required|email','newpassword'=>'required|min:6|max:32'];
        $data =$request->only(['email','newpassword']);
        $isvalid = Validator::make($data,$rules);
        if($isvalid->fails()){
            
            return redirect()->back()->withErrors($isvalid);
        }
        $user = User::where('email',$data['email']);
        if(count($user->get())<=0){
            return redirect()->back()->withErrors('errors','Wrong email. Something smells fishy');
        }
        $password =$data['newpassword'];
        $user->update(['password'=>Hash::make($password)]);
        return redirect('/login')->with('msg','password updated, Login with your new credentials');

    }
}
