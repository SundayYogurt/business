 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
 <?php
    require "connect.php";
    $sql_2 = "select * from country";
    $stmt_2 = $conn->prepare($sql_2);
    $stmt_2->execute();

    ?>
 <html>

 <head>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <div class="col d-flex justify-content-center">
         <title>User Registration11</title>
     </div>
 </head>

 <body>
     <style>
         .center {

             margin: auto;
             text-align: center;
         }
     </style>
     <div class="form-outline mb-4">
         <div class="form-outline mb-4">

             <div class="col d-flex justify-content-center">
                 <h1>add Customer with Dropdown Menu</h1>
             </div>

             <div class="col d-flex justify-content-center">
                 <div class="shadow p-3 mb-5 bg-body rounded" style="width: 500px" style="height: 400">
                     <div class="form-outline mb-4">
                         <div class="row mb-4">
                             <div class="border" style="width: 800px" style="height: 400">
                                 <form action=" update_real.php" method="POST">

                                     <div class="col d-flex justify-content-center">
                                         <div class="center">
                                             <br>
                                             <label class="form-label">CustomerID</label>
                                             <form action="addcustomerDd.php" method="POST">
                                                 <br>
                                                 <input type="text" class="form-control" placeholder="Enter Customer ID" name="customerID">
                                                 <br> <br>
                                                 <input type="text" class="form-control" placeholder="Name" name="Name">
                                                 <br> <br>
                                                 <input type="number" class="form-control" placeholder="OutStandingDebt" name="outstandingDebt">
                                                 <br> <br>
                                                 <input type="email" class="form-control" placeholder="Email" name="email">
                                                 <br> <br>
                                                 <input type="date" class="form-control" placeholder="Birthdate" name="birthdate">
                                                 <br> <br>
                                                 <label> กรุณาใส่รหัสประเทศ </label>
                                                 <select class="form-control" name="countrycode">
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
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                             </div>
                         </div>
                     </div>
 </body>

 </html>

 <?php

    try {

        if (isset($_POST['customerID']) && isset($_POST['Name'])) : {
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
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo '<script type="text/javascript">
            $(document).ready(function(){
              Swal.fire({
                title: "ADDED",
                text: "เพิ่มข้อมูลแล้ว",
                icon: "success",
                confirmButtonText: "เรียบร้อย",
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
                text: "ไม่สามารถเพิ่มได้",
                icon: "error",
                confirmButtonText: "ok",
              }).then(function(){
                window.location.href = "index.php";
              });
            });
          </script>';
                }
            }
        endif;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    ?>