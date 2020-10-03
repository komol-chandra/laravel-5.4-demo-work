$(document).ready(function(){
	$(this).on("submit","#student_form",function(e){
		e.preventDefault();
		let data = $(this).serializeArray();
		$.ajax({
			url:"student",
			data:data,
			type:"post",
			dataType:"json",
			success:function(response){
				toastr.success("Data added successfully", "Success!");
                $("#close").click();
                $("#student_form").trigger("reset");
            },
            error: function(error) {
                console.log(error);
            }
		})
	});
    
    $(this).on("click","#status",function(){
        let data = $(this).attr('data');
        $.ajax({
            url:`/student/show/${data}`,
            type:"get",
            dataType:"json",
            success:function(response){
                datalist();
                if (response.status === 0) {
                    toastr.success("status inactive", "Success!");
                } else {
                    toastr.success("status active", "Success!");
                }
            }
        })
    });
    $(this).on("click","#delete",function(){
        let data = $(this).attr('data');
        let csrf = $(this).attr('data-csrf');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:`/student/${data}`,
                    data:{"_token":csrf},
                    type:"delete",
                    dataType:"json",
                    success:function(response){
                        datalist();
                        toastr.success("Data deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary Data is safe!");
            }
        });
    });

    $(this).on("click","#view",function(){
        let data = $(this).attr("data");
        console.log("komols data =",data);
        $.ajax({
            url:`/studentView/${data}`,
            type:"get",
            dataType:"json",
            success:function(response){
                console.log(response);
                $('#view_student_id').val(response.student_id);
                $('#view_student_name').val(response.student_name);
                $('#view_student_roll').val(response.student_roll);
                $('#view_department_name').val(response.department_name);
                $('#view_blood_name').val(response.blood_name);
                $('#view_gender_name').val(response.gender_name);
                $('#view_father_name').val(response.father_name);
                $('#view_mother_name').val(response.mother_name);
                $('#view_birthday').val(response.birthday);
                $('#view_student_email').val(response.student_email);
                $('#view_student_phone').val(response.student_phone);
                $('#view_student_address').val(response.student_address);
            }
        })
    });

    $(this).on("click","#edit",function(){ 
        let data = $(this).attr("data");
        $.ajax({
            url:`/student/${data}/edit`,
            type:"get",
            dataType:"json",
            success:function(response){
                $('#edit_student_id').val(response.student_id);
                $('#edit_student_name').val(response.student_name);
                $('#edit_student_roll').val(response.student_roll);
                $('#edit_class_name').val(response.class_name);
                $('#edit_department_name').val(response.department_name);
                $('#edit_blood_name').val(response.blood_name);
                $('#edit_gender_name').val(response.gender_name);
                $('#edit_father_name').val(response.father_name);
                $('#edit_mother_name').val(response.mother_name);
                $('#birthday').val(response.birthday);
                $('#edit_student_email').val(response.student_email);
                $('#edit_student_phone').val(response.student_phone);
                $('#edit_student_address').val(response.student_address);
            }
        })
    });

    $(document).on("submit","#update_student_form",function(e){
        e.preventDefault();
        var id = $(this).attr("#student_id");
        var data = $(this).serializeArray();
        $.ajax({
            url: `/student/update`,
            data: data,
            type: "put",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("Data updated successfully", "Success!");
                $("#close2").click();
                $("#update_student_form").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
});


function datalist() {
    let dept=$("#filter_dept").val();
    let bg=$("#filter_blood").val();

    let page_link = `/student/create?dept=${dept ? dept : ""}&bg=${bg ? bg : ""}`;

    $.ajax({
        url: page_link,
        type: "get",
        datatype: "html",
        success: function(response) {
            $("#data_lists").html(response);
        }
    });
}