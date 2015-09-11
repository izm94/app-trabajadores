<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function obtenerId($apellidop, $apellidom, $nombre, $edad, $ocupacion) {
        $this->db->where('Apellido_Paterno', $apellidop);
        $this->db->where('Apellido_Materno', $apellidom);
        $this->db->where('Nombre', $nombre);
        $this->db->where('Edad', $edad);
        $this->db->where('Ocupación', $ocupacion);
        $query = $this->db->get('trabajadores');
        return $query;
    }

    function crearTrabajador($data) {
        $this->db->insert('trabajadores', array('Apellido_Paterno' => $data['apellidop'],
            'Apellido_Materno' => $data['apellidom'],
            'Nombre' => $data['nombre'],
            'Edad' => $data['edad'],
            'Ocupación' => $data['ocupacion'])
        );
    }

    function obtenerTrabajadores() {
        $query = $this->db->get('trabajadores');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function obtenerUsers() {
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function obtenerTrabajador($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('trabajadores');
        if ($query->num_rows() > 0) {
            //print_r($query);exit;
            return $query;
        } else {
            return false;
        }
    }

    function actualizarTrabajador($id, $data) {

        $datos = array(
            'Apellido_Paterno' => $data['apellidop'],
            'Apellido_Materno' => $data['apellidom'],
            'Nombre' => $data['nombre'],
            'Edad' => $data['edad'],
            'Ocupación' => $data['ocupacion']
        );
        $this->db->where('id', $id);
        $this->db->update('trabajadores', $datos);
    }

    function eliminarTrabajador($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('trabajadores');
        if ($query->num_rows() > 0) {
            $this->db->delete('trabajadores', array('id' => $id));
            return true;
        } else {
            return false;
        }
    }

}
