@extends('admin.layouts.layout')

@section('files')
    active
@endsection

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- MAIN -->
        <main>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Edit</h3>
                        <a class="create__btn" href="{{route('files.index')}}"> <i class='bx bx-arrow-back'></i>Back</a>

                    </div>

                    <form class="create__inputs" action="{{route('files.update', $file->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <strong> Title :</strong>
                        <input type="text" name="title" value="{{ $file->title }}" class="form-control"> <br>

                        <strong> Resume file :</strong>
                        <input type="file" name="file" class="form-control"> <br>
                        {{-- <a href="/files/{{ $file->file }}" target="_blank">Donwnload</a> --}}

                        <strong> Image :</strong>
                        <input type="file" name="img" class="form-control"> <br>
                        <img src="/images/{{ $file->img }}" alt="" width="100px">

                        <input type="submit" value="Submit">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->
@endsection
