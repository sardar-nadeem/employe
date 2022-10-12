
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pics/bootstrap.min.css">
    <script src="./pics/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container"><br><br>
    <div class="card">
        <div class="card-header">
       <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#saveStudentModal">
          Create New Student 
        </button>
      
        
        <div class="alert d-none"  id="myAlertMsg" role="alert"></div>
        </div>
        
        
        <!-- Modal -->
        <div class="modal fade" id="saveStudentModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="saveStudentModal">Create New Student title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    
                                    
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                           <form  id="saveStudent" action="code.php">
                           <label for="name"><b>Name:</b></label>
                            <input type="text" name="name" class="form-control" placeholder="Student Name">

                            <label for="name"><b>lname:</b></label>
                            <input type="text" name="lname" class="form-control" placeholder="Student last dkjadjkfName">

                            <label for="name"><b>Father Name:</b></label>
                            <input type="text" class="form-control" name="fname" placeholder="Student Father Name">

                            <label for="name"><b>Departement:</b></label>
                            <input type="text" class="form-control" name="dep" placeholder="Student DEP">
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Student</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-primary" id="listOfStudent">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">lname</th>
                            <th scope="col">fname</th>
                            <th scope="col">DEP</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                       $con = mysqli_connect('localhost','root','','db_students');
                       $query ="SELECT * FROM students";
                       $query_run = mysqli_query($con, $query);
                       if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $student){
                        ?>
                         

                       
                         <tr class="">
                            <td scope="row"><?= $i++ ?></td>
                            <td><?= $student['name'];?></td>
                            <td><?= $student['lname'];?></td>
                            <td><?= $student['fname'];?></td>
                            <td><?= $student['dep'];?></td>
                            <td>
                            <button class=' btn btn-info btn-sm' id="infoStudentBtn" value="<?= $student['id'];?>">info</button>
                            <button class=' btn btn-primary btn-sm' id="editStudentBtn"value="<?= $student['id'];?>">Edit</button>
                            <button class=' btn btn-danger btn-sm' id="deleteStudentBtn"value="<?= $student['id'];?>">Delete</button>
                        </td>
                        </tr>
                        <?php
                        }
                       }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <!-- ========================Info Modal============================== -->
    <!--  Modal trigger button  -->   
    <!-- Modal Body-->
    <!-- <h1 id="theStName"></h1> -->
    <div class="modal fade" id="infoStudentModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Student Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                       <table>
                       <tr>
                            <th>Name:</th>
                            <td id="theStName"></td>
                        </tr>

                        <tr>
                            <th>Last Name:</th>
                            <td id="theStlName"></td>
                        </tr>


                        <tr>
                            <th>Father Name:</th>
                            <td id="theStfName"></td>
                        </tr>
                      
                        <tr>
                            <th>Departement:</th>
                            <td id="theStDep"></td>
                        </tr>
                       </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ========================Edit Modal============================== -->
       <!-- Modal -->
       <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="saveStudentModal">Create New Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    
                                    
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                           <form id="updateStudent">
                            <h1 id="stName"></h1>
                           <label for="name"><b>Name:</b></label>
                            <input type="text" id="stname" name="name" class="form-control" placeholder="Student Name">

                            <label for="name"><b>lname:</b></label>
                            <input type="text" name="lname" id="stlname" class="form-control" placeholder="Student last Name">


                            <label for="name"><b>Father Name:</b></label>
                            <input type="text" class="form-control"  id="stfname" name="fname" placeholder="Student Father Name">


                            <label for="name"><b>Departement:</b></label>
                            <input type="text" class="form-control" id="stdep" name="dep" placeholder="Student DEP">
                           
                            <input type="hidden" name="student_id" id="student_id">
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    
    
    
   </div>   
</body>
<script src="./pics/jquery.min.js"></script>
<script src="./myScript.js"></script>
</html>