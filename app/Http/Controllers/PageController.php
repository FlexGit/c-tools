<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
use App\Models\Section;
use App\Models\Service;

class PageController extends Controller
{
    /**
     * @param $alias
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
	public function index($alias)
	{
		$page = Page::where('is_active', true)->where('alias', $alias)->first();
        if (!$page) abort(404);

        $data = [];
        $data['page'] = $page;

        switch ($alias) {
            case Page::SERVICES_ALIAS:
                $data['services'] = Service::where('is_active', true)->get();
            break;
            case Page::NEWS_ALIAS:
                $data['news'] = News::where('is_active', true)->get();
            break;
            case Page::SECTIONS_ALIAS:
                $data['sections'] = Section::where('is_active', true)->get();
            break;
        }

        return view('page', $data);
	}
}
