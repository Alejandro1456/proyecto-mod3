<?php

namespace App\Http\Controllers;

use App\Imports\InstitutoImport;
use App\Models\Instituto;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InstitutoExport;
/**
 * Class InstitutoController
 * @package App\Http\Controllers
 */
class InstitutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutos = Instituto::paginate();

        return view('instituto.index', compact('institutos'))
            ->with('i', (request()->input('page', 1) - 1) * $institutos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instituto = new Instituto();
        return view('instituto.create', compact('instituto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Instituto::$rules);

        $instituto = Instituto::create($request->all());

        return redirect()->route('institutos.index')
            ->with('success', 'Instituto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instituto = Instituto::find($id);

        return view('instituto.show', compact('instituto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instituto = Instituto::find($id);

        return view('instituto.edit', compact('instituto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Instituto $instituto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instituto $instituto)
    {
        request()->validate(Instituto::$rules);

        $instituto->update($request->all());

        return redirect()->route('institutos.index')
            ->with('success', 'Instituto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $instituto = Instituto::find($id)->delete();

        return redirect()->route('institutos.index')
            ->with('success', 'Instituto deleted successfully');
    }
//qr
    public function generate ($id)
    {
        $data = Instituto::findOrFail($id);
    
       $qrcode = QrCode::size(400)->generate($data->materia);
        //echo $data;
        return view('instituto.generate',compact('qrcode'));
    }
//excel 
public function import()
{
    Excel::import(new InstitutoImport, request())->file('file');
    return back();
}

public function export()
{
    return Excel::download(new InstitutoExport, 'Instituto.xlsx');

}

}
