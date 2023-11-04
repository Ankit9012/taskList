@extends('layouts.app')


@section('content')
    {{ $errors }}
    <form action="{{ route('task.create') }}" method="POST">
        @csrf


        <input type="text" name='title'>
        <input type="text" name='description'>
        <input type="text" name='long_description'>
        <input type="submit" value="Save Task">


    </form>
@endsection
