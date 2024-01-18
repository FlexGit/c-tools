<?php
namespace App\Http\ViewComposers;

use App\Models\Page;
use App\Models\Section;
use App\Models\Setting;
use Illuminate\View\View;

class GlobalComposer {
    public function compose(View $view) {
        $headerNavItems = $footerNavItems = $sectionNavItems = [];

        $pageItems = Page::activePages();
        foreach ($pageItems ?? [] as $alias => $page) {
            if ($page->top_nav) {
                $headerNavItems[$alias] = $page->title;
            }
            if ($page->bottom_nav) {
                $footerNavItems[$alias] = $page->title;
            }
        }

        $sections = Section::activeSections();
        $settingItems = Setting::activeSettings();

        return $view
            ->with('headerNavItems', $headerNavItems)
            ->with('footerNavItems', $footerNavItems)
            ->with('sections', $sections)
            ->with('settingItems', $settingItems);
    }
}
