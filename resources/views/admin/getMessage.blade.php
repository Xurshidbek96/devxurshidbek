@extends('admin.layouts.layout')

@section('messages')
active
@endsection

@section('content')

<!-- MAIN -->
		<main>

            @if ($message = Session::get('success'))
        		<div class="alert alert-success">
            		<p>{{ $message }}</p>
        		</div>
    		@endif

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Messages</h3>


					</div>
					<table>
						<thead>
							<tr>
								<th>№</th>
								<th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if (count($getMessages) == 0)
					          <tr>
					            <td colspan="5" class="h5 text-center text-muted">No messages</td>
					          </tr>
					        @endif
					        @foreach($getMessages as $item)
								<tr>
									<td>{{++$loop->index}}</td>
									<td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>@if ($item->status == 0) <span class="badge bg-danger">Unseen</span> @else <span class="badge bg-success">Seen</span>@endif</td>
									<td>
										<form action="{{ route('deletetMessage',$item->id) }}" method="POST">

                                            <a class="btn btn-primary" href="{{ route('showMessage',$item->id) }}"><ion-icon name="eye-outline"></ion-icon></a>

						                    @csrf
						                    @method('DELETE')

						                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete? ?')"><ion-icon name="trash-outline"></ion-icon></button>

					                	</form>
					            	</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$getMessages->links()}}
				</div>

			</div>
		</main>
		<!-- MAIN -->

@endsection
