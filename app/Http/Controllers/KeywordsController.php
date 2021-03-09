<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Keyword;
use Illuminate\Http\Request;

class KeywordsController extends Controller
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
            $keywords = Keyword::where('name', 'LIKE', "%$keyword%")
                ->orWhere('project_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $keywords = Keyword::latest()->paginate($perPage);
        }

        return view('keywords.index', compact('keywords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('keywords.create');
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
			'name' => 'required|max:10',
			'project_id' => 'required'
		]);
        $requestData = $request->all();
        
        Keyword::create($requestData);

        return redirect('keywords')->with('flash_message', 'Keyword added!');
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
        $keyword = Keyword::findOrFail($id);

        return view('keywords.show', compact('keyword'));
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
        $keyword = Keyword::findOrFail($id);

        return view('keywords.edit', compact('keyword'));
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
			'name' => 'required|max:10',
			'project_id' => 'required'
		]);
        $requestData = $request->all();
        
        $keyword = Keyword::findOrFail($id);
        $keyword->update($requestData);

        return redirect('keywords')->with('flash_message', 'Keyword updated!');
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
        Keyword::destroy($id);

        return redirect('keywords')->with('flash_message', 'Keyword deleted!');
    }
}
