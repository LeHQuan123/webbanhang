<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Product;
use App\Models\Models\Category;
use App\Models\Models\Comment;
use App\Providers\AppServiceProvider;

class FrontendController extends Controller
{
    
    public function getHome()
    {
    	$data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get(); 
    	$data['news'] = Product::orderBy('prod_id','desc')->take(8)->get();
    	return view('frontend.home',$data);
    }

    public function details($id)
    {
        //$data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
    	$data['item'] = Product::find($id);
    	$data['comments'] = Comment::where('com_product',$id)->paginate(3);
    	return view('frontend.details',$data);
    }

    public function getCate($id)
    {
    	$data['catName'] = Category::find($id);
    	$data['items'] = Product::where('prod_cate',$id)->orderBy('prod_id', 'desc')->paginate(2);
    	return view('frontend.category',$data);
    }

    public function postComment(Request $request , $id)
    {
    	
    	$comment = new Comment;
        $comment->com_product = $id;
        $comment->com_name =$request->name;
    	$comment->com_email = $request->email;
    	$comment->com_content = $request->content;
    	
    	$comment->save();
    	return back();   
     }


     public function getSearch(Request $request)
     {
     	$keyword = $request->input('keyword');
     	$data['keyword'] = $keyword;
     	$keyword = str_replace(" ", "%", $keyword);
     	$data['searchResult'] = Products::where('prod_name','like','%' . $keyword . '%')->paginate(2);

     	return view('frontend.search',$data);
     }
}
