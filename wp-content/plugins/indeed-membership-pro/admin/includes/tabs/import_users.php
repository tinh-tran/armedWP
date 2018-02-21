<?php
if (!empty($_POST['import']) && !empty($_FILES['import_file'])){
	////////////////// IMPORT
	$filename = IHC_PATH . 'import-users.csv';
	move_uploaded_file($_FILES['import_file']['tmp_name'], $filename);
	require_once IHC_PATH . 'classes/IhcUsersImport.class.php';
	$object = new IhcUsersImport();
	$object->setFile($filename);
	$object->setDoRewrite($_POST['rewrite']);
	$object->run();
} 
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="ihc-stuffbox">
		<h3 class="ihc-h3"><?php _e('Import Users&Levels', 'ihc');?></h3>
		<div class="inside">				
			<div class="iump-form-line">
            	<p style="max-width:70%;font-weight:bold;"><?php _e('Import and Update main Users details and Levels via a predefined CSV file ', 'ihc');?></p>
            </div>	
            <div class="iump-form-line">
				<h2><?php _e('Rewrite Level start time & expire time', 'ihc');?></h2>
				<label class="iump_label_shiwtch" style="margin:10px 0 10px -10px;">
					<input type="checkbox" class="iump-switch" onClick="iump_check_and_h(this, '#do_rewrite');" />
					<div class="switch" style="display:inline-block;"></div>
				</label>
				<input type="hidden" name="rewrite" value="0" id="do_rewrite" /> 												
			</div>	
            <div class="iump-form-line">
           		<h2><?php _e('CSV Sample File', 'ihc');?></h2>
                <p><?php _e('Download and use this sample by keeping the columns and following the examples inside it', 'ihc');?></p>
            	<a class="button button-primary button-large" href="<?php echo IHC_URL . 'admin/assets/others/exemple.csv';?>" target="_blank"><?php _e('Download CSV Sample', 'ihc');?></a>	
            </div>
			<div class="iump-form-line">
            	<h2><?php _e('Import procedure', 'ihc');?></h2>
                <p><?php _e('If any data inside the file will be found into DataBase the content will not be overwritten, except for Level Time if the above option is Enabled. For Users with multiple Levels, just add for each level an additional Row using the same user_id.', 'ihc');?></p>
				<span class="iump-labels-special"><?php _e('File ready for import', 'ihc');?></span>
				<input type="file" name="import_file" />  
            </div>    	
			 <div class="ihc-wrapp-submit-bttn">
				<input type="submit" value="<?php _e('Import', 'ihc');?>" name="import" class="button button-primary button-large">
			</div>					
		</div>
	</div>			
</form>

<?php

