<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    @foreach($lessons as $lesson)
    <li class="nav-item">
        <a class="nav-link" id="pills-{{$lesson->id}}-tab" data-toggle="pill" href="#pills-{{$lesson->id}}" role="tab"
           aria-controls="pills-{{$lesson->id}}" aria-selected="false">{{$lesson->title}}</a>
    </li>
    @endforeach
</ul>
