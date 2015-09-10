<h1>PRODUTOS</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>R$ {{ $product->price }}</td>
        </tr>
    @endforeach
</table>