<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="es">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CRM Dashboard - Examples of just how powerful ArchitectUI really is!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Examples of just how powerful ArchitectUI really is!">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Select2 CSS -->
    <!-- <link type="text/css" rel="stylesheet" href="<!?= FOLDER_PATH ?>/src/js/select2-bootstrap4.css"> -->
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/selectize.css">
    <script src="https://kit.fontawesome.com/629b299bcd.js" crossorigin="anonymous"></script>

    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            font-size: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
            background: url('//upload.wikimedia.org/wikipedia/commons/thumb/e/e5/Phi_fenomeni.gif/50px-Phi_fenomeni.gif') 50% 50% no-repeat rgb(249, 249, 249);
            filter: blur(1px);
        }

        .autosize {
            overflow: hidden;
            display: block;
        }

        .loader p {
            margin-top: 80px;
        }

        #example1_wrapper>div:nth-child(2) {
            overflow-x: auto;
            border-right: none;
        }

        @media only screen and (min-width: 128px) and (max-width: 992px) {
            #example1_wrapper>div:nth-child(2) {
                overflow-x: auto;
                padding-right: 0px;
                margin-right: 0px;
                border-right: 1px solid #f4f4f4;
                padding-top: 0px;
                margin-top: 0px;
            }
        }

        .dropzone {
            width: 100%;
            height: 200px;
            border: 2px dashed #ccc;
            color: #ccc;
            line-height: 200px;
            text-align: center;
        }

        .dropzone.dragover {
            border-color: #000;
            color: #000;
        }
    </style>

    <style>
        .select_users {
            font-family: Arial, Helvetica, sans-serif;
            flex: 1 1 auto;
            margin-right: 5px;
        }

        .selectize-control.select_users::before {
            -moz-transition: opacity 0.2s;
            -webkit-transition: opacity 0.2s;
            transition: opacity 0.2s;
            content: ' ';
            z-index: 2;
            position: absolute;
            display: block;
            top: 12px;
            right: 34px;
            width: 16px;
            height: calc(2.25rem + 2px);
            background: url("<?= FOLDER_PATH ?>/src/assets/media/images/icons/spinner.gif") no-repeat;
            background-size: 16px 16px;
            opacity: 0;
        }

        .selectize-control.select_users.loading::before {
            opacity: 0.4;
        }

        .selectize-dropdown {
            top: 35px !important;
        }

        .item_name {
            padding-left: 10px;
            height: 30px;
            width: 100%;
            display: table-cell;
            vertical-align: middle;
        }

        .selectize-input {
            overflow: initial;
        }

        @media (min-width: 576px) {
            #form-search {
                width: auto;
            }
        }

        #content-select>span.select2-container--bootstrap4 {
            width: auto !important;
        }
    </style>
    <style>
        .title-details {
            color: #468847;
            padding: 8px 35px 8px 14px;
            margin-bottom: 20px;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
            background-color: #e3f3fc;
            border: 1px solid #d9d5fb;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }
    </style>
    <!-- HEADER -->
    <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">
    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
</head>

<body style="overflow: hidden;">
    <?php require(ROOT . '/' . PATH_VIEWS . 'alert_message.php'); ?>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">

        <!-- HEADER -->
        <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>

        <div id="body-main" class="app-main" <?php if (isset($act_msg)) if ($act_msg == 1) echo (' style="padding-top: 120px;"'); ?>>

            <!-- PANEL LATERAL IZQUIERDO -->
            <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_izq.php'); ?>

            <div class="loader">
                <p>Generando la consulta</p>
            </div>
            <?php 
                $nombres  = $this->session->get('Nombres');
                $apellido = $this->session->get('Apellidos'); 
                $nombres  = $nombres.' '.$apellido;
            ?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>Nueva consulta
                                    <div class="page-title-subheading">Bienvenido.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div id="smartwizard2" class="forms-wizard-alt">
                                        <ul class="forms-wizard">
                                            <li class="btnPatient">
                                                <a href="#step-1" id="btnPatient">
                                                    <em>1</em><span>Datos paciente</span>
                                                </a>
                                            </li>
                                            <li class="btnQuestionnaire">
                                                <a href="#step-2" id="btnQuestionnaire">
                                                    <em>2</em><span>Cuestionario</span>
                                                </a>
                                            </li>
                                            <li class="btnClinicalTest">
                                                <a href="#step-3" id="btnClinicalTest">
                                                    <em>3</em><span>Prueba clinica</span>
                                                </a>
                                            </li>
                                            <li class="btnAppointments">
                                                <a href="#step-4" id="btnAppointments">
                                                    <em>4</em><span>Citas</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="form-wizard-content">
                                            <div id="step-1">
                                                <form id="frm-search-patient">
                                                    <div class="form-row">
                                                        <div class="col-md-2">
                                                            <label for="customSelect">Buscar</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2">
                                                            <div class="position-relative input-group">
                                                                <select type="select" id="filter-search" name="filter-search" class="custom-select" autofocus>
                                                                    <option value="0">Seleccionar</option>
                                                                    <option value="1">DNI</option>
                                                                    <?php
                                                                    if ($data['nombre_usuario'][0] != "nothing") {
                                                                        echo '<option value="2" selected>Paciente</option>';
                                                                    } else {
                                                                        echo '<option value="2" selected>Paciente</option>';
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5" style="display:none" id="content-filter">
                                                            <div class="position-relative form-group">
                                                                <input name="filter" id="filter" type="text" placeholder="Ingrese su dni" class="form-control" maxlength="8" minlength="7" onkeypress="return validaNumericos(event)">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-5" id="content-select">
                                                            <!-- <div class="position-relative form-group"  id="content-select" style="display:none"> -->
                                                            <select id="single" class="js-states custom-select" name="single">
                                                                <?php
                                                                if (!isset($data['nombre_usuario'][1])) {
                                                                    $data['nombre_usuario'][1] = '';
                                                                }
                                                                if ($data['nombre_usuario'][0] != "nothing") {
                                                                    echo ('<option value="' . $data['nombre_usuario'][1] . '" selected="selected">' . $data['nombre_usuario'][0] . '</option>');
                                                                }
                                                                ?>
                                                            </select>
                                                            <!-- </div> -->
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="position-relative form-group">
                                                                <button class="mb-2 mr-2 btn-icon btn-pill btn btn-primary" id="btnSearchPatient"><i class="pe-7s-search btn-icon-wrapper"> </i>Buscar</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                                <form id="frm-patient" name="frm-patient" method="post">
                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="dni">DNI</label>
                                                                <input name="dni" id="dni" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="genero">Género</label>
                                                                <select type="select" id="genero" name="genero" class="custom-select" required>
                                                                    <option>Seleccionar</option>
                                                                    <option value="F">Femenino</option>
                                                                    <option value="M">Másculino</option>
                                                                    <option value="3">Otros</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="fechana">Fecha Nacimiento</label>
                                                                <input name="fechana" id="fechana" type="date" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="nombre">Nombres</label>
                                                                <input name="nombre" id="nombre" type="text" class="form-control" onkeyup="mayus(this);" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="apellidopa">Apellido Paterno</label>
                                                                <input name="apellidopa" id="apellidopa" type="text" class="form-control" onkeyup="mayus(this);" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="apellidoma">Apellido Materno</label>
                                                                <input name="apellidoma" id="apellidoma" type="text" class="form-control" onkeyup="mayus(this);" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="celular">Número Celular</label>
                                                                <input name="celular" id="celular" type="text" maxlength="9" onkeypress="return validaNumericos(event)" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="correo">Correo Electrónico</label>
                                                                <input name="correo" id="correo" type="email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="procedencia">Procedencia</label>
                                                                <input name="procedencia" id="procedencia" type="text" class="form-control" onkeyup="mayus(this);" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="ocupacionan">Ocupación Anterior</label>
                                                                <input name="ocupacionan" id="ocupacionan" type="text" class="form-control" onkeyup="mayus(this);">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="ocupacionac">Ocupación Actual</label>
                                                                <input name="ocupacionac" id="ocupacionac" type="text" class="form-control" onkeyup="mayus(this);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-warning submitPatient" id="btnSavePatient">Guardar paciente</button>
                                                            <button class="btn btn-warning submitPatient" id="btnUpdatePatient" style="display:none">Actualizar Paciente</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="step-2">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                        <div>
                                                            <div class="card-body">
                                                                <form id="frm-answers-patient">
                                                                    <table class="table">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">DNI</th>
                                                                                <th scope="col">Paciente</th>
                                                                                <th scope="col">Género</th>
                                                                                <th scope="col">Edad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td id="cuest-dni"></td>
                                                                                <td id="cuest-nombre"></td>
                                                                                <td id="cuest-genero"></td>
                                                                                <td id="cuest-fechana"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="divider"></div>
                                                                    <div class="position-relative form-group">
                                                                        <!-- <label for="exampleEmail3">--------------------------------------------</label> -->
                                                                        <p class="form-control-plaintext">Control de preguntas</p>
                                                                    </div>
                                                                    <div class="form-row" id="block-questions">
                                                                        <!--?php
                                                                        $questions = $this->getQuestionnaire();

                                                                        foreach ($questions as $key => $row) {
                                                                            echo "<div class='col-md-6'>";
                                                                            echo    "<div class='position-relative form-group'>";
                                                                            echo        "<label for='question'>P $key: ¿" . $row['Pregunta'] . "?</label>";
                                                                            echo        "<input type='hidden' name='detalle[]' value='" . $row['Id_Detalle'] . "' class='input-detalle'>";
                                                                            echo        "<input name='answers[]' type='text' id='answer-$key' class='form-control input-answers' required>";
                                                                            echo    "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        ?!-->
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-md-12">
                                                                            <button class="btn btn-info submitAnswers" id="btnSaveAnswers" type="submit">Guardar Respuestas</button>
                                                                            <button class="btn btn-warning submitAnswers" id="btnUpdateAnswers" style="display:none">Actualizar Respuestas</button>
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-3">
                                                <form id="frm-clinicalTest-patient" method="post" enctype="multipart/form-data">
                                                    <table class="table">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">DNI</th>
                                                                <th scope="col">Paciente</th>
                                                                <th scope="col">Género</th>
                                                                <th scope="col">Edad</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td id="pru-dni"></td>
                                                                <td id="pru-nombre"></td>
                                                                <td id="pru-genero"></td>
                                                                <td id="pru-fechana"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="divider"></div>
                                                    <div class="position-relative form-group">
                                                        <!-- <label for="exampleEmail3">--------------------------------------------</label> -->
                                                        <p class="form-control-plaintext">Control de preguntas</p>
                                                    </div>
                                                    <?php
                                                    $history = $this->getHistoryPred();

                                                    ?>
                                                    <div class="form-row">
                                                        <div class="col-md-12">

                                                            <div class="position-relative form-group">
                                                                <label for="genero">Anamnesis</label>
                                                                <?php
                                                                if ($data['id_cita'] !== null) {
                                                                    echo "<input type='hidden' id='id_clinicalTest' value='" . $data['id_cita'] . "'>";
                                                                }
                                                                ?>
                                                                <textarea row="1" class="form-control autosize" id="anamnesis-clinical" name="anamnesis-clinical" style="max-height: 200px; height: 35px" required><?php echo ($history) ? $history['Anamnesis_Pred'] : ""; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="position-relative form-group">
                                                                <label for="genero">Examen Físico</label>
                                                                <textarea rows="1" class="form-control autosize" id="examen-clinical" style="max-height: 200px; height: 35px;" required><?php echo ($history) ? $history['Examen_Fisico_Pred'] : ""; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="position-relative form-group">
                                                                <label for="genero">Exámenes</label>
                                                                <textarea rows="1" class="form-control autosize" id="examenes-clinical" style="max-height: 200px; height: 35px;" required><?php echo ($history) ? $history['Examenes_Pred'] : ""; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="position-relative form-group">
                                                                <label for="genero">Diagnóstico</label>
                                                                <textarea rows="1" class="form-control autosize" id="diagnostico-clinical" style="max-height: 200px; height: 35px;" required><?php echo ($history) ? $history['Diagnostico_Pred'] : ""; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="position-relative form-group">
                                                                <label for="genero">Tratamiento</label>
                                                                <textarea rows="1" class="form-control autosize" id="tratamiento-clinical" name="tratamiento-clinical" style="max-height: 200px; height: 35px;" required><?php echo ($history) ? $history['Tratamiento_Pred'] : ""; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="position-relative form-group">
                                                                <label for="genero">Precio</label>
                                                                <input type="number" class="form-control" id="precio" name="precio" style="" value="<?php echo ($history) ? $history['Monto_Pago'] : ""; ?>" min="0" value="5000" step=".01" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="position-relative form-group">
                                                                <label>Subir archivos JPG/PNG/PDF/WORD</label>
                                                                <div id="uploads"></div>
                                                                <div class="dropzone" id="dropzone" style="display:flex;align-items:center;justify-content:center">Arrastre archivos o de clic aquí para subirlos</div>
                                                                <input id="filesimdc" type="file" style="display: none;" name="file[]" accept="image/png,image/jpeg,image/jpg,application/pdf,application/msword" multiple="true" />
                                                                <!-- <input type="file" name="file[]" multiple="true"> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="position-relative form-group">
                                                                <button class="btn btn-primary submitClinicalTest" id="btnSaveClinicalTest">Guardar prueba</button>
                                                                <button class="btn btn-warning submitClinicalTest" id="btnUpdateClinicalTest" style="display:none">Actualizar prueba</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="step-4">
                                                <table class="table">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">DNI</th>
                                                            <th scope="col">Paciente</th>
                                                            <th scope="col">Género</th>
                                                            <th scope="col">Edad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="cita-dni"></td>
                                                            <td id="cita-nombre"></td>
                                                            <td id="cita-genero"></td>
                                                            <td id="cita-fechana"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div tabindex="-1" class="dropdown-divider mt-4 mb-4" style="border-top: 1px solid #d6d6d6;"></div>


                                                <div class="form-inline">
                                                    <div id="form-search" class="input-group" style="align-items: center;">
                                                        <div class="position-relative input-group mb-4">
                                                            <label class="mr-2 mt-auto mb-auto">Filtro</label>
                                                            <select type="select" id="filter-cita" name="filter-cita" class="custom-select mr-2">
                                                                <option value="2">Fecha cita</option>
                                                            </select>
                                                        </div>
                                                        <div id="busqueda" style="display: block;">
                                                            <div class="position-relative input-group mb-4" id="b-date">
                                                                <label class="mr-2 mt-auto mb-auto">Fecha Cita</label>
                                                                <input type="date" name="date" id="date" class="mr-2 form-control" value="<?= date("Y-m-d"); ?>">
                                                                <button id="btnsrc2" class="btn-icon btn-pill btn btn-primary" onclick="search(2)"><i class="mr-0 pe-7s-search btn-icon-wrapper"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="position-relative input-group mb-4">
                                                        <div id="spsearch"></div>
                                                    </div>
                                                </div>
                                                <div class="form-inline">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleCustomSelect" class="mr-2">Hora</label>
                                                        <input class="form-control input-mask-trigger" id="endTime">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="position-relative form-group">
                                                            <button id="add-apptmt" class="mr-2 btn-icon btn-pill btn btn-success">Agregar</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card-body">
                                                    <table style="width: 100%;" id="list_citas" class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Paciente</th>
                                                                <th>Edad</th>
                                                                <th>Hora atención</th>
                                                                <th>Estado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                        <tfoot>
                                                            <th>Paciente</th>
                                                            <th>Edad</th>
                                                            <th>Hora atención</th>
                                                            <th>Estado</th>
                                                        </tfoot>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="clearfix">
                                        <!-- <button type="button" id="reset-btn2" class="btn-shadow float-left btn btn-link">Resetear</button> -->
                                        <button type="button" id="save-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-warning">Guardar y Continuar</button>
                                        <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
                                        <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Historial clínico</h5>
                            <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Edad</th>
                                        <th>Fecha Consulta</th>
                                        <th>Hora Consulta</th>
                                        <th>Archivos</th>
                                        <th>Imágenes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="list_historial">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Edad</th>
                                        <th>Fecha Consulta</th>
                                        <th>Hora Consulta</th>
                                        <th>Archivos</th>
                                        <th>Imágenes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <div class="modal fade" id="AppDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalles de la consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="data-loading" style="display: block; margin: auto;">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(241, 242, 243, 0); display: block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <rect x="40" y="40" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="47" y="40" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.1388888888888889s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="54" y="40" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.2777777777777778s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="40" y="47" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.9722222222222222s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="54" y="47" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.41666666666666663s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="40" y="54" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.8333333333333333s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="47" y="54" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.6944444444444444s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="54" y="54" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.5555555555555556s" calcMode="discrete"></animate>
                        </rect>
                    </svg>
                </div>
                <div id="data-details" style="display: none;">
                    <div class="modal-body">
                        <p class="mb-0 title-details">Datos del paciente</p>
                        <div class="form-row mt-3">
                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 10px;">Nombre: </label>
                                    <span id="det_nom" style="padding: 7px 0; left: 5px; white-space: nowrap;"></span>
                                </div>

                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">DNI: </label>
                                    <span id="det_dni" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Genero: </label>
                                    <span id="det_gen" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Edad: </label>
                                    <span id="det_edad" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                            </div>

                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Fecha de nacimiento: </label>
                                    <span id="det_fn" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Celular: </label>
                                    <span id="det_cel" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Email: </label>
                                    <span id="det_email" style="padding: 7px 0; left: 5px;"></span>
                                </div>

                            </div>
                        </div>

                        <p class="mb-0 title-details">
                            <span style="padding-right: 120px;">Datos consulta</span>
                            <span style="padding-right: 120px;display: inline-block;">Fecha consulta: <span id="det_fcon" style="padding: 7px 0; left: 5px;"></span></span>
                            <span style="display: inline-block;">Precio: <span id="det_cost" style="padding: 7px 0; left: 5px;"></span></span></p>
                        <div class="form-row mt-3">
                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative form-group" style="margin-right: -15px; margin-left: -15px;">
                                    <label style="padding: 7px 12px; left: 5px;">Diagnostico: </label>
                                    <span id="det_diag" style="padding: 0 12px; left: 5px; display: block;"></span>
                                </div>
                                <div class="position-relative form-group" style="margin-right: -15px; margin-left: -15px;">
                                    <label style="padding: 7px 12px; left: 5px;">Anamnesis: </label>
                                    <span id="det_anam" style="padding: 0 12px; left: 5px; display: block;"></span>
                                </div>
                            </div>
                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative form-group" style="margin-right: -15px; margin-left: -15px;">
                                    <label style="padding: 7px 12px; left: 5px;">Examen físico: </label>
                                    <span id="det_exfi" style="padding: 0 12px; left: 5px; display: block;"></span>
                                </div>
                                <div class="position-relative form-group" style="margin-right: -15px; margin-left: -15px;">
                                    <label style="padding: 7px 12px; left: 5px;">Examenes: </label>
                                    <span id="det_exams" style="padding: 0 12px; left: 5px; display: block;"></span>
                                </div>
                            </div>

                        </div>

                        <p class="mb-0 title-details">Datos de la cita</p>
                        <div class="form-row mt-3">
                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Fecha cita: </label>
                                    <span id="det_fc" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                            </div>
                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Estado: </label>
                                    <span id="det_est" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: normal;">
                    <a id="lnk" href="#" style="text-align: left;" target="_blank">Mas detalles</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
                </div>
            </div>
        </div>
    </div>






    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

    <script src="<?= FOLDER_PATH ?>/src/js/selectize.min.js"></script>
    <script>
        var g_paciente = "",
            g_edad = "",
            count_insert_cita = 0,
            doclick = 0;
        let files = [];
    </script>
    <script>
        $(window).on("load", function() {
            window.scrollTo(0, 0);
            $(".loader").fadeOut("slow");
            $("body").css("overflow", "auto");
            // $(".loader").hide(); 
        });

        var pdf_file;
        let newFiles = [];

        (function() {
            var dropzone = document.getElementById('dropzone');
            var fileupload = $("#filesimdc");
            let filesContainer = $('#myFiles');
            let listado = '';
            var short_text = '';
            var upload = function(filesInput) {
                for (let index = 0; index < filesInput.files.length; index++) {
                    pdf_file = filesInput[index];

                    document.getElementById("dropzone").style.lineHeight = "normal";
                    document.getElementById("dropzone").style.color = "rgb(253, 0, 0)";
                    document.getElementById("dropzone").style.border = "2px inset rgb(255, 77, 0)";
                    listado += '<div title="' + filesInput.files[index].name + '" style="margin: 10px;">';
                    if (filesInput.files[index].type == 'application/pdf') {
                        listado += '<i class="fa fa-file-pdf" style="font-size: 60px;display:block; color: rgb(255, 38, 38);"></i>';
                    } else if (filesInput.files[index].type == 'image/jpeg' || filesInput.files[index].type == 'image/png' || filesInput.files[index].type == 'image/jpg') {
                        listado += '<i class="fas fa-file-image" style="font-size: 60px;display:block; color: DarkCyan;"></i>';
                    } else if (filesInput.files[index].type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || filesInput.files[index].type == 'application/msword') {
                        listado += '<i class="far fa-file-word" style="font-size: 60px;display:block; color: #777777;"></i>';
                    }
                    console.log(filesInput.files[index].type);
                    short_text = truncate(filesInput.files[index].name, 10);
                    /* listado += '<span class="title_pdf" style="display:block; color: rgb(255, 38, 38);">' + filesInput.files[index].name + '</span>'; */
                    listado += '<span class="title_pdf" style="display:block; color: rgb(255, 38, 38);">' + short_text + '</span>';
                    listado += '</div>';
                }

                for (let index = 0; index < filesInput.files.length; index++) {
                    let file = filesInput.files[index];
                    newFiles.push(file);
                    files.push(file);
                }

                /* newFiles.forEach(file => {
                    let fileElement = $(`<p>${file.name}</p>`);
                    fileElement.data('fileData', file);
                    filesContainer.append(fileElement);

                    fileElement.click(function(event) {
                        let fileElement = $(event.target);
                        let indexToRemove = files.indexOf(fileElement.data('fileData'));
                        fileElement.remove();
                        files.splice(indexToRemove, 1);
                    });
                }); */
                dropzone.innerHTML = listado;
            }

            dropzone.ondrop = function(e) {
                e.preventDefault();
                this.className = 'dropzone';
                /* if (e.dataTransfer.files[0].type != 'application/pdf') {
                     Swal.fire("Atención!", "Debe se ingresado solo el archivo PDF", "warning");
                     return;
                } */
                upload(e.dataTransfer);
            }

            dropzone.onmouseover = function() {
                document.getElementById("dropzone").style.cursor = "pointer";
                document.getElementById("dropzone").style.backgroundColor = "rgb(247, 247, 255)";
                document.getElementById("dropzone").style.color = "#777777";
            }
            dropzone.onmouseleave = function() {
                document.getElementById("dropzone").style.backgroundColor = "rgb(255, 255, 255)";
                document.getElementById("dropzone").style.color = "#ccc";
            }

            dropzone.onclick = function() {
                document.getElementById("dropzone").style.backgroundColor = "rgb(40,204,233,0.35)";
                document.getElementById("dropzone").style.color = "rgb(77, 58, 156)";
                document.getElementById("dropzone").style.border = "2px dashed #16008c";

                fileupload.click();
            }

            fileupload.change(function() {
                for (let index = 0; index < fileupload[0].files.length; index++) {
                    document.getElementById("dropzone").style.lineHeight = "normal";
                    document.getElementById("dropzone").style.color = "rgb(253, 0, 0)";
                    document.getElementById("dropzone").style.border = "2px inset rgb(255, 77, 0)";
                    listado += '<div title="' + fileupload[0].files[index].name + '" style="margin: 10px;">';
                    if (fileupload[0].files[index].type == 'application/pdf') {
                        listado += '<i class="fa fa-file-pdf" style="font-size: 60px;display:block; color: rgb(255, 38, 38);"></i>';
                    } else if (fileupload[0].files[index].type == 'image/jpeg' || fileupload[0].files[index].type == 'image/png' || fileupload[0].files[index].type == 'image/jpg') {
                        listado += '<i class="fas fa-file-image" style="font-size: 60px;display:block; color: DarkCyan;"></i>';
                    } else if (fileupload[0].files[index].type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || fileupload[0].files[index].type == 'application/msword') {
                        listado += '<i class="far fa-file-word" style="font-size: 60px;display:block; color: #777777;"></i>';
                    }
                    console.log(fileupload[0].files[index].type);
                    short_text = truncate(fileupload[0].files[index].name, 10);
                    /* listado += '<span class="title_pdf" style="display:block; color: rgb(255, 38, 38);">' + filesInput.files[index].name + '</span>'; */
                    listado += '<span class="title_pdf" style="display:block; color: rgb(255, 38, 38);">' + short_text + '</span>';
                    listado += '</div>';
                    dropzone.innerHTML = listado;

                    let file = fileupload[0].files[index];
                    newFiles.push(file);
                    files.push(file);
                }

                /* newFiles.forEach(file => {
                    let fileElement = $(`<p>${file.name}</p>`);
                    fileElement.data('fileData', file);
                    filesContainer.append(fileElement);

                    fileElement.click(function(event) {
                        let fileElement = $(event.target);
                        let indexToRemove = files.indexOf(fileElement.data('fileData'));
                        fileElement.remove();
                        files.splice(indexToRemove, 1);
                    });
                }); */
                /* upload(fileupload); */
            });

            dropzone.ondragover = function() {
                this.className = 'dropzone dragover';
                return false;
            }

            dropzone.ondragleave = function() {
                this.className = 'dropzone';
                return false;
            }

            function truncate(str, n) {
                return (str.length > n) ? str.substr(0, n - 1) + '&hellip;' : str;
            };

        }());

        function selectSupr(e) {
            var nom_value = e.value;
            if (nom_value == 4) {
                document.getElementById("select_supr").style.display = "block";
            } else {
                document.getElementById("select_supr").style.display = "none";
            }
        }
    </script>


    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('input[id$="endTime"]').inputmask("hh:mm", {
            placeholder: "HH:MM",
            insertMode: false,
            showMaskOnHover: false,
            hourFormat: "24"
        });
    </script>

    <?php
    if ($data['nombre_usuario'][0] != "nothing") {
        echo '
        <script>
            $(document).ready(function() {
                $("#select2-single-container").html("' . $data['nombre_usuario'][0] . '");
                var delayInMilliseconds = 1000;
                setTimeout(function() {
                    $("#btnSearchPatient").trigger("click");
                }, delayInMilliseconds);
            });
        </script>
        ';
    }
    ?>


    <script>
        let cons = document.getElementById("btn-adm_consulta");
        let close = document.getElementById("btn-adm_close");
        let save = document.getElementById("save-btn2");
        if (cons != null) {
            document.getElementById("btn-adm_consulta").addEventListener("click", consulta_admin);

            function consulta_admin() {
                location.href = "<?= FOLDER_PATH ?>/consultation"
            }
        }

        if (save != null) {
            document.getElementById("save-btn2").addEventListener("click", function() {

                Swal.fire({
                    icon: 'warning',
                    title: 'Guardando su consulta',
                    text: "Desea imprimir su prueba clinica ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: 'SlateBlue',
                    confirmButtonText: 'Imprimir',
                    cancelButtonText: 'Guardar y continuar'
                }).then((result) => {

                    if (result.value) {

                        $.ajax({
                                type: "post",
                                dataType: 'JSON',
                                url: "<?php echo FOLDER_PATH ?>/consultation/createPrintHistoryMedical",
                                data: {
                                    datos: 1
                                }
                            })
                            .done(function(data) {
                                if (Object.keys(data).length > 1) {
                                    var doc = new jsPDF();
                                    let docDefinition = {
                                        pageSize: {
                                                    width: 297.64,
                                                    height: 'auto'
                                                },
                                        content: [
                                           
                                            // {
                                            //     text: "EVALUACIÓN MEDICA\n\n\n\n",
                                            //     color: '#4169E1',
                                            //     style: 'header',
                                            //     alignment: 'center',
                                            //     fontSize: 5
                                            // }, {
                                            //     style: 'tableExample',
                                            //     color: '#00CED1',
                                            //     table: {
                                            //         widths: [65, 65, 65],
                                            //         headerRows: 1,

                                            //         // keepWithHeaderRows: 1,
                                            //         body: [
                                            //             [{
                                            //                 text: 'Datos del Paciente',
                                            //                 style: 'tableHeader',
                                            //                 colSpan: 3,
                                            //                 alignment: 'left',
                                            //                 color: '#708090',
                                            //                 fontSize: 5
                                            //             }, {}, {}],
                                            //             [{
                                            //                 text: 'Apellidos y Nombres : ' + data.Nombre,
                                            //                 alignment: 'left',
                                            //                 colSpan: 3,
                                            //                 fontSize: 5
                                            //             }, '', ''],
                                            //             [{
                                            //                 text: 'Documento de identidad :\n\n ' + data.Documento,
                                            //                 alignment: 'left',
                                            //                 fontSize: 5
                                            //             }, {
                                            //                 text: 'Fecha de Nacimiento :\n\n' + data.Fecha_Nacimiento,
                                            //                 fontSize: 5
                                            //             }, {
                                            //                 text: 'Sexo : \n\n Masculino',
                                            //                 fontSize: 5
                                            //             }],
                                            //             [{
                                            //                 text: 'Datos del Doctor',
                                            //                 style: 'tableHeader',
                                            //                 colSpan: 3,
                                            //                 alignment: 'left',
                                            //                 color: '#708090',
                                            //                 fontSize: 5
                                            //             }, {}, {}],
                                            //             [{
                                            //                 text: 'Apellidos y Nombres : <?php echo $this->session->get('Nombres') . ' ' . $this->session->get('Apellidos'); ?>',
                                            //                 colSpan: 3,
                                            //                 alignment: 'left',
                                            //                 fontSize: 5
                                            //             }, {}, {}],
                                            //             [{
                                            //                 text: 'Especialidad :\n\n <?php echo $this->session->get('especialidad') ?>',
                                            //                 alignment: 'left',
                                            //                 fontSize: 5
                                            //             }, {}, {}]
                                            //         ]
                                            //     }
                                            // }, {

                                            //     text: '\n\nTratamiento :\n\n' + data.Tratamiento,
                                            //     fontSize: 5
                                            // }
                                            {
                                                text: "EVALUACIÓN MEDICA\n\n\n",
                                                style: 'header'
                                                
                                            },
                                            // {
                                            //     style: 'tableExample',
                                            //     color: '#00CED1',
                                            //     table: {
                                            //         widths: [70, 70, 70],
                                            //         headerRows: 1,

                                            //         // keepWithHeaderRows: 1,
                                            //         body: [
                                            //             [{
                                            //                 text: 'Datos del Paciente',
                                            //                 style: 'tableHeader',
                                            //                 colSpan: 3,
                                            //                 alignment: 'left',
                                            //                 color: '#708090',
                                            //                 fontSize: 8
                                            //             }, {}, {}],
                                            //             [{
                                            //                 text: 'Apellidos y Nombres : ' + data.Nombre,
                                            //                 alignment: 'left',
                                            //                 colSpan: 3,
                                            //                 fontSize: 8
                                            //             }, '', ''],
                                            //             [{
                                            //                 text: 'Documento de identidad :\n\n ' + data.Documento,
                                            //                 alignment: 'left',
                                            //                 fontSize: 8
                                            //             }, {
                                            //                 text: 'Fecha de Nacimiento :\n\n' + data.Fecha_Nacimiento,
                                            //                 fontSize: 5
                                            //             }, {
                                            //                 text: 'Sexo : \n\n Masculino',
                                            //                 fontSize: 8
                                            //             }],
                                            //             [{
                                            //                 text: 'Datos del Doctor',
                                            //                 style: 'tableHeader',
                                            //                 colSpan: 3,
                                            //                 alignment: 'left',
                                            //                 color: '#708090',
                                            //                 fontSize: 8
                                            //             }, {}, {}],
                                            //             [{
                                            //                 text: 'Apellidos y Nombres : <?php echo $this->session->get('Nombres') . ' ' . $this->session->get('Apellidos'); ?>',
                                            //                 colSpan: 3,
                                            //                 alignment: 'left',
                                            //                 fontSize: 8
                                            //             }, {}, {}],
                                            //             [{
                                            //                 text: 'Especialidad :\n\n <?php echo $this->session->get('especialidad') ?>',
                                            //                 alignment: 'left',
                                            //                 fontSize: 8
                                            //             }, {}, {}]
                                            //         ]
                                            //     }
                                            // }, 
                                            {
                                                columns:[
                                                    {
                                                        text: 'Datos del Paciente',
                                                        color: '#708090',
                                                        style: 'title'
                                                    },{
                                                        text: 'Datos del Doctor\n\n',
                                                        color: '#708090',
                                                        style: 'title'
                                                    }
                                                ]
                                            },{
                                                columns:[
                                                    {
                                                        text: 'Apellidos y Nombres : \n\n' ,
                                                        style: 'title'                                                        
                                                    },{
                                                        text: 'Apellidos y Nombres :\n',
                                                        style: 'title'
                                                    }
                                                ]
                                            },{
                                                columns:[
                                                    {
                                                        text: '  '+data.Nombre ,
                                                        style:'content'
                                                    },{
                                                        text: '  '+'<?php echo $this->session->get('Nombres') . ' ' . $this->session->get('Apellidos'); ?>',
                                                        style:'content'
                                                    }    
                                                ]
                                            },{
                                                columns:[
                                                    {
                                                        text: 'Documento de identidad :\n ',
                                                        style: 'title'
                                                    },{
                                                        text: 'Especialidad :\n\n',
                                                        style: 'title'
                                                    }
                                                ]
                                            },
                                            {
                                                columns:[
                                                    {
                                                        text: '  '+data.Documento,
                                                        style:'content'
                                                    },{
                                                        text: '  '+'<?php echo $this->session->get('especialidad') ?>',
                                                        style:'content'
                                                    }
                                                ]
                                            },{
                                                text: 'Fecha de Nacimiento :\n\n',
                                                style: 'title'
                                            },{
                                                text: '  '+data.Fecha_Nacimiento,
                                                style:'content'
                                            }, {
                                                text: '\nSexo : \n   Masculino',
                                                style: 'content'
                                            },
                                            {
                                                text: '\nTratamiento :\n\n',
                                                style: 'title'
                                            },{
                                                text: data.Tratamiento,
                                                style:'tratamiento'
                                            }
                                        ],
                                        styles:{
                                            header:{
                                                color: '#4169E1',
                                                alignment:'center'
                                            },
                                            title:{
                                                fontSize:7,
                                                bold:true,
                                                alignment:'left'
                                            },
                                            content:{
                                                fontSize:5,
                                                alignment:'left'
                                            },
                                            tratamiento:{
                                                fontSize:5,
                                                alignment:'justify'
                                            }
                                        }
                                    }
                                    let win = window.open('', '_blank');
                                    // if(win){
                                    pdfMake.createPdf(docDefinition).print({}, win);
                                    // win.focus();
                                    setTimeout(() => {
                                        window.location.href = "<?= FOLDER_PATH ?>/my";
                                    }, 3000);
                                    // }

                                }
                            })
                            .fail(function() {

                            });
                    } else {
                        window.location.href = "<?= FOLDER_PATH ?>/my";
                    }
                });
            });
        }

        if (close != null) {
            document.getElementById("btn-adm_close").addEventListener("click", close_admin);

            function close_admin() {
                location.href = "<?= FOLDER_PATH ?>/login/salir"
            }
        }
    </script>

    <script>
        let buttonSearchPressed = false;
        let buttonInsertPressed = false;
        let buttonCreateAnswerPressed = false;

        function calcularEdad(fechana) {
            console.log(fechana);
            let dateParts = fechana.split("-");
            let hoy = new Date();
            let cumpleanos = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0, 2));
            let edad = hoy.getFullYear() - cumpleanos.getFullYear();
            let m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            edad = edad.toString() + " años";
            return edad;
        }

        function validaNumericos(event) {
            if (event.charCode >= 48 && event.charCode <= 57) {
                return true;
            }
            return false;
        }

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

        /** Funcion para que el textarea se ajuste al tamaño del contenido del texto */
        $('.autosize').keydown(function(e) {
            // e.preventDefault();
            var el = this;
            setTimeout(function() {
                el.style.cssText = 'height:auto; padding:0';
                el.style.cssText = 'height:' + el.scrollHeight + 'px';
            }, 0);
        })


        // if(window.location.hash === '#step-1'){

        $("#btnPatient").click(function(e) {

            $('#prev-btn2').css('display', 'none');
            $('#next-btn2').css('display', 'block');
            $('#save-btn2').css('display', 'none');

        })
        // }
        $(".btnQuestionnaire").click(function() {
            if (window.location.hash === '#step-2') {
                console.log(window.location.hash);

                $('#prev-btn2').css('display', 'block');
                $('#next-btn2').css('display', 'block')
                $('#save-btn2').css('display', 'none');
            }
        })

        $(".btnClinicalTest").click(function() {
            if (window.location.hash === '#step-3') {

                console.log(window.location.hash);
                $('#prev-btn2').css('display', 'block');
                $('#next-btn2').css('display', 'block');
                $('#save-btn2').css('display', 'none');
            }
        })
        $(".btnAppointments").click(function() {
            if (window.location.hash === '#step-4') {
                console.log(window.location.hash);

                $('#prev-btn2').css('display', 'block');
                $('#next-btn2').css('display', 'none')
                $('#save-btn2').css('display', 'block');
            }
        })


        $('.submitPatient').click(function() {
            buttonPressed = $(this).attr('id');
            // console.log(buttonPressed);
        });

        $('#frm-patient').submit(function(e) {
            e.preventDefault();


            if (buttonPressed === 'btnSavePatient') {
                // console.log('savePatient');
                let datos = $('#frm-patient').serialize();

                let request = $.ajax({
                    type: "post",
                    dataType: 'JSON',
                    url: "<?php echo FOLDER_PATH ?>/consultation/insertPatient",
                    data: datos
                });
                request.done(function(data) {

                    if (Object.keys(data).length > 1) {
                        // alert('Se insertó correctamente');
                        Swal.fire({
                            icon: 'success',
                            title: 'El paciente fue agregado',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        if (data.Genero == 'F') {
                            data.Genero = 'FEMENINO';
                        } else {
                            data.Genero = 'MASCULINO';
                        }
                        let edad = calcularEdad(data.Fecha_Nacimiento);
                        $('#cuest-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#cuest-dni').html(data.Documento);
                        $('#cuest-fechana').html(edad);
                        $('#cuest-genero').html(data.Genero);
                        $('#pru-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#pru-dni').html(data.Documento);
                        $('#pru-fechana').html(edad);
                        $('#pru-genero').html(data.Genero);
                        $('#cita-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#cita-dni').html(data.Documento);
                        $('#cita-fechana').html(edad);
                        $('#cita-genero').html(data.Genero);
                        let questions = "";
                        for (let index = 1; index <= data[0]; index++) {
                            questions += "<div class='col-md-6'>";
                            questions += "<div class='position-relative form-group'>";
                            questions += "<label for='question'>P" + index + ": ¿" + data[index].Pregunta + "?</label>";
                            questions += "<input type='hidden' name='detalle[]' value='" + data[index].Id_Detalle + "' class='input-detalle'>";
                            questions += "<input name='answers[]' type='text' id='answer" + index + "' class='form-control input-answers' required>";
                            questions += "</div>";
                            questions += "</div>";
                        }
                        $('#block-questions').html(questions);
                        $('#btnSaveAnswers').css('display', 'block');
                        $('#btnUpdateAnswers').css('display', 'none');
                        $('#btnUpdatePatient').css('display', 'block');
                        $('#btnSavePatient').css('display', 'none');
                        $('.input-answers').val('');
                        $('#next-btn2').attr('disabled', false);
                    } else {
                        // alert(data);
                        Swal.fire({
                            icon: 'error',
                            title: data,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
                request.fail(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });

            } else if (buttonPressed = 'btnUpdatePatient') {
                // console.log('UpdatePatient');

                let datos = $('#frm-patient').serialize();
                $.ajax({
                        type: "post",
                        url: "<?php echo FOLDER_PATH ?>/consultation/updatePatient",
                        data: datos
                    })
                    .done(function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: response,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        let genero = $('#genero').val();
                        if (genero == 'F') {
                            genero = 'FEMENINO';
                        } else {
                            genero = 'MASCULINO';
                        }
                        let fechana = $('#fechana').val();
                        let edad = calcularEdad(fechana);
                        $('#cuest-nombre').html($('#nombre').val() + " " + $('#apellidopa').val() + " " + $('#apellidoma').val());
                        $('#cuest-dni').html($('#dni').val());
                        $('#cuest-genero').html(genero);
                        $('#cuest-fechana').html(edad);
                        $('#pru-nombre').html($('#nombre').val() + " " + $('#apellidopa').val() + " " + $('#apellidoma').val());
                        $('#pru-dni').html($('#dni').val());
                        $('#pru-genero').html(genero);
                        $('#pru-fechana').html(edad);
                        $('#cita-nombre').html($('#nombre').val() + " " + $('#apellidopa').val() + " " + $('#apellidoma').val());
                        $('#cita-dni').html($('#dni').val());
                        $('#cita-genero').html(genero);
                        $('#cita-fechana').html(edad);

                    })
                    .fail(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubo un error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
            }
        });

        $('#btnSearchPatient').on("click", function() {
            let select = $('select[name="single"] option:selected').text();
            let documento = $('#filter').val();
            let search = $('#filter-search').val();
            buttonSearchPressed = true;
            let valuePaciente = $('select[name="single"] option:selected').val();
            let arrayPaciente = new Array();
            if (documento === "" && (search === '1' || search === '0')) {
                console.log('ingrese dni')
                Swal.fire({
                    icon: 'error',
                    title: 'Ingrese el dni',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else if (select === "" && search === '2') {
                console.log('ingrese paciente')
                Swal.fire({
                    icon: 'error',
                    title: 'Ingrese el paciente',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                arrayPaciente.push(select);
                arrayPaciente.push(valuePaciente);
                let request = $.ajax({
                    data: {
                        namePaciente: arrayPaciente,
                        filter: documento
                    },
                    type: "post",
                    dataType: 'JSON',
                    url: "<?php echo FOLDER_PATH ?>/consultation/searchPatient"
                });
                request.done(function(data) {

                    if (Object.keys(data).length > 1) {
                        $('#nombre').val(data.Nombre);
                        $('#apellidopa').val(data.Apellido_Paterno);
                        $('#apellidoma').val(data.Apellido_Materno);
                        $('#procedencia').val(data.Procedencia);
                        $('#ocupacionac').val(data.Ocupacion_Actual);
                        $('#ocupacionan').val(data.Ocupacion_Anterior);
                        $('#dni').val(data.Documento);
                        $('#correo').val(data.Email);
                        $('#celular').val(data.Celular);
                        $("#genero option[value=" + data.Genero + "]").attr("selected", true);
                        $('#fechana').val(data.Fecha_Nacimiento);
                        // $('#btnSavePatient').attr("disabled", true);
                        if (data.Genero == 'F') {
                            data.Genero = 'FEMENINO';
                        } else {
                            data.Genero = 'MASCULINO';
                        }
                        let edad = calcularEdad(data.Fecha_Nacimiento);
                        $('#cuest-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#cuest-dni').html(data.Documento);
                        // console.log(calcularEdad(data.Fecha_Nacimiento));
                        $('#cuest-fechana').html(edad);
                        $('#cuest-genero').html(data.Genero);
                        $('#pru-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#pru-dni').html(data.Documento);
                        $('#pru-fechana').html(edad);
                        $('#pru-genero').html(data.Genero);
                        $('#cita-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#cita-dni').html(data.Documento);
                        $('#cita-fechana').html(edad);
                        $('#cita-genero').html(data.Genero);
                        $('#namePatient').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        // $('#btnSaveAnswers').css('display', 'none');
                        // $('#btnUpdateAnswers').css('display', 'block');
                        $('#filter').val("");
                        $('#btnSavePatient').css('display', 'none');
                        $('#btnUpdatePatient').css('display', 'block');
                        $('#next-btn2').attr('disabled', false);

                        /** mostrar las preguntas */
                        let questions = "";
                        for (let index = 3; index <= data[0] + 2 + data[1]; index++) {
                            questions += "<div class='col-md-6'>";
                            questions += "<div class='position-relative form-group'>";
                            questions += "<label for='question'>P" + (index - 2) + ": ¿" + data[index].Pregunta + "?</label>";
                            questions += "<input type='hidden' name='detalle[]' value='" + data[index].Id_Detalle + "' class='input-detalle'>";
                            questions += "<input name='answers[]' type='text' id='answer" + (index - 2) + "' class='form-control input-answers' required>";
                            questions += "</div>";
                            questions += "</div>";
                        }
                        $('#block-questions').html(questions);
                        /** end mostrar */

                        let id_detalle = new Array();

                        $('.input-detalle').each(function(index) {
                            id_detalle[index] = $(this).val();
                        })
                        console.log(data[1] + 2);
                        let inicio = data[2] + 3 + data[1];

                        for (let i = 0; i < id_detalle.length - data[1]; i++) {
                            let pos = id_detalle.indexOf(data[inicio + i].Id_Detalle_Cuestionario);
                            if (pos !== -1) {
                                $('.input-answers').eq(pos).val(data[inicio + i].Respuesta);
                            }
                        }

                        let cantQuestion = $('.input-answers').toArray().length;
                        let cantVal = 0;
                        $('.input-answers').each(function(index) {
                            if ($(this).val() === '') {
                                cantVal++;
                            }
                        });
                        if (cantVal === cantQuestion) {
                            $('#btnSaveAnswers').css('display', 'block');
                            $('#btnUpdateAnswers').css('display', 'none');
                        } else {
                            $('#btnSaveAnswers').css('display', 'none');
                            $('#btnUpdateAnswers').css('display', 'block');
                        }

                        // console.log(Object.keys(data.0).length);
                        generar_citas_paciente('');
                        generar_historial(valuePaciente);
                        g_paciente = data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno;
                        g_edad = edad;
                    } else {

                        Swal.fire({
                            title: data,
                            text: "Desea agregarlo ?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si'
                        }).then((result) => {
                            if (result.value) {
                                let dni = $('#filter').val();
                                $('#dni').val(dni);
                            } else {
                                $('#filter').val("");
                            }
                        })
                        $('#btnSavePatient').css('display', 'block');
                        $('#btnUpdatePatient').css('display', 'none');
                        resetear_form();
                    }
                });
                request.fail(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
                return false;
            }
        });

        $('#filter-search').change(function() {
            if ($(this).val() === '1') {
                $('#content-filter').css('display', 'block');
                $('#content-select').css('display', 'none');
                resetear_form();

            } else if ($(this).val() === '2') {
                $('#content-filter').css('display', 'none');
                $('#content-select').css('display', 'block');
                resetear_form();

            } else {
                $('#content-filter').css('display', 'block');
                $('#content-select').css('display', 'none');
            }

        })

        function resetear_form() {
            $('#nombre').val("");
            $('#apellidopa').val("");
            $('#apellidoma').val("");
            $('#procedencia').val("");
            $('#ocupacionac').val("");
            $('#ocupacionan').val("");
            $('#dni').val("");
            $('#correo').val("");
            $('#celular').val("");
            $("#genero").prop("selectedIndex", 0);
            $('#fechana').val("");
            $('#cuest-nombre').html("");
            $('#cuest-dni').html("");
            $('#cuest-genero').html("");
            $('#cuest-fechana').html("");
            $('#pru-nombre').html("");
            $('#pru-dni').html("");
            $('#pru-genero').html("");
            $('#pru-fechana').html("");
            $('#cita-nombre').html("");
            $('#cita-dni').html("");
            $('#cita-genero').html("");
            $('#cita-fechana').html("");
            $('.input-answers').val("");
        }


        // SELECT2 LIBRERIA
        $("#single").select2({
            placeholder: 'Ingrese el paciente',
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo FOLDER_PATH ?>/consultation/showPatients',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: data
                    };
                },
                cache: true
            }

        });

        $('.submitClinicalTest').click(function() {
            buttonPressed = $(this).attr('id');
            console.log(buttonPressed);
        })


        $('#frm-clinicalTest-patient').submit(function(e) {

            e.preventDefault();

            if ($('#pru-nombre').html() !== "") {
                if (buttonPressed === 'btnSaveClinicalTest') {
                    var data = new FormData();
                    var ac = $('#anamnesis-clinical').val();
                    var ec = $('#examen-clinical').val();
                    var esc = $('#examenes-clinical').val();
                    var dc = $('#diagnostico-clinical').val();
                    var tc = $('#tratamiento-clinical').val();
                    var ic = $('#id_clinicalTest').val();
                    var pr = $('#precio').val();
                    /* var fl = $('input[type=file]')[0].files; */

                    data.append("anamnesis-clinical", ac);
                    data.append("examen-clinical", ec);
                    data.append("examenes-clinical", esc);
                    data.append("diagnostico-clinical", dc);
                    data.append("tratamiento-clinical", tc);
                    data.append("ic", ic);
                    data.append("pr", pr);

                    files.forEach(file => {
                        data.append('file[]', file);
                    });
                    $.ajax({
                            beforeSend: function() {
                                $("#btnSaveClinicalTest").html('Guardando prueba&ThinSpace;&ThinSpace;<span id="spinner-h" class="fa fa-spinner fa-spin"></span>');
                                $("#btnSaveClinicalTest").attr("disabled", true);
                            },
                            type: "post",
                            url: "<?= FOLDER_PATH ?>/consultation/insertClinicalTest",
                            data: data,
                            processData: false,
                            // cache: false,
                            contentType: false
                        })
                        .done(function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: response,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $("#btnSaveClinicalTest").html('Guardar prueba');
                            $('#next-btn2').attr('disabled', false);
                            $('#btnUpdateClinicalTest').css('display', 'block');
                            $('#btnSaveClinicalTest').css('display', 'none');
                        })
                        .fail(function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hubo un error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        })

                } else if (buttonPressed === 'btnUpdateClinicalTest') {
                    let datos = $(this).serialize();
                    $.ajax({
                            beforeSend: function() {
                                $("#btnUpdateClinicalTest").html('Actualizando prueba&ThinSpace;&ThinSpace;<span id="spinner-h" class="fa fa-spinner fa-spin"></span>');
                                $("#btnUpdateClinicalTest").attr("disabled", true);
                            },
                            type: "post",
                            url: "<?= FOLDER_PATH ?>/consultation/updateClinicalTest",
                            data: datos
                        })
                        .done(function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: response,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $("#btnUpdateClinicalTest").html('Actualizar prueba');
                            $('#next-btn2').attr('disabled', false);

                        })
                        .fail(function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hubo un error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Por favor busque o agregue un paciente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });


        function generar_citas_paciente(fecha) {
            var data = new FormData();
            data.append("fecha", fecha);
            $.ajax({
                url: "<?= FOLDER_PATH ?>/consultation/citas",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(resp) {
                    $('#list_citas').html(resp);
                }
            })
        }

        function generar_historial(paciente) {
            var data = new FormData();
            data.append("paciente", paciente);
            $.ajax({
                url: "<?= FOLDER_PATH ?>/consultation/consultas",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(resp) {
                    $('#list_historial').html(resp);
                }
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[type=text]').forEach(node => node.addEventListener('keypress', e => {
                if (e.keyCode == 13) {
                    e.preventDefault();
                }
            }))
        });

        let buttonPressed;


        $('.submitAnswers').on('click', function(e) {

            buttonPressed = $(this).attr('id');
            console.log(buttonPressed);
        });

        $('#frm-answers-patient').submit(function(e) {
            e.preventDefault();

            if ($('#cuest-nombre').html() !== "") {
                if (buttonPressed === 'btnSaveAnswers') {

                    let answersArray = new Array();
                    let detalleArray = new Array();

                    $('.input-detalle').each(function() {
                        detalleArray.push($(this).val());
                    })

                    $('.input-answers').each(function() {
                        answersArray.push($(this).val());
                    })

                    $.ajax({
                            type: "post",
                            url: "<?php echo FOLDER_PATH ?>/consultation/insertAnswers",
                            data: {
                                detalle: detalleArray,
                                answers: answersArray
                            }
                        })
                        .done(function(response) {
                            console.log(response);
                            Swal.fire({
                                icon: 'success',
                                title: response,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#btnUpdateAnswers').css('display', 'block');
                            $('#btnSaveAnswers').css('display', 'none');
                            $('#next-btn2').attr('disabled', false);
                        })
                        .fail(function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ocurrió un problema',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        });
                } else if (buttonPressed === 'btnUpdateAnswers') {

                    let answersArray = new Array();
                    let detalleArray = new Array();
                    let newInsertArray = new Array();

                    $('.input-detalle').each(function() {
                        detalleArray.push($(this).val());
                    })

                    $('.input-answers').each(function() {
                        answersArray.push($(this).val());
                    })

                    $.ajax({
                            type: "post",
                            url: "<?php echo FOLDER_PATH ?>/consultation/updateAnswers",
                            data: {
                                detalle: detalleArray,
                                answers: answersArray
                            }
                        })
                        .done(function(response) {
                            console.log(response);
                            Swal.fire({
                                icon: 'success',
                                title: response,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#next-btn2').attr('disabled', false);
                        })
                        .fail(function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ocurrió un problema',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Por favor busque o agregue un paciente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    </script>
    <script>
        $('#prev-btn2').css('display', 'none');
        $('#save-btn2').css('display', 'none');
        $('#next-btn2').attr("disabled", true);

        $('#prev-btn2').on('click', function() {
            $('#next-btn2').attr('disabled', false);
            $('#next-btn2').css('display', 'block');
            $('#save-btn2').css('display', 'none');

            if (detectCSS('#step-2', 'display', 'block')) {

                $('#prev-btn2').css('display', 'none');
                // console.log('true');
            }
        });

        $('#next-btn2').on('click', function() {
            $('#prev-btn2').css('display', 'block');

            if (detectCSS('#step-3', 'display', 'block')) {
                $('#next-btn2').css('display', 'none');
                $('#save-btn2').css('display', 'block');
            }
            console.log(detectCSS('#step-1', 'display', 'block'));
            if ($('#answer-0').val() == "" && detectCSS('#step-1', 'display', 'block')) {
                $('#next-btn2').attr('disabled', true);
                console.log('step-2');
            }
            if ($('#answer-0').val() !== "" && detectCSS('#step-1', 'display', 'block')) {
                $('#next-btn2').attr('disabled', false);
                console.log('step-2');
            }
            if ($('#tratamiento-clinical').val() == "" && detectCSS('#step-2', 'display', 'block')) {
                $('#next-btn2').attr('disabled', true);
                console.log('step-3')
            }
        });

        function detectCSS(attr, css, value) {
            let result = $(attr).css(css) === value ? true : false;
            return result;
        }
    </script>
    <script>
        $("#filter-cita").on("change", function() {
            var data = document.getElementById("filter-cita").value;
            if (data == '1') {
                $("#busqueda").css("display", "block");
                $("#b-name").css("display", "flex");
                $("#b-date").css("display", "none");
                withsize = window.innerWidth;
                if (withsize < 576) {
                    $("#form-search").css("width", "auto");
                } else {
                    $("#form-search").css("width", "70%");
                }

            }
            if (data == '2') {
                $("#busqueda").css("display", "block");
                $("#b-date").css("display", "flex");
                $("#b-name").css("display", "none");
                $("#form-search").css("width", "auto");

            }
            if (data == '3') {
                $("#busqueda").css("display", "none");
                search(3);
            }
        });

        function search(codbtn) {
            var numbtn = codbtn;
            var filter = document.getElementById("filter-cita").value;
            if (filter != 1 && filter != 2 && filter != 3) {
                Swal.fire("Atención!", "Operación inválida", "warning");
                return;
            }
            if (numbtn == 1 || numbtn == 2 || numbtn == 3) {
                if (numbtn == 1) {
                    var sendsearch = $("#user-search1").children("option:selected").val();
                    var sendfilter = numbtn;
                }
                if (numbtn == 2) {
                    var sendsearch = document.getElementById("date").value;
                    var sendfilter = numbtn;
                }
                if (numbtn == 3) {
                    var sendsearch = '';
                    var sendfilter = '3';
                }
            } else {
                Swal.fire("Atención!", "Operación inválida", "warning");
            }

            var data = new FormData();
            data.append("search", sendsearch);
            data.append("filter", sendfilter);

            $.ajax({
                beforeSend: function() {
                    $("#spsearch").append('<span id="spinner-src-' + numbtn + '" class="fa fa-spinner fa-spin" style="width: 14px; height: 14px; margin: 12px 12px;"></span>');
                    $("#btnsrc" + numbtn).attr("disabled", true);
                },
                url: "<?= FOLDER_PATH ?>/consultation/search",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    $("#spinner-src-" + numbtn).remove();
                    $("#btnsrc" + numbtn).attr("disabled", false);
                    $("#list_citas").html(resp);
                }
            })
        }
    </script>
    <script>
        $('#user-search1').selectize({
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            options: [],
            create: false,
            render: {
                option: function(item) {
                    return '<div><span class="item_name">' + item.name + '</span></div>';
                }
            },
            load: function(query, callback) {
                if (!query.length) return callback();
                $.ajax({
                    url: "<?php echo FOLDER_PATH ?>/consultation/load_users",
                    type: 'POST',
                    data: {
                        nom_user: query
                    },
                    error: function() {
                        callback();
                    },
                    success: function(res) {
                        var as = JSON.parse(res);
                        callback(as.users);
                    }
                });
            }
        });
    </script>
    <script>
        $("#add-apptmt").click(function() {

            var row = "";
            var filter = document.getElementById("filter-cita").value;

            g_edad = $("#fechana").val();

            var hora = $("#endTime").val();

            if (count_insert_cita > 0) {
                Swal.fire("Atención!", "Usted ya no puede agregar mas citas", "warning");
                return;
            }

            Swal.fire({
                title: "Agregar cita",
                html: "<span>¿Desea agregar la cita de las " + getTimeAMPMFormat(hora) + "?<br>Al agregar ya no podrá volver a agregar otra cita.</span>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.isConfirmed == false) {
                    return;
                } else {
                    if (hora == "") {
                        Swal.fire("Atención!", "Operación inválida", "warning");
                        return;
                    }
                    if ($("#nombre").val().toUpperCase() == "" || $("#apellidopa").val().toUpperCase() == "" || $("#apellidoma").val().toUpperCase() == "") {
                        Swal.fire("Atención!", "Operación inválida", "warning");
                        return;
                    }
                    if (g_edad == "") {
                        Swal.fire("Atención!", "Operación inválida", "warning");
                        return;
                    }

                    if (filter != 1 && filter != 2 && filter != 3) {
                        Swal.fire("Atención!", "Operación inválida", "warning");
                        return;
                    }

                    g_paciente = $("#nombre").val().toUpperCase() + ' ' + $("#apellidopa").val().toUpperCase() + ' ' + $("#apellidoma").val().toUpperCase();
                    g_edad = calcularEdad($("#fechana").val());

                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();

                    datenow = dd + '/' + mm + '/' + yyyy;

                    if (filter == 1 || filter == 3) {
                        row = '<tr>' +
                            '<td>' + g_paciente + '</td>' +
                            '<td class="text-center">' + g_edad + '</td>' +
                            '<td class="text-center">' + datenow + '</td>' +
                            '<td class="text-center">' + getTimeAMPMFormat(hora) + '</td>' +
                            '<td class="text-center" style="color: #B90000;">En espera</td></tr>';
                    }
                    if (filter == 2) {
                        row = '<tr>' +
                            '<td>' + g_paciente + '</td>' +
                            '<td class="text-center">' + g_edad + '</td>' +
                            '<td class="text-center">' + getTimeAMPMFormat(hora) + '</td>' +
                            '<td class="text-center" style="color: #B90000;">En espera</td></tr>';
                    }

                    var rowCount = $('#list_citas tbody tr').length;

                    if (rowCount == 0) {
                        $("#list_citas tbody").html(row);
                    } else {
                        $("#list_citas tbody tr:first").before(row);
                    }

                    count_insert_cita = 1;

                    insertar_cita();
                }
            });
        });

        const getTimeAMPMFormat = (hora) => {
            let time = hora.split(":");
            const ampm = time[0] >= 12 ? 'PM' : 'AM';
            hours = time[0] % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            hours = hours < 10 ? '0' + hours : hours; // appending zero in the start if hours less than 10
            minutes = time[1];
            return hours + ':' + minutes + ' ' + ampm;
        };
    </script>

    <script>
        function insertar_cita() {
            var filter = $("#filter-cita").children("option:selected").val();
            if (filter != "2") {
                swal("Atención!", "Operaición inválida.", "warning");
                return;
            }
            var datecita = $("#date").val();
            var timecita = $("#endTime").val();
            var dnipaciente = $("#dni").val();
            if (dnipaciente == "" || dnipaciente == null) {
                swal("Atención!", "Operación invalida.", "warning");
                return;
            }

            var data = new FormData();
            data.append("datecita", datecita);
            data.append("timecita", timecita);
            data.append("dnipaciente", dnipaciente);

            $.ajax({
                beforeSend: function() {
                    $("#add-apptmt").html('');
                    $("#add-apptmt").append('Agregando &ThinSpace;&ThinSpace;<span id="spinner-sa" class="fa fa-spinner fa-spin"></span>');
                    $("#add-apptmt").attr("disabled", true);
                },
                url: "<?= FOLDER_PATH ?>/consultation/save_appointment",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    $("#close-cita").trigger('click');
                    $("#add-apptmt").html('Agregar');
                    $("#add-apptmt").attr("disabled", false);

                    $("#endTime").val("");
                }
            })
        };
    </script>

    <script>
        function GetDetailsCon(e) {
            var data_app = document.getElementById('details_' + e);
            var meta_data = data_app.getAttribute('meta-data');

            var data = new FormData();
            data.append("meta_data", meta_data);
            $.ajax({
                beforeSend: function() {
                    $("#data-details").css("display", "none");
                    $("#data-loading").css("display", "block");
                    /* $("#data-details").html(''); */
                },
                url: "<?= FOLDER_PATH ?>/consultation/show_details",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    var obj_details = JSON.parse(resp);
                    var link = obj_details[1];
                    var genero = '';
                    var estado = '';
                    obj_details = obj_details[0];


                    if (obj_details[3] == 'M') {
                        genero = 'Masculino';
                    }
                    if (obj_details[3] == 'F') {
                        genero = 'Femenino';
                    }
                    if (obj_details[3] == 'O') {
                        genero = 'Otros';
                    }
                    if (obj_details[16] == '0') {
                        estado = 'Pendiente';
                    }
                    if (obj_details[16] == '1') {
                        estado = 'Atendido';
                    }
                    if (obj_details[16] == '2') {
                        estado = 'Anulado';
                    }

                    $("#det_nom").html(obj_details[1]);
                    $("#det_dni").html(obj_details[2]);
                    $("#det_gen").html(genero);
                    $("#det_cel").html(obj_details[4]);
                    $("#det_edad").html(calcularEdad(obj_details[8]));
                    $("#det_fn").html(obj_details[5]);
                    $("#det_email").html(isNullorEmpty(obj_details[6]));

                    $("#det_fcon").html(obj_details[9]);
                    $("#det_diag").html(obj_details[10]);
                    $("#det_anam").html(obj_details[12]);
                    $("#det_exfi").html(obj_details[11]);
                    $("#det_exams").html(obj_details[13]);

                    $("#det_fc").html(isNullorEmpty(obj_details[15]));
                    if (isNullorEmpty(obj_details[16]) != "No definido") {
                        $("#det_est").html(estado);
                    } else {
                        $("#det_est").html("No definido");
                    }

                    if (isNullorEmpty(obj_details[18]) != "No definido") {
                        $("#det_cost").html("S/. " + isNullorEmpty(obj_details[18]));
                    } else {
                        $("#det_cost").html("No definido");
                    }

                    $("#lnk").attr("href", link);

                    $("#data-loading").css("display", "none");
                    $("#data-details").css("display", "block");

                    /* $("#data-details").html(resp); */
                }
            })
        }

        function calcularEdad(fechana) {
            console.log(fechana);
            let dateParts = fechana.split("-");
            let hoy = new Date();
            let cumpleanos = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0, 2));
            let edad = hoy.getFullYear() - cumpleanos.getFullYear();
            let m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            edad = edad.toString() + " años";
            return edad;
        }

        function isNullorEmpty(e) {
            if (e == '' || e == null) {
                return "No definido";
            } else {
                return e;
            }
        }
    </script>
    <script>
        $('#close-alert7').click(function() {
            $("#top-header").css("margin-top", "");
            $("#body-main").css("padding-top", "");
            var active = '0';
            setCookie('alert_active7', active, 7);
        });
        $('#close-alert4').click(function() {
            $("#top-header").css("margin-top", "");
            $("#body-main").css("padding-top", "");
            var active = '0';
            setCookie('alert_active4', active, 7);
        });
        $('#close-alert2').click(function() {
            $("#top-header").css("margin-top", "");
            $("#body-main").css("padding-top", "");
        });

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Max-Age=-99999999;';
        }
    </script>
</body>

</html>