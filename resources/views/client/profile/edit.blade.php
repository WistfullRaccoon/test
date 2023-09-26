{{Form::open([
        'route' => ['profile.update', $user],
        'method' => 'put',
        'files' => true])}}

<div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Профиль</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.errors')
                            <form>
                                <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">Никнейм</label>
                                    <div class="col-8">
                                        <input id="username" name="name" placeholder="Никнейм" value="{{$user->name}}" class="form-control here" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Реальное имя</label>
                                    <div class="col-8">
                                        <input id="name" name="real_name" placeholder="Ральное имя" value="{{$user->real_name}}" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input id="email" name="email" placeholder="email" value="{{$user->email}}" class="form-control here" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newpass" class="col-4 col-form-label">Пароль</label>
                                    <div class="col-8">
                                        <input id="password" name="password" placeholder="Пароль"  class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4 col-form-label">День рождения</label>
                                    <div class="col-8">
                                        <div class="datepicker-container">
                                            <div class="form-group">
                                                <input type="text" class="form-control date-picker" name="birthday" value="{{$user->birthday}}" data-datepicker-color="primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-4 col-form-label">VK</label>
                                    <div class="col-8">
                                        <input id="vk" name="vk_link" placeholder="vk" value="{{$user->vk_link}}" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-4 col-form-label">Facebook</label>
                                    <div class="col-8">
                                        <input id="facebook" name="facebook_link" placeholder="facebook" value="{{$user->facebook_link}}" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-4 col-form-label">Twitter</label>
                                    <div class="col-8">
                                        <input id="twitter" name="twitter_link" placeholder="twitter" value="{{$user->twitter_link}}" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-4 col-form-label">Instagram</label>
                                    <div class="col-8">
                                        <input id="instagram" name="instagram_link" placeholder="instagram" value="{{$user->instagram_link}}" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="publicinfo" class="col-4 col-form-label">Биография</label>
                                    <div class="col-8">
                                        <textarea id="biography" name="biography" cols="50" rows="5" class="form-control">{{$user->biography}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button type="submit" class="btn btn-primary">Обновить данные</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
{{Form::close()}}
