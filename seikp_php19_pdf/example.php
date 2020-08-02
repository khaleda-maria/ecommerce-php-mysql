<?php
    if(isset($_POST['btn'])) {
        require './dompdf/dompdf_config.inc.php';
        $obj_pdf=new DOMPDF();
        
        //$z=$_POST['a'];
        $z=  file_get_contents('hello.php');
        $obj_pdf->load_html($z);
        $obj_pdf->render();
        $obj_pdf->stream('invoice.pdf');
        
       }
?>
<form action="" method="post">
    <table>
        <tr>
            <td><textarea name="a"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="btn" value="click"></td>
        </tr>
    </table>
</form>