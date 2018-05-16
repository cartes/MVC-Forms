<?php 
$copropiedad = $unidad[0]['unidad'];
$prorateo = $unidad[0]['rateo'];
$tipo = $unidad[0]['tipo'];
$id_copro = $unidad[0]['id_copro'];
$id_residente = $unidad[0]['id_resident'];
$nombre_copro = get_user_name($id_copro);
$email_copro = get_user_email($id_copro);
$nombre_residente = get_user_name($id_residente);
$email_residente = get_user_email($id_residente);
?>

<div class="widget-bg">
    <div class="widget-body clearfix">
        <h5>Agregar nueva Unidad de copropiedad</h5>
        <form class="form-horizontal" method="post" action="<?php echo get_site_path() ?>/comunidad/editunit/<?php echo $unidad[0]['id_unidad']; ?>">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group ">
                        <label class="control-label col-sm-12" for="unidad">
                            Departamento
                            <span class="asteriskField">
                                *
                            </span>
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" id="unidad" name="unidad" placeholder="Número" type="text" value="<?php echo $copropiedad ?>" required />
                            <small class="text-muted">
                                Número de la unidad, departamento, bodega o local
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-sm-12" for="rateo">
                            Prorrateo
                            <span class="asteriskField">
                             *
                            </span>
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" id="rateo" name="rateo" value="<?php echo $prorateo; ?>" placeholder="Prorrateo de unidad" type="text" required />
                            <small class="text-muted">
                                Prorrateo de la unidad de copropietario
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group ">
                        <label class="control-label col-sm-12" for="tipoUnidad">
                            Tipo de unidad
                            <span class="asteriskField">
                                *
                            </span>
                        </label>
                        <div class="col-sm-12">
                            <select class="select form-control" id="tipoUnidad" name="tipoUnidad" required>
                                <option value="0" <?php echo($tipo=='0') ? 'selected': '' ?>>
                                    Departamento
                                </option>
                                <option value="1" <?php echo($tipo=='1') ? 'selected': '' ?>>
                                    Bodega
                                </option>
                                <option value="2" <?php echo($tipo=='2') ? 'selected': '' ?>>
                                    Estacionamiento
                                </option>
                                <option value="3" <?php echo($tipo=='3') ? 'selected': '' ?>>
                                    Local Comercial
                                </option>
                                <option value="4 <?php echo($tipo=='4') ? 'selected': '' ?>">
                                    Administración
                                </option>
                            </select>
                            <small class="text-muted">
                                Escoja el tipo habitacional de la unidad de copropietario
                            </small>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-sm-12" for="nombreCopropietario">
                            Nombre Copropietario
                            <span class="asteriskField">
                                *
                            </span>
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" id="nombreCopropietario" name="nombreCopropietario" placeholder="Nombre" type="text" value="<?php echo $nombre_copro ?>" required />
                            <small class="text-muted">
                                Ingrese el nombre del copropietario o dueño de la unidad
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-sm-12" for="emailCopropietario">
                            Email copropietario
                            <span class="asteriskField">
                                *
                            </span>
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" id="emailCopropietario" name="emailCopropietario" placeholder="Email" type="email" value="<?php echo $email_copro ?>" required />
                            <small class="text-muted">
                                Ingrese el email del copropietario o dueño de la unidad
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 ml-auto">
                    <div class="checkbox checkbox-primary ">
                        <label for="same">
                            <input id="same" name="same" type="checkbox" <?php echo($id_copro==$id_residente) ? 'checked' : '' ?>/>
                            <span class="label-text">
                                Usar los mismos datos para el residente
                            </span>
                        </label>
                    </div>
                </div>
            </div>


            <div class="row resident-data">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-sm-12" for="nombreResidente">
                            Nombre del Residente
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" id="nombreResidente" name="nombreResidente" placeholder="Nombre" type="text" value="<?php echo $nombre_residente ?>" <?php echo($id_copro==$id_residente) ? 'disabled=true' : '' ?>/>
                            <small class="text-muted">
                                Ingrese el nombre del residente de la unidad
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-sm-12 requiredField" for="emailResidente">
                            Email residente
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" id="emailResidente" name="emailResidente" placeholder="Email" type="email" value="<?php echo $email_residente ?>" <?php echo($id_copro==$id_residente) ? 'disabled=true' : '' ?>/>
                            <small class="text-muted" id="hint_emailCopropietario">
                                Ingrese el email del residente de la unidad
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button class="btn btn-primary ripple" name="submit" type="submit" value="enviar">
                             Enviar datos
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>