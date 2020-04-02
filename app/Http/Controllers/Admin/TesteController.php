<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste() 
    {
        return 'Teste Controller 0';
    }

    public function teste1() 
    {
        return 'Teste Controller 11';
    }
}