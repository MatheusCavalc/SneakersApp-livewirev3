<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sneaker;
use Illuminate\Http\Request;

class SneakersController extends Controller
{
    public function index()
    {
        return view('admin.sneakers.index');
    }

    public function create()
    {
        return view('admin.sneakers.create');
    }

    public function edit(Sneaker $id)
    {
        return view('admin.sneakers.edit', compact('id'));
    }
}
