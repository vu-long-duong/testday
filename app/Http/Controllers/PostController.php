<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UpdateImagetTrait;
use App\Http\Requests\CreatePost;

class PostController extends Controller
{
    use UpdateImagetTrait;
    const STATUS_OFF=0;
    const STATUS_ON=1;
    public function index()
    {
        $post = Post::orderBy('id','DESC')->get();
        return view('admin.post.index')->with(compact('post'));
    }

    public function create()
    {
        return view('admin.post.create');
    }


    public function store(CreatePost $request)
    {
        
        $post= new Post();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->status=$request->status;
        $id=Auth()->user()->id;
        $post->user_id=$id;

        if($request->has('status')){
            $post->status=self::STATUS_ON;
        }
        else{
            $post->status=self::STATUS_OFF;
        }

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image = $this->uploadimage($image, 'image', 'images');
            $post->imagepost=$image;
        }
        $save = $post->save();

        if ($save) {
            return redirect()->back()->with('success', 'Update post has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
    }


    public function edit(Post $post, $id)
    {
        $post=Post::where('id',$id)->first();
        return view('admin.post.edit')->with(compact('post'));
    }

    public function update(Request $request, Post $post, $id)
    {
        $post = Post::find($id);
        dd($post);
    
        $post->title=$request->title;
        $post->content=$request->content;
        $post->status=$request->status;
        $id=Auth()->user()->id;
        $post->user_id=$id;

        if($request->has('status')){
            $post->status=self::STATUS_ON;
        }
        else{
            $post->status=self::STATUS_OFF;
        }

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image = $this->uploadimage($image, 'image', 'images');
            $post->imagepost=$image;
        }
        $post->save();
        return  back()->with('sussess', 'Cập nhật thông tin cá nhân thành công');
    }


    public function destroy(Post $post)
    {
        //
    }
}
