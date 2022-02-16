<?php

    // $date= '';
    // $issuesdto= '';
    // $issuingid= '';
    // $coursename= '';
    // $startdate= '';
    // $enddate= '';
    // $regid= '';
    // $signatory= '';
    // $attachment= '';

    if(isset($_POST['submit'])) {

        $date= $_POST['date'];
        $issuesdto= $_POST['issuedto'];
        $issuingid= $_POST['issuingid'];
        $coursename= $_POST['coursename'];
        $startdate= $_POST['startdate'];
        $enddate= $_POST['enddate'];
        $regid= $_POST['regid'];
        $signatory= $_POST['signatory'];
        $attachment= $_POST['attachment'];

        //Database connection
        $conn = new mysqli('localhost','root','','form_oyesters');
            if($conn->connect_error){
                echo "$conn->connect_error";
                die("Connection Failed : ". $conn->connect_error);
            } else {
                $stmt = $conn->prepare("insert into form_issuing(issue_date, issue_to, id, 	course_name, start_date, end_date, reg_id, signatory, attachment) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssss", $date, $issuesdto, $issuingid, $coursename, $startdate, $enddate, $regid, $signatory, $attachment);
                $execval = $stmt->execute();
                echo $execval;
                echo "Successfully Uploaded...";
                $stmt->close();
                $conn->close();
                header('location: index.html');
            }
    }
?>