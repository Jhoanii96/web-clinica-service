<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/patient/patientModel.php";
require ROOT . FOLDER_PATH . "/app/models/questionnaire/questionnaireModel.php";
require ROOT . FOLDER_PATH . "/app/models/consultation/consultationModel.php";
require ROOT . FOLDER_PATH . "/app/models/settings/settingsModel.php";


class consultation extends Controller
{
    protected $session;
    protected $patientModel;
    protected $questionModel;
    protected $settingsModel;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll();

        if (!empty($this->session->get('userAdmin')) || $this->session->get('userAdmin') != "" || $this->session->get('userAdmin') != NULL) {
            echo ("<script>location.href = '" . FOLDER_PATH . "/my';</script>");
        }
        $this->patientModel = new patientModel();
        $this->questionModel = new questionnaireModel();
        $this->model = new consultationModel();
        $this->settingsModel = new settingsModel();
    }

    public function index()
    {

        if (isset($_GET['cod_name'])) {
            $nombre_usuario = utf8_decode(base64_decode($_GET['cod_name']));
            $id_nombre = explode('|', $nombre_usuario); /* $id_nombre[2]: id cita */
        } else {
            $id_nombre = [];
            $id_nombre[0] = 'nothing';
        }

        $this->view('consultation/consultation', [
            'nombre_usuario' => $id_nombre
        ]);
    }

    public function salir()
    {
        $this->session->close();
        echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }

    public function VerificarParametros($param)
    {
        if (empty($param[0]) or empty($param[1])) {
            return false;
        } else {
            return true;
        }
    }

    private function renderErrorMessage($message)
    {
        $this->view('login/login', ['error_message' => $message]);
    }

    public function insertPatient()
    {
        $idUser = $this->session->get('idUser');
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellidoPa = $_POST['apellidopa'];
        $apellidoMa = $_POST['apellidoma'];
        $fechana = $_POST['fechana'];
        $fechana = strtotime($fechana);
        $fechana = date('y-m-d', $fechana);
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];
        $procedencia = $_POST['procedencia'];
        $ocupan = $_POST['ocupacionan'];
        $ocupaac = $_POST['ocupacionac'];
        $genero = $_POST['genero'];

        $patient = $this->patientModel->insertPatient($idUser, $dni, $nombre, $apellidoPa, $apellidoMa, $genero, $fechana, $celular, $correo, $procedencia, $ocupan, $ocupaac);

        if ($patient->rowCount() > 0) {
            // print_r(['Se insertó correctamente']);
            $idPatient = $this->patientModel->getIDPatient();
            $result = $idPatient->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $this->session->add('idPaciente', $result['Id_Paciente']);
                $patientArray = json_encode($result);
            } else {
                $patientArray = json_encode(['no se obtuvo paciente']);
            }
            print_r($patientArray);
        } else {
            print_r(json_encode(["Este paciente ya existe"]));
        }
    }

    public function getQuestionnaire()
    {
        $idUser = $this->session->get('idUser');
        $questions = $this->questionModel->getQuestionnaire($idUser);
        return $questions->fetchAll();
    }

    public function getPatient()
    {
        $idPaciente = $this->session->get('idPaciente');

        $patient = $this->patientModel->getPatient($idPaciente);

        return $patient->fetch();
    }

    public function updatePatient()
    {
        $idPaciente = $this->session->get('idPaciente');
        $idUser = $this->session->get('idUser');
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellidoPa = $_POST['apellidopa'];
        $apellidoMa = $_POST['apellidoma'];
        $fechana = $_POST['fechana'];
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];
        $procedencia = $_POST['procedencia'];
        $ocupan = $_POST['ocupacionan'];
        $ocupaac = $_POST['ocupacionac'];
        $genero = $_POST['genero'];
        $resultPatient = $this->patientModel->updatePatient($idUser, $idPaciente, $dni, $nombre, $apellidoPa, $apellidoMa, $genero, $fechana, $celular, $correo, $procedencia, $ocupan, $ocupaac);
        $contPatient = $resultPatient->rowCount();
        if ($contPatient > 0) {
            echo "Se actualizó el paciente";
        } else {
            echo "No se actualizó el paciente";
        }
    }

    public function searchPatient()
    {
        $documento = $_POST['filter'];
        $namePaciente = $_POST['namePaciente'];

        if (is_string($namePaciente[0]) && strlen($namePaciente[0]) > 1) {
            $searchPatient = $this->patientModel->searchDocumentPatient($namePaciente, false);
        }
        if (strlen($documento) <= 8 && is_numeric($documento)) {
            $searchPatient = $this->patientModel->searchDocumentPatient($documento, true);
        }

        $result = $searchPatient->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->session->add('idPaciente', $result['Id_Paciente']);
            $idPaciente = $this->session->get('idPaciente');
            $idUser = $this->session->get("idUser");
            $idQuestionnaire = $this->questionModel->getIdQuestionnaire($idUser)->fetch(PDO::FETCH_ASSOC);
            $answers = $this->questionModel->getAnswers($idPaciente,$idQuestionnaire['Id_Cuestionario']);
            $cantidad = $answers->rowCount();
            if ($cantidad > 0) {
                $answers = $answers->fetchAll(PDO::FETCH_ASSOC);
                array_push($result, $cantidad);
                $result = array_merge($result, $answers);
            }
            $arrayJSON =  json_encode($result);
        } else {
            $error = ['No se pudo encontrar ese paciente'];
            $arrayJSON =  json_encode($error);
        }
        print_r($arrayJSON);
    }

    public function showPatients()
    {
        if (isset($_GET['q'])) {
            $busqueda = $_GET['q'];
        } else {
            $busqueda = '';
        }
        $patient = $this->patientModel->getAllPatient($busqueda);
        $json = [];
        while ($result = $patient->fetch(PDO::FETCH_ASSOC)) {
            $json[] = ['id' => $result['id'], 'text' => $result['nombres']];
        }

        $arrayJSON = json_encode($json);
        echo $arrayJSON;
    }


    public function insertAnswers()
    {
        if (isset($_POST['answers']) && $_POST['answers'] !== "") {
            $detalle = $_POST['detalle'];
            $respuestas = $_POST['answers'];

            $idPaciente = $this->session->get('idPaciente');
            $ResultAnswers = $this->questionModel->insertAnswers($detalle, $idPaciente, $respuestas);
            if ($ResultAnswers->rowCount() > 0) {
                echo "Respuestas agregadas con exito";
            } else {
                echo "No se agregaron las respuestas";
            }
        } else {
            echo "Llene los campos";
        }
    }

    public function updateAnswers()
    {
        if (isset($_POST['answers']) && $_POST['answers'] !== "") {
            $detalle = $_POST['detalle'];
            $respuestas = $_POST['answers']; 
            $arrayDetalle = $detalle;
            $arrayRespuesta = $respuestas;
            $idUser = $this->session->get("idUser");
            $idPaciente = $this->session->get('idPaciente');
            $idQuestionnaire = $this->questionModel->getIdQuestionnaire($idUser)->fetch(PDO::FETCH_ASSOC);
            $getAnswers = $this->questionModel->getAnswers($idPaciente,$idQuestionnaire['Id_Cuestionario']);
            $getAnswers = $getAnswers->rowCount();
            $resultInsertAnswer = 0;
            if($getAnswers < count($respuestas)){
                $count = count($respuestas) - $getAnswers;
                $cant = count($respuestas) - $count;
                $insertDetalle = array_splice($arrayDetalle,$cant,$count);
                $insertAnswer = array_splice($arrayRespuesta,$cant,$count);              
                $resultInsertAnswer = $this->questionModel->insertAnswers($insertDetalle,$idPaciente,$insertAnswer);
                $resultInsertAnswer = $resultInsertAnswer->rowCount();
            }
            $updateAnswers = $this->questionModel->updateAnswers($detalle, $idPaciente, $respuestas);
                if ($updateAnswers > 0 || $resultInsertAnswer > 0) {
                    echo "Sus respuestas fueron actualizadas";
                } else {
                    echo "No se actualizaron las respuestas";
                }
        } else {
            echo "Llene los campos";
        }
    }

    public function getHistoryPred()
    {
        $idUser = $this->session->get("idUser");

        $resultHistory = $this->settingsModel->getHistoryPred($idUser);
        $result = $resultHistory->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertClinicalTest(){
        $idUser = $this->session->get("idUser");
        $idPaciente = $this->session->get('idPaciente');
        $anamnesis_clinical = $_POST['anamnesis-clinical'];
        $examen_clinical = $_POST['examen-clinical'];
        $examenes_clinical = $_POST['examenes-clinical'];
        $diagnostico_clinical = $_POST['diagnostico-clinical'];
        $tratamiento_clinical = $_POST['tratamiento-clinical'];
        $filter = $_FILES["file"]["tmp_name"][0];
        if ($filter !== "") {
            
            for ($i=0; $i < count($_FILES["file"]["name"]); $i++) { 
                $nameImage[$i] = date("m" . "d" . "y") . date("h" . "i" . "s" . microtime(TRUE)) . "." . basename($_FILES['file']['type'][$i]);
            }

            for ($i=0; $i < count($_FILES["file"]["tmp_name"]); $i++) { 
                $file_tmp[$i] = $_FILES["file"]["tmp_name"][$i];
            }

            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/images/historia_clinica/';
            $imagen_destinoDocument = ROOT . FOLDER_PATH . '/src/Documentos/';
            for ($i=0; $i < count($_FILES["file"]["name"]); $i++) { 
                $imagen_size[$i] = $_FILES["file"]["size"][$i];
                $imagen_type[$i] = $_FILES["file"]["type"][$i];
                if($imagen_type[$i] == 'application/pdf' || $imagen_type[$i] =='application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                    move_uploaded_file($file_tmp[$i], $imagen_destinoDocument . $nameImage[$i]);
                    $imagen_bd[$i] = '/src/Documentos/' . $nameImage[$i];    
                }else if($imagen_type[$i] == 'image/jpeg' || $imagen_type[$i] == 'image/png' || $imagen_type[$i] == 'image/jpg'){
                    move_uploaded_file($file_tmp[$i], $imagen_destino . $nameImage[$i]);
                    $imagen_bd[$i] = 'src/assets/media/images/historia_clinica/' . $nameImage[$i];
                }
            }
            $result = $this->settingsModel->insertClinicalTest($idPaciente,$idUser,$anamnesis_clinical,$examen_clinical,$examenes_clinical,$diagnostico_clinical,$tratamiento_clinical,$imagen_bd,$imagen_size,$imagen_type);
        }else{
            $result = $this->settingsModel->insertClinicalTest($idPaciente,$idUser,$anamnesis_clinical,$examen_clinical,$examenes_clinical,$diagnostico_clinical,$tratamiento_clinical,$imagen_bd = null,$imagen_size = null,$imagen_type = null);
        }

        return $result;
    }

    public function updateClinicalTest(){
        $idUser = $this->session->get("idUser");
        $idPaciente = $this->session->get('idPaciente');
        $anamnesis_clinical = $_POST['anamnesis-clinical'];
        $examen_clinical = $_POST['examen-clinical'];
        $examenes_clinical = $_POST['examenes-clinical'];
        $diagnostico_clinical = $_POST['diagnostico-clinical'];
        $tratamiento_clinical = $_POST['tratamiento-clinical'];
        $lastIDClinicalTest = $this->settingsModel->getIDClinicalTest($idPaciente)->fetch(PDO::FETCH_ASSOC);
        $resultUpdateClinicalTest = $this->settingsModel->updateClinicalTest($lastIDClinicalTest['Id_historia_clinica'],$anamnesis_clinical,$examen_clinical,$examenes_clinical,$diagnostico_clinical,$tratamiento_clinical);
        $resultUpdateClinicalTest = $resultUpdateClinicalTest->rowCount();
        if($resultUpdateClinicalTest > 0){
            echo "Se actualizó la prueba clinica";
        }else{
            echo "No se pudo actualizar la prueba clinica";
        }
    }

    public function citas()
    {
        $fecha = $_POST['fecha'];

        $usu_cod = $this->session->get('admin');
        $ResultAnswers = $this->model->lista_citas_paciente($fecha, $usu_cod);
        echo '
            
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Edad</th>
                <th>Hora atención</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        
        ';
        while ($datos_cita = $ResultAnswers->fetch()) {

            $birthDate = explode("-", $datos_cita['fecha_nac']);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));

            if ($datos_cita['estado'] == 0) {
                $estado = "En espera";
                $css = "#b90000";
            }
            if ($datos_cita['estado'] == 1) {
                $estado = "Atendido";
                $css = "#008c44";
            }

            echo '
            
                <tr>
                    <td>' . $datos_cita['nombre'] . ' ' . $datos_cita['apellidos'] . '</td>
                    <td class="text-center">' . $age . ' años</td>
                    <td class="text-center">' . date("h:i:s A", strtotime($datos_cita['fecha_atencion'])) . '</td>
                    <td class="text-center" style="color: ' . $css . ';">' . $estado . '</td>
                </tr>
            
            ';
        }

        echo '
    
        </tbody>
        <tfoot>
            <tr>
                <th>Paciente</th>
                <th>Edad</th>
                <th>Hora atención</th>
                <th>Estado</th>
            </tr>
        </tfoot>
        
        ';
    }

    public function redirect()
    {
        $this->session->close();
        echo ("<script>location.href = '" . FOLDER_PATH . "/my';</script>");
    }

    public function consultas()
    {
        $paciente = $_POST['paciente'];

        $usu_cod = $this->session->get('admin');
        $ResultAnswers = $this->model->lista_historia_clinica($paciente, $usu_cod);
        while ($datos_consulta = $ResultAnswers->fetch()) {

            $birthDate = explode("-", $datos_consulta['fecha_nacimiento']);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));

            echo '
                <tr>
                    <td>' . $datos_consulta['nombre_paciente'] . '</td>
                    <td>' . $age . '</td>
                    <td>' . date("Y-m-d", strtotime($datos_consulta['fecha_consulta'])) . '</td>
                    <td>' . date("H:i", strtotime($datos_consulta['fecha_consulta'])) . '</td>
                    <td>2</td>
                    <td>2</td>
                    <td class="text-center">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                            <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                            <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            ';
        }
    }

    public function load_users()
    {
        $this->mostrar_users = $this->model->mostrar_paciente($_POST["nom_user"], $this->session->get('admin'));

        $datos = '';
        $DatosDep_array = [];
        while ($mostrar_users = $this->mostrar_users->fetch()) {
            $DatosDep_array[] = array(
                "id" => $mostrar_users[1],
                "name" => $mostrar_users[1]
            );
        }
        $DatosDep = array("users" => ($DatosDep_array));
        $out = json_encode($DatosDep);
        echo $out;
    }


    public function search()
    {
        $search = $_POST['search'];
        $filter = $_POST['filter'];
        $lista_citas = $this->model->buscar_citas($search, $filter, $this->session->get('admin'));

        if ($filter == 1 || $filter == 3) {
            echo '
    
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Edad</th>
                    <th>Fecha atención</th>
                    <th>Hora atención</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            
            ';
        }
        if ($filter == 2) {
            echo '
            
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Edad</th>
                    <th>Hora atención</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            
            ';
        }

        while ($datos_lista_cita = $lista_citas->fetch()) {

            $birthDate = explode("-", $datos_lista_cita['fenac']);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));

            if ($datos_lista_cita['estado'] == 0) {
                $estado = "Por atender";
                $css = "#000075";
            }
            if ($datos_lista_cita['estado'] == 1) {
                $estado = "Atendido";
                $css = "#008c44";
                /* <td class="text-center" style="color: ' . $css . ';">' . $estado . '</td> */
            }

            $nombre = $datos_lista_cita['nombre'] . ' ' . $datos_lista_cita['apepa'] . ' ' . $datos_lista_cita['apema'] . '|' . $datos_lista_cita['id_paciente'];
            $nombre = base64_encode(utf8_encode($nombre));

            echo '
      
            <tr>
                <td>' . $datos_lista_cita['nombre'] . ' ' . $datos_lista_cita['apepa'] . ' ' . $datos_lista_cita['apema'] . '</td>
                <td class="text-center">' . $age . ' años</td>
                ';
            if ($filter == 1 || $filter == 3) {
                echo '<td class="text-center">' . date("d/m/Y", strtotime($datos_lista_cita['fechacita'])) . '</td>';
            }
            echo '
                <td class="text-center">' . date("h:i A", strtotime($datos_lista_cita['fechacita'])) . '</td>
                ';
            if ($datos_lista_cita['estado'] == 0 && (date("Y-m-d H:i:s") >= $datos_lista_cita['fechacita'])) {
                echo '<td class="text-center" style="color: ' . $css . ';">' . $estado . '</td>';
            }
            if ($datos_lista_cita['estado'] == 0 && (date("Y-m-d H:i:s") < $datos_lista_cita['fechacita'])) {
                echo '<td class="text-center" style="color: #000;">' . $estado . '</td>';
            }
            if ($datos_lista_cita['estado'] == 1) {
                echo '<td class="text-center" style="color: ' . $css . ';">' . $estado . '</td>';
            }
        }

        if ($filter == 1 || $filter == 3) {
            echo '
            
            </tbody>
            <tfoot>
                <tr>
                    <th>Paciente</th>
                    <th>Edad</th>
                    <th>Fecha atención</th>
                    <th>Hora atención</th>
                    <th>Estado</th>
                </tr>
            </tfoot>
            
            ';
        }
        if ($filter == 2) {
            echo '
    
            </tbody>
            <tfoot>
                <tr>
                    <th>Paciente</th>
                    <th>Edad</th>
                    <th>Hora atención</th>
                    <th>Estado</th>
                </tr>
            </tfoot>
            
            ';
        }
    }
}
