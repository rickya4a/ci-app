<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use Config\Encryption;

class BaseController extends Controller {

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['html', 'form'];

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();

        // Load encryption library
        $config         = new Encryption();
        $config->key    = 'qwertyuiopasdfghjklzxcvbnm1234567890';
        $config->driver = 'OpenSSL';
        $this->encrypter = \Config\Services::encrypter($config);

        // Backend dir
        $this->backend = 'backend/templates/layout';
    }

    public function rules($array) {
        return \implode("|", $array);
    }
}
