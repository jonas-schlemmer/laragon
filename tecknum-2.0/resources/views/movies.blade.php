@extends('layout')

@section('title', 'tecknum | Recomendados')

@section('content')
<header>
    <div id="logo">
        <img src="{{ asset('images/logo.png') }}" alt="tecknum logo">
        <p>Recomendados</p>
    </div>

    <nav>
        <ul>
            <li class="search-bar">
                <input type="text" id="campoBusca" placeholder="Pesquisar"/>
            </li>
            <li id="usuarioLogado"></li>
            <li><a href="{{ url('/') }}">Sair</a></li>
        </ul>
    </nav>
</header>

<main>
    <section>
        <table>
            <thead id="barra-thead">
                <tr>
                    <th>TÍTULO</th>
                    <th>DESCRIÇÃO</th>
                    <th>DIRETOR</th>
                    <th>GÊNERO</th>
                    <th>ANO</th>
                    <th>DURAÇÃO</th>
                    <th>NOTA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filmes as $filme)
                <tr>
                    <td>{{ $filme->titulo }}</td>
                    <td>{{ $filme->descricao }}</td>
                    <td>{{ $filme->diretor }}</td>
                    <td>{{ $filme->genero }}</td>
                    <td>{{ $filme->ano }}</td>
                    <td>{{ $filme->duracao }}</td>
                    <td>{{ $filme->nota }}</td>
                    <td class="btn-option">
                        <!-- Botões editar/apagar, você pode implementar depois -->
                        <button class="btn-edit" title="Editar" data-id="{{ $filme->id }}">
                            ✏️
                        </button>
                        <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" title="Apagar" type="submit">
                                ❌
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>

<button id="botao-fixo">+</button>

<div id="modal-novo-item" class="modal">
    <div class="modal-conteudo">
        <h2 id="modalTitulo">Novo Filme</h2>

        <form id="formNovoFilme" action="{{ route('filmes.store') }}" method="POST">
            @csrf
            <input type="text" name="titulo" placeholder="Título" required />
            <input type="text" name="descricao" placeholder="Descrição" required />
            <input type="text" name="diretor" placeholder="Diretor" required />
            <input type="text" name="genero" placeholder="Gênero" required />
            <input type="number" name="ano" placeholder="Ano" required />
            <input type="text" name="duracao" placeholder="Duração (ex: 120 min)" required />
            <input type="number" name="nota" placeholder="Nota (ex: 8.5)" step="0.1" min="0" max="10" required />
            <div class="modal-botoes">
                <button type="submit">Salvar</button>
                <button type="button" id="cancelarModal">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    const botaoFixo = document.getElementById('botao-fixo');
    const modal = document.getElementById('modal-novo-item');
    const btnCancelar = document.getElementById('cancelarModal');

    botaoFixo.addEventListener('click', () => {
        modal.classList.add('show');
    });

    btnCancelar.addEventListener('click', () => {
        modal.classList.remove('show');
    });
</script>

@endsection
