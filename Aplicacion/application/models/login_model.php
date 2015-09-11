<?php

class Login_model extends CI_Model {

    public function validarUsuario($user, $pw) {
        $pw_sha1 = sha1($pw);
        $this->db->where('user', $user);
        $this->db->where('pw', $pw_sha1);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    
    public function comprobarUsuario($usern){
        $this->db->where('user', $usern);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function crearUsuario($data) {
        $pwn_sha1 = sha1($data['pwn']);
        if ($this->session->userdata("nivel") == 1) {
            switch ($data['niveln']) {
                case 'ADMINISTRADOR':
                    $this->db->insert('usuarios', array(
                        'user' => $data['usern'],
                        'pw' => $pwn_sha1,
                        'nivel_mod' => '1'));break;
                case 'USUARIO':
                    $this->db->insert('usuarios', array(
                        'user' => $data['usern'],
                        'pw' => $pwn_sha1,
                        'nivel_mod' => '2'));break;
            }
        } else {
            $this->db->insert('usuarios', array(
                'user' => $data['usern'],
                'pw' => $pwn_sha1,
                'nivel_mod' => '2'));
        }
    }
    /*public function validarUsuarioAJAX($user, $pw) {
        $pw_sha1 = sha1($pw);
        $this->db->where('user', $user);
        $this->db->where('pw', $pw_sha1);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }*/
}
