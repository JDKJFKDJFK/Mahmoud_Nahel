<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>

    <h2>Edit Book</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title:</label><br>
        <input type="text" name="title" value="{{ $book->title }}"><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" value="{{ $book->author }}"><br><br>

        <label>Year Published:</label><br>
        <input type="number" name="year_published" value="{{ $book->year_published }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('books.index') }}">Back</a>

</body>
</html>