<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Browser;

class HomeController extends Controller
{
	private $request;

	/**
	 * @param Request $request
	 */
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function index()
	{
		$page = Page::where('alias', '/')->first();
        $services = Service::where('is_active', true)->get();
        $sliders = Slider::where('is_active', true)->orderBy('sort')->get();
        $aboutPage = Page::where('alias', Page::ABOUT_ALIAS)->first();

        //$isMobile = (Browser::isDesktop() || Browser::isTablet()) ? false : true;

		return view('home', [
			'page' => $page,
            'sliders' => $sliders,
            'services' => $services,
            'aboutPage' => $aboutPage,
			//'isMobile' => $isMobile,
		]);
	}

    /**
     * @return \Illuminate\Http\Response
     */
	public function sitemap()
	{
        $modelNames = [
            'page',
            'service',
            'news',
            'product',
            'section',
        ];
		$items = [];

        foreach ($modelNames as $modelName) {
            $models = app($modelName)::where('is_active', true)->get();
            foreach ($models as $model) {
                $items[] = [
                    'loc' => url($model->alias),
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
