<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required',
            'name' => 'required',
        ]);

        Brand::create([
            'logo' => $request->file('logo')->store('public/brands'),
            'name' => $request->name,
        ]);

        return redirect('/admin/brands');
    }

    public function update(Request $request, Brand $menu)
    {
        $on_sale = $request->on_sale == null ? false : true;

        $request->validate([
            'logo' => 'required',
            'name' => 'required',
        ]);

        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($image);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
            'logo' => $image,
            'name' => $request->name,
        ]);

        return redirect('/admin/brands');
    }
}
