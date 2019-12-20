
@extends('layouts.frontend.app')
@section("title",'login')
@push('css')
    <link href="{{ asset('/') }}assets/frontend/css/home/styles.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/frontend/css/home/responsive.css" rel="stylesheet">
{{--................................favorate post click korle color change hbe ei jonno........--}}
    <style>
        .favorite_posts{
            color: blue;
        }
    </style>
{{--   .......................................................................... --}}
@endpush
@section('content')
    <div class="main-slider">
        <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
             data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
             data-swiper-breakpoints="true" data-swiper-loop="true" >
{{--            ...................................................slider...................................--}}
            <div class="swiper-wrapper">

                @foreach($categories as $category)

                    <div class="swiper-slide">
                        <a class="slider-category" href="{{ route('category.posts',$category->slug) }}">
                            <div class="blog-image"><img src="{{ Storage::disk('public')->url('category/slider/'.$category->image) }}" alt="{{ $category->name }}"></div>


                            <div class="category">
                                <div class="display-table center-text">
                                    <div class="display-table-cell">
                                        <h3><b>{{ $category->name }}</b></h3>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div><!-- swiper-slide -->
                    @endforeach
{{--                ......................................................END SLIDER.............................................--}}





            </div><!-- swiper-wrapper -->

        </div><!-- swiper-container -->

    </div><!-- slider -->
    <section class="blog-area section">
        <div class="container">


            <div class="row">
{{--...............................................post.................................--}}



                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="$post->title"></div>

                                <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{route('post.details',$post->slug)}}"><b>{{$post->title}}</b></a></h4>
                                    {{--......................................................faborate && command $$ like.............................--}}
                                    <ul class="post-footer">

                                        <li>
                                            @guest
                                                <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                                            @else
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>

                                                <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite',$post->id) }}" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest

                                        </li>


                                        <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->


                 @endforeach
{{--....................................end post..............................................--}}
            </div><!-- row -->

{{--            <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>--}}

        </div><!-- container -->
    </section><!-- section -->
@endsection

@push('js')

@endpush




{{--.............................................project file..................................................--}}


{{--@extends('layouts.frontend.app')--}}

{{--@section('title','Home')--}}

{{--@push('css')--}}
{{--    <link href="{{ asset('assets/frontend/css/home/styles.css') }}" rel="stylesheet">--}}

