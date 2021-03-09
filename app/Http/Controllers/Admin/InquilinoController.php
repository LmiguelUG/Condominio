<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inquilino;
use App\Condominio;
use Illuminate\Http\Request;

class InquilinoController extends Controller
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
            $inquilino = Inquilino::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('apellidos', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $inquilino = Inquilino::latest()->paginate($perPage);
        }

        return view('admin.inquilino.index', compact('inquilino'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $condominios = Condominio::all();
        return view('admin.inquilino.create',compact('condominios'));
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

        Inquilino::create($requestData);

        return redirect('admin/inquilino')->with('flash_message', 'Inquilino added!');
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
        $inquilino = Inquilino::findOrFail($id);

        return view('admin.inquilino.show', compact('inquilino'));
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
        $inquilino = Inquilino::findOrFail($id);
        $condominios = Condominio::all();
        return view('admin.inquilino.edit', compact('inquilino','condominios'));
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

        $inquilino = Inquilino::findOrFail($id);
        $inquilino->update($requestData);

        return redirect('admin/inquilino')->with('flash_message', 'Inquilino updated!');
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
        Inquilino::destroy($id);

        return redirect('admin/inquilino')->with('flash_message', 'Inquilino deleted!');
    }
}
