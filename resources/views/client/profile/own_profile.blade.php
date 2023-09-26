@extends('client.profile.layout')

@section('content')

    <main class="app-content py-3" style="min-height: 900px; background-color: #1f1f1f; ">
        <div class="container">
            @include('client.profile._tab-headers')
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('client.profile.edit')
                </div>
                <div class="tab-pane fade" id="pills-art" role="tabpanel" aria-labelledby="pills-art-tab">
                    @include('client.profile.arts.index')
                </div>
                <div class="tab-pane fade" id="pills-posts" role="tabpanel" aria-labelledby="pills-posts">
                    @include('client.profile.posts.index')
                </div>
                <div class="tab-pane fade" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses">
                    @include('client.profile.courses.index')
                </div>
                <div class="tab-pane fade" id="pills-tickets" role="tabpanel" aria-labelledby="pills-tickets">
                    @include('client.profile.tickets.index')
                </div>
                @if(Auth::user()->isTeacher())
                    <div class="tab-pane fade" id="pills-teacher" role="tabpanel" aria-labelledby="pills-teacher">
                        @include('client.profile.teacher_panel.index')
                    </div>
                @endif
            </div>
        </div>
    </main>

@endsection
