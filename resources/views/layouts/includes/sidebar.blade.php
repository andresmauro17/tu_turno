<div class="sidebar primary" data-active-color="rose" data-background-color="white" >
    <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            TT
        </a>

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
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
                    </span>
                </a>
                {{-- <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>

        <ul class="nav">
            <li>
                <a href="/kiosko">
                    <i class="material-icons">dashboard</i>
                    <p> KIOSKO </p>
                </a>
            </li>
        </ul>
            
        <div class="user">
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        <i class="material-icons">dashboard</i>
                        SETTINGS
                    </span>
                </a>

                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-normal"> Usuarios </span>
                            </a>
                        </li>

                        <li>
                            <a href="/services">
                                <span class="sidebar-normal"> Servicios </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="sidebar-normal"> Modulos </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="sidebar-normal"> Tramites </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="sidebar-normal"> Turnos </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="sidebar-normal"> Clientes </span>
                            </a>
                        </li>
                    </ul>
                </div> 
            </div>
        </div>  
    </div>
</div>