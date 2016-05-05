<!DOCTYPE html>
<html>
    <head>
        @include ('_head')
    </head>
    <body>
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header">               

                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="/">Impulse</a>
                        </div>
                        <div id="navbar" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="{{ Request::is('tickets*') ? 'active' : '' }}"><a href="/tickets">Tickets</a></li>
                                <li class="{{ Request::is('customers*') ? 'active' : '' }}"><a href="/customers">Customers</a></li>
                                <li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="/users">Users</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                @if (Auth::guest())
                                <li class="{{ Request::is('auth/login') ? 'active' : '' }}"><a href="/auth/login">Login</a></li>
                                @else
                                <li class="{{ Request::is('admin*') ? 'active' : '' }}"><a href="/admin">Administration</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                       
                                        <li class="divider"></li>
                                        <li><a href="/auth/logout">Logout</a></li>
                                    </ul>
                                </li>
                                @endif
                            </ul>

                        </div><!--/.nav-collapse -->
                    </div>
                </nav>

            </header>

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">

                    <div class="container container-fluid">
                        <div class="row">


                            @yield('content')


                        </div>
                    </div>

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            

        @include ('_javascript')

        @yield('script')

    </body>
</html>