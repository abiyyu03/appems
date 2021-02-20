@extends('layouts.apppetugas')

@section('content') 
<div class="container">      
	<div class="row mt-4  justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card card-body shadow-lg">
            <div class="card-body">
                <form class="user" action="{{route('petugas.petugasTanggapanStore')}}" method="POST" >
                    @csrf  
                    <input type="hidden" name="tanggal_tanggapan" value="{{Carbon\Carbon::today()}}">
                    <input type="hidden" name="pengaduan_id" value="{{request()->route('id')}}"> 
                    <div class="form-group">
                        <textarea class="form-control" name="tanggapan"rows=10></textarea>
                        @error('tanggapan')
                            <div class="alert-danger p-1 mt-1">
                                {{$message}}
                            </div>
                        @enderror
                    </div> 
                        <button type="submit" class="btn btn-primary btn-block">Tanggapi</button>  
                </form>
            </div>
        </div>
        </div>
    </div> 
</body>
@endsection