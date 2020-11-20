@extends('includes.master')
@section('content')


<section class="go-slider">
<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >


    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">

        @for ($i = 0; $i < count($sliders); $i++)
            @if($i == 0)
                <!-- Third Slide -->
                    <div class="item active">

                        <!-- Slide Background -->
                        <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                        <div class="bs-slider-overlay"></div>

                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text {{$sliders[$i]->text_position}}">

                                    <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                                    <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->
            @else
            <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text {{$sliders[$i]->text_position}}">
                        <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                        <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>
                    </div>
                </div>
                <!-- End of Slide -->
            @endif
    @endfor


    </div><!-- End of Wrapper For Slides -->

        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div> <!-- End  bootstrap-touch-slider Slider -->

</section>

{{--<section class="wow fadeInUp go-services hideme">--}}
    {{--<div class="row" style="margin-top:70px;">--}}
        {{--<div class="container">--}}
            {{--<div class="col-md-6 col-md-offset-3">--}}
                {{--<div class="section-title">--}}
                    {{--<h2>{{$languages->service_title}}</h2>--}}
                    {{--<p>{{$languages->service_text}}</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@foreach($services as $service)--}}
                {{--<div class="col-xs-12 col-md-4">--}}
                    {{--<div class="service-list text-center wow fadeInUp">--}}
                        {{--<img src="{{url('/assets/images/service')}}/{{$service->icon}}" alt="">--}}
                        {{--<h3>{{$service->title}}</h3>--}}
                        {{--<p>{{$service->text}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}


<section class="wow fadeInUp go-products" style="margin-top: 60px;">
    <div class="container">
        <div class="row">
                <!-- Nav tabs -->
                <div class="card">
                    <div class="col-md-12">
                    <ul class="nav nav-tabs home-tab" role="tablist">
                        <li class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Lang Edit</a></li>
                        <li><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> Lang Reset</a></li>
                        <li><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Lang Suph</a></li>
                    </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active" id="home">
                                <div class="row">
                                    @foreach($features as $product)
                                        <div class="col-xs-6 col-sm-4 col-md-3 product">
                                            <article class="col-item">
                                                <div class="photo">
                                                    <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}">
                                                        <img src="{{url('/assets/images/products')}}/{{$product->feature_image}}" class="img-responsive" alt="Product Image" />
                                                </div>
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="price-details">

                                                            <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="row" style="min-height: 60px">
                                                            <h1>{{strlen($product->title) > 47 ? substr($product->title,0,47).'...' : $product->title}}</h1>
                                                            </a>
                                                            <div class="pull-left">
                                                                @if($product->previous_price != "")
                                                                    <span class="price-old">{{$settings[0]->sign}}{{$product->previous_price}}</span>
                                                                @else
                                                                @endif
                                                                <span class="price-new">{{$settings[0]->sign}}{{$product->price}}</span>
                                                            </div>
                                                            <div class="pull-right">
                                                            <span class="review">
                                                                @for($i=1;$i<=5;$i++)
                                                                    @if($i <= \App\Review::ratings($product->id))
                                                                        <i class="fa fa-star"></i>
                                                                    @else
                                                                        <i class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="separator clear-left text-center">
                                                        <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="button style-10">Lang Suph</a>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach

                                </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <div class="row">
                                @foreach($latests as $product)
                                    <div class="col-xs-6 col-sm-4 col-md-3 product">
                                        <article class="col-item">
                                            <div class="photo">
                                                <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}">
                                                 <img src="{{url('/assets/images/products')}}/{{$product->feature_image}}" class="img-responsive" alt="Product Image" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price-details">

                                                        <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="row" style="min-height: 60px">
                                                            <h1>{{strlen($product->title) > 47 ? substr($product->title,0,47).'...' : $product->title}}</h1>
                                                        </a>
                                                        <div class="pull-left">
                                                            @if($product->previous_price != "")
                                                                <span class="price-old">{{$settings[0]->sign}}{{$product->previous_price}}</span>
                                                            @else
                                                            @endif
                                                            <span class="price-new">{{$settings[0]->sign}}{{$product->price}}</span>
                                                        </div>
                                                        <div class="pull-right">
                                                            <span class="review">
                                                                @for($i=1;$i<=5;$i++)
                                                                    @if($i <= \App\Review::ratings($product->id))
                                                                        <i class="fa fa-star"></i>
                                                                    @else
                                                                        <i class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="separator clear-left text-center">
                                                    <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="button style-10">Lang Suph</a>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="messages">
                            <div class="row">
                                @foreach($tops as $product)
                                    <div class="col-xs-6 col-sm-4 col-md-3 product">
                                        <article class="col-item">
                                            <div class="photo">
                                                <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}">
                                                    <img src="{{url('/assets/images/products')}}/{{$product->feature_image}}" class="img-responsive" alt="Product Image" />
                                                 </a>
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price-details">

                                                        <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="row" style="min-height: 60px">
                                                            <h1>{{strlen($product->title) > 47 ? substr($product->title,0,47).'...' : $product->title}}</h1>
                                                        </a>
                                                        <div class="pull-left">
                                                            @if($product->previous_price != "")
                                                                <span class="price-old">{{$settings[0]->sign}}{{$product->previous_price}}</span>
                                                            @else
                                                            @endif
                                                            <span class="price-new">{{$settings[0]->sign}}{{$product->price}}</span>
                                                        </div>
                                                        <div class="pull-right">
                                                            <span class="review">
                                                                @for($i=1;$i<=5;$i++)
                                                                    @if($i <= \App\Review::ratings($product->id))
                                                                        <i class="fa fa-star"></i>
                                                                    @else
                                                                        <i class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="separator clear-left text-center">
                                                    <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="button style-10">Lang Suph</a>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="wow fadeInUp testimonials hideme">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title">
                    <h2>{{$languages->testimonial_title}}</h2>
                    <p>{{$languages->testimonial_text}}</p>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="customers-testimonials" class="owl-carousel">
                @foreach($testimonials as $testimonial)
                    <div class="item">
                        <div class="shadow-effect">
                            <i class="fa fa-quote-right"></i>
                            <div class="item-details">
                                <p class="ctext">{{$testimonial->review}}</p>
                                <h5>{{$testimonial->client}}</h5>
                                <p>{{$testimonial->designation}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END OF TESTIMONIALS -->

@stop

@section('footer')

@stop
