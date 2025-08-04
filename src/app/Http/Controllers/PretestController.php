<?php

namespace App\Http\Controllers;

use App\Models\Pretest;
use Illuminate\Http\Request;

class PretestController extends Controller
{
    public function index()
    {
        $pretests = Pretest::all();
        return view('index',compact('pretests'));
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $pretest = $request->only(['keyword', 'description']);
        Pretest::create($pretest);

        return redirect('/');
    }
}
