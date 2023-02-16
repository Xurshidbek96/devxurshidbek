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
                        <h3>Project add</h3>
                        <a class="create__btn" href="{{route('files.index')}}"> <i class='bx bx-arrow-back'></i>Back</a>

                    </div>

                    <form class="create__inputs" action="{{route('files.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <strong> Title :</strong>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control"> <br>

                        <strong> Image :</strong>
                        <input type="file" name="img" class="form-control"> <br>

                        <strong> Resume :</strong>
                        <input type="file" name="file" class="form-control"> <br>

                        <input type="submit" value="Submit">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->

@endsection
