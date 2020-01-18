<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidaLogin {

    // public function TimerExpired () {
    //     $CI =& get_instance();

    //     $idUsuario = null;
        
    //     if (isset($this->session->userdata('idUsuario'))) {

    //         if ($this->session->userdata('timer') <= time()) {

    //             session_unset();

    //             foreach($_SESSION as $key => $value) {
    //                 unset($_SESSION[$key]);
    //             }
        
    //             echo "<script> alert('Sua sessão expirou, logue novamente!') </script>";
    //             echo "<script>location.href=('index.php')</script>";
    //         } else {
    //                 $this->session->userdata('timer') = time() + (60 * 20); //1 minuto
    //         }
    //     } else {
    //         echo "<script> alert('Você não está logado! Acesso Negado!') </script>";
    //         echo "<script>location.href=('index.php')</script>";
    //     }
    // }
}