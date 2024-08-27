<!DOCTYPE html>
<html>
<head>
    <title>Edit Salat Time</title>
</head>
<body>
    <h1>Edit Salat Time</h1>
    <form action="{{ route('salat-times.update', $salatTime) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="prayer">Prayer:</label>
        <input type="text" id="prayer" name="prayer" value="{{ $salatTime->prayer }}" required>
        <br>
        <label for="time">Time:</label>
        <input type="text" id="time" name="time" value="{{ $salatTime->time }}" required placeholder="HH:MM">
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('salat-times.index') }}">Back to List</a>
</body>
</html>
