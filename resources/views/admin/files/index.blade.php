@extends('admin.layouts.layout')

@section('files')
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
						<h3>My Files</h3>
                        @if(count($files) == 0)
						    <a class="create__btn" href="{{route('files.create')}}"> <i class='bx bxs-folder-plus'></i>Create</a>

                        @endif

					</div>
					<table>
						<thead>
							<tr>
								<th>№</th>
								<th>Title</th>
                                <th>Images</th>
                                <th>Resume</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if (count($files) == 0)
					          <tr>
					            <td colspan="5" class="h5 text-center text-muted">Ma'lumot kiritilmagan</td>
					          </tr>
					        @endif
					        @foreach($files as $item)
								<tr>
									<td>{{++$loop->index}}</td>
									<td>{{$item->title}}</td>
                                    <td><img src="/images/{{ $item->img }}" alt="" width="100px"></td>
                                    <td><a href="/files/{{ $item->file }}" target="_blank">Donwnload</a></td>
									<td>
										<form action="{{ route('files.destroy',$item->id) }}" method="POST">

                                            <a class="btn btn-primary" href="{{ route('files.show',$item->id) }}"><ion-icon name="eye-outline"></ion-icon></a>
						                    <a class="btn btn-primary" href="{{ route('files.edit',$item->id) }}"><ion-icon name="create-outline"></ion-icon></a>

						                    @csrf
						                    @method('DELETE')

						                    <button type="submit" class="btn btn-danger" onclick="return confirm('O`chirmoqchimisiz ?')"><ion-icon name="trash-outline"></ion-icon></button>

					                	</form>
					            	</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$files->links()}}
				</div>

			</div>
		</main>
		<!-- MAIN -->

@endsection
