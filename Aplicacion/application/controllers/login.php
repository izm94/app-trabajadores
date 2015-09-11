<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Login_model");
        $this->session;
    }

    public function index() {
        if (!$this->session->userdata("logged_in")) {
            $this->load->view("logeo/signin");
        } else {
            redirect(site_url('/Principal/'));
        }
    }

   function opeuser(){
        if($_POST['ope']=='login'){
            //echo "logeo";
            $user = $this->input->post("user");
            $pw = $this->input->post("pw");
            //echo $user.''.$pw;
            $usuario = $this->Login_model->validarUsuario($user, $pw);
            //echo $usuario;
            if (!is_array($usuario)) {
                echo 'N';
            } else if(is_array($usuario)){
                $this->session->set_userdata('nivel', $usuario[0]['nivel_mod']);
                $this->session->set_userdata("logged_in", true);
                $this->session->set_userdata('usuario', $user);
                //redirect(site_url('/principal/'));
                echo "S";
            }
        }
   }
    public function signin() {
        if ($_POST) {
            $user = $this->input->post("user");
            $pw = $this->input->post("pw");
            $this->session->set_userdata('usuario', $user);
            //print_r($user);exit;
            $usuario = $this->Login_model->validarUsuario($user, $pw);
            $this->session->set_userdata('nivel', $usuario[0]['nivel_mod']);
            if (is_array($usuario)) {
                $this->session->set_userdata("logged_in", true);
                redirect(site_url('/Principal'));
            } else {
                echo "Usuario o contraseña incorrecta";
            }
        }
    }

    public function signout() {
        if ($this->session->userdata("logged_in")) {
            $this->session->sess_destroy();
            echo "<p align='center'>Ha cerrado su sesión!</p>";
            $this->load->view("logeo/signin");
        } else {
            redirect(site_url('/Principal'));
        }
    }

    public function registro() {
        if (!$this->session->userdata("logged_in")) {
            $this->load->view('logeo/signup');
        } else {
            die('Error en la aplicacion.');
        }
    }

    public function signup() {
        if ($this->session->userdata("nivel") == 1) {
            $data = array('usern' => $this->input->post('usern'), 'pwn' => $this->input->post('pwn'), 'niveln' => $this->input->post('nivel'));
            $existe = $this->Login_model->comprobarUsuario($data['usern']);
            if ($existe == true) {
                echo "El nombre de usuario ya existe. Por favor, intente con otro nombre de usuario.";
            } else if ($existe == false) {
                $this->Login_model->crearUsuario($data);
                echo "Se ha creado una cuenta con privilegios de " . $data['niveln'] . '.';
                ?> <a href='<?php echo site_url('/Principal/') ?>'>Volver</a>
            
         <?php
            }
        } else if (!$this->session->userdata("logged_in") || $this->session->userdata("nivel") == 2) {
            $data = array('usern' => $this->input->post('usern'), 'pwn' => $this->input->post('pwn'));
            $existe = $this->Login_model->comprobarUsuario($data['usern']);
            if ($existe == true) {
                echo "El nombre de usuario ya existe. Por favor, intente con otro nombre de usuario.";
            } else if ($existe == false) {
                $this->Login_model->crearUsuario($data);
                echo "Se ha creado una cuenta con privilegios de USUARIO";
                ?> <a href='<?php echo site_url('/Principal/mostrar') ?>'>Volver</a>
            
         <?php
            }
        }
    }
}
