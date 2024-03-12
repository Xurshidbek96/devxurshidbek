@extends('admin.layouts.layout')

@section('projects')
active
@endsection

@section('content')

<!-- MAIN -->
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3> Show </h3>
                    <a class="create__btn" href="{{route('projects.index')}}"> <i class='bx bx-arrow-back'></i>Back</a>

                </div>

            </div>


            <div class="table-data">
                <div class="order">

                    <table>
                        <tbody>

                            <tr>
                                <td>
                                    <p>Project name : </p>
                                </td>
                                <td><b>{{ $project->name }}</b></td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Title : </p>
                                </td>
                                <td><b>{{ $project->title }}</b></td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Link : </p>
                                </td>
                                <td><b>{{ $project->link }}</b></td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Rasm : </p>
                                </td>
                                <td><img src="{{ $project->img }}" alt="" width="100px"></td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>

<!-- MAIN -->

@endsection
