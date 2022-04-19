<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public $backendPath='Backend.';
    public $pagePath='';

    public function __construct()
    {

        $this->pagePath = $this->backendPath.'pages.';
    }
}
