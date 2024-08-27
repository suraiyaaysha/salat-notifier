<!DOCTYPE html>
<html>
<head>
    <title>Add Salat Time</title>
</head>
<body>
    <h1>Add Salat Time</h1>
    <form action="{{ route('salat-times.store') }}" method="POST">
        @csrf
        <label for="prayer">Prayer:</label>
        <input type="text" id="prayer" name="prayer" required>
        <br>
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required placeholder="HH:MM AM">
        <br>
        <button type="submit">Add</button>
    </form>
    <a href="{{ route('salat-times.index') }}">Back to List</a>
</body>
</html>
