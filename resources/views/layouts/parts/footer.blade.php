<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="row">
					<div class="col-5 col-md-5 col-lg-5 mb-5 mb-lg-0">
                        @if ($footerNavItems)
	    					<h3 class="footer-heading mb-4"><a href="{{ route('home') }}">Главная</a></h3>
		    				<ul class="list-unstyled">
                                @foreach ($footerNavItems as $pageAlias => $pageTitle)
                                    <li><a href="{{ route('page', $pageAlias) }}">{{ $pageTitle }}</a></li>
                                @endforeach
                            </ul>
                        @endif
					</div>
					<div class="col-7 col-md-7 col-lg-7 mb-5 mb-lg-0">
                        @if ($sections->count())
						    <h3 class="footer-heading mb-4"><a href="{{ route('page', app('\App\Models\Page')::SECTIONS_ALIAS) }}">Продукция</a></h3>
						    <ul class="list-unstyled">
                                @foreach ($sections as $section)
                                    <li><a href="{{ route('section', $section->alias) }}">{{ $section->title }}</a></li>
                                @endforeach
						    </ul>
                        @endif
					</div>
				</div>
			</div>
			<div class="col-lg-1">
			</div>
			<div class="col-lg-6">
				<div class="row">
					<div class="col-md-12">
						<h3 class="footer-heading mb-4"><a href="{{ route('page', app('\App\Models\Page')::CONTACTS_ALIAS) }}">Контакты</a></h3>
					</div>
					<div class="col-md-8">
   					    @if (isset($settingItems['office-address']))
                            <p><strong>Адрес офиса:</strong> {{ $settingItems['office-address']->value }}</p>
                        @endif
                        @if (isset($settingItems['manufacture-address']))
                            <p><strong>Адрес производства:</strong> {{ $settingItems['manufacture-address']->value }}</p>
                        @endif
                        @if (isset($settingItems['warehouse-address']))
                            <p><strong>Адрес склада:</strong> {{ $settingItems['warehouse-address']->value }}</p>
                        @endif
					</div>
					<div class="col-md-4">
                        @if (isset($settingItems['phone1']))
                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $settingItems['phone1']->value) }}">{{ $settingItems['phone1']->value }}</a>
                        @endif
                        @if (isset($settingItems['phone2']))
                            <br><a href="tel:{{ preg_replace('/[^0-9]/', '', $settingItems['phone2']->value) }}">{{ $settingItems['phone2']->value }}</a>
                        @endif
                        @if (isset($settingItems['email']))
                            <br><a href="mailto:{{ $settingItems['email']->value }}">{{ $settingItems['email']->value }}</a>
                        @endif
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5 text-center">
			<div class="col-md-12">
				<p>&copy; ООО "Композитные технологии и оснастка" @if (date("Y") == '2024') {{ date("Y") }} @else {{ 2024 . '-' . date("Y") }} @endif. Все права защищены</p>
			</div>
		</div>
	</div>
</footer>
