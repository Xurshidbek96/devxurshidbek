<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::orderBy('id', 'DESC')->paginate(5);
        return view('admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(array(
            'img' => 'mimes:png,jpg|max:5000',
            'file' => 'mimes:pdf,png|max:2048',
        ));
        $requestData = $request->all();

        if($request->hasFile('img'))
            $requestData['img'] = $this->upload_file('img', 'files');

        if($request->hasFile('file'))
            $requestData['file'] = $this->upload_file('file', 'files');

        File::create($requestData);

        return redirect()->route('files.index')->with('success', 'Success done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);

        return view('admin.files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);

        return view('admin.files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {

        $request->validate(array(
            'img' => 'mimes:png,jpg|max:5000',
            'file' => 'mimes:pdf,png|max:2048',
        ));

        $requestData = $request->all();

        if($request->hasFile('img'))
        {
            $this->unlink_file($file->img);
            $requestData['img'] = $this->upload_file('img', 'files');
        }

        if($request->hasFile('file'))
        {
            $this->unlink_file($file->file);
            $requestData['file'] = $this->upload_file('file', 'files');
        }


        $file->update($requestData);

        return redirect()->route('files.index')->with('success', 'Update done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {

        $this->unlink_file($file->img);
        $this->unlink_file($file->file);
        $file->delete();
        return redirect()->route('files.index')->with('success', 'Delete done');
    }
}
