@extends('layouts.appadmin')

@section('content') 
	<div class="container-fluid">  
		<div class="d-flex  justify-content-between mb-4">
        <a href="{{route('administrator.register')}}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah akun
        </a>
        <form>
            <div class="input-group"> 
                <input type="text" class="form-control bg-light border border-primary small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
		</div>  
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
		<div class="row mt-4">
			<div class="container">
				<div class="table-responsive"> 
				<table class="table border"> 
					<thead class="">
						<tr class="text-center">
							<th>#</th>
							<th>Nama Petugas</th> 
							<th>Username</th>  
							<th>Telp</th>
							<th>Level</th>
							<th>Action</th>
						</tr>
					</thead> 
					<tbody class="border">
						@foreach($data_akun as $akun)
						<tr class="text-center">
							<td>{{$loop->iteration}}</td>
							<td>{{$akun->nama_petugas}}</td> 
							<td>{{$akun->username}}</td>  
							<td>{{$akun->telp}}</td>
							<td>{{$akun->level}}</td>
							<td><a href="{{route('administrator.destroyAkun',$akun->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="text-center d-flex align-content-center justify-content-center">
				{!!$data_akun->render()!!} 
			</div>
			</div>
		</div>
	</div>
@endsection