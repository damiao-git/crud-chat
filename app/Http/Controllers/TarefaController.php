<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = Tarefa::all();

        return response()->json($tarefas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $tarefa = Tarefa::create($request->all());

            return response()->json([$tarefa],201);
        }
        catch (\Exception $e) {
            return response()->json(["error"=> $e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

            //code...
            $tarefa = Tarefa::find($id);
            if($tarefa){
                return response()->json([$tarefa],302);
            }else{
                return response()->json(["error"=> "Não encontrada"],404);
            }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $tarefa = Tarefa::find($id);
            if($tarefa){
                $tarefa->update($request->all());
                return response()->json([$tarefa],200);
            }else{
                return response()->json(["error"=> "Não encontrada"],404);
            }
        } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::find($id);
        if($tarefa){
            $tarefa->delete();
            return response()->json([$tarefa],200);
        }else{
            return response()->json(["error"=> "Não encontrada"],404);
        }
    }
}
