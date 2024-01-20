<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<?php

try {
  if (isset($_POST['CustomerID']) && isset($_POST['Name'])) {
    require 'connect.php';
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE customer SET name = :name, birthdate = :birthdate, email = :email,
            countryCode = :countryCode, outstandingDebt = :outstandingDebt 
            WHERE customerID = :customerID";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':customerID', $_POST['CustomerID']);
    $stmt->bindParam(':name', $_POST['Name']);
    $stmt->bindParam(':birthdate', $_POST['birthdate']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':countryCode', $_POST['countrycode']);
    $stmt->bindParam(':outstandingDebt', $_POST['outstandingDebt']);

    $stmt->execute(); // Execute the update query

    if ($stmt->rowCount() > 0) {
      echo '<script type="text/javascript">
            $(document).ready(function(){
              Swal.fire({
                title: "UPDATED",
                text: "อัพเดตแล้ว",
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
                title: "แย่จริง",
                text: "ไม่สามารถอัพเดตได้",
                icon: "error",
                confirmButtonText: "ok",
              }).then(function(){
                window.location.href = "index.php";
              });
            });
          </script>';
    }
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}
