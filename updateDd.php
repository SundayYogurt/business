<?php
echo "CustomerID = " . $_GET['CustomerID'];
$CIDs = $_GET['CustomerID'];
require "connect.php";
$sql_2 = "select * from country";
$stmt_2 = $conn->prepare($sql_2);
$stmt_2->execute();

?>
<html>

<head>
    <title>User Registration11</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <h1>Update Customer with Dropdown Menu</h1>
    <?php
    require 'connect.php';
    $sql_select =  "SELECT * FROM country ORDER BY CountryCode";
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();



    //if (isset($_GET['CustomerID'])) 
    //{
    $sql_select_customer = 'SELECT * FROM customer WHERE CustomerID= :CID';
    $stmt = $conn->prepare($sql_select_customer);
    $stmt->bindparam(':CID', $CIDs);
    $stmt->execute();
    echo "get = " . $_GET['CustomerID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "1234" . $result['CustomerID'] . $result['Name'];
    //} 
    echo "3314"  ?>

    <form action="update_real.php" method="POST">
        <input type="text" placeholder="Enter Customer ID" name="CustomerID" required value=<?= $result['CustomerID']; ?>>
        <br> <br>
        <input type="text" placeholder="Name" name="Name" required value=<?= $result['Name'] ?>>
        <br> <br>
        <input type="number" placeholder="OutStandingDebt" name="outstandingDebt" value=<?= $result['OutstandingDebt'] ?>>
        <br> <br>
        <input type="email" placeholder="Email" name="email" value=<?= $result['Email'] ?>>
        <br> <br>
        <input type="date" placeholder="Birthdate" name="birthdate" value=<?= $result['Birthdate'] ?>>
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