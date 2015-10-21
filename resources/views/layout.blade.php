<html>
    <head>
        <link href="/css/app.css" rel="stylesheet">
        <title>EnzoSystem - @yield('title')</title>
    </head>
    <body>
        <div class="container" id="enzoApp">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                       <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                       </button> -->
                       <a class="navbar-brand" href="#">Contrutora</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                       <ul class="nav navbar-nav">
                          <li class="active"><a href="{{ route('contas.index') }}">Listar Contas</a></li>
                          <li><a href="{{ route('contas.create') }}">Cadastrar Conta</a></li>
                       </ul>
                       <ul class="nav navbar-nav navbar-right">
                          <li><a href="#">Usuario X</a></li>
                       </ul>
                </div>
            </nav>
            @yield('content')
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/vue.min.js"></script>
        <script src="js/vue-resource.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
