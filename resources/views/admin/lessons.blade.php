@section('title')
<title> Add Lessons</title>
@endsection
@extends('admin.layout.master')
@section('content')

<style>
        .add{
        width: 35%;
        display: flex;
        flex-direction: column;
    }
</style>
<div class="lessons">
    <h1>Add Lessons</h1>
<form action="{{route('addLessons')}}" method="POST" class="add">
    @csrf
    <textarea name="lesson" id="" cols="30" rows="10"></textarea>
    <select name="lvl_lessons" id="lvl-lessons">
        <option value="1">Beginner</option>
        <option value="2">Intermediate</option>
        <option value="3">Advance</option>
        <option value="4">Content Focus</option>
        <option value="5">Typing Techniques</option>
    </select>
    <button type="submit" style="margin-top:10px;">Add</button>
</form>
</div>
@endsection
