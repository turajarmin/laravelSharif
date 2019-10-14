@extends('layouts.master')
@section('content')
    <section class="col-6 offset-3 mt-5">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>image</th>
                <th>text</th>
                <th>show</th>
                <th>delete</th>
                <th>update</th>
                <th>comments</th>
            </tr>
            </thead>
            <tbody>
            @foreach($post as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td><img src="{{asset('images/post/'.$item->image)}}" width="50px" height="50px" alt="{{$item->image}}"></td>
                <td>{{$item->text}}</td>
                <td><a href="{{route('Post.show',$item->id)}}">show</a></td>
                <td>
                    <form action="{{route('Post.destroy',$item->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                </td>
                <td><a href="{{route('Post.edit',$item->id)}}">edit</a></td>
                <td>{{$item->user->name}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <section class="col-6 offset-3">
            {{$post->links()}}
        </section>
    </section>
@endsection
