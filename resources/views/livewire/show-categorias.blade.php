<div>
    @foreach ($categorias as $categoria)
        {{ $categoria->nome }} - {{ $categoria->descricao }}
    @endforeach
</div>
