<div class="sidebar-categories" data-sticky_column>
    <div class="primary-sidebar">
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Категории</h3>
            @foreach($subcategories as $subcategory)
                <div class="popular-post">
                    <a href="{{route('courses.subcategory.show', $subcategory->slug)}}" class="side-category">
                        <h3 class="category-text">{{$subcategory->title}}</h3>
                        <div class="category-img">
                            <img src="{{$subcategory->getImage()}}" alt="">
                        </div>
                    </a>
                </div>
            @endforeach
        </aside>
    </div>
</div>
