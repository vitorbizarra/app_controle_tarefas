<?php

namespace App\Exports;

use App\Models\Tarefa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
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

    public function headings(): array
    {
        return [
            'ID da Tarefa',
            'Tarefa',
            'Data Limite Conclusão',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->tarefa,
            date('d/m/Y', strtotime($row->data_limite_conclusao))
        ];
    }
}
