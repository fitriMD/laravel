@extends('employee.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>DATA KARYAWAN PT MULTI SPUNINDO JAYA, TBK</h2>
        </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk logout?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">pilih tombol "Logout" dibawah ini</div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-success" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right my-2">
            @if (Auth::user()->role=='admin')
            <a class="btn btn-success" href="/createEmployee">Input Karyawan</a>
            @endif
            <a class="btn btn-warning" href="/summary">Summary Report Employee</a>
            <a class="btn btn-dark" href="/summary">Summary Report Department</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table id="dfUsageTable" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>GENDER</th>
            <th>ADDRESS</th>
            <th>DOB</th>
            <th>DEPT</th>
            <th>STATUS</th>
            @if (Auth::user()->role=='admin')
            <th width="280px">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($employee as $data)
        <tr>
            <td>{{ $data->ID }}</td>
            <td>{{ $data->FIRSTNAME }}</td>
            <td>{{ $data->LASTNAME }}</td>
            <td>{{ $data->GENDER }}</td>
            <td>{{ $data->ADDRESS }}</td>
            <td>{{ $data->DOB }}</td>
            <td>{{ $data->NAME }}</td>
            <td>{{ $data->STATUS }}</td>
            @if (Auth::user()->role=='admin')
            <td>
                <form action="{{ url('employee/hapus/'. $data->ID) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('employee.show'. $data->ID) }}">Show</a> --}}
                    <a class="btn btn-primary" href="{{ url('employee/update/'.$data->ID) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <a href="{{ url('employee/hapus/'. $data->ID) }}" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda yakin untuk menghapus data ini ?')">Hapus</a>
                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('js')
<script>
    new DataTable('#dfUsageTable');
    // $('#dfUsageTable').DataTable({
    // });
</script>
@endpush