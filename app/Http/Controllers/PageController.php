<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
	public function contacts()
	{
		$contacts = Page::where('is_active', true)->where('alias', Page::CONTACTS_ALIAS)->first();

        return view('contacts', [
            'contacts' => $contacts,
        ]);
	}
}
