<x-layouts.app title="produk">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Insert Data</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Foto Produk</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Modify</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ asset($product->photo) }}"
                            width="50" height="50">
                    </td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('product.destroy', $product) }}"
                            onclick="return confirm('are you sure?')">delete</a>
                        <a class="btn btn-success" href="{{ route('product.edit', $product) }}">edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</x-layouts.app>
