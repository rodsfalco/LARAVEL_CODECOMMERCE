<h1>EXEMPLO</h1>

<ul>
    @foreach($categories as $category)
        <li>{{ $category->name }} - {{ $category->description }}</li>
    @endforeach
</ul>