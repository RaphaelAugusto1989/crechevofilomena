<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>" rel="stylesheet">

    <title><?= $titulo; ?></title>
</head>
<body style="background-image: none; overflow-x: hidden;">
    <div class="row bg-primary"> <!--INICIO MENU SISTEMA-->
        <div class="container">
            <nav class="menu_sis">
                <ul class="menu_sis">
                    <li><a href="<?= site_url('verBanners');?>"><i class="fas fa-chart-area"></i> Banner</a></li>
                    <li><a href="<?= site_url('verQuemSomos');?>"><i class="fas fa-home"></i> Creche</a></li>
                    <li><a href="<?= site_url('verGaleria');?>"><i class="far fa-image"></i> Galeria</a></li>
                    <li><a href="<?= site_url('verNoticias');?>"><i class="far fa-newspaper"></i> Notícias</a></li>
                    <li><a href="<?= site_url('VerContatos');?>"><i class="far fa-envelope"></i> Contatos</a></li>
                    <li><a href="<?= site_url('verUsuarios');?>"><i class="fas fa-user-friends"></i> Usuários</a></li>
                    <li class="float-right"><a href="#" ><?php $nome = explode(' ', $this->session->userdata('nome')); echo $nome[0]; ?></a>
                        <ul class="bg-primary">
                            <li><a href="<?= site_url('MeusDados');?>"><i class="fas fa-user-cog"></i> Meu Dados</a></li>
                            <li><a href="<?= site_url('Logout');?>"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div><!--FIM MENU SISTEMA-->
    <div class="container p-3"><!--INICIO DIV CONTAINER-->