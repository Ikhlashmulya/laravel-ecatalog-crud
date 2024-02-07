<x-layouts.app title="create data">
    <h2 class="my-3">Form Tambah Data</h2>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" autofocus required>
            </div>
        </div>
        <div class="form-group row">
            <label for="qty" class="col-sm-2 col-form-label">Kuantiti</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="qty" name="qty">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price">
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Foto Produk</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
    </form>
</x-layouts.app>
