<div class="table-responsive mt-4">
    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered no-footer text-sm" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Semester</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student as $key => $value)
                        <tr>
                            <td>{{$value->student_name}}</td>
                            <td>{{$value->student_roll}}</td>
                            <td>{{$value->className->class_name}}</td>
                            <td>{{$value->student_phone}}</td>
                            <td>
                                @if($value->status == 1)
                                <span class="text text-success">Active</span>
                                @else
                                <span class="text text-danger">Inactive</span>
                                @endif
                            </td> 
                            <td>
                                @if($value->status==1)
                                <button class="btn btn-outline-success btn-sm status" id="status" data="{{$value->student_id}}"><i class="fas fa-sync"></i></button>
                                @else
                                <button class="btn btn-outline-info btn-sm status" id="status" data="{{$value->student_id}}"><i class="fas fa-sync"></i></button>
                                @endif
                                <button class="btn btn-outline-danger btn-sm" id="delete" data-csrf="{{csrf_token()}}" data="{{$value->student_id}}"><i class="fas fa-trash"></i></button>
                                <button type="button" class="btn btn-outline-info btn-sm edit" id="edit" data="{{$value->student_id}}" data-toggle="modal" data-target="#edit_student"><i class="fas fa-edit"></i></button>

                                <button type="button" class="btn btn-outline-secondary btn-sm view" data="{{$value->student_id}}" id="view" data-toggle="modal" data-target="#view_student"><i class=" fas fa-eye"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>  
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Semester</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>