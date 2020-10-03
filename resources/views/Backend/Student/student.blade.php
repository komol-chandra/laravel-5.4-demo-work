@extends('Backend.layouts.app')
@section('title', ' Student')
@section('head', 'Student')
@section('head_name', 'Student')
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
       <button type="button" class="btn btn-info margin-5 text-white" data-toggle="modal" data-target="#add_student">Add new</button><br><br>
       
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Student Datatable</h4><br>

                <div class="row mt-3">
                    <div class="col-md-4 mb-1">
                        <h5 class="card-title">Filer Data</h5>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select name="class_name" class="select2 form-control custom-select" id="filter_dept" onchange='datalist()'>
                            <option disabled selected hidden>Select Department</option>
                            @foreach($department as $vlaue)
                            <option value="{{$vlaue->department_id}}">{{$vlaue->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select name="class_name" class="select2 form-control custom-select" id="filter_blood" onchange='datalist()'>
                            <option disabled selected hidden>Select Blood</option>
                            @foreach($blood as $vlaue)
                            <option value="{{$vlaue->blood_id}}">{{$vlaue->blood_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="data_lists"></div>
            </div>
        </div>
    </div>
    </div>
</div>



<!-- Add Modal Start -->
<form method="post" id="student_form">{{ csrf_field() }}
    <div class="modal fade" id="add_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div class="form-group row">
                        <label for="student_name" class="col-sm-3 text-right control-label col-form-label">Name<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="student_name" class="form-control" id="student_name" placeholder="Name Here" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_roll" class="col-sm-3 text-right control-label col-form-label">Roll<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="student_roll" class="form-control" id="student_roll" placeholder="Roll Here" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="class_name" class="col-sm-3 text-right control-label col-form-label">Semester Name<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select name="class_name" class="select2 form-control custom-select" id="class_name" >
                                <option disabled selected hidden>Select</option>
                                @foreach($className as $vlaue)
                                <option value="{{$vlaue->class_id}}">{{$vlaue->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="department_name" class="col-sm-3 text-right control-label col-form-label">Department<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select name="department_name" class="select2 form-control custom-select" id="department_name" >
                                <option disabled selected hidden>Select</option>
                                @foreach($department as $vlaue)
                                <option value="{{$vlaue->department_id}}">{{$vlaue->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="blood_name" class="col-sm-3 text-right control-label col-form-label">Blood<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select name="blood_name" class="select2 form-control custom-select" id="blood_name" >
                                <option disabled selected hidden>Select</option>
                                @foreach($blood as $vlaue)
                                <option value="{{$vlaue->blood_id}}">{{$vlaue->blood_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender_name" class="col-sm-3 text-right control-label col-form-label">Gender<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select name="gender_name" class="select2 form-control custom-select" id="gender_name" >
                                <option disabled selected hidden>Select</option>
                                @foreach($gender as $vlaue)
                                <option value="{{$vlaue->gender_id}}">{{$vlaue->gender_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="father_name" class="col-sm-3 text-right control-label col-form-label">Father's Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Father's Name Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mother_name" class="col-sm-3 text-right control-label col-form-label">Mother's Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Mother's Name Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-3 text-right control-label col-form-label">Date of Birth</label>
                        <div class="col-sm-9">

                            <input type="date" id="date" name="birthday" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="student_email" class="form-control" id="student_email" placeholder="info@info.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_phone" class="form-control" id="student_phone" placeholder="018...........">
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="student_address" class="col-sm-3 text-right control-label col-form-label"> Address</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="student_address" id="student_address " rows="5" placeholder="address"></textarea>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="close" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Edit Modal Start -->
<form method="put" id="update_student_form">{{ csrf_field() }}
    <div class="modal fade" id="edit_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <input type="hidden" class="form-control" id="edit_student_id" name="student_id">
                    <div class="form-group row">
                        <label for="edit_student_name" class="col-sm-3 text-right control-label col-form-label">Name<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="student_name" class="form-control" id="edit_student_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_student_roll" class="col-sm-3 text-right control-label col-form-label">Roll<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="student_roll" class="form-control" id="edit_student_roll">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_class_name" class="col-sm-3 text-right control-label col-form-label">Semester Name<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select name="class_name" class="select2 form-control custom-select" id="edit_class_name" >
                                <option disabled selected hidden>Select</option>
                                @foreach($className as $vlaue)
                                <option value="{{$vlaue->class_id}}">{{$vlaue->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_department_name" class="col-sm-3 text-right control-label col-form-label">Department<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select name="department_name" class="select2 form-control custom-select" id="edit_department_name" >
                                <option disabled selected hidden>Select</option>
                                @foreach($department as $vlaue)
                                <option value="{{$vlaue->department_id}}">{{$vlaue->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_blood_name" class="col-sm-3 text-right control-label col-form-label">Blood<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select name="blood_name" class="select2 form-control custom-select" id="edit_blood_name" >
                                <option disabled selected hidden>Select</option>
                                @foreach($blood as $vlaue)
                                <option value="{{$vlaue->blood_id}}">{{$vlaue->blood_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_gender_name" class="col-sm-3 text-right control-label col-form-label">Gender<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select name="gender_name" class="select2 form-control custom-select" id="edit_gender_name" >
                                <option disabled selected hidden>Select</option>
                                @foreach($gender as $vlaue)
                                <option value="{{$vlaue->gender_id}}">{{$vlaue->gender_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_father_name" class="col-sm-3 text-right control-label col-form-label">Father's Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="father_name" class="form-control" id="edit_father_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_mother_name" class="col-sm-3 text-right control-label col-form-label">Mother's Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="mother_name" class="form-control" id="edit_mother_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-sm-3 text-right control-label col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" name="birthday" class="form-control" id="birthday">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_student_email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_email" class="form-control" id="edit_student_email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_student_phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_phone" class="form-control" id="edit_student_phone">
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="edit_student_address" class="col-sm-3 text-right control-label col-form-label"> Address</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="student_address" id="edit_student_address" rows="5"></textarea>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="close2" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- View Modal Start -->
<form method="post" id="view_student_form">
    <div class="modal fade" id="view_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <input type="hidden" class="form-control" id="view_student_id" name="student_id">
                    <div class="form-group row">
                        <label for="view_student_roll" class="col-sm-3 text-right control-label col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_roll" class="form-control" id="view_student_name" disabled >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="view_student_roll" class="col-sm-3 text-right control-label col-form-label">Roll</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_roll" class="form-control" id="view_student_roll" disabled >
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="view_department_name" class="col-sm-3 text-right control-label col-form-label">Department</label>
                        <div class="col-sm-9">
                            <select name="department_name" class="select2 form-control custom-select" id="view_department_name" disabled>
                                <option disabled selected hidden>Select</option>
                                @foreach($department as $vlaue)
                                <option value="{{$vlaue->department_id}}">{{$vlaue->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="view_blood_name" class="col-sm-3 text-right control-label col-form-label">Blood</label>
                        <div class="col-sm-9">
                            <select name="blood_name" class="select2 form-control custom-select" id="view_blood_name" disabled >
                                <option disabled selected hidden>Select</option>
                                @foreach($blood as $vlaue)
                                <option value="{{$vlaue->blood_id}}">{{$vlaue->blood_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="view_gender_name" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                        <div class="col-sm-9">
                            <select name="gender_name" class="select2 form-control custom-select" id="view_gender_name" disabled >
                                <option disabled selected hidden>Select</option>
                                @foreach($gender as $vlaue)
                                <option value="{{$vlaue->gender_id}}">{{$vlaue->gender_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="view_father_name" class="col-sm-3 text-right control-label col-form-label">Father's Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="father_name" class="form-control" id="view_father_name" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="view_mother_name" class="col-sm-3 text-right control-label col-form-label">Mother's Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="mother_name" class="form-control" id="view_mother_name" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="virw_birthday" class="col-sm-3 text-right control-label col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" name="virw_birthday" disabled class="form-control" id="view_birthday">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="view_student_email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="student_email" class="form-control" id="view_student_email" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="view_student_phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_phone" class="form-control" id="view_student_phone" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="view_student_address" class="col-sm-3 text-right control-label col-form-label"> Address</label>
                    <div class="col-sm-9">
                        <input type="text" name="student_address" class="form-control" id="view_student_address" disabled>
                        
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="close" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>



@endsection
@section('js')
<script src="{{asset('Backend_assets/ajax/student.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\StudentRequest') !!}
@endsection