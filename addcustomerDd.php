<?php
require "connect.php";
$sql_2 = "select * from country";
$stmt_2 = $conn->prepare($sql_2);
$stmt_2->execute();

?>
<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>add Customer with Dropdown Menu</h1>


    <form action="addcustomerDd.php" method="POST">
        <input type="text" placeholder="Enter Customer ID" name="customerID">
        <br> <br>
        <input type="text" placeholder="Name" name="Name">
        <br> <br>
        <input type="number" placeholder="OutStandingDebt" name="outstandingDebt">
        <br> <br>
        <input type="email" placeholder="Email" name="email">
        <br> <br>
        <input type="date" placeholder="Birthdate" name="birthdate">
        <br> <br>
        <label> กรุณาใส่รหัสประเทศ </label>
        <select name="countrycode">
            <?php while ($cc = $stmt_2->fetch(PDO::FETCH_ASSOC)) :
            ?>
                <option value="<?php echo $cc['CountryCode'] ?>">
                    <?php echo $cc['CountryName'] ?>
                </option>
            <?php
            endwhile;
            ?>
        </select>
        <br> <br>
        <input type="submit" placeholder="submit">
    </form>
</body>

</html>

<?php

try {

    if (isset($_POST['customerID']) && isset($_POST['Name'])) :
        // echo "<br>" . $_POST['customerID'] . $_POST['Name'] . $_POST['birthdate'] . $_POST['email'] .
        //     $_POST['countryCode'] . $_POST['outstandingDebt'];

        require 'connect.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into customer values(:customerID, :Name, :birthdate, :email, :countryCode, :outstandingDebt)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':customerID', $_POST['customerID']);
        $stmt->bindParam(':Name', $_POST['Name']);
        $stmt->bindParam(':birthdate', $_POST['birthdate']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':countryCode', $_POST['countrycode']);
        $stmt->bindParam(':outstandingDebt', $_POST['outstandingDebt']);
        if ($stmt->execute()) :
            $message = 'Suscessfully add new customer';
        else :
            $message = 'Fail to add new customer';
        endif;
        echo $message;

        $conn = null;
        header("location:index.php");
    endif;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>