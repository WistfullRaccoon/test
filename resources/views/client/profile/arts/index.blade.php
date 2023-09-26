<a href="{{route('profile.arts.create')}}" class="btn btn-info">Добавить арт</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Название</th>
        <th scope="col">Арт</th>
        <th scope="col">Дата публикации</th>
        <th scope="col">Категория</th>
        <th scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($arts as $art)
        <tr class="table-secondary"
{{--            @if($art->isDraft())--}}
{{--            class="table-secondary"--}}
{{--            @elseif($art->isHidden())--}}
{{--            class="table-danger"--}}
{{--            @else--}}
{{--            class="table-primary"--}}
{{--            @endif--}}
        >
            {{--        <th scope="row">1</th>--}}
            <td style="vertical-align:middle">{{$art->title}}</td>
            <td style="vertical-align:middle"><img src="{{$art->getImage()}}" alt="" style="max-height: 100px"></td>
            <td style="vertical-align:middle">{{$art->getDate()}}</td>
            <td style="vertical-align:middle">{{$art->subcategory->title}}</td>
            <td style="vertical-align:middle">
                <a href="{{route('profile.arts.edit', $art)}}" class="btn btn-info">Редактировать</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$arts->links()}}
