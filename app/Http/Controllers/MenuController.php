<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::with('parent')
            ->orderBy('parent_id')
            ->orderBy('urutan')
            ->get();

        $selectMenu = Menu::select('id', 'nama_menu')->get();

        return view('page.menu', compact('menus', 'selectMenu'));

    }

    public function store(Request $request){
        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'route' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'status' => 'required|integer'
        ]);

        Menu::create([
            'nama_menu' => $validate['nama'],
            'icon'      => $validate['icon'],
            'route'     => $validate['route'],
            'parent_id' => $validate['parent_id'],
            'status'    => $validate['status']
        ]);

        return redirect()->route('menu_index')->with('success', 'Menu berhasil ditambahkan');
    }
}
