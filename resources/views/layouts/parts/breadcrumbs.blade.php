@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="{{ $breadcrumb->url }}">
                        <span itemprop="name">{{ $breadcrumb->title }}</span>
                    </a>
                    <meta itemprop="position" content="{{ $loop->iteration }}" />
                </li>
            @else
                <li class="breadcrumb-item active">
                    {{ $breadcrumb->title }}
                </li>
            @endif
        @endforeach
    </ol>
@endunless
