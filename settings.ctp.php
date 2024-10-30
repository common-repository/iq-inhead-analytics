<?php defined( 'ABSPATH' ) or die( 'This action is not allowed.' ); ?>
<div class="wrap">
<h2>IQ In Head Analytics Options</h2>
<form method="post" action="<?php IQA_SCRIPT_URL.'/'.IQA_PLUGIN_FILE; ?>">
    <?php settings_fields( 'iqa_plugin_options' ); ?>
    <?php do_settings_sections( 'iqa_plugin_options' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Plugin options</th>
        <tr>
            <td>Track logged in users</td>
            <td>
                <?php 
                    $checked = ( $this->iqa_track_loggedin ? 'checked' : '' ); 
                ?>
                <input type="checkbox" name="iqa_track_loggedin" id="iqa_track_loggedin" value="on" <?php echo $checked; ?> />
            
            </td>
        </tr>
        <tr>
            <td>Track admin users</td>
            <td>
                <?php 
                    $checked = ( $this->iqa_track_admin ? 'checked' : '' ); 
                ?>
                <input type="checkbox" name="iqa_track_admin" id="iqa_track_admin" value="on" <?php echo $checked; ?> />
            
            </td>
        </tr>
        <tr>
            <td>Your Analytics tracking code</td>
            <td>
                <textarea name="iqa_trackingcode" rows="14" cols="80"><?php echo wp_unslash($this->iqa_trackingcode); ?></textarea>
            </td>
        </tr>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>

</div>




