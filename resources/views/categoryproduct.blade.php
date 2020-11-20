@extends('includes.master')

@section('content')


    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="background-color:rgba(0,0,0,0.7);">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    @if(is_object($category))
                        <h1>{{$category->name}}</h1>
                    @else
                        <h1>No Category Found</h1>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div id="wrapper" class="go-section">
        <section class="wow fadeInUp go-products">
            <div class="container">
                <div class="row">
                    <div class="col-md-3" style="padding: 0">
                        <h3 class="allcats">All Categories</h3>
                        <div id="left" class="span3">
                            <ul id="menu-group-1" class="nav menu">
                                @foreach($menus as $menu)
                                    <li class="item-1 deeper parent">
                                        <a class="" href="{{url('/category')}}/{{$menu->slug}}">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#{{$menu->slug}}-1" class="sign"><i class="fa fa-plus"></i></span>
                                            <span class="lbl">{{$menu->name}}</span>
                                        </a>
                                        <ul class="children nav-child unstyled small collapse" id="{{$menu->slug}}-1">
                                            @foreach(\App\Category::where('mainid',$menu->id)->where('role','sub')->get() as $submenu)

                                                <li class="item-2 deeper parent">
                                                    <a class="" href="{{url('/category')}}/{{$submenu->slug}}">
                                                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#{{$submenu->slug}}-1" class="sign"><i class="fa fa-plus"></i></span>
                                                        <span class="lbl">{{$submenu->name}}</span>
                                                    </a>

                                                    <ul class="children nav-child unstyled small collapse" id="{{$submenu->slug}}-1">

                                                            @foreach(\App\Category::where('subid',$submenu->id)->where('role','child')->get() as $childmenu)
                                                            <li class="item-3">
                                                                <a class="" href="{{url('/category')}}/{{$childmenu->slug}}">
                                                                    <span class="sign"><i class="fa fa-chevron-right"></i></span>
                                                                    <span class="lbl">{{$childmenu->name}}</span>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div id="products">
                    @forelse($products as $product)
                    <div class="col-xs-6 col-sm-4 col-md-4 product">
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

                                    <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="button style-10">View Product</a>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                    @empty
                        <h3>{{$lang->lm}}</h3>
                    @endforelse
                    </div>
                        @if(count($products) > 0)
                            <div class="col-md-12 text-center" style="margin-top: 15px;">
                                <input type="hidden" id="page" value="2">
                                <div class="col-md-12">
                                <img id="load" src="{{url('/assets/images')}}/default.gif" style="display: none;width: 80px;"></div>
                                <button type="button" id="load-more" class="button style-3">View More</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>

@stop

@section('footer')
<script>
    $("#load-more").click(function () {
        $("#load").show();
        var slug = "{{$category->slug}}";
        var page = $("#page").val();
        $.get("{{url('/')}}/loadcategory/"+slug+"/"+page, function(data, status){
            $("#load").fadeOut();
            $("#products").append(data);
            //alert("Data: " + data + "\nStatus: " + status);
            $("#page").val(parseInt($("#page").val())+1);
            if ($.trim(data) == ""){
                $("#load-more").fadeOut();
            }

        });
    });
</script>
@stop
