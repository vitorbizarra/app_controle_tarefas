@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        Tarefas
                        <a href="{{ route('tarefa.create') }}" class="btn btn-outline-primary ms-auto">Novo</a>
                        <a href="{{ route('tarefa.exportacao', ['ext' => 'xlsx']) }}"
                            class="btn btn-outline-success ms-2">XLSX</a>
                        <a href="{{ route('tarefa.exportacao', ['ext' => 'csv']) }}"
                            class="btn btn-outline-success ms-2">CSV</a>
                        <a href="{{ route('tarefa.exportacao', ['ext' => 'pdf']) }}"
                            class="btn btn-outline-success ms-2">PDF</a>
                        <a href="{{ route('tarefa.exportar') }}" class="btn btn-outline-success ms-2" target="_blank">DomPDF</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tarefa</th>
                                    <th scope="col">Data limite de conclusão</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarefas as $tarefa)
                                    <tr>
                                        <th scope="row">{{ $tarefa->id }}</th>
                                        <td>{{ $tarefa->tarefa }}</td>
                                        <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                                        <td><a href="{{ route('tarefa.edit', ['tarefa' => $tarefa]) }}"
                                                class="btn btn-outline-primary">Editar</a></td>
                                        <td>
                                            <form id="form_{{ $tarefa->id }}" method="POST"
                                                action="{{ route('tarefa.destroy', ['tarefa' => $tarefa]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#"
                                                    onclick="document.getElementById('form_{{ $tarefa->id }}').submit()"
                                                    class="btn btn-outline-danger">Excluir</a>
                                        </td>

                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <nav>
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tarefas->previousPageUrl() }}">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <li class="page-item">
                                    <a class="page-link" href="{{ $tarefas->nextPageUrl() }}">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
