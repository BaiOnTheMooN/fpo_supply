<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9">
    <meta name="Description" content="Thongkwow's Family">
    <meta name="Author" content="วรากร ทองกวาว : Warakorn Thongkwow and โชติวัฒน์ อัมรินทร์ : Chotiwat Amarin">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <title>ระบบการจัดการและตรวจสอบพัสดุ สำนักงานเศรษฐกิจการคลัง</title>
</head>
<body>
    <table style="vertical-align: middle;  width: 100%; background-color:#FFD8D8; height:100px;">
        <tr>
            <td>
                <h1 align="center" style="color:red; font-family:Sarabun">รายการพัสดุของสำนักงานเศราฐกิจการคลัง ควยควยควย </h1>
            </td>
        </tr>
    </table>
<?php
require("fpo_supplyDBConnect.php");
$connectionInfo=['Database'=>$dbname,"CharacterSet" => "UTF-8",'UID'=>$username,'PWD'=>$password,'MultipleActiveResultSets'=>true,'TrustServerCertificate'=>true];
$conn=sqlsrv_connect($host,$connectionInfo);
if($conn === false ) {
    echo "Could not connect.\n"; 
    die(print_r(sqlsrv_errors(),true));
}
$query="SELECT ROW_NUMBER() OVER(ORDER BY s.division ASC) AS no, 
               s.registID AS registID, s.serialNo AS serialNo , 
               s.category AS category, s.brand AS brand, s.model AS model,
               s.division AS division, s.section AS section, 
               u.name
        FROM fpo_supply.dbo.supply AS s, fpo_supply.dbo.users AS u
        WHERE s.userID=u.userID";
/* Execute the query. */ 
$stmt=sqlsrv_query($conn, $query);
if($stmt === false) {
    die(print_r(sqlsrv_errors(),true));
}
?>
        <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
            <tr style="height:40px; border: 1px solid black; border-collapse: collapse; background-color:#E0E0E0">
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">ลำดับที่</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">เลขทะเบียนพัสดุ</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">เลขทะเบียนประจำตัวผลิตภัณฑ์</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">ประเภทของพัสดุ</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">ยี่ห้อของพัสดุ</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">รุ่นของพัสดุ</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">กอง/ศูนย์/กลุ่ม</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">ส่วนงาน</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">ผู้ใช้งานและรับผิดชอบพัสดุ</div></th>
            </tr>
<!-- PHP CODE TO FETCH DATA FROM ROWS -->
<?php
// LOOP TILL END OF DATA
while($result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
{
?>
            <tr style="border: 1px solid black; border-collapse: collapse;">
                <!-- FETCHING DATA FROM EACH
                ROW OF EVERY COLUMN -->
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php echo $result['no'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php echo $result['registID'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php echo $result['serialNo'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php echo $result['category'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php echo $result['brand'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php echo $result['model'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php if(isset($result['division'])) echo $result['division'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php if(isset($result['section'])) echo $result['section'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php if($result['name']) echo $result['name']; else echo "";?></td>
            </tr>
<?php
}
?>
        </table>
<?php
sqlsrv_close($conn); 
?>
        <table style="vertical-align: middle; border: 1px solid black; border-collapse: collapse; width: 100%; background-color:#FFD8D8; height:100px;">
            <tr>
                <td style="font-family:Sarabun; font-size:18px; border-collapse: collapse;" align="center">
                    <br>กองนโยบายพัฒนาระบบการเงินภาคประชาชน  สำนักงานเศรษฐกิจการคลัง กระทรวงการคลัง
                    <br>ที่อยู่ : สำนักงานเศรษฐกิจการคลัง ถนนพระรามที่ 6 ซอยอารีย์สัมพันธ์
                    <br> แขวงพญาไท เขตพญาไทกรุงเทพมหานคร 10400 โทรศัพท์ 0-2169-7127 ถึง 36 โทรสาร 0-2619-7137
                    <p>
                </td>
            </tr>
        </table>
</body>
</html>





