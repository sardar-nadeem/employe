<?php
$con = mysqli_connect('localhost','root','','db_students');

if(isset($_POST['save_student'])){

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $dep = mysqli_real_escape_string($con,$_POST['dep']);
    // $name = 'Fayaz';
    // $lname = 'Nasrati';
    // $fname = 'Asee';
    // $dep = 'BCA';


if($name == NULL  || $lname == NULL || $fname==NULL || $dep == Null){
    $res = [
        "status"=>422,
        "message"=>"all fields are mondatory",
    ];
    echo json_encode($res);
    return;
}
    // $query = "INSERT INTO students(`name`, `lname`, `fname`, `dep`) VALUES('$name','$lname',$fname','$dep')";
$query ="INSERT INTO `students` (`name`, `lname`, `fname`, `dep`) VALUES ('$name', '$lname', '$fname', '$dep')";
    // $query_run =;

    if(mysqli_query($con,$query)){
        $res = [
            "status"=>200,
            "message"=>"Student Created Successfully",
        ];
        echo json_encode($res);
        return;
    }
}



if(isset($_GET['student_id'])){
    $student_id = mysqli_real_escape_string($con,$_GET['student_id']);

    $query ="SELECT * FROM `students` WHERE id='$student_id'";

    $mysqli_result = mysqli_query($con,$query);

    if(mysqli_num_rows($mysqli_result)==1){

        $student = mysqli_fetch_array($mysqli_result);

        $res = [
            'status'=>200,
            'message'=>'data found',
            'data'=>$student,
        ];
        echo json_encode($res);
        return;

    }
}
// =========================Select Edit Student ================================
if(isset($_GET['edit_student_id'])){
 $edit_student_id = mysqli_real_escape_string($con,$_GET['edit_student_id']);
 $query ="SELECT * FROM `students` WHERE id='$edit_student_id'";
 $mysqli_result = mysqli_query($con,$query);

 if(mysqli_num_rows($mysqli_result)==1){
    $student = mysqli_fetch_array($mysqli_result);

    $res = [
        'status'=>200,
        'message'=>'Student selected',
         'data'=>$student,
    ];
    echo json_encode($res);
    return;

 }
}
// ===========================Update Studnet===============================

if(isset($_POST['update_student'])){
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $dep = mysqli_real_escape_string($con,$_POST['dep']);


    $query = "UPDATE students SET name='$name',lname='$lname',fname='$fname',dep='$dep' WHERE id='$student_id'";
    
    // $query_run =;

    if(mysqli_query($con,$query)){
        $res = [
            "status"=>200,
            "message"=>"Student Updated Successfully",
        ];
        echo json_encode($res);
        return;
    }
}
// =======================DElete Studnet======================

if(isset($_POST['delete_student'])){
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $query = "DELETE FROM students WHERE id='$student_id'";

    // $query_run = ;

    if(mysqli_query($con,$query)){
        $res = [
            'status'=>200,
            'message'=>'Student Deleted Successfully',
        ];
        echo json_encode($res);
        return;

    }

}
?>