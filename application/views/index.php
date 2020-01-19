<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/destaque.css');?>" rel="stylesheet" />

    <title><?= $titulo; ?></title>
</head>
<body>
    <div class="row top"><!--INICIO DIV TOPO-->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 num">
                    <i class="fas fa-phone-alt align-middle"></i> (61) 3386-2341 / 3022-0008
                </div>
                <div class="col-lg-4 num text-right">
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
                            <li><a class="nav-link text-primary" href="#">HOME</a></li>
                            <li><a class="nav-link text-purple" href="#NossaCreche">NOSSA CRECHE</a></li>
                            <li><a class="nav-link text-success" href="#Servicos">SERVIÇOS</a></li>
                            <li><a class="nav-link text-warning" href="#Galeria">GALERIA</a></li>
                            <li><a class="nav-link text-orage" href="#Noticias">NOTÍCIAS</a></li>
                            <li><a class="nav-link text-danger" href="#Contatos">CONTATOS</a></li>
                        </ul>
                    </nav>
                </div><!--FIM MENU-->
            </div>
        </div>
    </div><!--FIM DIV CABEÇALHO-->

    <div class="row slider"> <!-- INICIO DIV SLIDERS-->
        <div class="col slider">
            <div id="blocoDestaques"><!-- INICIO DESTAQUE-->
                <ul>
                    <?php
                        foreach($banner as $value => $bn) {
                    ?>
                        <li>
                            <a href=""><img class="d-block w-100" src="<?= base_url('assets/img/banners/'.$banner[$value]->img_banner) ?>"/></a>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div><!--FIM DIV SLIDERS -->

    <div class="mt-5"></div>
    <div class="container mt-5 pt-5" id="NossaCreche"><!--INICIO DIV NOSSA CRECHE-->
        <div class="row mt-5 p-3 bg_fundo">
        <?php
            foreach($creche as $value => $cr) {
        ?>
            <div class="col-lg-6">
                <img src="<?= base_url($creche[$value]->img_quemsomos);?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6">
                <h3 class="text-purple text-uppercase"> <?= $creche[$value]->titulo_quemsomos; ?></h3>
                <p class="text-justify">
                        <?= $creche[$value]->texto_quemsomos; ?>
                </p>
                <!-- <a href="" target="_blank" rel="noopener noreferrer" class="btn btn-danger">Conheça mais!</a> -->
            </div>
        </div>
        <?php
            }
        ?>
    </div><!--FIM DIV NOSSA CRECHE-->

    <div class="container mt-5 pt-5 " id="Servicos"><!--INICIO DIV SERVIÇOS-->
        <div class="row mt-5 p-3 bg_fundo bg_fundo">
            <div class="col rounded p-3 m-2 bg-white text-center">
                <img src="<?= base_url('assets/img/ico01.png');?>" class="img-fluid" alt="">
                <div class="col mt-2 p-0">
                    <h5 class="font_family">Ótima Infraestrutura</h5>
                </div>
            </div>
            <div class="col rounded p-3 m-2 bg-white text-center">
                <img src="<?= base_url('assets/img/ico02.png');?>" class="img-fluid" alt="">
                <div class="col mt-2 p-0">
                    <h5 class="font_family">Qualidade de Ensino</h5>
                </div>
            </div>
            <div class="col rounded p-3 m-2 bg-white text-center">
                <img src="<?= base_url('assets/img/ico03.png');?>" class="img-fluid" alt="">
                <div class="col mt-2 p-0">
                    <h5 class="font_family">lições criativas</h5>
                </div>
            </div>
            <div class="col rounded p-3 m-2 bg-white text-center">
                <img src="<?= base_url('assets/img/ico04.png');?>" class="img-fluid" alt="">
                <div class="col mt-2 p-0">
                    <h5 class="font_family">Diversão</h5>
                </div>
            </div>
        </div>
    </div> <!--FIM DIV SERVIÇOS-->

    <div class="bg_galeria"> 
        <div class="container mt-5 pt-5" id="Galeria"><!--INICIO DIV GALERIA-->
            <div class="row mt-5 p-3 bg_fundo">
                <div class="row">
                    <div class="col col-lg-12">
                        <h3 class="text-warning">Galeria de Fotos</h3>
                    </div>
                </div>
                <div class="row">
                <?php
                    foreach($galeria as $value => $gl) {
                ?>
                        <div class="col-sm-12 col-lg-3 border border-info rounded p-3 m-2 bg-white">
                        <a href="<?= site_url('Site/Album/'.$galeria[$value]->id_album);?>">
                            <img src="<?= base_url($galeria[$value]->img_album);?>" class="img-fluid capas" alt="">
                            <div class="col text-justify p-0">
                                <p><b><?= $galeria[$value]->titulo_album; ?></b></p>
                            </div>
                        </a>
                        </div>
                   
                <?php
                    }  //FIM FOREACH
                ?>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-12">
                    <a href="<?= site_url('Galeria')?>" class="btn btn-primary ml-2 float-left">Mais álbuns...</a>
                </div>
            </div>
        </div>
    </div><!--FIM DIV GALERIA-->

    <div class="container mt-5 pt-5" id="Noticias"><!--INICIO DIV NOTICIAS-->
        <div class="row mt-5 p-3 bg_fundo">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-orage">NOTÍCIAS</h3>
                </div>
            </div>
            <div class="row">
                <?php
                    $escondeBtn = null;
                    foreach($noticias as $value => $nt) {
                ?>
                <div class="col-lg-3 col-sm-12  border border-info rounded p-3 m-2 bg-white">
                    <img src="<?= base_url($noticias[$value]->img_noticia);?>" class="img-fluid capas" alt="">
                        <h4><?= $noticias[$value]->titulo_noticia; ?></h4>
                        <p class="text-truncate"><?= $noticias[$value]->texto_noticia; ?></p> 
                    <a href="<?= site_url('Site/Noticia/'.$noticias[$value]->id_noticia);?>">veja mais...</a>
                </div>
                <?php
                    }  //FIM FOREACH
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-12">
                <a href="<?= site_url('Noticias');?>" class="btn btn-primary ml-2" <?= $escondeBtn?>>Todas as Notícias...</a>
            </div>
        </div>
    </div><!--FIM DIV NOTICIAS-->

    <div class="container mt-5 pt-5" id="Contatos"><!--INICIO DIV CONTATOS-->
        <div class="row mt-5 p-3 bg_fundo">
            <div class="col-lg-6">
            <?php
                if ($this->session->flashdata('Success') !="") {
                    echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
                } elseif ($this->session->flashdata('Error') !="") {
                    echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
                }
            ?>

                <form action="<?= site_url().'/Site/EnviaContato';?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="nome" id="" class="form-control" placeholder="Digite seu nome completo">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="" class="form-control" placeholder="Digite seu E-mail">
                    </div>
                    <div class="form-group">
                        <input type="text" name="assunto" id="" class="form-control" placeholder="Digite o assunto">
                    </div>
                    <div class="form-group">
                        <textarea name="msg" id="" cols="20" rows="10" class="form-control" placeholder="Mensagem"></textarea>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" value="Enviar" class="btn btn-success pl-5 pr-5">
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <h3 class="text-danger">CONTATOS</h3>
                <p class="font-contact align-middle"><i class="fas fa-phone-alt mt-1"></i> (61) 3386-2341 / 3022-0008</p>
                <p class="font-contact align-middle"><i class="fas fa-envelope mt-2"></i> crechevofilomena1962@gmail.com</p>
                <p class="font-contact align-middle"><i class="fas fa-map-marker-alt mt-2"></i> 3ª Avenida, Área Especial nº 02 Lote O/P - Núcleo Bandeirante/DF</p>
            </div>
        </div>
    </div><!--FIM DIV CONTATOS-->

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
<!--OS ARQUIVOS "jquery.cycle.all.min.js" E O "jquery.destaques.js" SÃO UTILIZADOS PARA FUNCIONAR O SLIDER-->
<script src="<?= base_url('assets/js/jquery.cycle.all.min.js');?>"></script> 
<script src="<?= base_url('assets/js/jquery.destaques.js');?>"></script>
<script defer src="<?= base_url('assets/js/all.js');?>"></script>

<script type="text/javascript">
    //INICIO SLIDER
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
		
	  $('.autoplay').slick({
  		slidesToShow: 3,
  		slidesToScroll: 1,
  		autoplay: true,
  		autoplaySpeed: 2000,
	  });
    });

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
        
        $('html, body').stop().animate({scrollTop: $($anchor.attr('href')).offset().top}, 1000,'swing');
    } //FIM ISCRIPT BOTÃO SUBIR AO TOPO

    
</script>
</html>