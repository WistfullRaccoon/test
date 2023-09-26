@section('content')

    @extends('client.profile.layout')

    <div class="section" style="background-color: #1f1f1f">
        <div class="container">
            <div class="button-container" style="display: flex; justify-content: center;">
                <form method="POST" action="{{ route('subscribe', $user) }}" class="mr-1">
                    @csrf
                    <button class="btn btn-primary btn-round btn-lg">Follow</button>
                </form>
                <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip"
                   title="Follow me on Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip"
                   title="Follow me on Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="mr-1" style="margin-top: 20px;">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="Z5D8XEPR2PV5S">
                    <input type="image" src="https://www.paypalobjects.com/ru_RU/RU/i/btn/btn_subscribeCC_LG.gif"
                           border="0" name="submit"
                           alt="PayPal — более безопасный и легкий способ оплаты через Интернет!"
                    >
                    <img alt="" border="0" src="https://www.paypalobjects.com/ru_RU/i/scr/pixel.gif" width="1"
                         height="1">
                </form>
            </div>
            <h3 class="title">Биография</h3>
            <h5 class="description">{!! $user->biography !!}</h5>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <h4 class="title text-center">Работы</h4>
                    <div class="nav-align-center">
                        <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile" role="tablist">
                                    <i class="now-ui-icons media-1_album"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tablist">
                                    <i class="now-ui-icons media-1_camera-compact"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages" role="tablist">
                                    <i class="now-ui-icons media-2_note-03"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content gallery">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="col-md-10 ml-auto mr-auto">
                            <div class="row collections">
                                <div class="col-md-6">
                                    <img src="../img/bg6.jpg" class="img-raised">
                                    <img src="../img/bg11.jpg" alt="" class="img-raised">
                                </div>
                                <div class="col-md-6">
                                    <img src="../img/bg7.jpg" alt="" class="img-raised">
                                    <img src="../img/bg8.jpg" alt="" class="img-raised">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="col-md-10 ml-auto mr-auto">
                            <div class="row collections">
                                @foreach($arts as $art)
                                    <div class="col-md-6">

                                        <a href="{{route('arts.show', $art->slug)}}">
                                            <img src="{{$art->getImage()}}" alt="" class="img-raised">
                                        </a>
                                        {{--                                    <img src="../img/bg3.jpg" alt="" class="img-raised">--}}

                                    </div>
                                @endforeach
                                {{--                                <div class="col-md-6">--}}
                                {{--                                    <img src="../img/bg8.jpg" alt="" class="img-raised">--}}
                                {{--                                    <img src="../img/bg7.jpg" alt="" class="img-raised">--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel">
                        <div class="col-md-10 ml-auto mr-auto">
                            <div class="row collections">
                                <div class="col-md-6">
                                    <img src="../img/bg3.jpg" alt="" class="img-raised">
                                    <img src="../img/bg8.jpg" alt="" class="img-raised">
                                </div>
                                <div class="col-md-6">
                                    <img src="../img/bg7.jpg" alt="" class="img-raised">
                                    <img src="../img/bg6.jpg" class="img-raised">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
