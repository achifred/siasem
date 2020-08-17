@extends('layout.listenlayout')
    @section('content')
    @include('layout.navbar')
           <section id="latest-podcast">
            <div class="container mt-5">
                
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                       <div>
                        <audio id="player"  controls controlsList="nodownload">
                            <source src="{{$podcast[0]->audio}}">
                            </audio>
                           <div class="d-flex justify-content-between">
                               <div>
                                    
                            <h4 class="mt-3">{{$podcast[0]->description}}</h4>
                            <h6 class="mt-2"><small>{{$podcast[0]->created_at}}</small></h6>
                               </div>
                               <div>
                                   <div class="mt-3">
                                    
                                    <button type="button" class="btn btn-sm btnn">
                                        <i class="fa fa-music"></i> <span class="badge badge-light">{{$podcast[0]->plays}}</span>
                                       
                                      </button>
                                    <button type="button" class="btn btn-sm btnn" @click.prevent="addLike">
                                    <i class="fa fa-heart"></i> <span class="badge badge-light">@{{totalLikes}}</span>
                                     
                                    </button>
                                   </div>

                               </div>
                           </div>
                       </div>
                        
                       
                       <div class="d-flex">
                       <h4 ><a href="{{URL::to('/profile/'.$podcast[0]->userid)}}" style="color: #243447">{{$podcast[0]->username}}</a></h4>
                       </div>
                       <hr>
                       <div>
                       <h4>@{{totalComment}}comments</h4>
                       <div class="row">
                        <div class="col-lg-12">
                        <form  id="commentForm">
                            <div class='form-group'>
                                <div v-if=" sending">
                                    <small>Sending...</small>
                                </div>
                            <textarea class='form-control ' name="comment"  placeholder='Add public comment' v-model="message"></textarea>
                                
                            </div>
                        <input type="hidden" name="video_id" value="{{$podcast[0]->id}}">
                            
                           @if (auth()->guest())
                        <a href="{{URL::to('/login')}}" class="float-right">Login to post comment</a>
                           @else
                           <button type='submit' class='btn btn-small btns float-right' @click.prevent="addComment">Post</button>  
                           @endif 
                        </form>
                        </div>
                    </div>

                    <div class=" row" v-for="comment in comments" @key="comment.id">
                    <div >
                        <a :href=`/profile/${comment.commenter}`>
                            <img :src="comment.picture" class="" alt="" style="height: 2rem; width:2rem; border-radius:50%">
                        </a>
                   
                    </div>
                    <div class="ml-3">
                        
                            <a :href=`/profile/${comment.commenter}`>
                                <span>@{{comment.username}}</span>
                            </a>
                            
                        
                        
                            <div class="d-flex  justify-content-around">
                                <p>@{{comment.body}}</p>
                               
                                   
                               <a class="ml-2" href="#" v-if="comment.commenter == user" @click.prevent="deleteComment(comment.id)"><i class="fa fa-trash"></i></a>
                               
                            </div>
                          
                       
                   
                    </div>
                    
                    </div>
                    
                        
                       

                       </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="row">
            
               
                            @foreach ($nextpodcasts as $item)
                            <div class="col-lg-12 col-md-12">
                                <div class="story-container mt-2" >
                                    <img  src="{{$item->cover_art?URL::to($item->cover_art): URL::asset('img/tape.jpg') }}"  alt="" class="card-img-top podcast-img">
                                    
                                    <div class="">
                                     
                                    <p class="card-text ">{{$item->description}}</p>
                                     <div class="d-flex justify-content-around">
                                        <a title="play audio" href="{{URL::to('/podcast/listen/'.$item->id)}}" class="btn btn-sm btnn "><i class="fa fa-play"></i> Play</a>
                                        <button type="button" class="btn btn-sm btnn">
                                            <i class="fa fa-music"></i> <span class="badge badge-light">{{$item->plays}}</span>
                                            <span class="sr-only">number of plays</span>
                                          </button>
                                        <a title="Give it a like" href="{{URL::to('/podcast/like/'.$item->id)}}" class="btn btn-sm btnn">
                                        <i class="fa fa-heart"></i> <span class="badge badge-light">{{$item->likes}}</span>
                                          <span class="sr-only">number of likes</span>
                                        </a>
                                     </div>
                                     
                                    </div>
                                  </div>
                           
                            </div>
                            @endforeach
                                
                               
                                
                            
                        </div>
                    </div>
                </div>
            </div>
           </section>
       
    

  @endsection
  
@section('script')

    <script>
   
    const app = new Vue({
            el:'#listen',
            data(){
               return{ 
                comments:{},
                totalComment:0,
                totalLikes:{{$podcast[0]->likes}},
                podcast: {{$podcast[0]->id}} ,
                user: {{Auth::check()?Auth::user()->id:'null'}},
                message:'',
                sending:false
               }
            },
             
            mounted(){
                this.addView()
             this.fetchComment()
             this.listen()
                
            },
            methods:{
                async fetchComment(){
                   try {
                    const res = await axios.get(`/api/podcast/${this.podcast}/comment`)
                    
                    
                    this.comments =  await res.data.data
                    this.totalComment =this.comments.length
                   } catch (error) {
                       console.log(error)
                   }

                },
                async addComment(){
                    try {
                        this.sending =true
                        const res = await axios.post(`/api/podcast/${this.podcast}/comment`,{
                            
                            body:this.message,
                            user_id:this.user

                        })
                        
                        if(res.data.status=="success"){
                        this.comments.unshift(res.data.data[0])
                        this.totalComment =this.comments.length
                        this.sending=false
                        this.message=''
                        }else{
                            this.sending=false
                        }
                        
                    } catch (error) {
                        console.log(error)
                    }
                },

                listen(){
                    Echo.channel(`podcast.${this.podcast}`)
                    .listen('Newcomment',(comment)=>{
                        //console.log(comment)
                        //alert(e)
                        this.comments.unshift(comment)
                        this.totalComment =this.comments.length
                    })
                    //console.log('echo')
                    
                },

                addView(){
                    const player = new Plyr("#player")
                    player.on('playing',event=>{
                        if(event.detail.plyr.playing==true){
                            axios.post(`/api/podcast/addview/${this.podcast}/${this.user}`)
                            .then((response)=>{
                               // console.log(response)
                            }).catch((error)=>{
                                //console.log(error)
                            })
                        
                        }
                    })
                },

                async addLike(){
                    try {
                        const res = await axios.post(`/api/podcast/like/${this.podcast}`,{
                            user_id:this.user
                        })

                        if(res.data.status=="failed") return
                        if(res.data.status=="increase") {
                            this.isAdding=false
                            
                            this.totalLikes =  this.totalLikes+res.data.data
                            return
                        }
                        if(res.data.status=="decrease"){
                            this.isAdding=false
                            
                            this.totalLikes =  this.totalLikes-res.data.data
                        }
                        

                        
                        
                    } catch (error) {
                        console.log(error)
                    }
                },

                async deleteComment(id){
                    try {
                        const res = await axios.delete(`/api/comment/delete/${id}`)
                        //console.log(res)
                        if(res.data.status=="success"){
                            /*const index = this.comments.findIndex((com)=>com.id == id);
                            if(index == -1) return*/

                           this.comments = this.comments.filter((com)=>com.id !=id)
                           this.totalComment =this.comments.length
                        }
                    } catch (error) {
                        console.log(error)
                    }
                }

               
            },
            
        })

</script>
@endsection


