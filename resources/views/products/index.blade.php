<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>

        <style>
            .alert-success {
                color: green;
            }

        </style>
    </head>
    <body>

        <h1>Current Products</h1>

        @if ($products->count())
        <ul>
            @foreach ($products as $product)
            <li>
                {{ $product->name }}
                <form action="{{ route('products.delete', ['product' => $product->id]) }}" method="POST">
                    @csrf
                    <button type="submit">delete</button>
                </form>
            </li>
            @endforeach
        </ul>
        @else
            <p><em>No products have been created yet.</em></p>
        @endif



        @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
        @endif



        <h2>New product</h2>
        <form action="{{ route('products.new') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name" /><br />
            <textarea name="description" placeholder="description"></textarea><br />
            <input type="text" name="tags" placeholder="tags" /><br />
            <button type="submit">Submit</button>
        </form>

    </body>
</html>
