        <h3>Recommended Settings</h3>
        <table class="table table-striped table-condensed">
            <tr>
                <th>Setting Name</th>
                <th>Recommended</th>
                <th>Actual</th>
            </tr>
        <?php
            foreach($ini['recommend'] as $name => $status)
            {
                echo '
            <tr>
                <td>'.ucwords(str_replace('_',' ',$name)).'</td>
                <td>'.ononly($status).'</td>
                <td>'.onwarning($result['recommend'][$name],$status).'</td>
            </tr>';
            }
        ?>
        </table>