{{--    <link href="{{ asset('assets/frontend/css/home/responsive.css') }}" rel="stylesheet">--}}
{{--    <style>--}}
{{--        .favorite_posts{--}}
{{--            color: blue;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endpush--}}

{{--@section('content')--}}
{{--    <div class="main-slider">--}}
{{--        <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"--}}
{{--             data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"--}}
{{--             data-swiper-breakpoints="true" data-swiper-loop="true" >--}}
{{--            <div class="swiper-wrapper">--}}

{{--                @forelse($categories as $category)--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <a class="slider-category" href="{{ route('category.posts',$category->slug) }}">--}}
{{--                            <div class="blog-image"><img src="{{ Storage::disk('public')->url('category/slider/'.$category->image) }}" alt="{{ $category->name }}"></div>--}}

{{--                            <div class="category">--}}
{{--                                <div class="display-table center-text">--}}
{{--                                    <div class="display-table-cell">--}}
{{--                                        <h3><b>{{ $category->name }}</b></h3>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </a>--}}
{{--                    </div><!-- swiper-slide -->--}}
{{--                @empty--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <strong>No Data Found :(</strong>--}}
{{--                    </div><!-- swiper-slide -->--}}
{{--                @endforelse--}}

{{--            </div><!-- swiper-wrapper -->--}}

{{--        </div><!-- swiper-container -->--}}

{{--    </div><!-- slider -->--}}

{{--    <section class="blog-area section">--}}
{{--        <div class="container">--}}

{{--            <div class="row">--}}

{{--                @forelse($posts as $post)--}}
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <div class="card h-100">--}}
{{--                            <div class="single-post post-style-1">--}}

{{--                                <div class="blog-image"><img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="{{ $post->title }}"></div>--}}

{{--                                <a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a>--}}

{{--                                <div class="blog-info">--}}

{{--                                    <h4 class="title"><a href="{{ route('post.details',$post->slug) }}"><b>{{ $post->title }}</b></a></h4>--}}

{{--                                    <ul class="post-footer">--}}

{{--                                        <li>--}}
{{--                                            @guest--}}
{{--                                                <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{--}}
{{--                                                    closeButton: true,--}}
{{--                                                    progressBar: true,--}}
{{--                                                })"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>--}}
{{--                                            @else--}}
{{--                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"--}}
{{--                                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>--}}

{{--                                                <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite',$post->id) }}" style="display: none;">--}}
{{--                                                    @csrf--}}
{{--                                                </form>--}}
{{--                                            @endguest--}}

{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}

{{--                                </div><!-- blog-info -->--}}
{{--                            </div><!-- single-post -->--}}
{{--                        </div><!-- card -->--}}
{{--                    </div><!-- col-lg-4 col-md-6 -->--}}
{{--                @empty--}}
{{--                    <div class="col-lg-12 col-md-12">--}}
{{--                        <div class="card h-100">--}}
{{--                            <div class="single-post post-style-1 p-2">--}}
{{--                                <strong>No Post Found :(</strong>--}}
{{--                            </div><!-- single-post -->--}}
{{--                        </div><!-- card -->--}}
{{--                    </div><!-- col-lg-4 col-md-6 -->--}}
{{--                @endforelse--}}

{{--            </div><!-- row -->--}}

{{--            <a class="load-more-btn" href="{{ route('post.index') }}"><b>LOAD MORE</b></a>--}}

{{--        </div><!-- container -->--}}
{{--    </section><!-- section -->--}}
{{--@endsection--}}

{{--@push('js')--}}

{{--@endpush--}}






{{--.................................end forject file...........................................--}}

{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--        <title>Laravel</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

{{--        <!-- Styles -->--}}
{{--        <style>--}}
{{--            html, body {--}}
{{--                background-color: #fff;--}}
{{--                color: #636b6f;--}}
{{--                font-family: 'Nunito', sans-serif;--}}
{{--                font-weight: 200;--}}
{{--                height: 100vh;--}}
{{--                margin: 0;--}}
{{--            }--}}

{{--            .full-height {--}}
{{--                height: 100vh;--}}
{{--            }--}}

{{--            .flex-center {--}}
{{--                align-items: center;--}}
{{--                display: flex;--}}
{{--                justify-content: center;--}}
{{--            }--}}

{{--            .position-ref {--}}
{{--                position: relative;--}}
{{--            }--}}

{{--            .top-right {--}}
{{--                position: absolute;--}}
{{--                right: 10px;--}}
{{--                top: 18px;--}}
{{--            }--}}

{{--            .content {--}}
{{--                text-align: center;--}}
{{--            }--}}

{{--            .title {--}}
{{--                font-size: 84px;--}}
{{--            }--}}

{{--            .links > a {--}}
{{--                color: #636b6f;--}}
{{--                padding: 0 25px;--}}
{{--                font-size: 13px;--}}
{{--                font-weight: 600;--}}
{{--                letter-spacing: .1rem;--}}
{{--                text-decoration: none;--}}
{{--                text-transform: uppercase;--}}
{{--            }--}}

{{--            .m-b-md {--}}
{{--                margin-bottom: 30px;--}}
{{--            }--}}
{{--        </style>--}}
{{--    </head>--}}
{{--    <body>--}}
{{--        <div class="flex-center position-ref full-height">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="top-right links">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="content">--}}
{{--                <div class="title m-b-md">--}}
{{--                    Laravel--}}
{{--                </div>--}}

{{--                <div class="links">--}}
{{--                    <a href="https://laravel.com/docs">Docs</a>--}}
{{--                    <a href="https://laracasts.com">Laracasts</a>--}}
{{--                    <a href="https://laravel-news.com">News</a>--}}
{{--                    <a href="https://blog.laravel.com">Blog</a>--}}
{{--                    <a href="https://nova.laravel.com">Nova</a>--}}
{{--                    <a href="https://forge.laravel.com">Forge</a>--}}
{{--                    <a href="https://vapor.laravel.com">Vapor</a>--}}
{{--                    <a href="https://github.com/laravel/laravel">GitHub</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </body>--}}
{{--</html>--}}
