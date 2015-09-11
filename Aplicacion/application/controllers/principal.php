<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('principal_model');
        $this->load->model('login_model');
    }

    function index() {
        if (!$this->session->userdata("logged_in")) {
            redirect(base_url('/index.php/Login/'));
        } else {
            $this->load->view('main/main');
        }
    }

    function registrousuario() {
        if ($this->session->userdata("logged_in") === true) {
            $this->load->view('logeo/signup');
        } else {
            die('Debe iniciar sesion para realizar esta operacion.');
        }
    }

    function listarusuario() {
        if ($this->session->userdata("logged_in") === true) {
            if ($this->session->userdata("nivel") == 1) {
                $data['usuario'] = $this->principal_model->obtenerUsers();
                $this->load->view('users/users', $data);
            } else {
                die('Debe contar con privilegios de administrador.');
            }
        } else {
            die('Debe iniciar sesion con una cuenta con privilegios de administrador.');
        }
    }

    function mostrar() {
        if ($this->session->userdata("logged_in")) {
            $dato['segmento'] = $this->uri->segment(3);
            if (!$dato['segmento']) {
                $dato['trabajador'] = $this->principal_model->obtenerTrabajadores();
            } else {
                $dato['trabajador'] = $this->principal_model->obtenerTrabajador($dato['segmento']);
            }
            $this->load->view('trabajadores/trabajadores', $dato);
        } else {
            die("Debe iniciar sesion para realizar esta operacion.");
        }
    }

    function nuevo() {
        if ($this->session->userdata("logged_in") === true) {
            if ($this->session->userdata("nivel") == 1) {
                $this->load->view('trabajadores/formulario');
            } else {
                die('Debe tener privilegios de administrador para realizar esta operacion.');
            }
        } else {
            die("Debe iniciar sesion para realizar esta operacion.");
        }
    }

    function recibirdatos() {
        if ($this->session->userdata("nivel") == 1) {
            $data = array(
                'apellidop' => $this->input->post('apellidop'),
                'apellidom' => $this->input->post('apellidom'),
                'nombre' => $this->input->post('nombre'),
                'edad' => $this->input->post('edad'),
                'ocupacion' => $this->input->post('ocupacion')
            );
            if ($data['apellidop'] === '' || $data['apellidop'] === 0) {
                die('Debe completar el campo de apellido paterno.');
            } else if ($data['apellidom'] === '' || $data['apellidom'] === 0) {
                die('Debe completar el campo de apellido materno.');
            } else if ($data['nombre'] === '' || $data['nombre'] === 0) {
                die('Debe completar el campo de nombre.');
            } else if ($data['edad'] === '') {
                die('Debe completar el campo de edad o ingresar un numero valido.');
            } else if ($data['ocupacion'] === '' || $data['ocupacion'] === 0) {
                die('Debe completar el campo de ocupacion.');
            } else {
                $this->principal_model->crearTrabajador($data);
                $id = $this->principal_model->obtenerId($data['apellidop'], $data['apellidom'], $data['nombre'], $data['edad'], $data['ocupacion']);
                foreach ($id->result() as $ide) {
                    echo "Se ingreso un nuevo trabajador con ID " . $ide->id . "<br>";
                }
                ?> <a href='<?php site_url() ?>'>Volver</a>
           <?php }
        } else {
            die('Error en la aplicacion.');
        }
    }

    function editar() {
        if ($this->session->userdata("logged_in")) {
            if ($this->session->userdata("nivel") == 1) {
                $data['id'] = $this->uri->segment(3);
                $data['trabajador'] = $this->principal_model->obtenerTrabajador($data['id']);
                $this->load->view('trabajadores/editar', $data);
            } else {
                die('Debe tener privilegios de administrador para realizar esta operacion.');
            }
        } else {
            die("Debe iniciar sesion para realizar esta operacion.");
        }
    }

    function actualizar() {
        if ($this->session->userdata("nivel") == 1) {
            $data = array(
                'apellidop' => $this->input->post('apellidop'),
                'apellidom' => $this->input->post('apellidom'),
                'nombre' => $this->input->post('nombre'),
                'edad' => $this->input->post('edad'),
                'ocupacion' => $this->input->post('ocupacion')
            );
            if ($data['apellidop'] === '' || $data['apellidop'] === 0) {
                die('Debe completar el campo de apellido paterno.');
            } else if ($data['apellidom'] === '' || $data['apellidom'] === 0) {
                die('Debe completar el campo de apellido materno.');
            } else if ($data['nombre'] === '' || $data['nombre'] === 0) {
                die('Debe completar el campo de nombre.');
            } else if ($data['edad'] === '') {
                die('Debe completar el campo de edad o ingresar un numero valido.');
            } else if ($data['ocupacion'] === '' || $data['ocupacion'] === 0) {
                die('Debe completar el campo de ocupacion.');
            } else {
                $this->principal_model->actualizarTrabajador($this->uri->segment(3), $data);
                echo "Se han actualizado los datos del trabajador.<br>";
                
                ?> <a href='<?php echo site_url('/Principal/mostrar') ?>'>Volver</a>
            
         <?php }
        } else {
            die('Error en la aplicacion.');
        }
    }

    function borrar() {
        if ($this->session->userdata("logged_in")) {
            if ($this->session->userdata("nivel") == 1) {
                $id = $this->uri->segment(3);
                $this->principal_model->eliminarTrabajador($id);

                    echo "Se ha eliminado al trabajador del registro";
                    ?> <a href='<?php echo site_url('/Principal/mostrar') ?>'>Volver</a>
            
         <?php
                
            } else {
                die('Debe tener privilegios de administrador para realizar esta operacion.');
            }
        } else {
            die("Debe iniciar sesion para realizar esta operacion.");
        }
    }

}
