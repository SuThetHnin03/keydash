@extends('admin.layout.master')
@section('content')
<div class="lessons">
<form action="{{route('addLessons')}}" method="POST">
    @csrf
    <textarea name="lesson" id="" cols="30" rows="10"></textarea>
    <select id="level">
        <option value="b">Beginner</option>
        <option value="i">Intermediate</option>
        <option value="a">Advanced</option>
    </select>
    <select name="lvl_lessons" id="lvl-lessons"></select>
    <input type="submit" value="Add">
</form>
</div>
@endsection
