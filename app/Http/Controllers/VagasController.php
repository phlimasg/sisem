<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\vagas;
use App\Model\turmas;

class VagasController extends Controller
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
        return view('vagas.vagas_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->valida($request);
        $vagas = new vagas($request->only(['quantidade','aula_data_id']));
        $vagas->save();        
        foreach ($request->turma as $i) {
            $turmas = new turmas();
            $turmas->turma = $i;
            $turmas->vaga_id = $vagas->id;
            $turmas->save();
        }
        return redirect()->route('datas.show', ['id' => $request->aula_data_id]);
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function valida(Request $request){
        $request->validate([
            'aula_data_id' => 'required|integer',
            'turma' => 'required|array|min:1',
            'quantidade' => 'required|integer',            
        ]);
    }
}
