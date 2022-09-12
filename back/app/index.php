<?php

error_reporting(-1);
ini_set('display_errors', 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/accesoADatos/Archivos.php';
require __DIR__ . '/accesoADatos/AccesoDatos.php';
require __DIR__ . '/controllers/usuariosController.php';
require __DIR__ . '/entidades/Usuarios.php';
require __DIR__ . '/entidades/Articulos.php';
require __DIR__ . '/controllers/ArticulosController.php';
require __DIR__ . '/entidades/Comentarios.php';
require __DIR__ . '/controllers/ComentariosController.php';
require __DIR__ . '/entidades/Solicitudes.php';
require __DIR__ . '/controllers/SolicitudesController.php';
require __DIR__ . '/entidades/Chat.php';
require __DIR__ . '/controllers/ChatController.php';
require __DIR__ . '/controllers/EmailController.php';
require __DIR__ . '/entidades/Emails.php';


// Instantiate App
$app = AppFactory::create();
// Add error middleware
$app->addErrorMiddleware(true, true, true);
//header('Access-Control-Allow-Origin:*');
// Enable CORS
$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
    // $routeContext = RouteContext::fromRequest($request);
    // $routingResults = $routeContext->getRoutingResults();
    // $methods = $routingResults->getAllowedMethods();
    
    $response = $handler->handle($request);

    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'get,post');
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);

    // Optional: Allow Ajax CORS requests with Authorization header
    // $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');

    return $response;
});

//$app->get('[/]', \usuariosController::class . ':Listar' );
//$app->get('/Usuarios[/]', \usuariosController::class . ':Listar' );
$app->group('/Usuarios', function (RouteCollectorProxy $group) {
    $group->get('/Login/{nombreUsuario}/{pass}[/]', \usuariosController::class . ':Login' );
    $group->post('/Alta', \usuariosController::class . ':Alta' );
    $group->post('/Baja', \usuariosController::class . ':Baja' );
    $group->post('/Modificacion', \usuariosController::class . ':Modificacion' );
    $group->get('/Listar/{id}', \usuariosController::class . ':Listar' );
    $group->get('/GetDatosUsuario/{idUsuario}[/]', \usuariosController::class . ':GetDatosUsuario' );
    $group->POST('/GuardarFoto', \usuariosController::class . ':GuardarFoto' );
    $group->get('/ValidadPass/{nombreUsuario}/{passold}/{pass}/{id}[/]', \usuariosController::class . ':ValidadPass' );
    $group->get('/GetProvinvias', \usuariosController::class . ':GetProvinvias' );
    $group->get('/Getciudades/{idciudad}', \usuariosController::class . ':Getciudades' );
    $group->POST('/AltaDomicilio', \usuariosController::class . ':AltaDomicilio' );
    $group->get('/getDomicilio/{id}', \usuariosController::class . ':getDomicilio' );
    $group->POST('/CompraMoneda', \usuariosController::class . ':CompraMoneda' );
    $group->get('/getHistorialMoneda/{idU}', \usuariosController::class . ':getHistorialMoneda' );
    $group->get('/getmontoMoneda/{idU}', \usuariosController::class . ':getmontoMoneda' );
    $group->POST('/AltaUsuarioAngular', \usuariosController::class . ':AltaUsuarioAngular' );
    $group->get('/ValidarNombre/{nombre}', \usuariosController::class . ':ValidarNombre' );
    $group->get('/GetUsuariosbyName/{nombre}/{id}', \usuariosController::class . ':GetUsuariosbyName' );
    $group->POST('/ValidarNombreMail', \usuariosController::class . ':ValidarNombreMail' );
    $group->POST('/MailContacto', \usuariosController::class . ':MailContacto' );
    
    
});
$app->group('/Comentarios', function (RouteCollectorProxy $group) {
    $group->post('/Comentar', \ComentariosControlller::class . ':Comentar' );
    $group->get('/getComentariosByArticulo/{IDA}', \ComentariosControlller::class . ':getComentariosByArticulo' );
});

$app->group('/Emails', function (RouteCollectorProxy $group) {
    $group->post('/RecuperoPass', \EmailController::class . ':RecuperoPass' );
    $group->get('/GetValidarToken/{token}/{pass}', \EmailController::class . ':GetValidarToken' );
    
});

$app->group('/Chat', function (RouteCollectorProxy $group) {
    $group->post('/Chatear', \ChatControlller::class . ':Chatear' );
    $group->get('/getChat/{IDA}', \ChatControlller::class . ':getChat' );
    $group->get('/getIdChat/{IDA}/{IDA2}', \ChatControlller::class . ':getIdChat' );
    $group->get('/GetUsuariosChats/{idUsuario}', \ChatControlller::class . ':GetUsuariosChats' );
    $group->get('/GetVistos/{idUsuario}', \ChatControlller::class . ':GetVistos' );
    
});
$app->group('/Solicitudes', function (RouteCollectorProxy $group) {
    $group->post('/CompraArticulo', \SolicitudesControlller::class . ':CompraArticulo' );
    $group->post('/solicitudIntercambio', \SolicitudesControlller::class . ':solicitudIntercambio' );
    $group->get('/Aceptarsolicitud/{id}', \SolicitudesControlller::class . ':Aceptarsolicitud' );
    $group->post('/Rechazarsolicitud', \SolicitudesControlller::class . ':Rechazarsolicitud' );
    $group->get('/solicitudbyUsusario/{IDU}', \SolicitudesControlller::class . ':solicitudbyUsusario' );
    $group->get('/OfertasbyUsusario/{IDU}', \SolicitudesControlller::class . ':OfertasbyUsusario' );
    $group->POST('/AltaSolicitud', \SolicitudesControlller::class . ':AltaSolicitud' );
    $group->POST('/EnviarMail', \SolicitudesControlller::class . ':EnviarMail' );
    $group->get('/vistoSolicitudes/{IDU}', \SolicitudesControlller::class . ':vistoSolicitudes' );
    
    
});

$app->group('/Articulo', function (RouteCollectorProxy $group) {
    $group->post('/Alta', \ArticulosController::class . ':Alta' );
    $group->post('/AltaAngular', \ArticulosController::class . ':AltaAngular' );
    $group->post('/BajaAngular', \ArticulosController::class . ':BajaAngular' );
    $group->post('/EditAngular', \ArticulosController::class . ':EditAngular' );
    $group->post('/Baja', \ArticulosController::class . ':Baja' );
    $group->post('/Modificacion', \ArticulosController::class . ':Modificacion' );
    $group->GET('/ListarAusuario/{IDU}[/]', \ArticulosController::class . ':ListarAusuario' );
    $group->POST('/GuardarImagen', \ArticulosController::class . ':GuardarImagen' );
    $group->GET('/GetArticulo/{IDA}[/]', \ArticulosController::class . ':GetArticulo' );
    $group->GET('/Buscar/{Busca}[/]', \ArticulosController::class . ':Buscar' );
    $group->GET('/TodosLosArticulos', \ArticulosController::class . ':TodosLosArticulos' );
    $group->GET('/GetCategorias', \ArticulosController::class . ':GetCategorias' );
    $group->POST('/SubirImagenArticulo', \ArticulosController::class . ':SubirImagenArticulo' );
    $group->GET('/GetImagenArticulo/{IDA}[/]', \ArticulosController::class . ':GetImagenArticulo' );
    $group->post('/BajaFoto', \ArticulosController::class . ':BajaFoto' );
    

    
});

$app->run();