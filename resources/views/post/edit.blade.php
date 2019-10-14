@extends('layouts.master')
@section('content')
    <section class="col-6 offset-3 mt-5">
        <form action="{{route('Post.update',$post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <section class="form-group">
                <label for="title" class="form-check-label">title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{$post->title??old('title')}}">
            </section>
            <section class="form-group">
                <label for="image" class="form-check-label">image</label>
                <input type="file" id="image" name="image" class="form-control">
                <img src="{{asset('images/post/'.$post->image)}}" width="50px" height="50px" alt="">
            </section>
            <section class="form-group">
                <label for="description" class="form-check-label">description</label>
                <textarea name="description" class="form-control" id="description" >
                    {{$post->text}}
                </textarea>
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-info form-control">
            </section>
        </form>
    </section>
@endsection
