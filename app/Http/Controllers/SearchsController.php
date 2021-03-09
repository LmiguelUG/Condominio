<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Search;
use Illuminate\Http\Request;

class SearchsController extends Controller
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
            $searchs = Search::where('date', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('keyword_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $searchs = Search::latest()->paginate($perPage);
        }

        return view('searchs.index', compact('searchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('searchs.create');
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
        $this->validate($request, [
			'date' => 'required',
			'user_id' => 'required',
			'keyword_id' => 'required'
		]);
        $requestData = $request->all();
        
        Search::create($requestData);

        return redirect('searchs')->with('flash_message', 'Search added!');
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
        $search = Search::findOrFail($id);

        return view('searchs.show', compact('search'));
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
        $search = Search::findOrFail($id);

        return view('searchs.edit', compact('search'));
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
        $this->validate($request, [
			'date' => 'required',
			'user_id' => 'required',
			'keyword_id' => 'required'
		]);
        $requestData = $request->all();
        
        $search = Search::findOrFail($id);
        $search->update($requestData);

        return redirect('searchs')->with('flash_message', 'Search updated!');
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
        Search::destroy($id);

        return redirect('searchs')->with('flash_message', 'Search deleted!');
    }
}
