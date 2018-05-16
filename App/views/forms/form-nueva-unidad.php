<?php
defined("APPPATH") or die('Acceso restringido')
?>
<div class="widget-bg">
    <div class="widget-body clearfix">
        <h5>Agregar nueva Unidad de copropiedad</h5>
        <form class="form-horizontal" method="post" action="<?php echo get_site_path() ?>/comunidad/saveunit">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group ">
                        <label class="control-label col-sm-12" for="unidad">
                            Número Unidad
                            <span class="asteriskField">
                                *
                            </span>
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" id="unidad" name="unidad" placeholder="Número" type="text" required />
                            <small class="text-muted" id="hint_unidad">
                                Ingrese acá el número de la unidad, departamento, bodega o local
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
                            <input class="form-control" id="rateo" name="rateo" placeholder="Prorrateo de unidad" type="text" required />
                            <small class="text-muted" id="hint_rateo">
                                Ingrese la cantidad proporcional a pagar por la unidad de copropietario
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
                                <option value="0">
                                    Departamento
                                </option>
                                <option value="1">
                                    Bodega
                                </option>
                                <option value="2">
                                    Estacionamiento
                                </option>
                                <option value="3">
                                    Local Comercial
                                </option>
                                <option value="4">
                                    Administración
                                </option>
                            </select>
                            <small class="text-muted" id="hint_tipoUnidad">
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
                            <input class="form-control" id="nombreCopropietario" name="nombreCopropietario" placeholder="Nombre" type="text" required />
                            <small class="text-muted" id="hint_name1">
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
                            <input class="form-control" id="emailCopropietario" name="emailCopropietario" placeholder="Email" type="email" required />
                            <small class="text-muted" id="hint_emailCopropietario">
                                Ingrese el email del copropietario o dueño de la unidad
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 ml-auto">
                    <div class="checkbox checkbox-primary ">
                        <label for="same">
                            <input id="same" name="same" type="checkbox"/>
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
                            <input class="form-control" id="nombreResidente" name="nombreResidente" placeholder="Nombre" type="text"/>
                            <small class="text-muted" id="hint_name1">
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
                            <input class="form-control" id="emailResidente" name="emailResidente" placeholder="Email" type="email"/>
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
