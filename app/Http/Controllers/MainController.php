<?php

/**
 * MainController.php
 *
 * PHP version 5.6
 *
 * @category  Olx-Demo
 * @package   Controllers
 * @author    Jesus Farfan <jesu.farfan23@gmai.com>
 * @copyright 2016 - MIT
 * @license   Mit License<http://opensource.org/licenses/MIT>
 * @link      http://opensource.org/licenses/MIT
 */

namespace App\Http\Controllers;

/**
 * MainController
 *
 * PHP version 5.6
 *
 * @category  Olx-Demo
 * @package   Controllers
 * @author    Jesus Farfan <jesu.farfan23@gmai.com>
 * @copyright 2016 - MIT
 * @license   Mit License<http://opensource.org/licenses/MIT>
 * @link      http://opensource.org/licenses/MIT
 */
class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Inde
     * 
     * @return string view
     */
    public function index()
    {
        return view('index', ['searchCriteria' => ""]);
    }
}
