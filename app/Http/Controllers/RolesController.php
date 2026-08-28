<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::get();

        return view('page/roles', compact('roles'));
    }

    public function store(Request $request){
        $validate = $request->validate([
             'nama' => 'required|string|max:255',
             'ket' => 'nullable|string|max:255'
        ]);

        Role::create([
            'nama_role' => $validate['nama'],
            'deskripsi' => $validate['ket'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('roles')->with('success', 'Role berhasil ditambahkan');
    }
}
