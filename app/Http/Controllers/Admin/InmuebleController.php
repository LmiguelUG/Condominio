<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inmueble;
use App\Condominio;
use App\Propietario;
use Illuminate\Http\Request;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $inmueble = Inmueble::where('tipo', 'LIKE', "%$keyword%")
                ->orWhere('alicuota', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $inmueble = Inmueble::latest()->paginate($perPage);
        }

        return view('admin.inmueble.index', compact('inmueble'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $propietarios = Propietario::all();
        $condominios = Condominio::all();
        return view('admin.inmueble.create',compact('propietarios','condominios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Inmueble::create($requestData);

        return redirect('admin/inmueble')->with('flash_message', 'Inmueble added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $inmueble = Inmueble::findOrFail($id);

        return view('admin.inmueble.show', compact('inmueble'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $propietarios = Propietario::all();
        $condominios = Condominio::all();
        return view('admin.inmueble.edit', compact('inmueble','propietarios','condominios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $inmueble = Inmueble::findOrFail($id);
        $inmueble->update($requestData);

        return redirect('admin/inmueble')->with('flash_message', 'Inmueble updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Inmueble::destroy($id);

        return redirect('admin/inmueble')->with('flash_message', 'Inmueble deleted!');
    }
}
