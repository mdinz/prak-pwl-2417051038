<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('edit_user', ['title' => 'Edit User', 'user' => $user]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama'  => 'required',
        'npm'   => 'required',
        'kelas' => 'required',
        // samakan dengan aturan validasi di store()
    ]);

    try {
        $user = User::findOrFail($id);
        $user->update([
            'nama'  => $request->input('nama'),
            'npm'   => $request->input('npm'),
            'kelas' => $request->input('kelas'),
        ]);

        return redirect()->to('/user')->with('success', 'Data mahasiswa berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->to('/user')->with('error', 'Gagal memperbarui data mahasiswa!');
    }
}

public function destroy($id)
{
    try {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'Data mahasiswa berhasil dihapus!');
    } catch (\Exception $e) {
        return redirect()->to('/user')->with('error', 'Gagal menghapus data mahasiswa!');
    }
}

    public function create()
    {
        $data = [
            'title' => 'Create User',
            'kelas' => $this->kelasModel->getKelas(),
        ];
        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user');
    }
}