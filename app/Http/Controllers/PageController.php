<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Kepengurusan;
use App\Models\Project;
use App\Models\User;
use App\Rules\CheckEmailRegister;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'DESC')->get();
        $about_uses = AboutUs::get();
        $kepengurusans = Kepengurusan::get();

        return view('page.index', get_defined_vars());
    }

    public function projectIndex($project_id)
    {
        $project = Project::findOrFail($project_id);

        return view('page.project', get_defined_vars());
    }

    public function donasiIndex($jenis)
    {
        if ($jenis == 'Project') {
            $projects = Project::orderBy('created_at', 'DESC')->get();
        }

        return view('page.donasi', get_defined_vars());
    }

    public function thanksIndex()
    {
        return view('page.thanks');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('validation', 'alert("'.$validator->errors()->first().'");');
        }

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            if (Auth::user()->role == 'admin') {
                Auth::logout();

                return redirect()->back()->with('validation', 'alert("Admin Tidak Boleh Login.");');
            }

            return redirect()->back()->with('validation', 'alert("Login Berhasil.");');
        } else {
            return redirect()->back()->with('validation', 'alert("Password Anda Salah.");');
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => ['required', new CheckEmailRegister()],
            'no_telepon' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'domisili' => 'required|in:Jakarta Barat, Jakarta Selatan, Jakarta Timur, Jakarta Utara, Jakarta Pusat, Luar Jakarta',
            'foto' => 'required|max:2048|mimes:jpg,png,jpeg',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('validation', 'alert("'.$validator->errors()->first().'");');
        }

        $foto = $request->file('foto');
        $fotoName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();

        if (! File::isDirectory(public_path('followers/foto'))) {
            File::makeDirectory(public_path('followers/foto'), 0755, true);
        }

        $request->file('foto')->move(public_path('followers/foto'), $fotoName);

        $user = User::where('email', $request->email)->first();

        if ($user === null) {
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
                'jenis_kelamin' => $request->jenis_kelamin,
                'domisili' => $request->domisili,
                'foto' => $fotoName,
                'alamat' => $request->alamat,
                'password' => $request->password,
                'role' => 'followers'
            ]);
        } else {
            $user->update([
                'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
                'jenis_kelamin' => $request->jenis_kelamin,
                'domisili' => $request->domisili,
                'foto' => $fotoName,
                'alamat' => $request->alamat,
                'password' => $request->password,
                'role' => 'followers'
            ]);
        }

        Auth::login($user);

        return redirect()->back()->with('validation', 'alert("Register Berhasil.");');
    }

    public function profileIndex()
    {
        return view('page.profile', get_defined_vars());
    }

    public function changeProfileIndex(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_telepon' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'domisili' => 'required|in:Jakarta Barat, Jakarta Selatan, Jakarta Timur, Jakarta Utara, Jakarta Pusat, Luar Jakarta',
            'foto' => 'max:2048|mimes:jpg,png,jpeg',
        ]);

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $fotoName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();

            $request->file('foto')->move(public_path('followers/foto'), $fotoName);
        } else {
            $fotoName = auth()->user()->foto;
        }

        auth()->user()->update([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
            'jenis_kelamin' => $request->jenis_kelamin,
            'domisili' => $request->domisili,
            'foto' => $fotoName,
            'alamat' => $request->alamat,
            'password' => auth()->user()->password
        ]);
    }

    public function daftarDonasiIndex()
    {
        return view('page.daftar_donasi', get_defined_vars());
    }
}
