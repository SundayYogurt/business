<?php
// echo "CustomerID = " . $_GET['CustomerID'];
$CIDs = $_GET['CustomerID'];
require "connect.php";
$sql_2 = "select * from country";
$stmt_2 = $conn->prepare($sql_2);
$stmt_2->execute();

?>
<html>

<head>
    <title>User Registration</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>



<body>
    <div class="col d-flex justify-content-center">
        <h1>Update Customer</h1>
    </div>
    <br>
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
    // echo "get = " . $_GET['CustomerID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo "1234" . $result['CustomerID'] . $result['Name'];
    //} 
    // echo "3314"  
    ?>



    <div class="col d-flex justify-content-center">
        <div class="form-outline mb-4">
            <div class="row mb-4">
                <div class="border" style="width: 400px">
                    <form action=" update_real.php" method="POST">
                        <div class="table table-striped table-hover table-responsive table-bordered">
                            <label class="form-label">CustomerID</label>
                            <br>
                        </div>
                        <input type="text" for="form1Example2" class="form-control" placeholder="Enter Customer ID" name="CustomerID" width="10px" value=<?= $result['CustomerID']; ?>>
                        <br>
                        <label class="form-label">Name</label>
                        <input type="text" for="form1Example2" class="form-control" placeholder="Name" name="Name" required value=<?= $result['Name'] ?>>
                        <br>
                        <label class="form-label">OutstandingDebt</label>
                        <input type="number" for="form1Example2" class="form-control" placeholder="OutStandingDebt" name="outstandingDebt" value=<?= $result['OutstandingDebt'] ?>>
                        <br>
                        <label class="form-label">Email</label>
                        <input type="email" for="form1Example2" class="form-control" placeholder="Email" name="email" value=<?= $result['Email'] ?>>
                        <br>
                        <label class="form-label">BirthDate</label>
                        <input type="date" for="form1Example2" class="form-control" placeholder="Birthdate" name="birthdate" value=<?= $result['Birthdate'] ?>>
                        <br>
                        <label> กรุณาใส่รหัสประเทศ </label>
                        <select name="countrycode">

                </div>
            </div>
        </div>
    </div>

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

    <div class="col d-flex justify-content-center">

        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block" style="width:60px"> ok </button>
        </form>
    </div>
    </ </body>

</html>