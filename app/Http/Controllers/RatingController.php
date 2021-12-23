<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class RatingController extends Controller
{
    
    /**
     * Rate an product
     * @return void
     */

    public function rate(Request $request){
        try{
            $product = Product::findOrFail($request->get('id'));
            $product->ratings()->create([
                'user_id' => 1,
                'rating' => 1,
                'review' => 'test',
            ]);
            flash('Good job!')->success();
            $product->update(['rating' => $this->ratingCalculation($product)]);
            return redirect()->back();
            }catch (\Exception $th) {

                flash('Something went wrong!')->error()->important();
    
                return redirect()->back();
            }
    }

    /**
     * Calculate the rate of product
     * 
     * @return int 
     */
    public function ratingCalculation(Product $product){
        $rates = $product->ratings;
        $totalRating = null;
        foreach ($rates as $rate) {
            $totalRating += $rate->rating;
        }
        $rating = $totalRating/count($rates);
        return $rating;
    }
}
