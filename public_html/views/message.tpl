<?php echo $header; ?>




<div id="content">
    <div id="messagetop">
        <div id="messagebar">

            <ul>
                <li>
                    Inbox
                </li>
                <li>
                    Sent Items
                </li>
                <li>
                    Recent
                </li>

            </ul>

        </div>
    </div>
    
    <div id="messageLeftPanel" style="display: block; width:185px;float:left;">
        <?php
        echo '<ul>';
            foreach($messages as $message)
            {
                echo '<li>' . $message['subject'].  '</li>';
            }
        echo '</ul>';
        
        ?>
    </div>
    <div id="messageRightPanel" style="display: block; width:780px; float:right;">

        <table id="messagetable" style='width:100%;'>
            <tr>
                <td style='width:100%;'>  To <input style='width:100%;height:27px;font-size: 17px;' type='text' name='txt-message-to' id="txt-message-to"> 

                    <div id="messagesearch" style=" position: absolute;
                         background-color:rgba(242, 242, 242, 1); width:238px;
                         box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.13);">
                        &nbsp;

                    </div>

                </td>
            </tr>

            <tr>
                <td style='width:100%;'>  Subject <input style='width:100%;height:27px;font-size: 17px;' type='text' nanme='txt-message-subject'></td>
            </tr>

            <tr>
                <td>  Message <textarea style='width:100%;height:100%;border:2px solid lightgrey; padding:7px;font-family: PT Sans;' rows="20" name='txt-message-message'></textarea> </td>
            </tr>

        </table>
        <button id="sendMessagebtn" style="margin-left:5px; ">Send</button>
    </div>
</div>

<div style="clear:both"></div>

<?php echo $footer; ?>