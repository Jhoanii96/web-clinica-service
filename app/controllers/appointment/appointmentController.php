<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/appointment/appointmentModel.php";
require ROOT . FOLDER_PATH . "/app/models/my/myModel.php";

class appointment extends Controller
{
  protected $session;
  protected $model;
  protected $my;

  public function __construct()
  {
    $this->session = new Session;
    $this->session->getAll();

    if (empty($this->session->get('admin'))) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }

    $this->model = new appointmentModel();
    $this->my = new myModel();
  }

  public function index()
  {
    $datos_cita = $this->model->mostrar_citas($this->session->get('admin'));
    $enabled = $this->model->fecha_habilitado($this->session->get('admin')); 
    $this->view('appointment/appointment', [
      'datos_cita' => $datos_cita, 
      'Enabled' => $enabled 
    ]);
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

  public function load_users_new_cita()
	{
		$this->mostrar_users = $this->model->mostrar_paciente($_POST["nom_user"], $this->session->get('admin'));

		$datos = '';
		$DatosDep_array = [];
		while ($mostrar_users = $this->mostrar_users->fetch()) {
			$DatosDep_array[] = array(
				"id" => $mostrar_users[0],
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

    $count = 0;

    if ($filter == 1 || $filter == 3) {
      echo '
    
      <thead>
          <tr>
              <th>Paciente</th>
              <th>Edad</th>
              <th>Fecha atención</th>
              <th>Hora atención</th>
              <th>Estado</th>
              <th>Detalles</th>
              <th>Editar</th>
              <th>Eliminar</th>
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
              <th>Detalles</th>
              <th>Editar</th>
              <th>Eliminar</th>
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
        $estado = "Atender";
        $css = "#000eb9";
      }
      if ($datos_lista_cita['estado'] == 1) {
        $estado = "Atendido";
        $css = "#008c44";
        /* <td class="text-center" style="color: ' . $css . ';">' . $estado . '</td> */
      }

      $nombre = $datos_lista_cita['nombre'] . ' ' . $datos_lista_cita['apepa'] . ' ' . $datos_lista_cita['apema'] . '|' . $datos_lista_cita['id_paciente'] . '|' . $datos_lista_cita['id'];
      $nombre = base64_encode(utf8_encode($nombre));

      $count += 1;

      echo '
      
      <tr>
          <td>' . $datos_lista_cita['nombre'] . ' ' . $datos_lista_cita['apepa'] . ' ' . $datos_lista_cita['apema'] . '</td>
          <td class="text-center">' . $age . ' años</td>
          ';
          if ($filter == 1 || $filter == 3) {
            echo '<td class="text-center">' . date("d/m/Y", strtotime($datos_lista_cita['fechacita'])) . '</td>';
          }
          echo'
          <td class="text-center">' . date("h:i A", strtotime($datos_lista_cita['fechacita'])) . '</td>
          ';
          if ($datos_lista_cita['estado'] == 0) {
            echo '<td class="text-center">
                <a href="' . FOLDER_PATH . '/consultation?cod_name=' . $nombre . '" target="_blank" style="background-color: #00e6dc; color: ' . $css . '; white-space: nowrap; padding: 0px 4px;">
                  ' . $estado . '
                </a>    
              </td>';
          }
          if ($datos_lista_cita['estado'] == 1) {
            echo '<td class="text-center" style="color: ' . $css . ';">' . $estado . '</td>';
          }
          echo'
          <td class="text-center">
              <div role="group" class="btn-group-sm btn-group">
                  <button id="details_' . $count . '" onclick="GetDetails(' . $count . ')" meta-data="{' . base64_encode(utf8_encode("[" . $count . "]|" . $datos_lista_cita['id'] . "-data-appointment-details")) . '}" data-toggle="modal" data-target="#AppDetails"  class="btn btn-primary text-white">Detalles <i class="fa fa-eye"></i></button>
              </div>
          </td>
          <td class="text-center">
              <div role="group" class="btn-group-sm btn-group">
                  <button class="btn btn-warning text-white">Editar <i class="fa fa-edit"></i></button>
              </div>
          </td>
          <td class="text-center">
              <div role="group" class="btn-group-sm btn-group">
                  <button class="btn btn-danger">Eliminar <i class="fa fa-trash"></i></button>
              </div>
          </td>
      </tr>
      
      ';
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
              <th>Detalles</th>
              <th>Editar</th>
              <th>Eliminar</th>
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
              <th>Detalles</th>
              <th>Editar</th>
              <th>Eliminar</th>
          </tr>
      </tfoot>
      
      ';
    }

    
  }

  public function save(){
    
    $usersearch = $_POST["usersearch"];
    $datecita = $_POST["datecita"];
    $timecita = $_POST["timecita"];

    $timecita = $timecita . ':00';

    $this->model->insertar_cita($usersearch, $datecita, $timecita, $this->session->get('admin'));

  }

  public function save_paciente()
  {
    $dni = $_POST['dni'];
    $nombre = mb_strtoupper($_POST['nombre'], 'UTF-8');
    $apellidopa = mb_strtoupper($_POST['apellidopa'], 'UTF-8');
    $apellidoma = mb_strtoupper($_POST['apellidoma'], 'UTF-8');
    $genero = $_POST['genero'];
    $celular = $_POST['celular'];
    $fechana = $_POST['fechana'];
    $correo = $_POST['correo'];
    $procedencia = mb_strtoupper($_POST['procedencia'], 'UTF-8');
    $username = $this->session->get('admin');

    $this->model->insertar_paciente_cita(
      $dni, 
      $nombre, 
      $apellidopa, 
      $apellidoma, 
      $genero, 
      $celular,
      $fechana, 
      $correo, 
      $procedencia, 
      $username 
    );

  }

  public function show_details()
  {
    $appointment = $_POST['meta_data'];
    $appointment = str_replace('{', '', $appointment);
    $appointment = str_replace('}', '', $appointment);

    $appointment = utf8_decode(base64_decode($appointment));
    $appointment = str_replace('-data-appointment-details', '', $appointment);

    $cod_cita = explode("|", $appointment);

    $json = array();
    $lista_citas = $this->model->obtener_details($cod_cita[1], $this->session->get('admin'));
    
    while ($details = $lista_citas->fetch()) {
      $json[] = $details;
    }

    echo(json_encode($json));
  }

  /** Para las notificaciones */
  public function notifications(){
    $idUser = $this->session->get('idUser');
    $notifications = $this->my->notifications($idUser);
    $cantNotifications = $notifications->rowCount();
    if($cantNotifications > 0){
        $resultNotifications = $notifications->fetchAll(PDO::FETCH_ASSOC);
        $resp = json_encode($resultNotifications);
    }else{
        $resp = ['no hay resultados'];
        $resp = json_encode($resp);
    }
    print_r($resp);
  }
}
