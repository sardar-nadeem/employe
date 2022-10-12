$(document).on('submit','#saveStudent', function (e) {
            // alert("dhaksjdffhksdjfsdkhkj")
    e.preventDefault();

    formData = new FormData(this)
    formData.append('save_student',true)
    // alert('Save Student Calicked');
    $.ajax({
        type: "POST",
        url: "code.php",
        data:formData,
        processData:false,
        contentType:false,
        success: function (response) {
            var res = $.parseJSON(response)

            if(res.status == 200){
                $('#saveStudentModal').modal('hide');
                $('#saveStudent')[0].reset();
                $('#listOfStudent').load(location.href + " #listOfStudent")
                $('#myAlertMsg').html(res.message)
                $('#myAlertMsg').removeClass('d-none');
                setTimeout(()=>{
                    $('#myAlertMsg').addClass('d-none');
                },1000)


            }else if(res.status == 422){
                $('#myAlertMsg').html(res.message)
                $('#myAlertMsg').removeClass('d-none');
                // alert(res.message);
            }
            
        }
    });
    
});
// ==========================Info Student==================================
$(document).on('click','#infoStudentBtn', function () {
    var student_id = $(this).val();
    // alert(student_id)
    $.ajax({
        type: "GET",
        url: "code.php?student_id=" + student_id,
        success: function (response) {
            var res = $.parseJSON(response)
            if(res.status == 200){
                $('#theStName').html(res.data.name);
                $('#theStlName').html(res.data.name);
                $('#theStfName').html(res.data.fname);
                $('#theStDep').html(res.data.dep);

                $('#infoStudentModal').modal('show');

            }
            
        }
    });
    
});
// ==============================Edit Student============================

$(document).on('click','#editStudentBtn', function () {

    var edit_student_id = $(this).val();

    // alert(student_id);
    $.ajax({
        type: "GET",
        url: "code.php?edit_student_id=" + edit_student_id,

        success: function (response) {
            var res = $.parseJSON(response);

            if(res.status == 200){


                $('#stname').val(res.data.name);
                $('#stlname').val(res.data.name);
                $('#stfname').val(res.data.fname);
                $('#stdep').val(res.data.dep);
                $('#student_id').val(res.data.id);

                $('#editStudentModal').modal('show');
            }
        }
    });

    


    
});
// ==========================Update Student=====================================
$(document).on('submit','#updateStudent', function (e) {

    e.preventDefault();
    formData = new FormData(this);
    formData.append('update_student',true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        contentType:false,
        processData:false,
        success: function (response) {

            var res = $.parseJSON(response);

           
            if(res.status == 200){
                $('#editStudentModal').modal('hide');
                $('#saveStudent')[0].reset();
                $('#listOfStudent').load(location.href + " #listOfStudent")
                $('#myAlertMsg').html(`<strong>Success</strong>${res.message}`)
                $('#myAlertMsg').removeClass('d-none');
                $('#myAlertMsg').addClass('alert-success');
                setTimeout(()=>{
                    $('#myAlertMsg').addClass('d-none');
                },1000)


            }else if(res.status == 422){
                $('#myAlertMsg').html(res.message)
                $('#myAlertMsg').removeClass('d-none');
                // alert(res.message);
            }
            
        }
    });

    // alert('update BTN')
    
});
// ==========================Delete Student================================


$(document).on('click','#deleteStudentBtn', function (e) {
    e.preventDefault();
    var student_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "code.php",
        data: {
            'delete_student':true,
            'student_id': student_id,
        },

        success: function (response) {

            var res = $.parseJSON(response);

           
            if(res.status == 200){

                $('#listOfStudent').load(location.href + " #listOfStudent")
                $('#myAlertMsg').html(res.message)
                $('#myAlertMsg').removeClass('d-none');
                setTimeout(()=>{
                    $('#myAlertMsg').addClass('d-none');
                },2000)


            }
            
        }
    });
    // alert('delete BNT')

    
});