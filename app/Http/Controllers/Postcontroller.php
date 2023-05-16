<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;


class Postcontroller extends Controller
{
  public function index(){


          return view('posts.index', [
              'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(5)->withQueryString()
            
              
          ]);
      
  }    
  public function show(Post $post){
      return view('posts.show',[
        'post'=>$post
      ]);
  }
public function create(){

 
  return view('posts.create');
}
  public function store(){

$attribute= request()->validate([
  'title'=>'required',
  'thumbnail'=>'required|image',
  'slug'=>['required',Rule::unique('posts','slug')],
  'excerpt'=>'required',
  'body'=>'required',
  'category_id'=>['required',Rule::exists('categories','id')]

]);

$attribute['user_id']=auth()->id();
$attribute['thumbnail']=request()->file('thumbnail')->store('thumbnail');
Post::create($attribute);
return redirect('/');
  }

};
