

@extends('layout')

@section('title', 'Editar Filme')

@section('content')
<h1>Editar Filme</h1>

<form action="{{ route('filmes.update', $filme->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $filme->titulo) }}" required />

    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" value="{{ old('descricao', $filme->descricao) }}" required />

    <label for="diretor">Diretor:</label>
    <input type="text" id="diretor" name="diretor" value="{{ old('diretor', $filme->diretor) }}" required />

    <label for="genero">Gênero:</label>
    <input type="text" id="genero" name="genero" value="{{ old('genero', $filme->genero) }}" required />

    <label for="ano">Ano:</label>
    <input type="number" id="ano" name="ano" value="{{ old('ano', $filme->ano) }}" required />

    <label for="duracao">Duração:</label>
    <input type="text" id="duracao" name="duracao" value="{{ old('duracao', $filme->duracao) }}" required />

    <label for="nota">Nota:</label>
    <input type="number" id="nota" name="nota" step="0.1" min="0" max="10" value="{{ old('nota', $filme->nota) }}" required />

    <button type="submit">Salvar</button>
    <a href="{{ route('filmes.index') }}">Cancelar</a>
</form>
@endsection
