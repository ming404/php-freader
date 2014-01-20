<form name="main" id="mainform">
    <input type="hidden" name="submit" value="1"/>
<?php if(!empty($ini['require']) || !empty($ini['optional'])):?>
    <?php $i=0;foreach($ini['require'] as $require => $value):?>
        <?php if($value == 1):?>
            <?php if($i%2==0):?>
<div class="row-fluid">
            <?php endif?>
    <div class="span6">
            <?php include_once(VIEWMOD.$require.'-config.php')?>
    </div>
            <?php if(++$i%2==0):?>
</div>
            <?php endif?>
        <?php endif?>
    <?php endforeach?>
    <?php foreach($ini['optional'] as $optional => $value):?>
        <?php if($value == 1):?>
            <?php if($i%2==0):?>
<div class="row-fluid">
            <?php endif?>
    <div class="span6">
            <?php include_once(VIEWMOD.$optional.'-config.php')?>
    </div>
            <?php if(++$i%2==0):?>
</div>
            <?php endif?>
        <?php endif?>
    <?php endforeach?>
    <?php if(++$i%2==0):?>
</div>
    <?php endif?>
<?php endif?>
<?php if(!empty($ini['lib']) || !empty($ini['version']) || !empty($ini['writable']) || !empty($ini['recommend'])) :?>
<div class="row-fluid">
    <?php if(!empty($ini['lib']) || !empty($ini['version']) || !empty($ini['writable'])) :?>
    <div class="span6 precheck">
        <?php include_once(VIEWMOD.'pre-check.php')?>
    </div>
    <?php endif?>
    <?php if(!empty($ini['recommend'])) :?>
    <div class="span6">
        <?php include_once(VIEWMOD.'recommended.php')?>
    </div>
    <?php endif?>
</div>
<?php endif?>
<div class="row-fluid">
    <div class="alert alert-error alert-validation" style="display:none;">
        <strong>Warning!</strong> Please fill in all required fields, and confirm that all mandatory server features have been setup correctly before continue.
    </div>
    <div class="alert alert-error alert-process" style="display:none;">
        <strong>Warning!</strong> <span class="alert-process-message"></span>
    </div>
    <div class="span12">
        <div style="text-align: center">
            <?php if(!empty($ini['lib']) || !empty($ini['version']) || !empty($ini['writable'])) :?>
            <a class="btn btn-large" href="javascript:void(0)" id="precheck"><i class="icon-repeat"></i> Recheck Server Configurations</a>
            <?php endif?>
            <a class="btn btn-large" href="javascript:void(0)" id="submit"><i class="icon-chevron-right"></i> Submit</a>
        </div>
    </div>
</div>
</form>
<script>
jQuery(function($){
    //init ui components
    $('.btn-group').button();

    //recheck server
    $('#precheck').click(function(){
        $('.alert-validation').hide();
        $.ajax({
            type: "GET",
            url: 'view.php?mod=pre-check',
            success: function(data) {
                $(".precheck").html(data);
            }
        });

        $(this).blur();
    });

    //submitting
    $('#submit').click(function(){
        var validate = true;
        $('.alert').hide();
        $('.alert-validation').hide();
        $('.error').removeClass('error');

        //common validation
        $(".required").each(function(){
            if(!$(this).val()) {
                validate = false;
                $(this).addClass('error');
            }
        });
        if($('#smtp_yesno').val()=="1"){
            $(".required-smtp").each(function(){
                if(!$(this).val()) {
                    validate = false;
                    $(this).addClass('error');
                }
            });
        }

        //server validation
        if($('#precheck_pass').val()!='1')
            validate = false;

        if(validate) {
            $.ajax({
                type: "POST",
                url: 'index.php',
                dataType: 'json',
                data: $("#mainform").serialize(), // serializes the form's elements.
                success: function(data) {
                    if(data.status == "1") {
                        location.href = "whatsnext.php";
                    } else {
                        $('.alert-process-message').html(data.message);
                        $('.alert-process').show();
                    }
                }
            });
        } else {
            $('.alert-validation').show();
        }
        $(this).blur();
    });
});
</script>

