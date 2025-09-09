<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Condominium;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $condominiums = Condominium::with('systemStatus')->take(3)->get(); // pega no máximo 3
        $userCount = User::count(); // total de usuários

        return view('home', compact('condominiums', 'userCount'));
    }
}
