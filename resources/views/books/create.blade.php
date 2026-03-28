<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>
<body>

    <h2>Add New Book</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label>Title:</label><br>
        <input type="text" name="title"><br><br>

        <label>Author:</label><br>
        <input type="text" name="author"><br><br>

        <label>Year Published:</label><br>
        <input type="number" name="year_published"><br><br>

        <button type="submit">Save</button>
    </form>

    <br>
    <a href="{{ route('books.index') }}">Back</a>

</body>
</html>