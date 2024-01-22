<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\News;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Slider;
use Carbon\Carbon;

class HomeController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function index()
	{
		$page = Page::where('alias', '/')->first();
        $services = Service::where('is_active', true)->get();
        $sliders = Slider::where('is_active', true)->orderBy('sort')->get();
        $certificates = Certificate::where('is_active', true)->orderBy('title')->get();
        $news = News::where('is_active', true)->latest()->limit(4)->get();
        $partners = Partner::where('is_active', true)->latest()->get();
        $aboutPage = Page::where('alias', Page::ABOUT_ALIAS)->where('is_active', true)->first();

		return view('home', [
			'page' => $page,
            'sliders' => $sliders,
            'certificates' => $certificates,
            'services' => $services,
            'news' => $news,
            'partners' => $partners,
            'aboutPage' => $aboutPage,
		]);
	}

    /**
     * @return \Illuminate\Http\Response
     */
	public function sitemap()
	{
        $modelNames = [
            'page',
            'section',
            'product',
            'service',
            'news',
        ];
		$items = [];

        foreach ($modelNames as $modelName) {
            $models = app('\App\Models\\' . $modelName)::where('is_active', true)->get();
            foreach ($models as $model) {
                switch ($modelName) {
                    case 'section':
                        $path = 'catalog/' . ($model->section ? $model->section->alias . '/' . $model->alias : $model->alias);
                    break;
                    case 'product':
                        $path = 'catalog/' . (($model->section->section ? $model->section->section->alias . '/' . $model->section->alias : $model->section->alias) . '/' . $model->alias);
                    break;
                    case 'service':
                    case 'news':
                        $path = $modelName . '/' . $model->alias;
                    break;
                    default:
                        $path = $model->alias;
                    break;
                }
                $items[] = [
                    'loc' => url($path),
                    'lastmod' => $model->updated_at ? $model->updated_at->tz('GMT')->toAtomString() : Carbon::now()->tz('GMT')->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => 1,
                ];
            }
        }

		return response()->view('sitemap', [
			'items' => $items,
		])->header('Content-Type', 'text/xml');
	}
}
