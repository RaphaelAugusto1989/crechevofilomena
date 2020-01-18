<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//CONTROLLER SITE
$route['Galeria'] = 'Site/Galeria';
$route['Album'] = 'Site/Album';
$route['Noticias'] = 'Site/Noticias';
$route['Noticia'] = 'Site/Noticia';
$route['RecuperarSenha'] = 'Site/RecuperarSenha';

//CONTROLLER USUARIOS
$route['Login'] = 'Usuarios/Login';
$route['Sistema'] = 'Usuarios/Sistema';

$route['verBanners'] = 'Banners/verBanners';
$route['NovoBanner'] = 'Banners/NovoBanner';
$route['AlterarBanner/(:num)'] = 'Banners/AlterarBanner';

$route['verQuemSomos'] = 'Creche/verQuemSomos';
$route['NovoQuemSomos'] = 'Creche/NovoQuemSomos';
$route['AlterarQuemSomos/(:num)'] = 'Creche/AlterarQuemSomos';

$route['verGaleria'] = 'Galeria/verGaleria';
$route['NovaGaleria'] = 'Galeria/NovaGaleria';
$route['NovasFotos/(:num)'] = 'Galeria/NovasFotos';
$route['AlterarGaleria/(:num)'] = 'Galeria/AlterarGaleria';

$route['verNoticias'] = 'Noticia/verNoticias';
$route['NovaNoticia'] = 'Noticia/NovaNoticia';
$route['AlterarNoticia/(:num)'] = 'Noticia/AlterarNoticia';

$route['VerContatos'] = 'Contatos/VerContatos';
$route['NovoContato'] = 'Contatos/NovoContato';
$route['ResponderContato/(:num)'] = 'Contatos/ResponderContato';

$route['verUsuarios'] = 'Usuarios/verUsuarios';
$route['NovoUsuario'] = 'Usuarios/NovoUsuario';
$route['MeusDados'] = 'Usuarios/MeusDados';
$route['NovaSenha'] = 'Usuarios/NovaSenha';
$route['AlterarUsuario/(:num)'] = 'Usuarios/AlterarUsuario';

$route['Logout'] = 'Usuarios/Logout';

