<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getCategories()
    {

        $category = getConfiguration('category_section');
        foreach (json_decode($category) as $data) {

            $temp_cat = Category::where('name', 'like', '%' . $data . '%')->first();
            if ($temp_cat != null){
                $temp_cat->total =  $temp_cat->products->count();
                if($temp_cat->hasImage()){
                    $temp_cat->featured_image = $temp_cat->getImage()->url;
                }
                $category_section[] = $temp_cat;
            }

        }


        return request()->json(200, $category_section);
    }

    public function getOrganicProducts()
    {

        $category = getConfiguration('category_section');
        foreach (json_decode($category) as $data) {

            $temp_cat = Category::where('name', 'like', '%' . $data . '%')->first();
            if ($temp_cat != null){
                $temp_cat->total =  $temp_cat->products->count();
                if($temp_cat->hasImage()){
                    $temp_cat->featured_image = $temp_cat->getImage()->url;
                }
                $category_section[] = $temp_cat;
            }

        }


        return request()->json(200, $category_section);
    }
}
