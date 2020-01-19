<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>" type="text/css"v>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>" type="text/css"v>
    <link rel="stylesheet" href="<?= base_url('assets/css/lightbox.css');?>" type="text/css"  />
    
    <title><?= $titulo; ?></title>
</head>
<body>
    <div class="row top"><!--INICIO DIV TOPO-->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ">
                    <i class="fas fa-phone-alt align-middle"></i> (61) 3386-2341 / 3022-0008
                </div>
                <div class="col-lg-4 text-right">
                    <a href="https://www.facebook.com/CrecheVoFilomenaNucleoBandeirante/?ref=br_rs" target="_blank" class="text-white top-social" title="Facebook"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.instagram.com/explore/locations/1015808779/creche-vo-filomena-nucleo-bandeirante/?hl=pt-br" target="_blank" class="text-white top-social" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>  
        </div>
    </div> <!--FIM DIV TOPO-->

    <div class="row header sticky-top shadow bg-white"><!--INICIO DIV CABEÇALHO-->
        <div class="container">
            <div class="row">
                <div id="menu" class="col-lg-12"><!--INICIO MENU-->
                <img src="<?= base_url('assets/img/logo_creche.png');?>" alt="" class="img-fluid logo">
                    <input type="checkbox" id="bt_menu">
                        <label for="bt_menu">&#9776;</label>
                    
                    <nav class="menu">
                        <ul class="ul_menu">
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="<?= site_url();?>/">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-purple" href="<?= site_url();?>/#NossaCreche">NOSSA CRECHE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success" href="<?= site_url();?>/#Servicos">SERVIÇOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="<?= site_url();?>/#Galeria">GALERIA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-orage" href="<?= site_url();?>/#Noticias">NOTÍCIAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="<?= site_url();?>/#Contatos">CONTATOS</a>
                            </li>
                        </ul>
                    </nav>
                </div><!--FIM MENU-->
            </div>
        </div>
    </div><!--FIM DIV CABEÇALHO-->


    <div class="bg_galeria"> 
        <div class="container" id="Galeria"><!--INICIO DIV GALERIA-->
            <div class="row mt-5 p-3 bg_fundo justify-content-md-center">
                <?php
                    foreach($galeria as $value => $gl) {
                ?>
                <h3 class="text-warning"><?= $galeria[$value]->titulo_album; ?></h3>
                <?php
                    }
                ?>
                <div class="row">
                <?php
                    foreach($foto as $value => $f) {
                        // echo '<pre>';
                        // print_r($foto); exit;
                ?>
                    <div class="col-sm-12 col-lg-3 border border-info rounded p-3 m-2 bg-white">
                        <a href="<?= base_url($foto[$value]->img_foto);?>" data-lightbox='roadtrip'>
                            <img src="<?= base_url($foto[$value]->img_foto);?>" class="img-fluid capas popupimage" alt="">
                        </a>
                    </div>
                <?php
                    }  //FIM FOREACH GALERIA
                ?>
                </div>
            </div>
        </div>
    </div><!--FIM DIV GALERIA-->
    <div class="row rodape bg-success mt-3"><!--INICIO DIV RODAPE-->
        <div class="container">
            <div class="row text-white">
                <div class="col-lg-8">
                    <?= date('Y').' - Creche Núcleo Bandeirante Vó Filomena - Todos os direitos reservados ' ?>
                </div>
                <div class="col-lg-4 text-right">
                    <a href="<?= site_url('Login');?>" target="_blank" class="text-white"><i class="fas fa-user-alt"></i> Entrar</a>
                </div>
            </div>
        </div>
    </div><!--FIM DIV RODAPE-->
    <!--BOTÃO TOPO-->
    <button onclick="topFunction()" id="myBtn" rel="modal:open" title="Go to top">Topo</button>
</body>
<script src="<?= base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script defer src="<?= base_url('assets/js/all.js');?>"></script>
<script src="<?= base_url('assets/js/lightbox-2.6.min.js');?>"></script>
<script type="text/javascript">
    $(function() {
        $('a').bind('click',function(event){
            var $anchor = $(this);
            $('html, body').stop().animate({scrollTop: $($anchor.attr('href')).offset().top}, 1000,'swing');
            // Outras Animações
            // linear, swing, jswing, easeInQuad, easeInCubic, easeInQuart, easeInQuint, easeInSine, easeInExpo, easeInCirc, easeInElastic, easeInBack, easeInBounce, easeOutQuad, easeOutCubic, easeOutQuart, easeOutQuint, easeOutSine, easeOutExpo, easeOutCirc, easeOutElastic, easeOutBack, easeOutBounce, easeInOutQuad, easeInOutCubic, easeInOutQuart, easeInOutQuint, easeInOutSine, easeInOutExpo, easeInOutCirc, easeInOutElastic, easeInOutBack, easeInOutBounce
        });
    });

    //INICIO ISCRIPT BOTÃO SUBIR AO TOPO
    var mybutton = document.getElementById("myBtn");

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    } //FIM ISCRIPT BOTÃO SUBIR AO TOPO
</script>
</html>