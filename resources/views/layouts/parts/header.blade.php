<div class="site-mobile-menu">
	<div class="site-mobile-menu-header">
		<div class="site-mobile-menu-close mt-3">
			<span class="icon-close2 js-menu-toggle"></span>
		</div>
	</div>
	<div class="site-mobile-menu-body"></div>
</div>

<div class="site-navbar-wrap bg-white">
	<div class="site-navbar-top">
		<div class="container py-2">
			<div class="row align-items-center">
				<div class="col-12">
					<div class="d-flex ml-auto">
                        @if (isset($settingItems['phone1']))
						    <a href="tel:{{ preg_replace('/[^0-9]/', '', $settingItems['phone1']->value) }}" class="d-flex align-items-center ml-auto mr-4">
							    <span class="icon-phone mr-2"></span>
							    <span class="d-md-inline-block">{{ $settingItems['phone1']->value }}</span>
						    </a>
                        @endif
                        @if (isset($settingItems['phone2']))
						    <a href="tel:{{ preg_replace('/[^0-9]/', '', $settingItems['phone2']->value) }}" class="d-flex align-items-center mr-4">
							    <span class="icon-phone mr-2"></span>
							    <span class="d-md-inline-block">{{ $settingItems['phone2']->value }}</span>
						    </a>
                        @endif
                        @if (isset($settingItems['email']))
						    <a href="mailto:{{ $settingItems['email']->value }}" class="align-items-center d-none d-lg-block">
							    <span class="icon-envelope mr-2"></span>
							    <span class="d-none d-md-inline-block">{{ $settingItems['email']->value }}</span>
						    </a>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="site-navbar bg-light">
		<div class="container py-1">
			<div class="row align-items-center">
				<div class="col">
                    @if (isset($settingItems['logo']) && $settingItems['logo']->image)
					    <a href="{{ route('home') }}">
                            <img src="#" class="lozad" data-src="{{ asset('storage/' . $settingItems['logo']->image) }}" width="240" height="41" alt="Логотип компании Композитные технологии и оснастка">
                        </a>
                    @endif
				</div>
				<div class="col">
					<nav class="site-navigation text-right" role="navigation">
						<div class="container">
							<div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                                <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                            </div>
                            @if ($headerNavItems)
							    <ul class="site-menu js-clone-nav d-none d-lg-flex" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                    @foreach ($headerNavItems as $pageAlias => $pageTitle)
								        <li class="active @if (in_array($pageAlias, [app('\App\Models\Page')::CATALOG_ALIAS, app('\App\Models\Page')::SERVICES_ALIAS])) has-children @endif">
									        <a href="{{ route($pageAlias) }}" title="{{ $pageTitle }}" itemprop="url">{{ $pageTitle }}</a>
                                            @if ($pageAlias == app('\App\Models\Page')::CATALOG_ALIAS)
									            <ul class="dropdown arrow-top">
                                                    @foreach ($menuSections as $section)
										                <li><a href="{{ route('catalog', $section->alias) }}">{{ $section->title }}</a></li>
                                                    @endforeach
									            </ul>
                                            @elseif ($pageAlias == app('\App\Models\Page')::SERVICES_ALIAS)
                                                <ul class="dropdown arrow-top">
                                                    @foreach ($menuServices as $service)
                                                        <li><a href="{{ route('services', $service->alias) }}">{{ $service->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
								        </li>
                                    @endforeach
							    </ul>
                            @endif
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
    <div class="px-1 bg-primary"></div>
</div>
