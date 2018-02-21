<?php
if (!class_exists('Ihc_Workflow_Restrictions')):
	
class Ihc_Workflow_Restrictions{
	private static $metas = array();
	private static $just_once = FALSE;
	
	public function __construct(){
		/*
		 * @param none
		 * @return none
		 */
		if (empty(self::$metas)){
			self::$metas = ihc_return_meta_arr('workflow_restrictions');
			if (self::$metas['ihc_workflow_restrictions_on']){
				/// set cookie
				add_action('init', array($this, 'set_cookie'), 9999);
				/// view posts
				add_filter('filter_on_ihc_test_if_must_block', array($this, 'user_can_view_the_post'), 99999, 5);	
				/// insert comment
				add_action('comment_post', array($this, 'user_can_add_comments'), 999, 2);		
				/// insert posts
				add_filter('wp_insert_post_data', array($this, 'user_can_add_posts'), 999, 2);	
			}
		}
	}
	
	
	/*
	 * Set the cookie with current post_id, perform this action in init. 
	 * If post id cannot be determined the cookie will be set on filter_on_ihc_test_if_must_block filter.
	 * @param none
	 * @return none
	 */
	public function set_cookie(){
		global $current_user;
		$uid = (isset($current_user->ID)) ? $current_user->ID : 0;
		$post_id = url_to_postid(IHC_PROTOCOL . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		if ($post_id && $uid){
			 $this->increment_user_posts_views($uid, $post_id);
		}
	}
	
		
	public function user_can_add_posts($data, $postarr){
		/*
		 * @param 
		 * @return none
		 */
		 if ($data){
		 	 global $current_user;
			 $uid = (isset($current_user->ID)) ? $current_user->ID : 0;
			 if ($uid && !current_user_can('administrator')){ 
			 	 $since = time() - ((int)self::$metas['ihc_workflow_restrictions_timelimit'] * 24 * 3600);
			 	 $count_posts = Ihc_Db::user_get_inserted_posts_count($uid, $since);
				 $limit = $this->get_limit_count_for_user($uid, 'add_posts');
				 if ($limit!==FALSE && $data['post_status']!='auto-draft'){
				 	 if ($limit<=$count_posts){
				 	 	$data['post_status'] = 'pending';
				 	 }
				 }
			 }
		 }
		 return $data;
	}	
	
	public function user_can_add_comments($comment_id=0, $comment_approved){
		/*
		 * @param int, boolean
		 * @return none
		 */
		 global $current_user;
		 $uid = (isset($current_user->ID)) ? $current_user->ID : 0;
		 if ($uid && !current_user_can('administrator')){
		 	 $since = time() - ((int)self::$metas['ihc_workflow_restrictions_timelimit'] * 24 * 3600);
		 	 $count_comments = Ihc_Db::user_get_inserted_comments_count($uid, $since);
		 	 $limit = $this->get_limit_count_for_user($uid, 'comments');
		     if ($limit!==FALSE){
			  	 if ($limit<=$count_comments){
			  	 	 IHc_Db::do_delete_comment($comment_id);
			 	 }
			 }
		 }
	}
	
	public function user_can_view_the_post($block, $block_or_show, $user_levels, $target_levels, $post_id){
		/*
		 * @param :
		 * block = int (0 or 1)
		 * block_or_show = string 'block' or 'show'
	 	 * user_levels = string (all current user levels seppareted by comma)
	  	 * target levels = array (show/hide content for users with these levels)
		 * post_id = int
		 * @return int (0 or 1) 
		 */
		 if (empty($block)){
		 	 /// only if user can view the post (has passed the previous tests)
		 	 global $current_user;
			 $uid = (isset($current_user->ID)) ? $current_user->ID : 0;
			 $cookie_name = 'ihc_workflow_restrictions_' . $uid;
			 if (isset($_COOKIE[$cookie_name])){
			 	 $cookie_post_arr = $_COOKIE[$cookie_name];
			 	 $cookie_post_arr = stripslashes($cookie_post_arr);
				 $cookie_post_arr = unserialize($cookie_post_arr);
				 $count_views = count($cookie_post_arr);					 
			 } else {
			 	 $cookie_post_arr = array();
				 $count_views = 0;
			 }
				 			 
			 if ($uid && !current_user_can('administrator')){
				 $limit = $this->get_limit_count_for_user($uid, 'view_posts');
				 if ($limit!==FALSE && !in_array($post_id, $cookie_post_arr) && $limit<=$count_views){
					 return 1; /// do block			 	
				 } else {
				  	 $this->increment_user_posts_views($uid, $post_id);			
				 }					 
			 } else if ($uid==0){
			 	/// unreg user
			 	$limit = self::$metas['ihc_workflow_restrictions_post_views']['unreg'];
				if ($limit!==FALSE && !in_array($post_id, $cookie_post_arr) && $limit<=$count_views){
					 return 1; /// do block			 	
				} else {
				 	 $this->increment_user_posts_views($uid, $post_id);			
				}					
			 }
		 }
		 return $block;
	}
	
	private function increment_user_posts_views($uid=0, $post_id=0){
		/*
		 * @param int, int
		 * @return none
		 */
		 if (self::$just_once){
		 	return;
		 } else {
		 	self::$just_once = TRUE;
		 }		 
		 if ($post_id){ /// $uid && 
		 	 $cookie_name = 'ihc_workflow_restrictions_' . $uid;
		 	 if (isset($_COOKIE[$cookie_name])){
		 	 	 $array = $_COOKIE[$cookie_name];
				 $array = stripslashes($array);
				 $array = unserialize($array);
		 	 } else {
		 	 	 $array = array();
		 	 }
			 if (!in_array($post_id, $array)){
			 	 $array[] = $post_id;
			 }
			 $cookie_time = time() + ((int)self::$metas['ihc_workflow_restrictions_timelimit'] * 24 * 3600);
		 	 setcookie($cookie_name, serialize($array), $cookie_time, '/');
		 }
	}

	
	private function get_limit_count_for_user($uid=0, $type=''){
		/*
		 * @param int, string 
		 * @return int or boolean
		 */
		 if ($uid && $type && self::$metas){
			 switch ($type){
			  	case 'view_posts':
					$meta_name = 'ihc_workflow_restrictions_post_views';
					break;
				case 'comments':
					$meta_name = 'ihc_workflow_restrictions_posts_created';
					break;
				case 'add_posts':
					$meta_name = 'ihc_workflow_restrictions_comments_created';
					break;
			 }
		 	 $uid_levels = Ihc_Db::get_user_levels($uid, TRUE);		
			 if ($uid_levels && count($uid_levels)>0 && $meta_name && isset(self::$metas[$meta_name])){	 
				 $return_value = FALSE;
				 foreach ($uid_levels as $level_data){
					@$lid = $level_data['level_id'];
					if ($return_value==FALSE){
						if (isset(self::$metas[$meta_name][$lid]) && self::$metas[$meta_name][$lid]!=''){
							$return_value = self::$metas[$meta_name][$lid];									
						}
					} else if (isset(self::$metas[$meta_name][$lid]) && $return_value<self::$metas[$meta_name][$lid]){
						/// BIGGEST VALUE
						$return_value = self::$metas[$meta_name][$lid];
					}
				 }	
				 return $return_value;			 
			 } else {
			 	/// Registered user with no active level
			 	$lid = 'reg';
				if (isset(self::$metas[$meta_name][$lid]) && self::$metas[$meta_name][$lid]!=''){
					return self::$metas[$meta_name][$lid];									
				}			
			 }
		 }
		 return FALSE;
	}
	
}
	
endif;
