<?php

namespace App\Http\Controllers;

use App\PhClass;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    public function backend()
    {
        return view('web.backend');
    }
    public function profile(Request $request) {
        return view('auth.profile');
    }
    public function manageClass(Request $request, $slug) {
        try {
            $class = PhClass::whereSlug($slug)->firstOrFail();
            return view("single-class",compact('class'));
        } catch (\Throwable $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }
}
