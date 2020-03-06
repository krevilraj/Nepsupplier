<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use Illuminate\Http\Request;

class BlogController extends Controller {
	public function index() {
		$posts = Post::orderby( 'id', 'DESC' )->paginate(8);
        $latestProducts = Product::orderby('id', 'DESC')->take(5)->get();
		return view( 'blog.index', compact( 'posts','latestProducts' ) );
	}

	public function show( $slug ) {
		$post = Post::where( 'slug', $slug )->first();
        $latestProducts = Product::orderby('id', 'DESC')->take(5)->get();
		return view( 'blog.blog-single', compact( 'post','latestProducts' ) );
	}
}
