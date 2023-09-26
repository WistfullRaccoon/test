@extends('client.profile.layout')

@section('content')
    <div class="d-flex justify-content-center">
        {!! Form::open([
        'route' => 'profile.tickets.store',
        'files' => true
        ])!!}

        <div class="box" style="margin-top:70px; margin-bottom:70px">
            <div class="box-header with-border">
                {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
                <h3 class="box-title">Отправить запрос</h3>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="subject" class="col-form-label">Тема запроса</label>
                        <input id="subject" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}"
                               name="subject" value="{{ old('subject') }}">
                        @if ($errors->has('subject'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('subject') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-form-label">Ваш запрос</label>
                        <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                  name="content" rows="10">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('content') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                <button type="submit" class="btn btn-info pull-right">Добавить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {!! Form::close() !!}

    </div>
@endsection

