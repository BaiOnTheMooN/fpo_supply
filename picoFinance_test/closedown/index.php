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
    <title>www.1359.go.th</title>
</head>
<body>
    <table style="vertical-align: middle;  width: 100%; background-color:#FFD8D8; height:100px;">
        <tr>
            <td>
                <h1 align="center" style="color:red; font-family:Sarabun">รายชื่อผู้ประกอบธุรกิจสินเชื่อพิโกไฟแนนซ์ที่เลิกประกอบธุรกิจ</h1>
            </td>
        </tr>
    </table>
<?php
require("picoDBConnect.php");
$connectionInfo=['Database'=>$dbname,"CharacterSet" => "UTF-8",'UID'=>$username,'PWD'=>$password];
$conn=sqlsrv_connect($host,$connectionInfo);
if($conn === false ) {
    echo "Could not connect.\n"; 
    die(print_r(sqlsrv_errors(),true));
}
$query="SELECT  ROW_NUMBER() OVER(ORDER BY prov ASC) AS no, idcomp, compName, prov, 
                CASE WHEN licenseType='1' THEN 'พิโกไฟแนนซ์'
                     WHEN licenseType='2' THEN 'พิโกพลัส' END AS licenseType, idLicense, /* cancelLicenseDate, licenseDate, operateDate, */
                CONCAT(REPLACE(RIGHT(CAST(cancelLicenseDate AS varchar(10)),2),'0',''),' ',
                CASE WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='1' THEN 'มกราคม'
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='2' THEN 'กุมภาพันธ์'		
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='3' THEN 'มีนาคม'	
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='4' THEN 'เมษายน'		
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='5' THEN 'พฤษภาคม'	
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='6' THEN 'มิถุนายน'		
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='7' THEN 'กรกฎาคม'	
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='8' THEN 'สิงหาคม'		
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='9' THEN 'กันยายน'	
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='10' THEN 'ตุลาคม'		
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='11' THEN 'พฤศจิกายน'	
                     WHEN REPLACE(SUBSTRING(CAST(cancelLicenseDate AS varchar(10)),6,2),'0','')='12' THEN 'ธันวาคม'		
                END,' ',
                LEFT(CAST(cancelLicenseDate AS varchar(10)),4)+543) AS cancelLicenseDate
        FROM company
        WHERE (idLicense IS NOT NULL AND cancelLicenseDate IS NOT NULL) AND (cancelLicenseCause!='5' AND cancelLicenseCause!='6')
        ORDER BY prov ASC, licenseDate ASC";
/* Execute the query. */ 
$stmt=sqlsrv_query($conn, $query);
if($stmt === false) {
    die(print_r(sqlsrv_errors(),true));
}
?>
        <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
            <tr style="height:40px; border: 1px solid black; border-collapse: collapse; background-color:#E0E0E0">
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">ลำดับที่</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">เลขทะเบียยนนิติบุคคล</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">ชื่อนิติบุคคล</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">จังหวัด</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">ประเภทใบอนุญาต</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">เลขที่ใบอนุญาต</div></th>
                <th style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;"><div align="center">วันที่ยกเลิกใบอนุญาต</div></th>
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
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php echo $result['idcomp'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" ><?php echo $result['compName'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php echo $result['prov'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php if(isset($result['licenseType'])) echo $result['licenseType'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php if(isset($result['idLicense'])) echo $result['idLicense'];?></td>
                <td style="font-family:Sarabun; border: 1px solid black; border-collapse: collapse;" align="center"><?php if($result['cancelLicenseDate']) echo $result['cancelLicenseDate']; else echo "";?></td>
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





