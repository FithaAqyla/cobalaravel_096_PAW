<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use PDF;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_mahasiswa = \App\Models\Mahasiswa::where('nama','LIKE','%'. $request->cari.'%')->get();
        }else{
        $data_mahasiswa = \App\Models\Mahasiswa::all();
        }
        return view('mahasiswa.index',['data_mahasiswa' => $data_mahasiswa]);
    }
    public function create(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('Sukses','Data berhasil di Input!');
    }
    public function edit($id)
    {
        $data_mahasiswa= \App\Models\Mahasiswa::find($id);
        return view('mahasiswa.edit',['mahasiswa'=>$data_mahasiswa]);
    }
    public function update(Request $request,$id)
    {
        $data_mahasiswa= \App\Models\Mahasiswa::find($id);
        $data_mahasiswa->update($request->all());
        return redirect('mahasiswa')->with('Sukses','Data Berhasil diUpdate');
    }
    public function delete($id)
    {
        $data_mahasiswa= \App\Models\Mahasiswa::find($id);
        $data_mahasiswa->delete();
        return redirect('/mahasiswa')->with('Sukses','Data Berhasil dihapus');
    }
    public function exportPdf()
    {
        $data_mahasiswa= \App\Models\Mahasiswa::all();
        $pdf = PDF::loadview('export.mahasiswapdf',['mahasiswa' => $data_mahasiswa]);
        return $pdf->download('mahasiswa.pdf');
    }
}
