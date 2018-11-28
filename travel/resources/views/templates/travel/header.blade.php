    <!DOCTYPE html>
    <html lang="en">

    <head>
    <title>The Travel - Tour Travel</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- paypal -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!-- -- -->
    <!-- FAV ICON -->
    <link rel="shortcut icon" href="{{ $urlPublic }}/images/fav.ico.htm">
    <!-- GOOGLE FONTS -->
    <link href="../../../../fonts.googleapis.com/css-family=Poppins---Quicksand-400,500,700.htm" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{ $urlPublic }}/css/font-awesome.min.css">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{ $urlPublic }}/css/style.css">
    <link rel="stylesheet" href="{{ $urlPublic }}/css/materialize.css">
    <link rel="stylesheet" href="{{ $urlPublic }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ $urlPublic }}/css/mob.css">
    <link rel="stylesheet" href="{{ $urlPublic }}/css/animate.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>

    <![endif]-->
    <style type="text/css" media="screen"  media=”print”>
        .m-menu{
            margin-left: 420px;
            width: 630px;
        }
        .mm1-com{
            width: 300px;
        }
        .menu{
            padding-right: 0px;
        }
        .ed-com-t1-left{
            margin-right: 0px;
        }
        .footer h4 {
            margin-top: 38px;
            font-size: 14px;
        } 

    </style>
    @if(!empty(session('msg')))
    <script type="text/javascript" >alert("{{ session('msg') }}")</script>
     @endif       
    </head>

    <body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="index.htm#">Liên hệ: 64/3, BĐT - Điện Quang - Điện Bàn - Q.Nam</a>
                                </li>
                                <li><a href="index.htm#">Phone: (+84) 0122 645 2598</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-right menu">
                            <ul>
                                @if(!isset(Auth::user()->username))
                                    <li><a href="{{ route('auth.auth.login') }}">Đăng nhập</a>
                                    </li>
                                @else
                                    <li><a href="#">Chào {{ Auth::user()->ten }}</a>
                                    </li>
                                    <li><a href="{{ route('auth.auth.logout') }}">Đăng xuất</a>
                                    </li>
                                @endif
                                
                            </ul>
                        </div>
                        <div class="ed-com-t1-right menu">
                            <ul>
                                @if(isset(Auth::user()->username))
                                    <li><a href="{{ route('travel.dangki.edit',['id'=> Auth::user()->id]) }}">Cập nhật thông tin cá nhân</a>
                                    </li>
                                @else
                                <li><a href="{{ route('auth.auth.login') }}">Cập nhật thông tin cá nhân</a>
                                    </li>
                                @endif
                                <li><a href="{{ route('travel.dangki.dangki') }}">Đăng Kí</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="{{ route('travel.index.index') }}"><img src="{{ $urlPublic }}/images/logo.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li class="about-menu">
                                    <a href="#" class="mm-arr">Loại tour</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="about-mm m-menu">
                                            <div class="m-menu-inn">
                                                @foreach($objItemsLT as $key => $val)
                                                    @php
                                                    $slug = str_slug($val->tenlt);
                                                    @endphp
                                                <div class="mm1-com mm1-s3">
                                                    <ul>
                                                        <li><a href="{{ route('travel.tour.index',['id'=>$val->id_lt,'slugt'=>$slug ])}}">{{ $val->tenlt }}</a></li>
                                                    </ul>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="{{ route('travel.lienhe.index') }}">Liên hệ</a>
                                </li>
                                <li><a href="{{ route('travel.giohang.index') }}"><img width="50px" heigh="20px" src="{{ $urlPublic }}/images/giohang.png" alt=""/></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!--END HEADER SECTION-->