<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contrato;
use App\Inquilino;
use App\Inmueble;
use Illuminate\Http\Request;

class ContratoController extends Controller
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
            $contrato = Contrato::where('status', 'LIKE', "%$keyword%")
                ->orWhere('idinmueble', 'LIKE', "%$keyword%")
                ->orWhere('idinquilino', 'LIKE', "%$keyword%")
                ->orWhere('desde', 'LIKE', "%$keyword%")
                ->orWhere('hasta', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contrato = Contrato::latest()->paginate($perPage);
        }

        return view('admin.contrato.index', compact('contrato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $inquilinos = Inquilino::all();
        $inmuebles = Inmueble::all();
        return view('admin.contrato.create',compact('inquilinos','inmuebles'));
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

        Contrato::create($requestData);

        return redirect('admin/contrato')->with('flash_message', 'Contrato added!');
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
        $contrato = Contrato::findOrFail($id);

        return view('admin.contrato.show', compact('contrato'));
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
        $contrato = Contrato::findOrFail($id);
        $inquilinos = Inquilino::all();
        $inmuebles = Inmueble::all();
        return view('admin.contrato.edit', compact('contrato','inquilinos','inmuebles'));
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

        $contrato = Contrato::findOrFail($id);
        $contrato->update($requestData);

        return redirect('admin/contrato')->with('flash_message', 'Contrato updated!');
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
        Contrato::destroy($id);

        return redirect('admin/contrato')->with('flash_message', 'Contrato deleted!');
    }
}
