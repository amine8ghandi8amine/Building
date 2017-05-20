


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ getSetting( 'site-name' ) }} | @yield('title')</title>
    <!-- adding this for a template purpose -->
    {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/bootstrap-rtl.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/style.css') !!}



    <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">

    {!! Html::style('website/css/font-awesome.min.css') !!}





    {!! Html::style('cust/sweetAlert/sweetalert.css') !!}


    {!! Html::style('cust/select2/css/select2.css') !!}


    {!! Html::style('website/css/custom.css') !!}


    <!-- END>>> adding this for a template purpose -->
    @yield('styling')

    <!-- MODERNIZR -->



    {!! Html::script('website/js/modernizr.js') !!}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>


    @include('partials.navBar')

 


    <div id="app">
        @yield('content')
    </div>

    @include('partials.footer')

    {{-- GET SITE CONTROLL --}}
    <script>
      (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
        t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
      })(window, document, '_gscq','script','//widgets.getsitecontrol.com/75698/script.js');
    </script>


    


    <!-- Scripts -->
    {!! Html::script('website/js/jquery.min.js') !!}

    

    <script type="application/x-javascript"> 
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
        function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    {!! Html::script('website/js/bootstrap.min.js') !!}
    {!! Html::script('website/js/jquery.flexslider.js') !!}
    {!! Html::script('website/js/responsive-nav.js') !!}

    {!! Html::script('website/js/velocity.min.js') !!}

    {!! Html::script('cust/sweetAlert/sweetalert-dev.js') !!}

    {!! Html::script('cust/select2/js/select2.js') !!}
<script>
    function mainUrl(){

            return "{{ url('/') }}" ;

        }

    function noImg(){

            return "{{ getSetting( 'no-image' ) }}" ;

        }
        
</script>

    {!! Html::script('website/js/custom.js') !!}

    <!-- INSERTING SCRipt -->
    @yield('scripting')
</body>
</html>
