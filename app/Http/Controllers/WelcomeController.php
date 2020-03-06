<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductPrice;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Brand;
use App\Post;
use App\Product;
use App\Slideshow;
use App\Testimonial;
use Illuminate\Http\Request;
use App\About;
use App\ProductEnquiry;
use Illuminate\Support\Facades\DB;
use App\Suscriber;
use App\Jobs\SendVerificationEmail;
use App\User;
use App\Mail\EmailVerification;
use Mail;


class WelcomeController extends Controller
{
    public function index()
    {

        $deal_products = Product::where('is_deal_of_day', true)
            ->where('deal_expire', '>=', Carbon::tomorrow())
            ->get();

        //$cartContent = Cart::content();
        //dd($cartContent);
        $slideshows = Slideshow::orderBy(DB::raw('LENGTH(priority), priority'))->where('active', '=', 1)->get();
        $latestProducts = Product::orderby('id', 'DESC')->take(5)->get();
        //$featuredProducts = Product::where( 'is_featured', 1 )->orderby( 'id', 'DESC' )->take( 15 )->get();
        //$popularProducts  = Product::orderby( 'id', 'DESC' )->take( 10 )->get();
        $testimonials = Testimonial::orderby('id', 'DESC')->take(5)->get();
        $brands = Brand::orderBy(DB::raw('LENGTH(priority), priority'))->get();
        $latestPosts = Post::orderby('id', 'DESC')->take(6)->get();

        $category = Category::where('parent_id', '=', '0')->take(8)->get();


        $saleProduct = Product::where('status', true)
            ->whereHas('prices', function ($query) {
                $query->latest()->whereNotNull('sale_price');
            })->take(12)->get();
//        dd($saleProduct)

        /*echo '
                <form id="logout-form" action="'. route("logout") .'" method="POST"
                      >  <input name="_token" type="hidden" value="'.csrf_token().' "/> <input type="submit" value="submit"/></form>';

        echo '<a href="http://127.0.0.1:8000/user-login">login</a>';
                dd($category);*/


        return view('index', compact('slideshows', 'testimonials', 'brands', 'latestPosts', 'category', 'latestProducts', 'saleProduct', 'deal_products'));
    }

    public function about()
    {
        $about = About::all();
        return view('pages.templates.about-message', compact('about'));
    }


    public function addSuscriber(Request $request)
    {
        $request->validate([
            'newsletterEmail' => 'required | email'
        ]);
        $suscribe = new Suscriber();
        $suscribe->email = $request['newsletterEmail'];
        $suscribe->save();
        return redirect()->back()->with('success', 'Success !!! now you became one subscriber');

    }

    public function request()
    {

        return view('request');
    }

    public function get()
    {
        return view('vertification');
    }

    public function pending()
    {
        return view('pending');
    }

    public function send($email)
    {
        $user = User::where('email', $email)->first();

        $data = [
            'email_token' => $user->email_token


        ];

        Mail::to($email)->send(new EmailVerification($data));
        return redirect()->back();
    }

    public function my_account()
    {
        return view('login_page');
    }
}
