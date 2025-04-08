<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tamu;
use Carbon\Carbon;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $today = Carbon::today();
        $totalTamuToday = Tamu::whereDate('created_at', $today)->count();

        $search = $request->input('seacrh');

        $tamus = Tamu::query()
        ->when($search, function($query, $search) {
            $query->where(function($query) use ($search) {
                $query->where('namalengkap', 'like', '%'. $search . '%')
                ->orWhere('instansi', 'like', '%' . $search . '%')
                ->orWhere('bertemu_dengan', 'like', '%' . $search . '%')
                ->orWhere('tanggal', 'like', '%' . $search . '%');
            });
        })
        ->latest()
        ->paginate(10);
        $total = Tamu::count();
        return view('home', compact('tamus', 'totalTamuToday', 'total'));
    }
}
