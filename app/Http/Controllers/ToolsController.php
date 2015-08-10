<?php

namespace App\Http\Controllers;

use App\Fileentry;
use App\Http\Requests\ToolRequest;
use App\Tag;
use App\Tool;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class ToolsController extends Controller {

    /**
     * Create a new tools controller instance.
     */
    public function __construct()
    {
        $this->middleware('manager', ['except' => ['index', 'show', 'showImage']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$tools = Tool::latest('published_at')->published()->get();

        return view('tools.index');
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

        $message = 'New tool has been created.';

        return view('tools.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
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

        $message = 'The Tool '. $tool->name .' has been edited successfully!';

        return view('tools.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $tool = Tool::findOrFail($id);

        $images = $tool->images;
        foreach($images as $image)
        {
            Storage::disk('local')->delete($image->filename. '.' .$this->findExtension($image));
        }

        $tool->delete();

        $message = 'Tool '. $tool->name. ' has been deleted.';

        return view('tools.index')->with('message', $message);
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

    /**
     * Save the image for the given tool.
     *
     * @param $file
     * @param Tool $tool
     */
    public function saveImage($file, Tool $tool)
    {
        $image = array('filename' => $file->getFilename(), 'mime' => $file->getClientMimeType());

        $extension = $this->findExtension($image);
        $imageName = $image['filename'] . '.' . $extension;

        Storage::disk('local')->put($imageName, File::get($file));

        $tool->images()->create($image);
    }

    /**
     * Find the images for display for the given tool.
     *
     * Response explanation:
     * http://laravel.com/docs/5.1/responses
     *
     * HttpStatusCode Enumeration
     * https://msdn.microsoft.com/en-us/library/system.net.httpstatuscode.aspx
     *
     * @param $id
     * @return $file
     */
    public function showImage($id)
    {
        $image = Fileentry::findOrFail($id);
        $extension = $this->findExtension($image);
        $file = Storage::disk('local')->get($image['filename']. '.' .$extension);

        return ($file);

        // this return was used in the tutorial but it is not working for me.
        // I do not know why. But the return I used is fine.
        // http://www.codetutorial.io/laravel-5-file-upload-storage-download/

        //return (new Response($file, 200))->header('Content-Type', $image['mime']);
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
         * in Tool.php that is doing it for us and it looks cleaner.
         */
        if ($request->input('tag_list') != null)
        {
            $this->syncTags($tool, $request->input('tag_list'));
        }

        if ($request->hasFile('image'))
        {
            $images = $request->file('image');
            foreach ($images as $image)
            {
                $this->saveImage($image, $tool);
            }
        }

        return $tool;
    }

    /**
     * @param $image
     * @return string
     */
    public function findExtension($image)
    {
        return substr($image['mime'], strpos($image['mime'], '/') + 1, strlen($image['mime']));
    }
}
