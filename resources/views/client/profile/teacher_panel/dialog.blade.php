@extends('client.profile.layout')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="box" style="margin-top:70px; margin-bottom:70px">
            <div class="box-header with-border">
                <h3 class="box-title" style="padding-left: 15px">Диалог с пользователем</h3>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="my-3">
                        @foreach ($dialog->getAllMessages() as $message)
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ $message->created_at }} by {{ $message->user->name }}
                                </div>
                                <div class="card-body">
                                    {!! $message->message !!}
                                </div>
                            </div>
                        @endforeach

                        {{ Form::open([
                                'route' => ['profile.teacher.message', $dialog],
                                'files' => true,
                                ])}}

                        <div class="form-group">
                        <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                  name="message" rows="3" required>{{ old('message') }}
                        </textarea>

                            @if ($errors->has('message'))
                                <span class="invalid-feedback">
                                    <strong>
                                        {{ $errors->first('message') }}
                                    </strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group mb-0">
                            <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                            <button type="submit" class="btn btn-primary pull-right">Отправить сообщение</button>
                        </div>

                        {{Form::close()}}

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        {!! Form::close() !!}

    </div>

@endsection

