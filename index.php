<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <link rel="stylesheet" href="updateDd.scss">
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>CRUD Customer Information</title>
</head>

<body>

    <div class="block">
        <main>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                <h3>รายชื่อลูกค้า <a href="addCustomerDd.php" class="btn btn-info float-end">+เพิ่มข้อมูล</a> </h3>
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <table class="table table-striped  table-hover table-responsive table-sm">

                        <div class="border-c">

                            <thead align="center">
                                <caption>List of users</caption>


                                <article>

                                    <tr>
                                        <th width="10%">รหัสลูกค้า</th>
                                        <th width="20%">ชื่อ-นามสกุล</th>
                                        <th width="20%">วันเดือนปีเกิด</th>
                                        <th width="25%">อีเมล์</th>
                                        <th width="10%">ประเทศ</th>
                                        <th width="10%">ยอดหนี้</th>
                                        <th width="5%">แก้ไข</th>
                                        <th width="5%">ลบ</th>
                                    </tr>
                                </article>


                            </thead>
                            <tbody>

                                <?php
                                require 'connect.php';
                                $sql =  "SELECT * FROM customer";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetchALL();
                                foreach ($result as $r) { ?>

                                    <tr>
                                        <td><?= $r['CustomerID'] ?></td>
                                        <td><?= $r['Name'] ?></td>
                                        <td><?= $r['Birthdate'] ?></td>
                                        <td><?= $r['Email'] ?></td>
                                        <td><?= $r['CountryCode'] ?></td>
                                        <td><?= $r['OutstandingDebt'] ?></td>
                                        <td><a href="updateDd.php?CustomerID=<?= $r['CustomerID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                        <td><a href="CustomerDelete.php?CustomerID=<?= $r["CustomerID"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function addDarkmodeWidget() {
            new Darkmode().showWidget();
        }
        window.addEventListener('load', addDarkmodeWidget);
    </script>
    <script>
        const options = {
            bottom: '64px', // default: '32px'
            right: 'unset', // default: '32px'
            left: '32px', // default: 'unset'
            time: '0.5s', // default: '0.3s'
            mixColor: '#fff', // default: '#fff'
            backgroundColor: '#fff', // default: '#fff'
            buttonColorDark: '#100f2c', // default: '#100f2c'
            buttonColorLight: '#fff', // default: '#fff'
            saveInCookies: false, // default: true,
            label: '🌓', // default: ''
            autoMatchOsTheme: false // default: true
        }

        const darkmode = new Darkmode(options);
        darkmode.showWidget();
    </script>

    </main>
</body>

</html>