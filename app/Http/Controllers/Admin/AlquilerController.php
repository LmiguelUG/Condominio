<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Alquiler;
use App\Contrato;
use App\Inmueble;
use Illuminate\Http\Request;

class AlquilerController extends Controller
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
            $alquiler = Alquiler::where('tipo', 'LIKE', "%$keyword%")
                ->orWhere('detalle', 'LIKE', "%$keyword%")
                ->orWhere('monto', 'LIKE', "%$keyword%")
                ->orWhere('saldo', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->orWhere('idcontrato', 'LIKE', "%$keyword%")
                ->orWhere('idinmueble', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $alquiler = Alquiler::latest()->paginate($perPage);
        }

        return view('admin.alquiler.index', compact('alquiler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $contratos = Contrato::all();
        $inmuebles = Inmueble::all();
        return view('admin.alquiler.create',compact('contratos','inmuebles'));
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

        Alquiler::create($requestData);

        return redirect('admin/alquiler')->with('flash_message', 'Alquiler added!');
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
        $alquiler = Alquiler::findOrFail($id);

        return view('admin.alquiler.show', compact('alquiler'));
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
        $alquiler = Alquiler::findOrFail($id);
        $contratos = Contrato::all();
        $inmuebles = Inmueble::all();
        return view('admin.alquiler.edit', compact('alquiler','contratos','inmuebles'));
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

        $alquiler = Alquiler::findOrFail($id);
        $alquiler->update($requestData);

        return redirect('admin/alquiler')->with('flash_message', 'Alquiler updated!');
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
        Alquiler::destroy($id);

        return redirect('admin/alquiler')->with('flash_message', 'Alquiler deleted!');
    }
}
