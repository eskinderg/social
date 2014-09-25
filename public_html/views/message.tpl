<?php echo $header; ?>

<div id="content">
    <table style='width:100%;'>
        <tr>
            <td style='width:100%;'> <input style='width:200px;height:20px;font-size: 17px;' type='text' name='txt-message-to'> &nbsp; To</td>
        </tr>
        
        <tr>
            <td style='width:100%;'> <input style='width:300px;height:20px;font-size: 17px;' type='text' anme='txt-message-subject'>&nbsp; Subject</td>
        </tr>
        
        <tr>
            <td> <textarea style='width:100%;height:100%;border:2px solid lightgrey; font-family: arial;' rows="20" name='txt-message-message'></textarea> </td>
        </tr>
        
    </table>
</div>

<?php echo $footer; ?>