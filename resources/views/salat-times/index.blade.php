<!DOCTYPE html>
<html>
<head>
    <title>Salat Times</title>
</head>
<body>
    <h1>Salat Times</h1>
    <a href="{{ route('salat-times.create') }}">Add New Salat Time</a>
    <table border="1">
        <tr>
            <th>Prayer</th>
            <th>Time</th>
            <th>Actions</th>
        </tr>
        @foreach ($salatTimes as $salatTime)
        <tr>
            <td>{{ $salatTime->prayer }}</td>
            <td>{{ $salatTime->time }}</td>
            <td>
                <a href="{{ route('salat-times.edit', $salatTime) }}">Edit</a>
                <form action="{{ route('salat-times.destroy', $salatTime) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
