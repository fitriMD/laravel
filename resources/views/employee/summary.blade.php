@extends('employee.layout')
@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">STATUS</th>
            <th scope="col">Total Employee</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Contract</td>
            <td>{{ $cont }}</td>
        </tr>
        <tr>
            <td>Employee</td>
            <td>{{ $emp }}</td>
        </tr>
        <tr>
            <td>Not Active</td>
            <td>{{ $not_act }}</td>
        </tr>
        <tr>
            <td><b> Total</b></td>
            <td><b>{{ $total }}</b></td>
        </tr>
    </tbody>
</table>
<a class="btn btn-info" href="/daftarEmployee">Back</a>
@endsection