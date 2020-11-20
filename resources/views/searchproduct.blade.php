@extends('includes.master')

@section('content')


    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="background-color:rgba(0,0,0,0.7);">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>Search {{$search}}</h1>
                </div>
            </div>

        </div>
    </section>

    <div id="wrapper" class="go-section">
        <section class="wow fadeInUp go-products">
            <div class="container">
                <div class="row">

                    @forelse($products as $product)
                    <div class="col-xs-6 col-sm-4 col-md-3 product">
                        <article class="col-item">
                            <div class="photo">
                                <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}"> <img src="{{url('/assets/images/products')}}/{{$product->feature_image}}" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details">

                                        <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="row" style="min-height: 60px">
                                                            <h1>{{strlen($product->title) > 47 ? substr($product->title,0,47).'...' : $product->title}}</h1>
                                        </a>
                                        <div class="pull-left">
                                            <span class="price-old">{{$settings[0]->sign}}{{$product->previous_price}}</span>
                                            <span class="price-new">{{$settings[0]->sign}}{{$product->price}}</span>
                                        </div>
                                        <div class="pull-right">
                                            <span class="review">
                                                @for($i=1;$i<=5;$i++)
                                                    @if($i <= \App\Review::where('productid',$product->id)->avg('rating'))
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
                                    <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="button style-10">
                                        View
                                    </a>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>

                    </div>
                    @empty
                        <h3>No Product Found in This Keyword.</h3>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

@stop

@section('footer')

@stop
