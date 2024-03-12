@extends('admin.layouts.layout')

@section('messages')
active
@endsection

@section('content')

<!-- MAIN -->
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3> Show </h3>
                    <a class="create__btn" href="/getMessage"> <i class='bx bx-arrow-back'></i>Back</a>

                </div>

            </div>


            <div class="table-data">
                <div class="order">

                    <table>
                        <tbody>

                            <tr>
                                <td>
                                    <p>Name : </p>
                                </td>
                                <td><b>{{ $getMessage->name }}</b></td>
                            </tr>

                            <tr>
                                <td>
                                    <p>email : </p>
                                </td>
                                <td><b>{{$getMessage->email }}</b></td>
                            </tr>


                            <tr>
                                <td>
                                    <p>Message : </p>
                                </td>
                                <td><b>{{ $getMessage->message }}</b></td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>

<!-- MAIN -->

@endsection
