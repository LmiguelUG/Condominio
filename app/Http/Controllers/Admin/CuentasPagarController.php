<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CuentasPagar;
use App\Contrato;
use App\Propietario;
use App\Alquiler;
use Illuminate\Http\Request;

class CuentasPagarController extends Controller
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
            $cuentaspagar = CuentasPagar::where('idpropietario', 'LIKE', "%$keyword%")
                ->orWhere('idcontrato', 'LIKE', "%$keyword%")
                ->orWhere('idalquiler', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cuentaspagar = CuentasPagar::latest()->paginate($perPage);
        }

        return view('admin.cuentas-pagar.index', compact('cuentaspagar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $propietarios = Propietario::all();
        $contratos = Contrato::all();
        $alquilers = Alquiler::all();
        return view('admin.cuentas-pagar.create',compact('propietarios','contratos','alquilers'));
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

        CuentasPagar::create($requestData);

        return redirect('admin/cuentas-pagar')->with('flash_message', 'CuentasPagar added!');
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
        $cuentaspagar = CuentasPagar::findOrFail($id);

        return view('admin.cuentas-pagar.show', compact('cuentaspagar'));
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
        $cuentaspagar = CuentasPagar::findOrFail($id);
        $propietarios = Propietario::all();
        $contratos = Contrato::all();
        $alquilers = Alquiler::all();
        return view('admin.cuentas-pagar.edit', compact('cuentaspagar','propietarios','contratos','alquilers'));
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

        $cuentaspagar = CuentasPagar::findOrFail($id);
        $cuentaspagar->update($requestData);

        return redirect('admin/cuentas-pagar')->with('flash_message', 'CuentasPagar updated!');
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
        CuentasPagar::destroy($id);

        return redirect('admin/cuentas-pagar')->with('flash_message', 'CuentasPagar deleted!');
    }
}
