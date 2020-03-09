<div class="sidebar primary" data-active-color="blue" data-background-color="white" >
    <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            TT
        </a>

        <a href="#" class="simple-text logo-normal">
            Tu Turno
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="/img/placeholder.jpg" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{ Auth::user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">                        
                        <li>                            
                            <a class="btn-login" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="sidebar-normal">
                                    {{ __('Cerrar sesion') }}
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class=" {{ isActiveRoute('home') }} " >
                <a href="/home">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li>
                <a href="/kiosko">
                    <i class="material-icons">desktop_mac</i>
                    <p> KIOSKO </p>
                </a>
            </li>
            <li>
                <a href="/tv">
                    <i class="material-icons">live_tv</i>
                    <p> TV </p>
                </a>
            </li>

            <li 
                class="{{ areActiveRoutes([
                                            'services.index',
                                            'services.create',
                                            'services.edit'
                                        ]) }}"
            >
                <a data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">settings</i>
                    <p> SETTINGS
                        <b class="caret"></b>
                    </p>
                </a>
                <div id="pagesExamples" class="collapse {{ areActiveRoutes([
                                                                            'services.index',
                                                                            'services.create',
                                                                            'services.edit'
                                                                            ],'in') }}" >
                    <ul class="nav">
                        <li class="{{ areActiveRoutes([
                                                        'services.index',
                                                        'services.create',
                                                        'services.edit'
                                                       ]) }}">
                            <a href="/services">
                                <span class="sidebar-mini"> SE </span>
                                <span class="sidebar-normal"> Servicios </span>
                            </a>
                        </li>
                        <li>
                            <a href="./pages/rtl.html">
                                <span class="sidebar-mini"> MD </span>
                                <span class="sidebar-normal"> Modulos </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> TR </span>
                                <span class="sidebar-normal"> Tramites </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> US </span>
                                <span class="sidebar-normal"> Usuarios </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
 
    </div>
</div>