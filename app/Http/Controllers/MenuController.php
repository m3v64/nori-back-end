<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Dish;

class MenuController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();
        $categories = $dishes->groupBy('category');

        return view('menu.index', [
            'dishes' => $dishes,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(MenuRequest $request)
    {
        Dish::create($request->validated());

        return redirect()->route('menu.index');
    }

    public function show(Dish $menu)
    {
        return view('menu.show', ['dish' => $menu]);
    }

    public function edit(Dish $menu)
    {
        return view('menu.edit', ['dish' => $menu]);
    }

    public function update(MenuRequest $request, Dish $menu)
    {
        $menu->update($request->validated());

        return redirect()->route('menu.show', $menu);
    }

    public function destroy(Dish $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index');
    }
}
