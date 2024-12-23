<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/login/loginModel.php";

class login extends Controller
{
	protected $session;

	public function __construct()
	{
		$this->session = new Session;
		$this->session->getAll();

		if (!empty($this->session->get('admin'))) {
			echo ("<script>location.href = '" . FOLDER_PATH . "/my';</script>");
		}
		
		$this->model = new loginModel();
	}

	public function index()
	{
		$this->view('login/login');
	}

	public function signin()
	{
		$id = $_POST['users'];
		$pass = $_POST['password'];

		explode(" ", $id);
		explode(" ", $pass);

		$param[0] = $id;
		$param[1] = $pass;

		if (!$this->VerificarParametros($param)) {
			$this->renderErrorMessage('*El usuario y la contraseña son obligatorios');
		} else {
			@$parametro = $this->model->load_user($param[0]);
			$identi = $parametro->fetch();

			if ($param[0] != $identi[0]) {
				$this->renderErrorMessage('*El usuario no existe');
			} else {
				// if($param['password'] != $parametro['clave_organizador']){
				if ($param[1] != $identi[1]) {
					$this->renderErrorMessage('*La contraseña es incorrecta');
				} else {
					if (($identi[2]  . ' 23:59:59') <= date('Y-m-d H:i:s')) {
						$this->session->add('admin', $param[0]);
						echo ("<script>location.href = '" . FOLDER_PATH . "/expired';</script>");
					} else {
						$this->session->add('admin', $param[0]);
						echo ("<script>location.href = '" . FOLDER_PATH . "/my';</script>");
					}
					// if (!empty($_POST["chkb"])) {
					// 	setcookie("member_login", $id, time() + (10 * 365 * 24 * 60 * 60));
					// 	setcookie("member_password", $pass, time() + (10 * 365 * 24 * 60 * 60));
					// } else {
					// 	if (isset($_COOKIE["member_login"])) {
					// 		setcookie("member_login", "");
					// 	}
					// 	if (isset($_COOKIE["member_password"])) {
					// 		setcookie("member_password", "");
					// 	}
					// }
				}
			}
		}
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
	/*
        public function index()
        {
            $this->view('login/login');
        }
        */
}
