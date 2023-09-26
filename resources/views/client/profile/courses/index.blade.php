<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Название</th>
        <th scope="col">Категория</th>
        <th scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($studentGroups as $studentGroup)
        <tr class="table-secondary"
{{--            @if($course->isDraft())--}}
{{--            class="table-secondary"--}}
{{--            @elseif($course->isHidden())--}}
{{--            class="table-danger"--}}
{{--            @else--}}
{{--            class="table-primary"--}}
{{--            @endif--}}
        >
            {{--        <th scope="row">1</th>--}}
            <td style="vertical-align:middle">{{$studentGroup->getCourseName()}}</td>
            <td style="vertical-align:middle">{{$studentGroup->getCourseSubcategory()}}</td>
            <td style="vertical-align:middle">
                <a href="{{route('profile.group.show', $studentGroup)}}" class="btn btn-info">Перейти на страницу курса</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{--{{$courses->links()}}--}}
