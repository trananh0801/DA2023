<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    //set data cho masterlayout
    public function loadMasterLayout($data, $title, $content, $dataLayout = [])
    {
        $data['title'] = $title;
        $data['leftMenu'] = view('Admin/Layout/left.menu.php');
        $data['header'] = view('Admin/Layout/header');
        $data['content'] = view($content, $dataLayout);
        return $data;
    }

    public function loadMasterLayoutUser($data, $title, $content, $dataLayout = [])
    {
        $data['title'] = $title;
        $data['footer'] = view('User/Layout/footer.php');
        $data['header'] = view('User/Layout/header.php');
        $data['content'] = view($content, $dataLayout);
        return $data;
    }
}
