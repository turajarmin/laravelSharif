@extends('layouts.master')
@section('content')
    <section class="col-6 offset-3 mt-5">
        @if($errors->any())
            <section class="p-4 bg-danger">
                @foreach($errors->all() as $item)
                    <h3>{{$item}}</h3>
                @endforeach
            </section>
        @endif
    </section>
    <section class="col-6 offset-3 mt-5">
        <form action="{{route('Post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="form-group">
                <label for="title" class="form-check-label">title</label>
                <input type="text" id="title" name="title" class="form-control">
            </section>
            <section class="form-group">
                <label for="image" class="form-check-label">image</label>
                <input type="file" id="image" name="image" class="form-control">
            </section>
            <section class="form-group">
                <label for="description" class="form-check-label">description</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-info form-control">
            </section>
        </form>
    </section>
@endsection
