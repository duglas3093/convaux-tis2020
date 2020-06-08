<?php

namespace ConvAux\Http\Controllers\console\notice;

use Illuminate\Http\Request;
use ConvAux\Notice;
use ConvAux\Http\Requests;
use ConvAux\Http\Requests\StoreNoticeRequest;
use ConvAux\Http\Controllers\Controller;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['suadmin','admin']);
        $notices = Notice::all();
        return view('console.admin.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['suadmin','admin']);
        return view('console.admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticeRequest $request)
    {
        $request->user()->authorizeRoles(['suadmin','admin']);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        }
        if($request->hasFile('url')){
            $filedoc = $request->file('url');
            $namedoc = time().$file->getClientOriginalName();
            $filedoc->move(public_path().'/documents/',$namedoc);
        }
        $notice = new Notice();
        $notice->name = $request->input('name');
        $notice->description = $request->input('description');
        $notice->slug = $request->input('slug');
        $notice->image = $name;
        $notice->url = $namedoc;
        $notice->save();
        return redirect()->route('notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $request->user()->authorizeRoles(['suadmin','admin']);
        $notice = Notice::where('slug','=',$slug)->firstOrFail();
        return view('console.admin.notice.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $slug)
    {
        $request->user()->authorizeRoles(['suadmin','admin']);
        $notice = Notice::where('slug','=',$slug)->firstOrFail();
        return view('console.admin.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->user()->authorizeRoles(['suadmin','admin']);
        $notice = Notice::where('slug','=',$slug)->firstOrFail();
        
        $notice->fill($request->except('image'));//Aqui decimos que nos cargue todo menos el avatar
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $notice->image = $name;
            $file->move(public_path().'/images/', $name);
        }
        $notice->save();
        // return 'update';
        return redirect()->route('notice.show', [$notice])->with('status','El Aviso a sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $request->user()->authorizeRoles(['suadmin','admin']);
        $notice = Notice::where('slug','=',$slug)->firstOrFail();
        $file_path = public_path().'/images/'.$notice->image;
        \File::delete($file_path);
        $notice->delete();
        return redirect()->route('notice.index');
    }
}
