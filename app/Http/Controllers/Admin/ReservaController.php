<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reserva;
use App\Condominio;
use Illuminate\Http\Request;

class ReservaController extends Controller
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
            $reserva = Reserva::where('idcondominio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $reserva = Reserva::latest()->paginate($perPage);
        }

        return view('admin.reserva.index', compact('reserva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $condominios = Condominio::all();
        return view('admin.reserva.create',compact('condominios'));
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

        Reserva::create($requestData);

        return redirect('admin/reserva')->with('flash_message', 'Reserva added!');
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
        $reserva = Reserva::findOrFail($id);

        return view('admin.reserva.show', compact('reserva'));
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
        $reserva = Reserva::findOrFail($id);
        $condominios = Condominio::all();
        return view('admin.reserva.edit', compact('reserva','condominios'));
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

        $reserva = Reserva::findOrFail($id);
        $reserva->update($requestData);

        return redirect('admin/reserva')->with('flash_message', 'Reserva updated!');
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
        Reserva::destroy($id);

        return redirect('admin/reserva')->with('flash_message', 'Reserva deleted!');
    }
}
