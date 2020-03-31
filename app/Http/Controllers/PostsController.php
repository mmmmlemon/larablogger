<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Auth;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function show_post($id)
    {
        $post = App\Post::find($id);
        //если такой пост существует, то выводим его
        if($post != null)
        {
            
            $tags_separate = explode(",", $post->tags);
            $post->tags = $tags_separate;
            //проверяем статус поста, если visibility == 0
            //то пост будем видимым только для админа
            if($post->visibility == 1)
            {
                return view('post', compact('post'));
            }
            else
            {
                if(Auth::user()){
                    if(Auth::user()->user_type == 0 || Auth::user()->user_type == 1)
                    {
                        return view('post', compact('post'));
                    } 
                    else
                    {
                        return abort(404);
                    }
                }
                else
                {
                    return abort(404);
                }
            } 
        }
        else{
            return abort(404);
        }
    }

    public function show_edit_post($id){

        $post = App\Post::find($id);
        $categories = App\Category::all();

        return view('control_panel/posts/edit_post', compact('post','categories'));
    }

    public function edit_post(Request $request, $id){
        
        $request->validate([
            'post_title' => 'string|max:35',
            'post_content' => 'string',
            'publish' => 'string'
        ]);

        $post = App\Post::find($id);
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->tags = $request->tags;
        $post->category_id = $request->category;

        if($request->publish == 'on'){
            $post->visibility = 1;
        } else {
            $post->visibility = 0;
        }
        $post->save();
        return redirect(url('/control/posts/posts'));
    }


    public function show_posts_by_tag($tag){

        $posts = App\Post::where('visibility','=','1')->where('tags','like',"%".$tag."%")->orderBy('date', 'desc')->paginate(15);

        foreach($posts as $post){
            $tags_separate = explode(",", $post->tags);
            $post->tags = $tags_separate;
        }

        return view('home', compact('posts'));
    }

    public function create_post(Request $request)
    {
        $request->validate([
            'post_title' => 'string|max:35',
            'post_content' => 'string',
            'publish' => 'string',
            'publish_date' => 'date|after:yesterday'
        ]);

        $post = new App\Post;
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->category_id = $request->category;
        $post->tags = $request->tags;

        //если чекбокс Publish отмечен, то устанавливаем дату публикации - сегодня
        //если нет, то ту дату которая указана в поле с датой
        if($request->publish == 'on'){
            $post->visibility = 1;
            $post->date = Carbon::now()->format('Y-m-d');
        } else {
            $post->visibility = 1;
            $post->date = $request->publish_date;
        }

       $post->save();
       return redirect(url('/control'));
    }


    public function change_post_status($id, $status)
    {
        $post = App\Post::find($id);    

        $stat = 0;

        if($status == 1)
        {$stat = 1;}

        if($post->visibility != $stat)
        {
            $post->visibility = $stat;
            $post->save();
        }
        else{
            abort(403);
        }

        return redirect(url()->previous());

    }

    public function delete_post($id)
    {
        $post = App\Post::find($id);
        $post->delete();
        return redirect(url()->previous());

    }

} 
