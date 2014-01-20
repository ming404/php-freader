<?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 include_once('include/header.php');?>
<div class="row-fluid">
    <div class="alert alert-success span8 offset2">
        <strong>Well done!</strong> The application has been installed and configured successfully. Next...
    </div>
</div>
<div class="row-fluid">
    <ul class="thumbnails">
        <li class="span4 offset2">
            <div class="thumbnail">
                <a class="noline" href="<?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 echo $ini['app']['next_step']?>">
                    <h3>Go To Front Page</h3>
                    <p>Click <b>here</b> to visit the application front page.</p>
                </a>
            </div>
        </li>
        <?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 if($ini['app']['next_step_admin']):?>
        <li class="span4">
            <div class="thumbnail">
                <a class="noline" href="<?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 echo $ini['app']['next_step_admin']?>">
                    <h3>Go To Admin Site</h3>
                    <p>Click <b>here</b> if you like to configure the application.</p>
                </a>
            </div>
        </li>
        <?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 endif?>
    </ul>
</div>
<div class="row-fluid">
    <div class="alert alert-warning">
        <strong>Remove Installer Folder!</strong> Please remove this installer package / folder as soon as possible, in order to prevent someone rerun the installation script and destroy the application.
    </div>
</div>
<?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 include_once(INC.'footer.php');
