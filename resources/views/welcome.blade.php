<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">
    <title>Praktek Crud PWL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>List Category</h3>
                        </div>
                        <div class="card-body">
                            @if (session('success1'))
                            <div class="alert alert-success">{{session('success1') }}</div>
                            @endif
                            @if (session('error1'))
                            <div class="alert alert-danger">{{session('error1') }}</div>
                            @endif
                            <p>
                            <a class="btn btn-primary" href="{{route('categories.create') }}">New Category</a>
                            </p>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                    <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->kode }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-secondary btn-sm">edit</a>

                                    <a href="#" class="btn btn-sm btn-danger" onclick=" event.preventDefault();
                                    if (confirm('Do you want to remove this?')){
                                    document.getElementById('delete-row-{{ $category->id}}').submit();}">
                                    delete
                                    </a>
                                    <form id="delete-row-{{$category->id }}" action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    </form>
                                    </td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <td colspan="6">
                                    No record found!
                                    </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>List Product</h3>
                        </div>
                        <div class="card-body">
                            @if (session('berhasil'))
                            <div class="alert alert-success">{{session('berhasil') }}</div>
                            @endif
                            @if (session('error2'))
                            <div class="alert alert-danger">{{session('error2') }}</div>
                            @endif
                            <p>
                            <a class="btn btn-primary" href="{{route('products.create') }}">New Product</a>
                            </p>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->kode }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>
                                    <a href="{{ route('products.edit',['id' => $product->id]) }}" class="btn btn-secondary btn-sm">edit</a>

                                    <a href="#" class="btn btn-sm btn-danger" onclick=" event.preventDefault();
                                    if (confirm('Do you want to remove this?')) {
                                    document.getElementById('{{ $product->id}}').submit();}">
                                    delete
                                    </a>
                                    <form id="{{$product->id }}" action="{{ route('products.destroy', ['id'=> $product->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    </form>
                                    </td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <td colspan="6">
                                    No record found!
                                    </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>