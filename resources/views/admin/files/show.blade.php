@extends('admin.layouts.layout')

@section('files')
active
@endsection

@section('content')

<!-- MAIN -->
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3> Show </h3>
                    <a class="create__btn" href="{{route('files.index')}}"> <i class='bx bx-arrow-back'></i>Back</a>

                </div>

            </div>


            <div class="table-data">
                <div class="order">

                    <table>
                        <tbody>

                            <tr>
                                <td>
                                    <p>Title : </p>
                                </td>
                                <td><b>{{ $file->title }}</b></td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Resume : </p>
                                </td>
                                <td><a href="/files/{{$file->file }}" download="">Donwnload</a></td>
                            </tr>


                            <tr>
                                <td>
                                    <p>Rasm : </p>
                                </td>
                                <td><img src="/images/{{ $file->img }}" alt="" width="100px"></td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>

<!-- MAIN -->

@endsection
