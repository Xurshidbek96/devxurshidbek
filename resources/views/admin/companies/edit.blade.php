@extends('admin.layouts.layout')

@section('companies')
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
                        <a class="create__btn" href="{{route('companies.index')}}"> <i class='bx bx-arrow-back'></i>Back</a>

                    </div>

                    <form class="create__inputs" action="{{route('companies.update', $company->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <strong> company name :</strong>
                        <input type="text" name="name" value="{{ $company->name }}" class="form-control"> <br>

                        <strong> Title :</strong>
                        <input type="text" name="title" value="{{ $company->title }}" class="form-control"> <br>

                        <strong>  Link :</strong>
                        <input type="text" name="link" value="{{ $company->link }}" class="form-control"> <br>

                        <strong> Image :</strong>
                        <input type="file" name="img" class="form-control"> <br>
                        <img src="{{ $company->img }}" alt="" width="100px">

                        <input type="submit" value="Submit">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->
@endsection
