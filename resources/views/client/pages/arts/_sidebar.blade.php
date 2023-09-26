<div class="sidebar-categories" data-sticky_column>
    <div class="primary-sidebar">
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Категории</h3>
            @foreach($subcategories as $subcategory)
                <div class="popular-post">
                    <a href="{{route('arts.subcategory.show', $subcategory->slug)}}" class="side-category">
                        <h3 class="category-text">{{$subcategory->title}}</h3>
                        <div class="category-img">
                            <img src="{{$subcategory->getImage()}}" alt="">
                        </div>
                    </a>
                </div>
            @endforeach
        </aside>
{{--        <aside class="widget">--}}
{{--            <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>--}}

{{--            <div id="widget-feature" class="owl-carousel">--}}
{{--                <div class="item">--}}
{{--                    <div class="feature-content">--}}
{{--                        <img src="../../../../../public/client/images/p1.jpg" alt="">--}}

{{--                        <a href="#" class="overlay-text text-center">--}}
{{--                            <h5 class="text-uppercase">Home is peaceful</h5>--}}

{{--                            <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                    <div class="feature-content">--}}
{{--                        <img src="../../../../../public/client/images/p2.jpg" alt="">--}}

{{--                        <a href="#" class="overlay-text text-center">--}}
{{--                            <h5 class="text-uppercase">Home is peaceful</h5>--}}

{{--                            <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                    <div class="feature-content">--}}
{{--                        <img src="../../../../../public/client/images/p3.jpg" alt="">--}}

{{--                        <a href="#" class="overlay-text text-center">--}}
{{--                            <h5 class="text-uppercase">Home is peaceful</h5>--}}

{{--                            <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </aside>--}}
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Популярные работы</h3>
            @foreach(\App\Models\Elements\Art::getPopularArts() as $popularArt)
            <div class="thumb-latest-posts">
                <div class="media">
                    <div class="media-left">
                        <a href="{{route('arts.show', $popularArt->slug)}}" class="popular-img"><img src="{{$popularArt->getImage()}}" alt="">
                            <div class="p-overlay"></div>
                        </a>
                    </div>
{{--                    <div class="p-content">--}}
{{--                        <a href="#" class="text-uppercase">Home is peaceful Place</a>--}}
{{--                        <span class="p-date">February 15, 2016</span>--}}
{{--                    </div>--}}
                </div>
            </div>
                @endforeach
        </aside>
    </div>
</div>
