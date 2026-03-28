<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        a, button {
            padding: 6px 12px;
            text-decoration: none;
            margin: 2px;
        }
        .add-btn {
            background: green;
            color: white;
        }
        .edit-btn {
            background: orange;
            color: white;
        }
        .delete-btn {
            background: red;
            color: white;
            border: none;
            cursor: pointer;
        }
        .logout-btn {
            background: gray;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Books List</h2>

    <a href="{{ route('books.create') }}" class="add-btn">Add Book</a>

    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year Published</th>
            <th>Actions</th>
        </tr>

        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->year_published }}</td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}" class="edit-btn">Edit</a>

                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>