<?php
    
if(isset($_POST['btn']) ) {
    require 'dompdf/dompdf_config.inc.php';
    $obj_pdf=new DOMPDF();
    
    $pdf_content=$_POST['pdf_content'];
    $obj_pdf->load_html('pdf.php');
    $obj_pdf->render();
    $obj_pdf->stream('demo.pdf');
    
}
    
    
    
?>
<form action="" method="post">
    <table>
        <tr>
            <td>Enter your content</td>
            <td><textarea name="pdf_content"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="SUBMIT"></td>
        </tr>
    </table>
</form>