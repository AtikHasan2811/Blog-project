
<footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">


                    <p class="copyright">{{ config('app.name') }} @ 2017. All rights reserved.</p>
                    <p class="copyright">Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a> and Develop by <a href="https://atikhasan2811.blogspot.com/" target="_blank">Atik</a></p>
                    <ul class="icons">
                        <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><b>CATAGORIES</b></h4>
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form  method="post" action="{{ route('subscriber.store') }}">
                            @csrf
                            <input class="email-input" name="email" type="text" placeholder="Enter your email">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>











{{--.........................................project file...........................--}}


{{--<footer>--}}

{{--    <div class="container">--}}
{{--        <div class="row">--}}

{{--            <div class="col-lg-4 col-md-6">--}}
{{--                <div class="footer-section">--}}

{{--                    --}}{{--<a class="logo" href="#"><img src="images/logo.png" alt="Logo Image"></a>--}}
{{--                    <p class="copyright">{{ env('APP_NAME') }} @ {{ date('Y') }}. All rights reserved.</p>--}}
{{--                    <p class="copyright"><strong> Developed &amp; <i class="far fa-heart"></i> by </strong>--}}
{{--                        <a href="https://www.youtube.com/channel/UCwbVAlvrsD2Tpx93bleNbOA" target="_blank">Programming kit</a></p>--}}
{{--                    <ul class="icons">--}}
{{--                        <li><a target="_blank" href="https://www.facebook.com/cip.fahim.me"><i class="ion-social-facebook-outline"></i></a></li>--}}
{{--                        <li><a target="_blank" href="https://twitter.com/CipFahim"><i class="ion-social-twitter-outline"></i></a></li>--}}
{{--                        <li><a target="_blank" href="https://www.instagram.com/cip.fahim/"><i class="ion-social-instagram-outline"></i></a></li>--}}
{{--                        <li><a target="_blank" href="https://www.youtube.com/programmingkit"><i class="ion-social-youtube-outline"></i></a></li>--}}
{{--                    </ul>--}}

{{--                </div><!-- footer-section -->--}}
{{--            </div><!-- col-lg-4 col-md-6 -->--}}

{{--            <div class="col-lg-4 col-md-6">--}}
{{--                <div class="footer-section">--}}
{{--                    <h4 class="title"><b>CATAGORIES</b></h4>--}}
{{--                    <ul>--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <li><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div><!-- footer-section -->--}}
{{--            </div><!-- col-lg-4 col-md-6 -->--}}

{{--            <div class="col-lg-4 col-md-6">--}}
{{--                <div class="footer-section">--}}

{{--                    <h4 class="title"><b>SUBSCRIBE</b></h4>--}}
{{--                    <div class="input-area">--}}
{{--                        <form method="POST" action="{{ route('subscriber.store') }}">--}}
{{--                            @csrf--}}
{{--                            <input class="email-input" name="email" type="email" placeholder="Enter your email">--}}
{{--                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--                </div><!-- footer-section -->--}}
{{--            </div><!-- col-lg-4 col-md-6 -->--}}

{{--        </div><!-- row -->--}}
{{--    </div><!-- container -->--}}
{{--</footer>--}}
