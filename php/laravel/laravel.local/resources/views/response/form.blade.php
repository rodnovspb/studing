<form action="getform">
    <input type="text" name="name" value="{{ old('name') }}">
    <input type="text" name="surname" value="{{ old('surname') }}">
    <input type="password" name="password" value="{{ old('password') }}">
    <input type="submit">
</form>
