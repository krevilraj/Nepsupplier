<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model {
	protected $fillable = [ 'regular_price', 'sale_price' ];

	public function products() {
		return $this->belongsTo( Product::class,'product_id' );
	}
}
