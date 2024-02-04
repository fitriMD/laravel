@extends('employee.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Data Employee
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
                <form method="post" action="{{ url('employee-update/' .$employee->ID) }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="FIRSTNAME">FIRSTNAME</label>
                        <input type="text" name="FIRSTNAME" class="form-control" id="FIRSTNAME" value="{{ $employee->FIRSTNAME }}" aria-describedby="FIRSTNAME">
                    </div>
                    <div class="form-group">
                        <label for="LASTNAME ">LASTNAME </label>
                        <input type="text" name="LASTNAME" class="form-control" id="LASTNAME" value="{{ $employee->LASTNAME }}" aria-describedby="LASTNAME">
                    </div>
                    <div class="form-group">
                        <label for="GENDER">GENDER</label> 
                        <select class="form-control" id="GENDER" name="GENDER">
                            <option value="Male" @php if ( $employee->GENDER == "Male" ) echo 'selected="selected"'; @endphp>Male</option>
                            <option value="Female" @php if ( $employee->GENDER == "Female" ) echo 'selected="selected"'; @endphp>Female</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ADDRESS">ADDRESS</label>
                        <input type="text" name="ADDRESS" class="form-control" id="ADDRESS" value="{{ $employee->ADDRESS }}" aria-describedby="ADDRESS">
                    </div>
                    <div class="form-group">
                        <label for="DOB">DOB</label>
                        <input type="date" name="DOB" class="form-control" id="DOB" value="{{ $employee->DOB }}" aria-describedby="DOB">
                    </div>
                    <div class="form-group">
                        <label for="DEPT_ID">DEPT</label> 
                        <select class="form-control" id="DEPT_ID" name="DEPT_ID">
                            @foreach($department as $dpt)
                            <option value="{{$dpt->ID}}" @php if ( $dpt->ID == $employee->DEPT_ID ) echo 'selected="selected"'; @endphp>{{ $dpt->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="STATUS">STATUS</label> 
                        <select class="form-control" id="STATUS" name="STATUS">
                            <option value="cont" @php if ( $employee->STATUS == "cont" ) echo 'selected="selected"'; @endphp>Contract</option>
                            <option value="emp" @php if ( $employee->STATUS == "emp" ) echo 'selected="selected"'; @endphp>Employee</option>      
                            <option value="not_act" @php if ( $employee->STATUS == "not_act" ) echo 'selected="selected"'; @endphp>Not Active</option>                                                  
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection