<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToolRequest;
use App\Tool;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tools = Tool::latest('published_at')->published()->get();

        return view('tools.index')->with('tools', $tools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ToolRequest $request
     * @return Response
     */
    public function store(ToolRequest $request)
    {
        $tool = new Tool($request->all());

        Auth::user()->tools()->save($tool);

        return redirect('tools');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tool = Tool::findOrFail($id);

        return view('tools.show')->with('tool', $tool);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tool = Tool::findOrFail($id);
        return view('tools.edit')->with('tool', $tool);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ToolRequest $request
     * @return Response
     */
    public function update($id, ToolRequest $request)
    {
        $tool = Tool::findOrFail($id);

        $tool->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
