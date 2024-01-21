<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<?php

if (isset($_GET['CustomerID'])) {
    $strCustomerID = ($_GET['CustomerID']);
}
require 'connect.php';
$sql = "DELETE FROM customer WHERE CustomerID = :CustomerID ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':CustomerID', $_GET['CustomerID']);
$stmt->execute(); // Execute the update query

if ($stmt->rowCount() > 0) {
    echo '<script type="text/javascript">
            $(document).ready(function(){
              Swal.fire({
                title: DELETED",
                text: "ลบข้อมูลแล้ว",
                icon: "success",
                confirmButtonText: "ยอดเยี่ยมเลย",
              }).then(function(){
                window.location.href = "index.php";
              });
            });
          </script>';
} else {
    echo '<script type="text/javascript">
            $(document).ready(function(){
              Swal.fire({
                title: "ไม่สำเร็จ",
                text: "ไม่สามารถลบได้",
                icon: "warning",
                confirmButtonText: "ok",
              }).then(function(){
                window.location.href = "index.php";
              });
            });
          </script>';
}



?>