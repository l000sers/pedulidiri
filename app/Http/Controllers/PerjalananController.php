<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerjalananModel;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class PerjalananController extends Controller
{
    public function index()
    {
        $data = DB::table('perjalanans')
            ->join('users', 'users.id', '=', 'perjalanans.id_user')
            ->select('users.email', 'perjalanans.tanggal', 'perjalanans.lokasi', 'perjalanans.jam', 'perjalanans.suhu')
            ->where('users.id', '=', auth()->user()->id)
            ->get();
        return view('pages.dashboard', ['data' => $data]);
    }
    public function form()
    {
        return view('pages.form');
    }
    public function simpanPerjalanan(Request $request)
    {
        //dd($request->all());
        $data = [
            'id_user' => auth()->user()->id,
            'tanggal' => $request->tanggal,
            'suhu' => $request->suhu,
            'lokasi' => $request->lokasi,
            'jam' => $request->jam
        ];
        // dd($data);
        PerjalananModel::create($data);
        return redirect('/dashboard')->with('message', 'penyimpanan berhasil');
    }
    public function cariPerjalanan(Request $request)
    {

        if (!empty($request->input('kota')) && empty($request->input('suhu')) && empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $search = $request->kota;

            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
                ->Where(function ($query) use ($search) {
                    $query->where('users.id', auth()->user()->id)
                        ->where('perjalanans.lokasi', 'LIKE', '%' . $search . '%');
                })->get(['users.name', 'perjalanans.*']);

            if ($data) {
                return view('pages.dashboard', ['data' => $data])->with('alert', 'data ditemukan');
            } else {
                abort(404);
            }
        } elseif (empty($request->input('lokasi')) && !empty($request->input('suhu')) && empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $search = $request->suhu;

            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
                ->Where(function ($query) use ($search) {
                    $query->where('users.id', auth()->user()->id)
                        ->where('perjalanans.suhu', 'LIKE', '%' . $search . '%');
                })->get(['users.name', 'perjalanans.*']);

            if ($data) {
                return view('pages.dashboard', ['data' => $data])->with('alert', 'data ditemukan');
            } else {
                abort(404);
            }
        } elseif (empty($request->input('lokasi')) && empty($request->input('suhu')) && !empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $search = $request->tanggal;

            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
                ->Where(function ($query) use ($search) {
                    $query->where('users.id', auth()->user()->id)
                        ->where('perjalanans.tanggal', 'LIKE', '%' . $search . '%');
                })->get(['users.name', 'perjalanans.*']);

            if ($data) {
                return view('pages.dashboard', ['data' => $data])->with('alert', 'data ditemukan');
            } else {
                abort(404);
            }
        } elseif (empty($request->input('lokasi')) && empty($request->input('suhu')) && empty($request->input('tanggal')) && !empty($request->input('jam'))) {
            $search = $request->jam;

            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
                ->Where(function ($query) use ($search) {
                    $query->where('users.id', auth()->user()->id)
                        ->where('perjalanans.jam', 'LIKE', '%' . $search . '%');
                })->get(['users.name', 'perjalanans.*']);

            if ($data) {
                return view('pages.dashboard', ['data' => $data])->with('alert', 'data ditemukan');
            } else {
                abort(404);
            }
        } else {
            $data = DB::table('perjalanans')
                ->join('users', 'users.id', '=', 'perjalanans.id_user')
                ->select('users.email', 'perjalanans.tanggal', 'perjalanans.jam', 'perjalanans.lokasi', 'perjalanans.suhu')
                ->where('users.id', '=', auth()->user()->id)
                ->get();

            return view('pages.dashboard', ['data' => $data]);
        }
    }
    // public function urutkanPerjalanan(Request $request)
    // {
    //     $data = PerjalananModel::all()->where('id_user', '=', auth()->user()->id);

    //     if ($request->input('tanggalDesc') == "Desc") {
    //         $sorted = $data->SortByDesc('tanggal');
    //         return view('pages.dashboard', ['data' => $sorted->values()->all()]);
    //     } elseif ($request->input('tanggalAsc') == "Asc") {
    //         $sorted = $data->SortBy('tanggal');
    //         return view('pages.dashboard', ['data' => $sorted->values()->all()]);
    //     } elseif ($request->input('jamDesc') == "Desc") {
    //         $sorted = $data->SortByDesc('jam');
    //         return view('pages.dashboard', ['data' => $sorted->values()->all()]);
    //     } elseif ($request->input('jamAsc') == "Asc") {
    //         $sorted = $data->SortBy('jam');
    //         return view('pages.dashboard', ['data' => $sorted->values()->all()]);
    //     } elseif ($request->input('suhuDesc') == "Desc") {
    //         $sorted = $data->SortByDesc('suhu');
    //         return view('pages.dashboard', ['data' => $sorted->values()->all()]);
    //     } elseif ($request->input('suhuAsc') == "Asc") {
    //         $sorted = $data->SortBy('suhu');
    //         return view('pages.dashboard', ['data' => $sorted->values()->all()]);
    //     }
    // }
    
    public function urutkanPerjalanan(Request $request){
        $orderBy = $request->orderBy;
        $sortBy = $request->sortBy;

        // dd($request->all);

        If (auth()->user()) {
            $data = DB::table('perjalanans')
                ->join('users', 'users.id', '=', 'perjalanans.id_user')
                ->select('perjalanans.tanggal', 'perjalanans.lokasi', 'perjalanans.suhu', 'perjalanans.jam')
                ->where('users.id', '=', auth()->user()->id)
                ->orderBy('perjalanans.' . $orderBy, $sortBy)
                ->get();

            Return view('pages.dashboard', ['data' => $data]);
        }

        return view('pages.dashboard');
    }
}
