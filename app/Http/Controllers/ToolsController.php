<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToolRequest;
use App\Tag;
use App\Tool;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ToolsController extends Controller
{

    /**
     * Create a new tools controller instance.
     */
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
        /*
         * first argument is the Value for the array and the second is the Key.
         * In this case the key is the ID and the value will be whatever is in the NAME field.
         */
        $tags = Tag::lists('name', 'id');
        return view('tools.create')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ToolRequest $request
     * @return Response
     */
    public function store(ToolRequest $request)
    {
        $this->createTool($request);

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
        $tags = Tag::lists('name', 'id');

        return view('tools.edit')->with(['tool' => $tool, 'tags' => $tags]);
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

        if ($request->input('tag_list') != null)
        {
            $this->syncTags($tool, $request->input('tag_list'));
        }

        return redirect('tools');
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

    /**
     * Sync up the list of tags in the database.
     *
     * @param Tool $tool
     * @param array $tags
     * @internal param ToolRequest $request
     */
    public function syncTags(Tool $tool, array $tags = null)
    {
        $tool->tags()->sync($tags);
    }

    /*
     * this whole method was inside STORE method.
     * when we were cleaning the code we extracted it.
     *
     * Save a new tool.
     *
     * @param ToolRequest $request
     * @return mixed
     */
    private function createTool(ToolRequest $request)
    {
        /*
         *  create the tool and associate it with the authenticated user.
         */
        $tool = Auth::user()->tools()->create($request->all());

        /*
         * the input('tags') gets the KEYs of the array that is sent. Which are the IDs.
         *
         * the attach will associate this tool wit the tags passed trough.
         */
        //$tool->tags()->attach($request->input('tag_list'));

        /*
         * we are not using the top commented command because we made a method
         * that is doing it for us and it looks cleaner.
         */
        if ($request->input('tag_list') != null)
        {
            $this->syncTags($tool, $request->input('tag_list'));
        }

        return $tool;
    }
}
