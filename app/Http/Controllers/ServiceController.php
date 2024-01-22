<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * @param $alias
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
	public function index($alias = '')
	{
        if ($alias) {
            $service = Service::where('is_active', true)
                ->where('alias', $alias)
                ->first();

            return view('service', [
                'service' => $service,
            ]);
        }

        $services = Service::where('is_active', true)->oldest()->paginate(env('PAGINATION', 10));
        $page = Page::where('is_active', true)
            ->where('alias', app('\App\Models\Page')::SERVICES_ALIAS)
            ->first();

        return view('services', [
            'services' => $services,
            'page' => $page,
        ]);
	}
}
