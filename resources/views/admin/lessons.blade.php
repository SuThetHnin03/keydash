@extends('admin.layout.master')
@section('content')
<div class="lessons">
<form action="{{route('addLessons')}}" method="POST">
    @csrf
    <textarea name="lesson" id="" cols="30" rows="10"></textarea>
    <select name="lvl_lessons" id="lvl-lessons">
        <option value="1">Beginner</option>
        <option value="2">Intermediate</option>
        <option value="3">Advance</option>
        <option value="4">Content Focus</option>
        <option value="5">Typing Techniques</option>
    </select>
    <input type="submit" value="Add">
</form>
</div>
@endsection
