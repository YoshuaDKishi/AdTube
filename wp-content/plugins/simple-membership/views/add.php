

<div class="swpm-registration-widget-form">
    <form id="swpm-registration-form" name="swpm-registration-form" method="post" action="">
        <input type ="hidden" name="level_identifier" value="<?php echo $level_identifier ?>" />
        <table>
            <tr>
                <td><label for="user_name">メールアドレス</label></td><br>
                <td><input type="text" id="user_name" class="validate[required,custom[noapostrophe],custom[SWPMUserName],minSize[4],ajax[ajaxUserCall]]" value="<?php echo $user_name; ?>" size="50" name="user_name" /></td>
            </tr>
            <tr>
                <td><label for="email">メールアドレス再入力</label></td>
                <td><input type="text" id="email" class="validate[required,custom[email],ajax[ajaxEmailCall]]" value="<?php echo $email; ?>" size="50" name="email" /></td>
            </tr>
            <tr>
                <td><label for="password"><?php echo SwpmUtils::_('Password') ?></label></td><br>
                <td><input type="password" autocomplete="off" id="password" value="" size="50" name="password" /></td>
            </tr>
            <tr>
                <td><label for="password_re"><?php echo SwpmUtils::_('Repeat Password') ?></label></td><br>
                <td><input type="password" autocomplete="off" id="password_re" value="" size="50" name="password_re" /></td>
            </tr>
            <tr>
                <td><label for="last_name">お名前</label></td><br>
                <td><input type="text" id="last_name" value="<?php echo $last_name; ?>" size="50" name="last_name" /></td>
            </tr>
                    
        </table>        
        
        <div class="swpm-before-registration-submit-section" align="center"><?php echo apply_filters('swpm_before_registration_submit_button', ''); ?></div>
        
        <div class="swpm-registration-submit-section" align="center">
            <input type="submit" value="登録をする" class="swpm-registration-submit" name="swpm_registration_submit" style="font-size:16px;"/>
        </div>
        
        <input type="hidden" name="action" value="custom_posts" />
        <?php wp_nonce_field('name_of_my_action', 'name_of_nonce_field'); ?>
    </form>
</div>

<script>
    jQuery(document).ready(function ($) {
        $.validationEngineLanguage.allRules['ajaxUserCall']['url'] = '<?php echo admin_url('admin-ajax.php'); ?>';
        $.validationEngineLanguage.allRules['ajaxEmailCall']['url'] = '<?php echo admin_url('admin-ajax.php'); ?>';
        $.validationEngineLanguage.allRules['ajaxEmailCall']['extraData'] = '&action=swpm_validate_email&member_id=<?php echo filter_input(INPUT_GET, 'member_id'); ?>';
        $("#swpm-registration-form").validationEngine('attach');
    });
</script>
