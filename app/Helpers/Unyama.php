<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class Unyama
{
    public static function index(string $view, string $model)
    {

         $items = $model::paginate(10);
        return view($view, compact('items'));
    }

    public static function create(string $view, string $model , ? string $model2): View
    {
        $items = $model::all();
        if($model2){
            $items2 = $model2::all();
            return view($view, compact('items','items2'));
        }else{
            return view($view, compact('items'));
        }
    }

    public static function store(Request $request, string $redirectRoute, string $model): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
       
        $test = $model::create($request->all());

        return redirect()->route($redirectRoute)->with('success', 'Item created successfully.');
    }

    public static function show(string $view, string $model, $itemId): View
    {
        $item = $model::find($itemId);
        return view($view, compact('item'));
    }

    public static function edit(string $view, string $model, $itemId, ?string $model2): View
    {
        $item = $model::find($itemId);
        if($model2){
            $items2 = $model2::all();
            return view($view, compact('item','items2'));
        }else{
            return view($view, compact('item'));
        }
    }

    public static function update(Request $request, string $redirectRoute, string $model, $itemId): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $item = $model::find($itemId);
        $item->update($request->all());
        return redirect()->route($redirectRoute)->with('success', 'Item updated successfully.');
    }

    public static function destroy(string $redirectRoute, string $model, $itemId): RedirectResponse
    {
        $item = $model::find($itemId);
        $item->delete();
        return redirect()->route($redirectRoute)->with('success', 'Item deleted successfully.');
    }
}