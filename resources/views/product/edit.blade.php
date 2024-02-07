<x-layouts.app title="edit data">
    <h2 class="my-3">Form Edit Data</h2>
    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" autofocus
                    value="{{ $product->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="qty" class="col-sm-2 col-form-label">Kuantiti</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="qty" name="qty" value="{{ $product->qty }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Foto Produk</label>
            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ asset('storage/' . $product->photo) }}"
                height="100" width="100">
            <div class="col-sm-10 mt-4">
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </div>
    </form>
</x-layouts.app>
