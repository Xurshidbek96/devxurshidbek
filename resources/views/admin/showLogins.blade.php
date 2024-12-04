@extends('admin.layouts.layout')

@section('logins')
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
						<h3>Logins : {{ $login->ip }}</h3>
                        <form action="#" method="GET">
                            <input type="date" name="date" value="{{$date}}">
                            <input type="submit" value="Filter">
                        </form>

					</div>
					<table>
						<thead>
							<tr>
								<th>№</th>
                                <th>User</th>
                                <th>Agent</th>
                                <th>URL</th>
                                <th>Login Date</th>

							</tr>
						</thead>
						<tbody>
							@if (count($logins) == 0)
					          <tr>
					            <td colspan="5" class="h5 text-center text-muted">No messages</td>
					          </tr>
					        @endif
					        @foreach($logins as $item)
								<tr>
									<td>{{++$loop->index}}</td>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->user_agent}}</td>
                                    <td>{{$item->url}}</td>
                                    <td>{{$item->login_at}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$logins->links()}}
				</div>

			</div>
		</main>
		<!-- MAIN -->

@endsection
