<?php

namespace App\Http\Controllers;

use App\Post;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Application_instance;
use App\Student;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth'); //currently no authentication
    }

    public function index(){
        return view('api.student-reg');
    }

    public function saveNewPost(Request $request){

        $student =  Student::find($request->input('user_id'));

        $post = new Post;

        $post->target = $request->input('target');
        $post->department = $student->department;
        $post->course  = $student->course;
        $post->year = $student->year;

        $post->heading = $request->input('heading');
        $post->message = $request->input('message');
        $post->sender_name = $student->full_name;
        $post->sender_title = $student->title;

        $post->save();

        return  response()->json(['status' => 'success', 'message' => $post ]);

    }

    public function getPostsChunk( $user_id, $pagination){
        //TODO return posts associated with user
        $posts = Post::all();
        return  response()->json(['status' => 'success','page' => $pagination, 'posts' => $posts ]);
    }



}
