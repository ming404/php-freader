<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 $loginNotRequired=true;include_once('../include/header.php'); ?>
<div class="root">
    <div class="loginHeader">
        <div class="appHeaderLeft">

        </div>
    </div>
    <div class="loginBody">
        <div class="left" style="position:relative">
            <h3><img src="img/favoicon_48x48x32.png" title="<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 echo APP_NAME?>" style="margin-right:6px;"/><?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 echo APP_NAME?></h3>
            <h4><?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 echo APP_DESCRIPTION ?></h4>
            <div class="loginScreenshot"><img src="img/screenshot.png"/></div>
            <div>
                <h4>Why use Freader?</h4>
                <li>Read all subscribed news feeds at one place</li>
                <li>Group similar type of subscriptions and read at once</li>
                <li>User friendly and easy to read, search and navigate through feed items</li>
                <li>HTML5 Web2.0 standard, suitable for both desktop and mobile devices</li>
                <li>Import and export subscription in few steps</li>
            </div>
        </div>
        <div class="right login">
            <h4>Sign In</h4>
            <form method="POST">
                <input type="hidden" name="action" value="login"/>
                <?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 if (!empty($_GET['signin']) && $_GET['signin'] == "failed"): ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Oh ohh...</strong> Please provide correct credentials and try again.
                    </div>
                <?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 endif ?>
                <div class="control-group">
                    <label for="username">Email</label>
                    <input type="text" id="email" name="email" class="user-details input-large" required>
                </div>
                <div class="control-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="user-details input-large" required>
                </div>
                <button class="btn btn-primary" id="signin">Sign In</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 if(defined('SITE_ALLOW_REGISTRATION') && SITE_ALLOW_REGISTRATION=="true"):?>
                <button class="btn" data-toggle="modal" data-target="#signupDlg">Create new account</button>
                <?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 endif?>
                <br/><br/>
                <a href="#" data-toggle="modal" data-target="#forgotPasswordDlg">Forgot password</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" data-toggle="modal" data-target="#resetPasswordDlg">Reset password</a>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="forgotPasswordDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordDlgLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="forgotPasswordDlgLabel">Forgot Password</h3>
    </div>
    <div class="modal-body" id="forgotPasswordDlgBody">
        <form>
            <p>To reset your password, enter the email address you use to sign in to Freader.</p>
            <label>Email Address</label>
            <input type="email" id="fpemail" name="fpemail" value="" style="width:98%" placeholder="your.email@domain.com" required/>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" id="sendForgotPassword">Send Request</button>
    </div>
</div>

<div id="resetPasswordDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="resetPasswordDlgLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="resetPasswordDlgLabel">Reset Password</h3>
    </div>
    <div class="modal-body" id="resetPasswordDlgBody">
        <form autocomplete="off">
            <label>Email Address</label>
            <input type="email" class="resetPasswordInput" id="rpEmail" name="rpEmail" value="" style="width:60%" placeholder="your.email@domain.com" required/>
            <label>Reset Code</label>
            <input type="text" class="resetPasswordInput" id="rpCode" name="rpCode" value="" required/>
            <label>New Password (Minimum of 6 characters)</label>
            <input type="password" class="resetPasswordInput" pattern=".{6,}" id="rpPassword" name="rpPassword" value="" required/>
            <label>Confirm New Password</label>
            <input type="password" class="resetPasswordInput" pattern=".{6,}" id="rpConfirmPassword" value="" required/>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" id="resetPasswordSubmit">Submit</button>
    </div>
</div>

<div id="signupDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="signupDlgLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="signupDlgLabel">Create New Account</h3>
    </div>
    <div class="modal-body" id="signupDlgBody">
        <form id="signupForm" autocomplete="off">
            <label>First Name</label>
            <input type="text" class="suInput" id="suFirstname" name="suFirstname" value="" placeholder="John" required/>
            <label>Last Name</label>
            <input type="text" class="suInput" id="suLastname" name="suLastname" value="" placeholder="Smith" required/>
            <label>Email Address</label>
            <input type="email" class="suInput" id="suEmail" name="suEmail" value="" style="width:60%" placeholder="your.email@domain.com" required/>
            <label>Password (Minimum of 6 characters)</label>
            <input type="password" class="suInput" pattern=".{6,}" id="suPassword" name="suPassword" value="" required/>
            <label>Confirm Password</label>
            <input type="password" class="suInput" pattern=".{6,}" id="suConfirmPassword" value="" required/>
            <label class="checkbox"><input type="checkbox" class="suInput" id="suTerms" name="suTerms" required/> I agree to this <a href="policies.php#terms" target="_blank">Terms of Service</a> and <a href="policies.php#privacy" target="_blank">Privacy Policy</a></label>
            <br/>
            <label>Security Code</label>
            <div><div id="suCodeImage" style="display:inline-block;margin-right:20px;"></div><a href="javascript:void(0)" title="Refresh captcha" onclick="refreshCaptcha(this)">Refresh Captcha <i class="icon-refresh"></i></a></div>
            <input type="text" class="suInput" id="suCode" name="suCode" value="" required/>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" id="suSubmit">Submit</button>
    </div>
</div>

<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


include_once('../include/footer.php');