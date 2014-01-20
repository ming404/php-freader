        <h3>Site Configuration</h3>
        <table class="table table-striped table-condensed">
            <tr>
                <td>Site Name</td>
                <td><input type="text" name="site_name" class="required" value="<?php echo $ini['app']['name']?>"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="site_description" class="text_area"><?php echo $ini['app']['description']?></textarea></td>
            </tr>
        </table>