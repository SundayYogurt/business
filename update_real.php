<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
try {

    // echo "<br>" . $_POST['customerID'] . $_POST['Name'] . $_POST['birthdate'] . $_POST['email'] .
    //     $_POST['countryCode'] . $_POST['outstandingDebt'];

    if (isset($_POST['CustomerID']) && isset($_POST['Name'])) :

        require 'connect.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE customer SET name = :name, birthdate = :birthdate, email = :email,
    countryCode = :countryCode, outstandingDebt = :outstandingDebt WHERE customerID = :customerID"; //llll

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':customerID', $_POST['CustomerID']);
        $stmt->bindParam(':name', $_POST['Name']);
        $stmt->bindParam(':birthdate', $_POST['birthdate']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':countryCode', $_POST['countrycode']);
        $stmt->bindParam(':outstandingDebt', $_POST['outstandingDebt']);
        if ($stmt->execute()) :
            header("location:index.php");
        else :
            $message = 'Fail to update customer';
        endif;
        echo $message;
        echo '<script>
      Swal.fire({
        title: "UPDATED",
        text: "อัพเดตแล้ว",
        icon: "success",
        confirmButtonText: "ยอดเยี่ยมเลย",
      }); 
     </script>';
        $conn = null;

    endif;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>