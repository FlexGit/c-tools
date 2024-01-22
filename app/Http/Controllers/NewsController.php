<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;

class NewsController extends Controller
{
    /**
     * @param $alias
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index($alias = '')
    {
        if ($alias) {
            $oneNews = News::where('is_active', true)
                ->where('alias', $alias)
                ->first();

            return view('oneNews', [
                'oneNews' => $oneNews,
            ]);
        }

        $news = News::where('is_active', true)->latest()->paginate(env('PAGINATION', 10));
        $page = Page::where('is_active', true)
            ->where('alias', app('\App\Models\Page')::NEWS_ALIAS)
            ->first();

        return view('news', [
            'news' => $news,
            'page' => $page,
        ]);
    }
}
