<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    private $test = 'testtt';

    public function index() {
        $test = 'test';
        return $this->{$test};
    }
}
