<?php /*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */ ?>
        <div class="appFooter">
            2013<?php date('Y')==2013?'':' - '.date('Y')?> &copy; Powered by <a href="http://php-freader.org/"><?php echo APP_NAME?> Version <?php echo VERSION?></a>
            &nbsp;&nbsp;&nbsp;<a href="policies.php#terms">Terms of Service</a>
            &nbsp;&nbsp;&nbsp;<a href="policies.php#privacy">Privacy Policy</a>
            <?php if((defined('SITE_ALLOW_REGISTRATION') && SITE_ALLOW_REGISTRATION=="true") && upgradeAvailable()):?>
            &nbsp;&nbsp;&nbsp;<a class="upgrade" href="http://www.php-freader.org/download/" target="_blank">New version available!</a>
            <?php endif?>
        </div>
    <?php if(!empty($user)):
        unset($user->preference->reset_code);
        ?>
    <script>
        var preference = <?php echo json_encode($user->preference)?>;
    </script>
    <?php endif?>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-fileupload.min.js"></script>
    <script src="js/tree.jquery.min.js"></script>
    <script src="js/freader.min.js"></script>
</body>
</html>
<?php include_once(INC.'application_bottom.php');
