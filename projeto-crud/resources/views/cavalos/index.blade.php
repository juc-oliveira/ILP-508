<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cavalos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Cavalos</h1>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
        @endif
        <a href="{{ route('cavalos.create') }}" class="btn btn-success mb-3">Adicionar Cavalo</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Raça</th>
                    <th>Data Nascimento</th>
                    <th>CPF do Tutor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>@foreach ($cavalos as $cavalo)
                <tr>
                    <td>{{ $cavalo->id }}</td>
                    <td>{{ $cavalo->nome }}</td>
                    <td>{{ $cavalo->raca }}</td>
                    <td>{{ $cavalo->dtNasc }}</td>
                    <td>{{ $cavalo->cpfTutor }}</td>
                    <td>
                        <a href="{{ route('cavalos.show', $cavalo->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('cavalos.edit', $cavalo->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('cavalos.destroy', $cavalo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
    
</body>
</html>