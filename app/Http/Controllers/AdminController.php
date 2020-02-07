<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Blog;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'admin'], ['only' => ['blogs']]);
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.dashboard');
    }
}
