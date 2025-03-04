<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){                          //MOSTRAR LISTADO DE POSTS
        $posts = Post::get();
        
        return view('posts.index', ['posts' => $posts]);

    }

    //MOSTRAR DETALLE DE UN POST
    public function show(Post $post){  //La variable que recibimos es de tipo Post
        
        return view('posts.show', ['post' => $post]);

    }

    public function create(){                        //CREAR UN POST

        return view('posts.create', ['post' => new Post]);

    }


    public function store(SavePostRequest $request){     //ALMACENAR UN POST EN LA BD
        Post::create($request->validated());

        return to_route('posts.index')->with('status', 'Post created!');
    }


    public function edit(Post $post){                  //EDITAR UN POST
        return view('posts.edit', ['post' => $post]);
    }


    public function update(SavePostRequest $request, Post $post){     //EDITAR UN POST EN LA BD

        $post->update($request->validated());

        return to_route('posts.show', $post)->with('status', 'Post editaded!');
    }

    public function destroy(Post $post){                     //ELIMINAR UN POST EN LA BD
        $post->delete();

        return to_route('posts.index')->with('status', 'Post deleted!');
    }

}
