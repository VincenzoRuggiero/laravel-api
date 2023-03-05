<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create', [ 'type' => new Type() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|string|max:100|min:3|unique:types,name',
        ]);

        $type = new Type();
        $type->fill($formData);
        $type->save();

        return view('admin.types.show', compact('type'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        $next = type::where('id', '>', $type->id)->orderBy('id')->first();
        $prev = type::where('id', '<', $type->id)->orderBy('id','desc')->first();

        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $formData = $request->validate([
            'name' => ['required', 'string', 'max:100', 'min:3', Rule::unique('types')->ignore($type->id)],
        ]);

        $type->update($formData);

        return redirect()->route('admin.types.show', compact('type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index');
    }
}
