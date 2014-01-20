        <h3>Database Configuration</h3>
        <table class="table table-striped table-condensed">
            <tr>
                <td>Host</td>
                <td><input type="text" name="db_host" class="required" value="localhost"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="db_name" class="required"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="db_user" class="required"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="db_password" class="required"></td>
            </tr>
            <tr>
                <td>Table Prefix</td>
                <td><input type="text" name="db_prefix" value="<?php echo randString($ini['app']['db_prefix_len']).'_'?>"></td>
            </tr>
        </table>