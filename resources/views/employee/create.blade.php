@extends('employee.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Data Employee
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ url('/createemployee') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="FIRSTNAME">FIRSTNAME</label>
                        <input type="text" name="FIRSTNAME" class="form-control" id="FIRSTNAME" aria-describedby="FIRSTNAME">
                    </div>
                    <div class="form-group">
                        <label for="LASTNAME ">LASTNAME </label>
                        <input type="text" name="LASTNAME" class="form-control" id="LASTNAME" aria-describedby="LASTNAME">
                    </div>
                    <div class="form-group">
                        <label for="GENDER">GENDER</label>
                        <select class="form-control" name="GENDER" id="exampleSelectGender">
                            <option selected disabled>GENDER</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ADDRESS">ADDRESS</label>
                        <input type="text" name="ADDRESS" class="form-control" id="ADDRESS" aria-describedby="ADDRESS">
                    </div>
                    <div class="form-group">
                        <label for="DOB">DOB</label>
                        <input type="date" name="DOB" class="form-control" id="DOB" aria-describedby="DOB">
                    </div>
                    <div class="form-group">
                        <label for="DEPT_ID">DEPT</label>
                        <select name="DEPT_ID" id="DEPT_ID" class="form-control">
                            <option selected disabled>DEPT</option>
                        @foreach($department as $dpt)
                            <option value="{{ $dpt->ID }}">{{ $dpt->NAME }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="STATUS">STATUS</label>
                        <select class="form-control" name="STATUS" id="exampleSelectGender">
                            <option selected disabled>STATUS</option>
                            <option value="cont">Contract</option>
                            <option value="emp">Employee</option>
                            <option value="not_act">Not Active</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection