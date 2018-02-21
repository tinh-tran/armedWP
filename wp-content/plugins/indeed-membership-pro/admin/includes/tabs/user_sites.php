<?php
ihc_save_update_metas('user_sites');//save update metas
$data['metas'] = ihc_return_meta_arr('user_sites');//getting metas
echo ihc_check_default_pages_set();//set default pages message
echo ihc_check_payment_gateways();
echo ihc_is_curl_enable();
$levels = get_option('ihc_levels');
?>
<div class="iump-wrapper">
	<form action="" method="post">
		<div class="ihc-stuffbox">
			<h3 class="ihc-h3"><?php _e('MultiSite Subscriptions', 'ihc');?></h3>
			<div class="inside">
				<div class="iump-form-line">
					<h2><?php _e('Activate/Hold User Sites', 'ihc');?></h2>
                    <p><?php _e('Provides SingleSites based on purchased Subscriptions. You can sell SingleSites via Levels. Once a user buy a specific Level will be able to create his own SingleSite. The user will be set as Administrator for that site ', 'ihc');?></p>
                    
					<label class="iump_label_shiwtch" style="margin:10px 0 10px -10px;">
						<?php $checked = ($data['metas']['ihc_user_sites_enabled']) ? 'checked' : '';?>
						<input type="checkbox" class="iump-switch" onClick="iump_check_and_h(this, '#ihc_user_sites_enabled');" <?php echo $checked;?> />
						<div class="switch" style="display:inline-block;"></div>
					</label>
					<input type="hidden" name="ihc_user_sites_enabled" value="<?php echo $data['metas']['ihc_user_sites_enabled'];?>" id="ihc_user_sites_enabled" /> 
                    <p style="max-width:70%;font-weight:bold;"><?php _e('If the Level will expire, the SingleSite assigned to it will be deactivated and activated back when the Level will become an Active one too. If multiple Levels will provide that option, the user will be able to create one SingleSite for each Level.', 'ihc');?></p>												
				</div>								
				<div class="ihc-submit-form" style="margin-top: 20px;"> 
					<input type="submit" value="<?php _e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
				</div>		
			</div>
		</div>			
			
		<div class="ihc-stuffbox">
			<h3 class="ihc-h3"><?php _e('Levels vs SingleSites', 'ihc');?></h3>
			<div class="inside"> 	
                <div class="iump-form-line">
                <p><?php _e('Set which Levels will provide a SingleSite to buyers.', 'ihc');?></p>
                <h2><?php _e('Enable Levels:', 'ihc');?></p></h2>
				<?php foreach ($levels as $lid=>$level_data):?>
						<span class="iump-labels-special"><?php echo $level_data['name'];?></span>
						<label class="iump_label_shiwtch" style="margin:10px 0 10px -10px;">
							<?php 
								if (empty($data['metas']['ihc_user_sites_levels'][$lid])){
									$checked = '';
									$value = 0;
								} else {
									$checked = 'checked';
									$value = 1;								
								}
							?>
							<input type="checkbox" class="iump-switch" onClick="iump_check_and_h(this, '<?php echo '#ihc_lid_' . $lid;?>');" <?php echo $checked;?> />
							<div class="switch" style="display:inline-block;"></div>
						</label>
						<input type="hidden" name="ihc_user_sites_levels[<?php echo $lid;?>]" value="<?php echo $value;?>" id="<?php echo 'ihc_lid_' . $lid;?>" /> 												
											
				<?php endforeach;?>		
				</div>
                <div class="ihc-submit-form" style="margin-top: 20px;"> 
					<input type="submit" value="<?php _e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
				</div>		
			</div>
		</div>		
	</form>
</div>


	
