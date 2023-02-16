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
        {
            $file = $request->file('img');
            $imageName = time().'-'.$file->getClientOriginalName();
            $file->move('images/', $imageName);
            $requestData['img'] = $imageName;
        }

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $fileName = time().'-'.$file->getClientOriginalName();
            $file->move('files/', $fileName);
            $requestData['file'] = $fileName;
        }

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
    public function update(Request $request, $id)
    {

        $request->validate(array(
            'img' => 'mimes:png,jpg|max:5000',
            'file' => 'mimes:pdf,png|max:2048',
        ));

        $requestData = $request->all();

        if($request->hasFile('img'))
        {
            $this->unlink_img($id);
            $file = $request->file('img');
            $imageName = time().'-'.$file->getClientOriginalName();
            $file->move('images/', $imageName);
            $requestData['img'] = $imageName;
        }

        if($request->hasFile('file'))
        {
            $this->unlink_file($id);
            $file = $request->file('file');
            $fileName = time().'-'.$file->getClientOriginalName();
            $file->move('files/', $fileName);
            $requestData['file'] = $fileName;
        }

        File::find($id)->update($requestData);

        return redirect()->route('files.index')->with('success', 'Update done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->unlink_file($id);
        $this->unlink_img($id);

        File::find($id)->delete();

        return redirect()->route('files.index')->with('success', 'Delete done');
    }

    // extra functions
    public function unlink_file($id){
        $file = File::find($id);
        if(isset($file->file) && file_exists(public_path('/files/'.$file->file))){
            unlink(public_path('/files/'.$file->file));
        }
    }

    public function unlink_img($id){
        $file = File::find($id);
        if(isset($file->img) && file_exists(public_path('/images/'.$file->img))){
            unlink(public_path('/images/'.$file->img));
        }
    }
}
