        <h3>Pre-Installation Check</h3>
        <table class="table table-striped table-condensed">
        <?php
        $no = 0;
        if(!empty($ini['version']))
        {
            foreach($ini['version'] as $name => $version)
            {
                if($result['version'][$name]!="1") $no++;
                echo '
            <tr>
                <td>'.strtoupper($name).' version '.$version.'+</td>
                <td>'.yesno($result['version'][$name]).'</td>
            </tr>';
            }
        }
        if(!empty($ini['library']))
        {
            foreach($ini['library'] as $name => $active)
            {
                if($result['library'][$name]!="1") $no++;
                echo '
            <tr>
                <td>'.$libs[$name].'</td>
                <td>'.yesno($result['library'][$name]).'</td>
            </tr>';
            }
        }
        if(!empty($ini['writable']))
        {
            foreach($ini['writable'] as $category => $filename)
            {
                if($result['writable'][$name]!="1") $no++;
                echo '
            <tr>
                <td>'.canonicalizePath($filename).' writable</td>
                <td>'.yesno($result['writable'][$name]).'</td>
            </tr>';
            }
        }
        ?>
        </table>
        <input type="hidden" id="precheck_pass" value="<?php echo $no?'0':'1'?>"/>
