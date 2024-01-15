@extends('layouts.master')

@section('title', $page->meta_title ?? '')
@section('description', $page->meta_description)

@section('content')

@if ($sliders->count())
<div class="slide-one-item home-slider owl-carousel">
    @foreach ($sliders as $slider)
    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('storage/' . (is_array($slider->image) ? str_ireplace('"', '', implode(' ', $slider->image)) : str_ireplace('"', '', $slider->image))) }});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-5">{{ $slider->title }}</h1>
                    @if ($slider->url)
                    <p>
                        <a href="{{ $slider->url }}" class="btn btn-primary py-3 px-5 rounded-0">Подробнее</a>
                        {{--<a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0">Подробнее</a>--}}
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif

{{--
<div class="site-section border-bottom bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-black h6 font-weight-bold text-uppercase" data-aos="fade">Пусть цифры говорят за нас</h2>
            </div>
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="0">
                <div class="d-flex align-items-center">
                    <div class="mr-3"><span class="flaticon-worker display-3 text-primary"></span></div>
                    <div>
                        <h2 class="text-black">7000+</h2> <strong class="text-black">Highly Especialized</strong> Employees
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                <div class="d-flex align-items-center">
                    <div class="mr-3"><span class="flaticon-planet-earth display-3 text-primary"></span></div>
                    <div>
                        <h2 class="text-black">90+</h2> <strong class="text-black">Countries</strong> World Wide
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-0 mb-lg-0" data-aos="fade" data-aos-delay="300">
                <div class="d-flex align-items-center">
                    <div class="mr-3"><span class="flaticon-excavator display-3 text-primary"></span></div>
                    <div>
                        <h2 class="text-black">2900+</h2> <strong class="text-black">Finished</strong> Projects
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
--}}

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 bg-image bg-sm-height mb-5 mb-md-0 order-md-2" style="background-image: url('images/img_1_colored.jpg');" data-aos="fade-up"></div>
            <div class="col-md-6 pr-md-5 order-md-1">
                <h2 class="display-3 line-height-xs text-black mb-4">О компании</h2>
                <p class="mb-4">
                    {!! $aboutPage ? $aboutPage->detail_text : '' !!}
                </p>
                {{--<ul class="site-block-check">
                    <li>Magnam iure fugit recusandae</li>
                    <li>Officiis laboriosam repudiandae</li>
                    <li>Quis nostrum numquam</li>
                </ul>
                <p><a href="#" class="btn btn-outline-primary btn-sm rounded-0 p-2 px-4">Read More</a></p>--}}
            </div>
        </div>
    </div>
</div>

@if ($services->count())
<div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-12 text-center">
                <h2 class="font-weight-light text-black display-4">Наши услуги</h2>
            </div>
            {{--<div class="col-md-7 text-center">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum iusto eaque qui illo cumque officia nobis assumenda odit perferendis ipsam dolore.</p>
            </div>--}}
        </div>
        <div class="row no-gutters align-items-stretch h-100">
            <div class="col-lg-6">
                <div class="row no-gutters align-items-stretch h-100 half-sm">
                    <div class="col-md-6 bg-image bg-sm-height" style="background-image: url('images/img_4_colored.jpg');" data-aos="fade" data-aos-delay="0"></div>
                    <div class="col-md-6 bg-light text">
                        <div class="p-4">
                            <h2 class="h5 mb-3 text-black line-height-sm">Automative Manufacturing</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In ipsum error perspiciatis odit ullam officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium voluptatum vel natus, repellat at optio.</p>
                            <p class="mb-0"><a href="#" class=""><small class="text-uppercase font-weight-bold text-black">Read More</small></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row no-gutters align-items-stretch h-100 half-sm">
                    <div class="col-md-6 bg-image order-md-2 order-lg-1 bg-sm-height" style="background-image: url('images/img_1_colored.jpg');" data-aos="fade" data-aos-delay="200"></div>
                    <div class="col-md-6 bg-light text order-md-1 order-lg-2">
                        <div class="p-4">
                            <h2 class="h5 mb-3 text-black line-height-sm">Mechanical Engineering</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In ipsum error perspiciatis odit ullam officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, cupiditate officia recusandae velit sint totam.</p>
                            <p class="mb-0"><a href="#" class=""><small class="text-uppercase font-weight-bold text-black">Read More</small></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row no-gutters align-items-stretch h-100 half-sm">
                    <div class="col-md-6 bg-image order-md-1 order-lg-2 bg-sm-height" style="background-image: url('images/img_2_colored.jpg');" data-aos="fade" data-aos-delay="300"></div>
                    <div class="col-md-6 bg-light text order-md-2 order-lg-1">
                        <div class="p-4">
                            <h2 class="h5 mb-3 text-black line-height-sm">Oil &amp; Gas Energy</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In ipsum error perspiciatis odit ullam officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias fugiat facilis quasi ratione ducimus ipsam!</p>
                            <p class="mb-0"><a href="#" class=""><small class="text-uppercase font-weight-bold text-black">Read More</small></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row no-gutters align-items-stretch h-100 half-sm">
                    <div class="col-md-6 bg-image order-md-2 bg-sm-height" style="background-image: url('images/img_3_colored.jpg');" data-aos="fade" data-aos-delay="400"></div>
                    <div class="col-md-6 bg-light text order-md-1">
                        <div class="p-4">
                            <h2 class="h5 mb-3 text-black line-height-sm">Industrial Construction</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In ipsum error perspiciatis odit ullam officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium ullam est alias minus, expedita autem.</p>
                            <p class="mb-0"><a href="#" class=""><small class="text-uppercase font-weight-bold text-black">Read More</small></a></p>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($services as $service)
                <div class="col-lg-6">
                    <div class="row no-gutters align-items-stretch h-100 half-sm">
                        <div class="col-md-6 bg-image @if ($loop->iteration == 2) order-md-2 order-lg-1 @elseif ($loop->iteration == 3) order-md-1 order-lg-2 @elseif ($loop->iteration == 4) order-md-2 @endif bg-sm-height" style="background-image: url({{ asset('storage/' . (is_array($service->image) ? str_ireplace('"', '', implode(' ', $service->image)) : str_ireplace('"', '', $service->image))) }});" data-aos="fade" data-aos-delay="@if ($loop->iteration == 2) 200 @elseif ($loop->iteration == 3) 300 @elseif ($loop->iteration == 4) 400 @else 0 @endif"></div>
                        <div class="col-md-6 bg-light text @if($loop->iteration == 2) order-md-1 order-lg-2 @endif @if($loop->iteration == 3) order-md-2 order-lg-1 @endif">
                            <div class="p-4">
                                <h2 class="h5 mb-3 text-black line-height-sm">{{ $service->title }}</h2>
                                <p>{{ strip_tags($service->preview_text) }}</p>
                                <p class="mb-0"><a href="{{ route('page', $page->alias) }}" class=""><small class="text-uppercase font-weight-bold text-black">Подробнее</small></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<div class="site-section bg-light">
    <div class="container">
        <div class="block-13 nonloop-block-13 owl-carousel" data-aos="fade">
            <div class="p-4">
                <div class="block-47 d-flex">
                    <div class="block-47-image d-none d-sm-block">
                        <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid">
                    </div>
                    <blockquote class="block-47-quote">
                        <p>&ldquo;Magnam iure fugit recusandae nobis a amet, officiis laboriosam repudiandae? Quis nostrum numquam ducimus quo ab laboriosam qui expedita, cupiditate ex, sed dignissimos facere provident dolores, eius distinctio quas aliquid.&rdquo;</p>
                        <cite class="block-47-quote-author">&mdash; John doe, CEO <a href="#">XYZ Inc.</a></cite>
                    </blockquote>
                </div>
            </div>
            <div class="p-4">
                <div class="block-47 d-flex">
                    <div class="block-47-image d-none d-sm-block">
                        <img src="images/person_2.jpg" alt="Image placeholder" class="img-fluid">
                    </div>
                    <blockquote class="block-47-quote">
                        <p>&ldquo;Magnam iure fugit recusandae nobis a amet, officiis laboriosam repudiandae? Quis nostrum numquam ducimus quo ab laboriosam qui expedita, cupiditate ex, sed dignissimos facere provident dolores, eius distinctio quas aliquid.&rdquo;</p>
                        <cite class="block-47-quote-author">&mdash; John doe, CEO <a href="#">XYZ Inc.</a></cite>
                    </blockquote>
                </div>
            </div>
            <div class="p-4">
                <div class="block-47 d-flex">
                    <div class="block-47-image d-none d-sm-block">
                        <img src="images/person_3.jpg" alt="Image placeholder" class="img-fluid">
                    </div>
                    <blockquote class="block-47-quote">
                        <p>&ldquo;Magnam iure fugit recusandae nobis a amet, officiis laboriosam repudiandae? Quis nostrum numquam ducimus quo ab laboriosam qui expedita, cupiditate ex, sed dignissimos facere provident dolores, eius distinctio quas aliquid.&rdquo;</p>
                        <cite class="block-47-quote-author">&mdash; John doe, CEO <a href="#">XYZ Inc.</a></cite>
                    </blockquote>
                </div>
            </div>
            <div class="p-4">
                <div class="block-47 d-flex">
                    <div class="block-47-image d-none d-sm-block">
                        <img src="images/person_4.jpg" alt="Image placeholder" class="img-fluid">
                    </div>
                    <blockquote class="block-47-quote">
                        <p>&ldquo;Magnam iure fugit recusandae nobis a amet, officiis laboriosam repudiandae? Quis nostrum numquam ducimus quo ab laboriosam qui expedita, cupiditate ex, sed dignissimos facere provident dolores, eius distinctio quas aliquid.&rdquo;</p>
                        <cite class="block-47-quote-author">&mdash; John doe, CEO <a href="#">XYZ Inc.</a></cite>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="site-block-half d-block d-lg-flex site-block-video" data-aos="fade">
    <div class="image bg-image order-2" style="background-image: url(images/hero_bg_1.jpg); ">
        <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span class="icon-play"></span></a>
    </div>
    <div class="text order-1">
        <h2 class="site-heading text-black mb-3">See Our <strong>Video</strong></h2>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id cum vel, eius nulla inventore aperiam excepturi molestias incidunt, culpa alias repudiandae, a nobis libero vitae repellendus temporibus vero sit natus.</p>
        <p>Dolores perferendis ipsam animi fuga, dolor pariatur aliquam esse. Modi maiores minus velit iste enim sunt iusto, dolore totam consequuntur incidunt illo voluptates vero quaerat excepturi. Iusto dolor, cum et.</p>
    </div>
</div>--}}

<div class="promo py-5 bg-primary" data-aos="fade">
    <div class="container text-center">
        {{--<h2 class="d-block mb-0 font-weight-light text-white"><a href="#" class="text-white d-block">Contact us for quotations</a></h2>--}}
    </div>
</div>

@endsection
