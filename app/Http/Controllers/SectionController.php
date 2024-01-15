<?php

namespace App\Http\Controllers;

use App\Models\Section;

class SectionController extends Controller
{
    /**
     * @param $alias
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
	public function index($alias = '')
	{
		$section = Section::where('is_active', true)->first();
        if ($alias) {
            $section = $section->where('alias', $alias);
        }

		return view('section', [
			'section' => $section,
		]);
	}
}
