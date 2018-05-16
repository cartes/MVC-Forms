        <div class="content-wrapper">
            <aside class="site-sidebar scrollbar-enabled clearfix">
                <div class="side-user">
                    <a class="col-sm-12 media clearfix" href="javascript:void(0);">
                        <div class="media-body hide-menu">
                            <h4 class="media-heading mr-b-5 text-uppercase"><?php echo $name ?></h4><span class="user-type fs-12">Editar perfil (...)</span>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                    <ul class="nav in side-menu">
                        <li>
                            <a href="#"><i class="list-icon material-icons">face</i> Mi perfil</a>
                        </li>
                        <li>
                            <a href="<?php echo get_site_path() ?>/dashboard/logout"><i class="list-icon material-icons">settings_power</i> Logout</a>
                        </li>
                    </ul>
                </div>
                
                <nav class="sidebar-nav">
                    <ul class="nav in side-menu active">
                        <li class="">
                            <a href="<?php echo get_site_path() ?>/dashboard" class="ripple">
                                <i class="list-icon material-icons">dashboard</i> <span class="hide-menu">Escritorio</span>
                            </a>
                        </li>
                        <li id="comunidad" class="menu-item-has-children">
                            <a href="#" class="ripple">
                                <i class="list-icon material-icons">location_city</i> <span class="hide-menu">Comunidad</span>
                            </a>
                            <ul id="unidad" class="list-unstyled sub-menu">
                                <li><a href="<?php echo get_site_path() ?>/comunidad/unidad">Unidad de Copropiedad</a></li>
                                <li><a href="<?php echo get_site_path() ?>/comunidad/asignaciones">Asignaciones</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </aside>
        </div>
