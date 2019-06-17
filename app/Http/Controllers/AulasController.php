<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Aula;

class AulasController extends Controller
{
    public function index()
    {
        $aula = Aula::orderBy('created_at')->paginate(25);        
        return view('aulas.aulas_index', compact('aula'));
    }

    public function create()
    {
        return view('aulas.aulas_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'string|required|max:150',
            'disciplina' => 'string|nullable|max:150',
            'professor' => 'string|nullable|max:150'
        ]);

        $aula = new Aula($request->only(['tema', 'disciplina', 'professor']));        
        $aula->save();                
        return redirect()->route('datas.create',['id'=>$aula->id]);
    }

    public function show($id)
    {
        $aula = Aula::find($id);
        return view('aulas.aulas_show', compact('aula'));
    }

    public function edit($id)
    {
        $aula = Aula::find($id);
        return view('aulas.aulas_edit',compact('aula'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tema' => 'string|required|max:150',
            'disciplina' => 'string|nullable|max:150',
            'professor' => 'string|nullable|max:150'
        ]);
        Aula::find($id)->update([
            'tema' => $request->tema,
            'disciplina' => $request->disciplina,
            'professor' => $request->professor,            
        ]);
        return redirect()->route('aulas.show',['id' => $id]);
        
    }
    public function destroy($id)
    {
        Aula::destroy($id);
        return redirect()->back();
    }
}
