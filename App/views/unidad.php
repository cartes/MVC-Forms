<?php
get_header();
?>

<body class="dashboard header-light sidebar-dark sidebar-expand">
    <div id="wrapper" class="wrapper">

        <?php include 'tophead.php' ?>
        <?php include 'menu.php' ?>
        
        <?php if (!isset($form)) { ?>

        <main class="clearfix main-wrapper">
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <?php echo $titulo  ?>
                </div>
            </div>
            
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="btn-list dropdown d-none d-md-flex">
                                <a id="create-data" href="#" data-load="<?php echo get_site_path() ?>/comunidad/crearnuevaunidad" class="btn btn-primary dropdown-toggle ripple">
                                    <i class="material-icons list-icon fs-24">playlist_add</i>
                                    Crear Unidad
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div id="create-data-container" class="col-md-12 widget-holder">
                        <!-- Va el código donde se agregan nuevos usuarios -->
                    </div>
                </div>
                
                <div class="row">
                    <div class="widget-holder col-md-12">
                        <div class="widget-bg">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Unidad</th>
                                        <th>Prorateo</th>
                                        <th>Tipo de Unidad</th>
                                        <th>Asignaciones</th>
                                        <th>Nombre Copropietario</th>
                                        <th>Email copropietario</th>
                                        <th>Nombre residente</th>
                                        <th>Email residente</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if(is_array($unidades)) {
                                        foreach ($unidades as $unidad) {
                                            switch ($unidad['tipo']) {
                                                case 0:
                                                    $tipo = "Departamento";
                                                    break;
                                                case 1:
                                                    $tipo = "Bodega";
                                                    break;
                                                case 2:
                                                    $tipo = "Estacionamiento";
                                                    break;
                                                case 3:
                                                    $tipo = "Local Comercial";
                                                    break;
                                                case 4:
                                                    $tipo = "Administración";
                                                    break;
                                            }
                                            
                                            $editMode = '<i style="font-size: 16px;" class="material-icons">mode_edit</i>';
                                            
                                            echo "<tr>";
                                            echo "<td><a href='". get_site_path() ."/comunidad/unidad/editar/" . $unidad['id_unidad'] ."'>" . $unidad['unidad'] . ' ' . $editMode . "</a></td>" . "\r\n";
                                            echo "<td>" . $unidad['rateo'] . "</td>" . "\r\n";
                                            echo "<td>" . $tipo . "</td>" . "\r\n";
                                            echo "<td></td>" . "\r\n";
                                            echo "<td>". get_user_name($unidad['id_copro']) ."</td>";
                                            echo "<td>". get_user_email($unidad['id_copro']) ."</td>";
                                            echo "<td>". get_user_name($unidad['id_resident']) ."</td>";
                                            echo "<td>". get_user_email($unidad['id_resident']) ."</td>";
                                            echo "<td><a class='edit-unit btn btn-outline-default ripple' href='" . get_site_path() . "/comunidad/unidad/editar/" . $unidad['id_unidad'] ."'>" . "Editar</a></td>";
                                            echo "<td><a class='delete-unit btn btn-outline-default ripple' href='" . get_site_path() . "/comunidad/unidad/borrar/" . $unidad['id_unidad'] ."'>" . "Borrar</a></td>";

                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr>";
                                        echo " <td></td>";
                                        echo " <td colspan='7'>";
                                        echo $unidades;
                                        echo " </td>";
                                        echo "</tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                        
            </div>
        </main>
        
        <?php } elseif (isset ($form)) { ?>
        <main class="clearfix main-wrapper">
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h4>Editando Unidad: <?php echo $unidad[0]['unidad']; ?></h4>
                </div>
            </div>    

            <div class="widget-list">
                <?php include 'forms/editar-unidad.php'; ?>
                <?php print_r($unidad) ?>
            </div>
        </main>                        
        <?php } ?>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.1.3/mediaelementplayer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mithril/1.1.1/mithril.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clndr/1.4.7/clndr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo get_template_path() ?>/assets/js/residentia.js"></script>
    <script src="<?php echo get_template_path() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_path() ?>/assets/vendors/charts/utils.js"></script>
    <script src="<?php echo get_template_path() ?>/assets/vendors/charts/excanvas.js"></script>
    <script src="<?php echo get_template_path() ?>/assets/vendors/theme-widgets/widgets.js"></script>
    <script src="<?php echo get_template_path() ?>/assets/js/theme.js"></script>
    <script src="<?php echo get_template_path() ?>/assets/js/custom.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
           $(".delete-unit").click(function(event){
                event.preventDefault();
                $this = $(this);
                url = $this.attr('href');
                
                swal({
                    title: 'Realmente desea borrar esta unidad',
                    text: "Esta acción no se puede revertir",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Sí, ¡borralo!'
                }).then(function() {
                    window.location.href = url;
                });

           }); 
        });
    </script>
</body>
</html>
