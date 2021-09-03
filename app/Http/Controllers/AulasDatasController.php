<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AulaDatas;
use App\Model\turmas;
use App\Model\vagas;

class AulasDatasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $aula = AulaDatas::find(1);        
        return view('aulas_datas.aulas_datas_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'aula_id' => 'required|integer',
            'sala' => 'required|string|max:150',
            'predio' => 'required|string|max:150',
            'dia' => 'required|date|max:150',
            'dia_libera' => 'required|date_format:d/m/Y H:i|max:150',
            'dia_bloqueia' => 'required|date_format:d/m/Y H:i|max:150',
            'aula_ini' => 'required|date_format:H:i|max:150',
            'aula_fim' => 'nullable|date_format:H:i|max:150',
        ]);
        $aula = new AulaDatas($request->only(['aula_id', 'sala', 'predio','dia','aula_ini','aula_fim']));
        $aula->dia_libera = date("Y-d-m H:i:s", strtotime($request->dia_libera));
        $aula->dia_bloqueia = date("Y-d-m H:i:s", strtotime($request->dia_bloqueia));
        $aula->save();
        return redirect()->route('aulas.show',['id'=>$request->aula_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = AulaDatas::find($id);
       
        $turmas = turmas::join('vagas','vagas_id','vagas.id')
        ->where('vagas.aula_data_id',$id)
        ->select('turmas.id','turma','quantidade','vagas_id')
        ->get();
        //dd($vagas,$turmas);
        return view('aulas_datas.aulas_datas_show', compact('datas','turmas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = AulaDatas::find($id);
        return view('aulas_datas.aulas_datas_edit',compact('data'));
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
        $request->validate([
            'sala' => 'required|string|max:150',
            'predio' => 'required|string|max:150',
            'dia' => 'required|date|max:150',
            'dia_libera' => 'required|date_format:d/m/Y H:i|max:150',
            'dia_bloqueia' => 'required|date_format:d/m/Y H:i|max:150',
            'aula_ini' => 'required|date_format:H:i|max:150',
            'aula_fim' => 'nullable|date_format:H:i|max:150',
        ]);
        AulaDatas::find($id)->update([
            'sala' => $request->sala,
            'predio' => $request->predio,
            'dia' => $request->dia,
            'dia_libera' => date("Y-d-m H:i:s", strtotime($request->dia_libera)),
            'dia_bloqueia' => date("Y-d-m H:i:s", strtotime($request->dia_bloqueia)),
            'aula_ini' => $request->aula_ini,
            'aula_fim' => $request->aula_fim,            
        ]);
        return redirect()->route('datas.show',['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AulaDatas::find($id)->delete();
        return redirect()->back();
    }
}
