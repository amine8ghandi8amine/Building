<div id="flipkart-navbar">
    <div class="container-fluid">
        
        <div class="row row2">
            <div class="col-sm-6 col-md-4">
                <h2 style="margin:0px;"><span class="smallnav menu push-left" onclick="openNav()">☰</span></h2>
                <h1 style="margin:0px;"><span class=""><a href="{{ url('/') }}" class="navbar-brand"><i class="fa fa-building-o"></i> {{ config('app.name', 'Laravel') }}</a></span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-xs-11 col-sm-6 col-md-8">
                <div class="row">

                    <input class="flipkart-navbar-input col-xs-11" type="" placeholder="بحث" name="">
                    <button class="flipkart-navbar-button col-xs-1">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

        </div>
        <div class="row row1">
            <ul class="largenav text-center">
                <li class="upper-links {{ currentClass() }}"><a href="{{ route('home') }}">كل العقارات</a></li>
                <li class="upper-links"><a href="about.html">من نحن</a></li>
                <li class="upper-links"><a href="services.html">خدماتنا</a></li>
                <li class="upper-links"><a href="{{ route('contactUs') }}">راسلنا</a></li>
                
                @foreach( buildingRent( -1 ) as $brKey => $bR )
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $bR }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu {{ currentClass('search') }}" role="menu">

                            @foreach( buildingType( -1 ) as $btKey => $bT )
                            <li>
                                <a href="{{ route('search') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('form{{ $btKey.$brKey }}').submit();">
                                    {{ buildingType( $btKey ) }}
                                </a>
                                
                                <form id="form{{ $btKey.$brKey }}" action="{{ route('search') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}

                                    

                                    {!! Form::hidden('rent', $brKey ) !!}
                                    {!! Form::hidden('type', $btKey ) !!}

                                    
                                </form>
                                
                            </li>
                            @endforeach


                        </ul>
                </li>
                @endforeach

                @if( Auth::check() )

                    @if (ifAdmin( Auth::id() ) == 1 )
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                لوحة التحكم <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('site-settings.create') }}"><i class="fa fa-circle-o"></i> تعديل الإعدادات</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('buildings.create') }}"><i class="fa fa-circle-o"></i> إضافة عقار</a></li>
                                <li><a href="{{ route('buildings.index') }}"><i class="fa fa-circle-o"></i> كافة العقارات</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin-users-panel.create') }}"><i class="fa fa-circle-o"></i> إضافة عضو</a></li>
                                <li><a href="{{ route('admin-users-panel.index') }}"><i class="fa fa-circle-o"></i> كافة الأعضاء</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('contact.response', -1) }}"><i class="fa fa-circle-o"></i> كتابة رسالة</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('contact.index') }}"><i class="fa fa-circle-o"></i> كافة الرسائل م.إ</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('contact.box') }}"><i class="fa fa-circle-o"></i> كافة الرسائل</a></li>
                                <li><a href="{{ route('contact.sent') }}"><i class="fa fa-circle-o"></i> الرسائل المرسلة</a></li>
                                <li><a href="{{ route('contact.draft') }}"><i class="fa fa-circle-o"></i> الرسائل المحتفضة</a></li>
                                <li><a href="{{ route('contact.trash') }}"><i class="fa fa-circle-o"></i> الرسائل المحذوفة</a></li>
                                
                                
                            </ul>
                        </li>
                        
                        
                        
                    @endif

                @endif

                
                
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="upper-links"><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                    <li class="upper-links"><a href="{{ route('register') }}">تسجيل العضوية</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    خروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                <div class="clear"></div>
            </ul>
        </div>
    </div>
</div>
<div id="mySidenav" class="sidenav">
    <div class="myNavGreen container row">
        <span class="sidenav-heading col-xs-10">Home</span>
        <a href="javascript:void(0)" class="closebtn col-xs-2" onclick="closeNav()">×</a>
        
        
    </div>
    <ul class="sideNavBar">
                @if( Auth::check() )

                    @if (ifAdmin( Auth::id() ) == 1 )
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                لوحة التحكم <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu overflow-xScroll" role="menu">
                                <li><a href="{{ route('site-settings.create') }}"><i class="fa fa-circle-o"></i> تعديل الإعدادات</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('buildings.create') }}"><i class="fa fa-circle-o"></i> إضافة عقار</a></li>
                                <li><a href="{{ route('buildings.index') }}"><i class="fa fa-circle-o"></i> كافة العقارات</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin-users-panel.create') }}"><i class="fa fa-circle-o"></i> إضافة عضو</a></li>
                                <li><a href="{{ route('admin-users-panel.index') }}"><i class="fa fa-circle-o"></i> كافة الأعضاء</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('contact.response', -1) }}"><i class="fa fa-circle-o"></i> كتابة رسالة</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('contact.index') }}"><i class="fa fa-circle-o"></i> كافة الرسائل م.إ</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('contact.box') }}"><i class="fa fa-circle-o"></i> كافة الرسائل</a></li>
                                <li><a href="{{ route('contact.sent') }}"><i class="fa fa-circle-o"></i> الرسائل المرسلة</a></li>
                                <li><a href="{{ route('contact.draft') }}"><i class="fa fa-circle-o"></i> الرسائل المحتفضة</a></li>
                                <li><a href="{{ route('contact.trash') }}"><i class="fa fa-circle-o"></i> الرسائل المحذوفة</a></li>
                                
                                
                            </ul>
                        </li>
                        
                        
                        
                    @endif

                @endif
                <li class="{{ currentClass() }}"><a href="{{ route('home') }}">كل العقارات</a></li>
                <li class=""><a href="about.html">من نحن</a></li>
                <li class=""><a href="services.html">خدماتنا</a></li>
                <li class=""><a href="{{ route('contactUs') }}">راسلنا</a></li>
                
                @foreach( buildingRent( -1 ) as $brKey => $bR )
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $bR }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu {{ currentClass('search') }}" role="menu">

                            @foreach( buildingType( -1 ) as $btKey => $bT )
                            <li>
                                <a href="{{ route('search') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('form{{ $btKey.$brKey }}').submit();">
                                    {{ buildingType( $btKey ) }}
                                </a>
                                
                                <form id="form{{ $btKey.$brKey }}" action="{{ route('search') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}

                                    

                                    {!! Form::hidden('rent', $brKey ) !!}
                                    {!! Form::hidden('type', $btKey ) !!}

                                    
                                </form>
                                
                            </li>
                            @endforeach


                        </ul>
                </li>
                @endforeach

                

                
                
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class=""><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                    <li class=""><a href="{{ route('register') }}">تسجيل العضوية</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    خروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                <div class="clear"></div>
            </ul>
</div>
