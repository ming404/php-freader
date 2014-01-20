        <h3>SMTP Configuration</h3>
        <div class="span12">
            <div class="btn-group" data-toggle-name="smtp_yesno" data-toggle="buttons-radio" >
                <button type="button" value="0" class="btn btn_smtp_yesno active" data-toggle="button">No</button>
                <button type="button" value="1" class="btn btn_smtp_yesno" data-toggle="button">Yes</button>
            </div>
            <input type="hidden" name="smtp_yesno" id="smtp_yesno" value="0" />
        </div>
        <table id="tbl_smtp" class="table table-striped table-condensed" style="display:none">
            <tr>
                <td>Host</td>
                <td><input type="text" name="smtp_host" class="required-smtp" value="localhost"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="smtp_username" class="required-smtp"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="smtp_password" class="required-smtp"></td>
            </tr>
            <tr>
                <td>Port Number</td>
                <td><input type="number" name="smtp_port" class="required-smtp" value="25"></td>
            </tr>
        </table>
<script>
    $('.btn_smtp_yesno').click(function(){
        $(this).val()=="1" ? $('#tbl_smtp').show() : $('#tbl_smtp').hide();
        $('#smtp_yesno').val($(this).val());
    });
</script>