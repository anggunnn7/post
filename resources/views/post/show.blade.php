@extends('layouts.app')
<!-- ini komentar perubahan kedua -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <ul>
                             <label class="font-weight-bold"> <img src="{{ asset('/storage/posts/'.$post->image) }}"></label>
                        </ul>
                        <ul>
                            <li ><label class="font-weight-bold">Tanggal posting : {{ $post->created_at}}</label></li>
                        </ul>
                        <ul>
                            <li ><label class="font-weight-bold">judul : {{ $post->title }}</label></li>
                        </ul>
                        <ul>
                            <li ><label class="font-weight-bold">Content : {{ $post->content }}</label></li>
                        </ul>
                        @include('post.komentar.show-komentar')
                        <div class="mt-4">
                            <form action="{{url('/posts/comment/store')}}" method="POST">
                                @csrf 
                                <input type="hidden" name="post_id" id="post_id"
                                value="{{ $post->id}}">
                             <div class="form-group">
                                <label class="font-weight-bold">Komentar</label>
                                <input type="text" class="from-control
                                  @error('komentar')
                                  is-invalid @enderror"
                                  name="komentar"
                                  placholder="Masukkan komentar post">

                                @error('komentar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div>
                        <button type="submit" class="btn btn-md btn-primary mb-4">SIMPAN</button>
                        </div>
                        </form>
                        <!--<button type="submit" class="btn btn-md btn-primary">BACK</button>-->
                        <a href="{{ url('/posts') }}" class="btn-danger btn-sm">BACK</a>
