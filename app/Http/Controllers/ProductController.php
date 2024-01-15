<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * @param $alias
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
	public function index($alias = '')
	{
		$product = Product::where('is_active', true)->first();
        if ($alias) {
            $product = $product->where('alias', $alias);
        }

		return view('product', [
			'product' => $product,
		]);
	}
}
