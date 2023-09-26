<a href="{{route('profile.posts.create')}}" class="btn btn-info">Добавить статью</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Название</th>
        <th scope="col">Превью</th>
        <th scope="col">Дата публикации</th>
        <th scope="col">Статус</th>
        <th scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr @if($post->isDraft())
            class="table-secondary"
            @elseif($post->isHidden())
            class="table-danger"
            @else
            class="table-primary"
            @endif>
            {{--        <th scope="row">1</th>--}}
            <td style="vertical-align:middle">{{$post->title}}</td>
            <td style="vertical-align:middle"><img src="{{$post->getImage()}}" alt="" style="max-height: 100px"></td>
            <td style="vertical-align:middle">{{$post->getDate()}}</td>
            <td style="vertical-align:middle">
                @switch($post->status)
                    @case('public')
                    Опубликован
                    @break
                    @case('draft')
                    Черновик
                    @break
                    @case('hidden')
                    Скрыт
                    @break
                @endswitch</td>
            <td style="vertical-align:middle">
                <a href="{{route('profile.posts.edit', $post)}}" class="btn btn-info">Редактировать</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$posts->links()}}
