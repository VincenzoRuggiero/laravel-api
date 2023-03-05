<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technologies.create', [ 'technology' => new Technology() ]);
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
            'name' => 'required|string|max:100|min:3|unique:technologies,name',
        ]);

        $technology = new Technology();
        $technology->fill($formData);
        $technology->save();

        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        $next = technology::where('id', '>', $technology->id)->orderBy('id')->first();
        $prev = technology::where('id', '<', $technology->id)->orderBy('id','desc')->first();

        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $formData = $request->validate([
            'name' => ['required', 'string', 'max:100', 'min:3', Rule::unique('technologies')->ignore($technology->id)],
        ]);

        $technology->update($formData);

        return redirect()->route('admin.technologies.show', compact('technology'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
