<?php
$year = date('Y');
$trs = "";
$serial = 0;
foreach ($allData as $data) {
    $serial++;
    $trs.="<tr>";
    $trs.="<td>" . $serial . "</td>";
    $trs.="<td>" . $data->student_name . "</td>";
    $trs.="<td>" . $data->class_name . "</td>";
    $trs.="<td>" . $data->section_name . "</td>";
    $trs.="<td>" . $data->roll_no . "</td>";
    $trs.="<td>" . $data->phone . "</td>";
    $trs.="<td>" . $data->address . "</td>";
    $trs.="<td>" . "<img class='stdpic' src=uploads/students/$data->photo>" . "</td>";
    $trs.="</tr>";
}

$html = <<<EOD
<!DOCTYPE html>
<html>
<head>
 <title>List of Students</title>
        <link rel="stylesheet" href="<?php echo $baseurl; ?>asset/css/bootstrap.min.css">
        <script 
        src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
        <style>
        table {
  border-collapse: collapse;
}
        .headerlogo{
            float: left; 
   }
        .stdpic{width:60; height:60; padding:5px; border:1px solid #999; }
        .maincontent{height: 820px; }
        .footer{ background:#ddd; height:10px;}
        .footer p{text-align: center; padding-bottom:5px; }
        </style>
</head>
<body>
        $mpdf->SetHTMLHeader 
        <img src="asset/images/logo.jpg" width="80"  class="headerlogo"/>
            <div style="text-align: center; color:green; font-size:20px; margin-bottom: 15px;  font-weight: bold;">
            Better Communication & Automation Ltd.<br>
            Paltan, Dhaka.<br>Class Seven,  $year
            <hr>
   </div> 
        
 <div class="maincontent">
        <p style="text-align:center;">List of Students</p>
            <table border="1" align="center" width=100%>
            <thead>
                <tr>
                    <th width="5%">SL</th>
                    <th width="20%">S Name</th>
                    <th width="10%">Class</th>
                    <th width="10%">Section</th>
                    <th width="10%">Roll No</th>
                    <th width="15%">Mobile</th>
                    <th width="20%">Address</th>
                    <th width="10%">Picture</th>

            </tr>
            </thead>
            $trs;
            </table>        
        
        
        </div>
        
$htmlf 
<pagefooter name="MyFooter1" content-left="{DATE j-m-Y}" content-center="{PAGENO}/{nbpg}" content-right="SP Foundation" footer-style="font-family: serif; font-size: 8pt; font-weight: bold; font-style: italic; color: #000000;" />
<setpageheader name="MyHeader1" value="on" show-this-page="1" />
<setpagefooter name="MyFooter1" value="on" />
<div class="footer">
          <p>Better Communication & Automation.</p>
</div>
$mpdf->WriteHTML $htmlf
        
        
</body>
</html>
EOD;
$mpdf = new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
