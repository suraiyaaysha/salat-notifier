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
        <input type="text" id="prayer" name="prayer" value="{{ old('prayer', $salatTime->prayer) }}" required>
        <br>
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" value="{{ old('time', $salatTime->time) }}" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('salat-times.index') }}">Back to List</a>
</body>
</html>
