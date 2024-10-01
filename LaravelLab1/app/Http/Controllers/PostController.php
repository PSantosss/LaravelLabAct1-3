<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bloglist;

class PostController extends Controller
{
    public function list()
    {
        $blogs = Bloglist::paginate(5);
        return view('blog-list', compact('blogs'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function view(Post $post)
    {
        return view('user.posts.view', compact('post'));
    }

    public function staticForm()
    {
        return view('user.posts.create');
    }

    public function store(Request $request)
    {
        $blogvalidation = $request->validate([
            'author' => 'required',
            'b_title' => 'required',
            'b_content' => 'required',
        ]);

        $blogvalidation['dateCreated'] = Carbon::now();
        $blogvalidation['email'] = Auth::user()->email;

        $blogCreate = Bloglist::create($blogvalidation);

        session()->flash('success', 'Blog post created successfully');

        return redirect('/list');
    }

    public function show($id)
    {
        $blog = Bloglist::find($id);

        return view('blog-show', compact('blog'));
    }

    public function myPage()
    {
        $user = Auth::user();
        $blogs = $user->blogs;
        return view('blog-mypage', compact('blogs'));
    }

}
