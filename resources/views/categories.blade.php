<h1>CATEGORIAS</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
    </tr>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
        </tr>
    @endforeach
</table>