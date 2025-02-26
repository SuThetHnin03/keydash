@extends('admin.layout.master')
@section('content')
<form action="{{route('addChallenges')}}" method="POST">
    @csrf
    <label for="challenges">Challenges</label>
    <input type="text" name="challenges">
    @error('challenges')
        <span style="color:red;">{{ $message }}</span>
    @enderror

    <label for="exp">Exp</label>
    <input type="number" name="exp">
    @error('exp')
        <span style="color:red;">{{ $message }}</span>
    @enderror

    <label for="time">Time</label>
    <input type="text" name="time">
    @error('time')
        <span style="color:red;">{{ $message }}</span>
    @enderror

    <input type="submit" value="Send">
</form>

@endsection
