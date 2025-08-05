<?php

namespace App\Http\Controllers;

use App\Models\Pretest;
use Illuminate\Http\Request;
use App\Http\Requests\PretestRequest;

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

    public function store(PretestRequest $request)
    {
        $pretest = $request->only(['keyword', 'description']);
        Pretest::create($pretest);

        return redirect('/');
    }

    public function update(PretestRequest $request)
    {
        $pretest = $request->only(['keyword', 'description']);
        Pretest::find($request->id)->update($pretest);

        return redirect('/');
    }

    public function destroy(Request $request)
    {
        Pretest::find($request->id)->delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $pretests = Pretest::with('keyword')->KeywordSearch($request->keyword)->get();
        return view('index', compact('pretests'));
    }
}
