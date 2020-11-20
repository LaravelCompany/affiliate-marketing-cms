@extends('includes.master')

@section('content')

    <section class="container" style="margin-top: 20px;">
        <div class="content-push">

            <div class="breadcrumb-box">
                <a href="{{url('/')}}">{{ucwords(strtolower($lang->home))}}</a>
                <a href="{{url('/category')}}/{{\App\Category::where('id',$productdata->category[0])->first()->slug}}">{{\App\Category::where('id',$productdata->category[0])->first()->name}}</a>
                <a href="{{url('/category')}}/{{\App\Category::where('id',$productdata->category[1])->first()->slug}}">{{\App\Category::where('id',$productdata->category[1])->first()->name}}</a>
                <a href="{{url('/category')}}/{{\App\Category::where('id',$productdata->category[2])->first()->slug}}">{{\App\Category::where('id',$productdata->category[2])->first()->name}}</a>
                <a href="{{url('/product')}}/{{$productdata->id}}/{{str_replace(' ','-',strtolower($productdata->title))}}">{{$productdata->title}}</a>
            </div>

            <div class="information-blocks">
                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-5 information-entry">
                        <div class="product-preview-box">
                            <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product-zoom-image">
                                            <img src="{{url('/')}}/assets/images/products/{{$productdata->feature_image}}" alt="" data-zoom="" />
                                        </div>
                                    </div>
                                    @forelse($gallery as $galdta)
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="{{url('/')}}/assets/images/gallery/{{$galdta->image}}" alt="" data-zoom="" />
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="pagination"></div>
                                <div class="product-zoom-container">
                                    <div class="move-box">
                                        <img class="default-image" src="" alt="" />
                                        <img class="zoomed-image" src="" alt="" />
                                    </div>
                                    <div class="zoom-area"></div>
                                </div>
                            </div>
                            <div class="swiper-hidden-edges">
                                <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide selected">
                                            <div class="paddings-container">
                                                <img src="{{url('/')}}/assets/images/products/{{$productdata->feature_image}}" alt="" />
                                            </div>
                                        </div>
                                        @forelse($gallery as $galdta)
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <img src="{{url('/')}}/assets/images/gallery/{{$galdta->image}}" alt="" />
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse


                                    </div>
                                    <div class="pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-7 information-entry">
                        <div class="product-detail-box">
                            <h1 class="product-title">{{$productdata->title}}</h1>
                            {{--@if($productdata->stock != 0 || $productdata->stock === null )--}}
                                {{--<h3 class="product-subtitle"><i class="fa fa-check-circle fa-fw"></i> Available</h3>--}}
                            {{--@else--}}
                                {{--<h3 class="product-subtitle2"><i class="fa fa-times-circle fa-fw"></i> Not in Stock</h3>--}}
                            {{--@endif--}}

                            <div class="rating-box">
                                @for($i=1;$i<=5;$i++)
                                    @if($i <= \App\Review::ratings($productdata->id))
                                        <div class="star"><i class="fa fa-star"></i></div>
                                    @else
                                        <div class="star"><i class="fa fa-star-o"></i></div>
                                    @endif
                                @endfor

                                <div class="rating-number">{{\App\Review::where('productid',$productdata->id)->count()}} {{$lang->rds}}</div>
                            </div>
                            <div class="product-description detail-info-entry">{{substr(strip_tags($productdata->description), 0, 600)}}... <a id="showmore">{{$lang->hcs}}</a></div>
                            <div class="price detail-info-entry">
                                @if($productdata->previous_price != "")
                                    <div class="prev">{{$settings[0]->sign}}{{$productdata->previous_price}}</div>
                                @else
                                @endif
                                <div class="current">{{$settings[0]->sign}}<span id="price">{{$productdata->price}}</span></div>
                            </div>
                            {{--@if($productdata->sizes != null)--}}
                            {{--<div class="size-selector detail-info-entry">--}}
                                {{--<div class="detail-info-entry-title">Size</div>--}}
                                {{--@foreach(explode(',',$productdata->sizes) as $size)--}}
                                    {{--<div class="entry">{{$size}}</div>--}}
                                {{--@endforeach--}}
                                {{--<div class="spacer"></div>--}}
                            {{--</div>--}}
                            {{--@endif--}}

                            <div class="detail-info-entry">
                                <a href="{{route('product.click',$productdata->id)}}" target="_blank" class="button style-10">{{$lang->lns}}</a>
                                <div class="clear"></div>
                            </div>
                            
                            <div class="share-box detail-info-entry">
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.geniusocean.com"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_google_plus"></a>
                                    <a class="a2a_button_linkedin"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                                <div class="title">{{$lang->vd}}</div>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear visible-xs visible-sm"></div>

                </div>
            </div>

            <div class="information-blocks">
                <div class="card">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">{{$lang->ston}}</a></li>
                        <li role="presentation"><a href="#reviews" aria-controls="messages" role="tab" data-toggle="tab">{{$lang->rds}}({{\App\Review::where('productid',$productdata->id)->count()}})</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="description">
                            {!! $productdata->description !!}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reviews">
                            <h3>{{$lang->bgs}}</h3>
                            <hr>
                            <div class="row" style="margin-bottom: 20px">
                                <div class="col-md-6">
                                    <div class='starrr' id='star1'></div>
                                    <div>
                                        <span class='your-choice-was' style='display: none;'>
                                            {{$lang->s}} <span class='choice'></span>.
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('review.submit')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="rating" id="rate" value="5">
                                <input type="hidden" name="productid" value="{{$productdata->id}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="name" placeholder="{{$lang->supl}}" class="form-control" type="text" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" placeholder="{{$lang->fl}}" class="form-control" type="email" required>

                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea name="review" rows="6" placeholder="{{$lang->sm}}" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div id="resp" class="col-md-6">
                                    @if ($errors->has('error'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <!-- Button -->
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-4 col-md-offset-2">
                                            <button type="submit" class="button style-10" id="LoginButton"><strong>{{$lang->bg}}</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <h3>{{$lang->rds}}:</h3>
                            <hr>
                            @forelse($reviews as $review)
                                <div class="row rating-row">
                                    <div class="col-md-3">
                                        <strong>{{$review->name}}</strong>
                                        <div class="rating-box">
                                            @for($i=1;$i<=5;$i++)
                                                @if($i <= $review->rating)
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                @else
                                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="rating-date">{{$review->review_date}}</div>
                                    </div>
                                    <div class="col-md-8">
                                        {{$review->review}}
                                    </div>
                                </div>
                            @empty
                                <h4>{{$lang->rnp}}</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

    </section>

    <section class="wow fadeInUp">
        <div class="container">

            <h3>{{$lang->chnp}}</h3>
            <hr>
            <div class="row owl-carousel" id="related-products">
                @foreach($relateds as $product)
                    <div class="product">
                        <article class="col-item">
                            <div class="photo">
                                <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}"> 
                                    <img src="{{url('/assets/images/products')}}/{{$product->feature_image}}" class="img-responsive" style="height: 320px;" alt="Product Image" />
                                </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details">

                                        <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="row" style="min-height: 60px">
                                            <h1>{{$product->title}}</h1>
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
                                    <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="button style-10">{{$lang->sup}}</a>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



@stop

@section('footer')
<script>
    $('#star1').starrr({
        rating: 5,
        change: function(e, value){
            if (value) {
                $('.your-choice-was').show();
                $('.choice').text(value);
                $('#rate').val(value);
            } else {
                $('.your-choice-was').hide();
            }
        }
    });

    $("#showmore").click(function() {
        $('html, body').animate({
            scrollTop: $("#description").offset().top - 200
        }, 1000);
    });

</script>
@stop