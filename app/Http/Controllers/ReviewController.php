<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ReviewController extends Controller
{
    public function storeReview(Request $request)
    {
        if (!Auth::check()) {
            fail_response("", "First login to review");
        }
        $validate = [
            'star' => 'required',
            'comment' => 'required',
        ];
        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return fail_response("", $validator->errors());
        }
        $review = new Review();
        $review->user_id = auth()->id();
        $review->product_id = $request->product_id;
        $review->star = $request->star;
        $review->comment = $request->comment;

        $review->save();
        return success_response("", "Review successfully added!");
    }
}
