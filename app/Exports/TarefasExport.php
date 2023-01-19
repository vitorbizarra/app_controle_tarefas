<?php

namespace App\Exports;

use App\Models\Tarefa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class TarefasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Exportação de todas as tarefas do sistema
        // return Tarefa::all();

        // Exportação apenas das tarefas relacionadas ao respectivo usuário
        $user = User::find(auth()->user()->id);
        return $user->tarefas()->get();
    }
}
