<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use App\Models\Product;

class CatalogController extends Controller
{
    /**
     * @param $alias
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
	public function index($sectionAlias = '', $subSectionAlias = '', $productAlias = '')
	{
        if ($subSectionAlias && !$productAlias) {
            $section = Section::where('is_active', true)
                ->where('alias', $subSectionAlias)
                ->first();

            if ($section) {
                return view('section', [
                    'section' => $section,
                ]);
            } else {
                $productAlias = $subSectionAlias;
            }
        }

        if ($productAlias) {
            $product = Product::where('is_active', true)
                ->where('alias', $productAlias)
                ->first();

            return view('product', [
                'product' => $product,
            ]);
        }

        if ($sectionAlias) {
            $section = Section::where('is_active', true)
                ->where('alias', $sectionAlias)
                ->first();

            return view('section', [
                'section' => $section,
            ]);
        }

		$sections = Section::where('is_active', true)->oldest()->paginate(env('PAGINATION', 10));
        $page = Page::where('is_active', true)
            ->where('alias', app('\App\Models\Page')::CATALOG_ALIAS)
            ->first();

		return view('catalog', [
			'sections' => $sections,
            'page' => $page,
		]);
	}
}
