@extends('client.profile.layout')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="container" style="margin-top:30px; margin-bottom:70px">
            <div class="row">
                <div class="col-md-12">
                    {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}

                    @include('client.profile.courses._lesson-tabs', ['lessons' => $lessons])
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="tab-content" id="pills-tabContent">
                        @foreach($lessons as $lesson)
                            <div class="tab-pane fade" id="pills-{{$lesson->id}}" role="tabpanel"
                                 aria-labelledby="pills-{{$lesson->id}}">
                                <div class="my-3 bg-white rounded shadow-sm" style="background-color: #222 !important;">
                                    <div><h3>{{$lesson->title}}</h3></div>
                                    <div>{!! $lesson->content !!}</div>
                                    <div>
                                        {!! $lesson->video !!}
                                    </div>
                                    <div>
                                        <br>
                                        <h3>Домашнее задание</h3>
                                        {!! $lesson->task !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="my-3 ">
                        @foreach ($dialog->getAllMessages() as $message)
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ $message->created_at }} by {{ $message->user->name }}
                                </div>
                                <div class="card-body">
                                    {!! $message->message !!}
                                    <br>
                                    @if($message->hasFile())
                                    <a href="{{$message->getFile()}}" download>Название файла</a>
                                        @endif
                                </div>
                            </div>
                        @endforeach

                        {{ Form::open([
                                'route' => ['profile.dialog.message', $dialog],
                                'files' => true,
                                ])}}
                        <div class="form-group">
                        <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                  name="message" rows="3" required>{{ old('message') }}
                        </textarea>
                            @if ($errors->has('message'))
                                <span
                                    class="invalid-feedback"><strong>{{ $errors->first('message') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group mb-0">
                            <span class="file-input btn btn-primary btn-file">
                                Загрузить файлы <input type="file" id="lesson-files" placeholder="" name="file">
                             </span>
                            <button type="submit" class="btn btn-primary" style="float:right;">Отправить сообщение</button>
                            <div id="lesson-files_list"></div>
                        </div>
                        {{Form::close()}}
                    </div>

                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer" style="padding-left: 0;">
                <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
            </div>
            <!-- /.box-footer-->
            <!-- /.box -->
        </div>
    </div>

@endsection
