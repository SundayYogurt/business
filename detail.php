<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail of Customer</title>
</head>
<body>
    <?php if (isset($_GET["CustomerID"]))
    {
        $strCustomerID = $_GET["CustomerID"];
    }

require 'connect.php' ;
$sql = "SELECT * FROM customer,country where CustomerID = ? AND customer.countrycode = country.countrycode";
$params = array($strCustomerID);
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

  <table width="400" border="1">
        <tr>
            <th width="90">
                <div align="center">รหัสผู้ใช้ </div>
                <td><?php echo $result["CustomerID"] ?></td>
            </th>
</tr>
<tr>
            <th width="140">
                <div align="center">ชื่อ </div>
                <td><?php echo $result["Name"] ?></td>
            </th>
</tr>
<tr>
            <th width="120">
                <div align="center">วันเกิด </div>
                <td><?php echo $result["Birthdate"] ?></td>
            </th>
</tr>
<tr>
            <th width="100">
                <div align="center">อีเมล์ </div>
                <td><?php echo $result["Email"] ?></td>
            </th>
</tr>
                <tr>
            <th width="50">
                <div align="center">ประเทศ </div>
                <td><?php echo $result["CountryName"] ?></td>
            </th>
</tr>
<tr>
            <th width="70">
                <div align="center">ยอดหนี้</div>
                <td><?php echo $result["OutstandingDebt"] ?></td>
            </th>
        </tr>






    
</body>
</html>