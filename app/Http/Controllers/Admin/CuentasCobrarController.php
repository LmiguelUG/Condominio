<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CuentasCobrar;
use App\Inquilino;
use App\Contrato;
use App\Alquiler;
use Illuminate\Http\Request;

class CuentasCobrarController extends Controller
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
            $cuentascobrar = CuentasCobrar::where('idinquilino', 'LIKE', "%$keyword%")
                ->orWhere('idcontrato', 'LIKE', "%$keyword%")
                ->orWhere('idalquiler', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cuentascobrar = CuentasCobrar::latest()->paginate($perPage);
        }

        return view('admin.cuentas-cobrar.index', compact('cuentascobrar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $inquilinos = Inquilino::all();
        $contratos = Contrato::all();
        $alquilers = Alquiler::all();
        return view('admin.cuentas-cobrar.create',compact('inquilinos','contratos','alquilers'));
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

        CuentasCobrar::create($requestData);

        return redirect('admin/cuentas-cobrar')->with('flash_message', 'CuentasCobrar added!');
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
        $cuentascobrar = CuentasCobrar::findOrFail($id);

        return view('admin.cuentas-cobrar.show', compact('cuentascobrar'));
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
        $cuentascobrar = CuentasCobrar::findOrFail($id);
        $inquilinos = Inquilino::all();
        $contratos = Contrato::all();
        $alquilers = Alquiler::all();
        return view('admin.cuentas-cobrar.edit', compact('cuentascobrar','inquilinos','contratos','alquilers'));
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

        $cuentascobrar = CuentasCobrar::findOrFail($id);
        $cuentascobrar->update($requestData);

        return redirect('admin/cuentas-cobrar')->with('flash_message', 'CuentasCobrar updated!');
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
        CuentasCobrar::destroy($id);

        return redirect('admin/cuentas-cobrar')->with('flash_message', 'CuentasCobrar deleted!');
    }
}
