<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
            $posts = Post::all();
         return view('index', compact('posts'));
    }    
    public function show(Post $post,User $user) {
//        $post = Post::find($id);
            $foo=DB::table('posts')->where('alias',$post['alias'])->value('user_id');
            
            $name=DB::table('users')->where('id',$foo)->value('name');
            $post['name']=$name;
                    
            $bar=DB::table('comments')->where('id_post',$post['id'])->get();
            $post['comment']=$bar;
            
            return view('posts.show',compact('post'));
    }
    public function create() {
        return view("posts.create");
    }
    public function store(Request $request) {
       $vid=str_replace('https://www.youtube.com/watch?v=','',request(['video']));
       $request->offsetSet('video',$vid['video']);
       
       $user['id']=Auth::user()->id;
       $request->offsetSet('user_id',$user['id']);
       
        $this->validate(request(),[
            'title' => 'required|min:2',
            'alias' => 'required',
            'slug' => 'required',
            'body' => 'required|min:10'
        ]);
       Post::create(request(array('title','alias','slug','body','video','user_id')));
       
        return redirect('/');
    }
    public function edit(Post $post) {
         $realyUser['id']=Auth::user()->id;
        $user=DB::table('posts')->where('alias',$post['alias'])->value('user_id');
        
        if($realyUser['id']!==$user)
             return redirect('/');
        else
         return view("posts.edit", compact('post'));
        
    }
    public function update(Post $post,Request $request) {
        $realyUser['id']=Auth::user()->id;
        $user=DB::table('posts')->where('alias',$post['alias'])->value('user_id');
        
        if($realyUser['id']!==$user)
             return redirect('/');
        else{
        $vid=str_replace('https://www.youtube.com/watch?v=','',request(['video']));
        $request->offsetSet('video',$vid['video']);
       
        $this->validate(request(),[
            'title' => 'required|min:2',
            'alias' => 'required',
            'slug' => 'required',
            'body' => 'required|min:10',
        ]);
        $post->update(request(array('title','alias','slug','body','video')));
        return redirect('/');
        }
    }
    
    public function destroy(Post $post) {
        $realyUser['id']=Auth::user()->id;
        $user=DB::table('posts')->where('alias',$post['alias'])->value('user_id');
        
        if($realyUser['id']!==$user)
             return redirect('/');
        else{
        $post->delete();
        return redirect('/');
        }
    }
    public function addComment(Comment $comment,Post $post,Request $request) {
        $user['id']=Auth::user()->id;
        
        $name=DB::table('users')->where('id',$user)->value('name');
        $request->offsetSet('user_name',$name);
        
        $id_post=DB::table('posts')->where('alias',$post['alias'])->value('id');
        $request->offsetSet('id_post',$id_post);
        $this->validate(request(),[
            'text_comment' => 'required'
        ]);
       Comment::create(request(array('text_comment','user_name','id_post')));
       return redirect('/');
    }
    public function deleteComment(Comment $comment) {
        $comment->delete();
        return redirect('/');
    }
}
