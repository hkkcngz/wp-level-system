<?php
global $wpdb, $post, $current_user;
get_currentuserinfo();
$userId = $current_user->ID;
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
$where = 'WHERE comment_approved = 1 AND user_id = ' . $curauth->ID ;
$comment_count = $wpdb->get_var("SELECT COUNT( * ) AS total 
                                 FROM {$wpdb->comments}
                                 {$where}");
$user_post_count = count_user_posts( $curauth->ID , "post" ); 
$exp = $user_post_count + ( $comment_count / 4 );

get_header(); ?>

<?php  // Simple Wordpress Authors Level System by fLuX

				if ( $exp == 0 ) {
					echo 'Level 0  ve ' . $exp . ' Puan <br> ☆☆☆☆☆';
				}
				else if ( $exp > 0 && $exp < 1 ) {
					echo 'Level 1 ve ' . $exp . ' Puan <br> ★☆☆☆☆';
				} 
				else if ( $exp > 1 && $exp < 5 ) {
					echo 'Level 2 ve ' . $exp . ' Puan <br> ★★☆☆☆';
				} 
				else if ( $exp > 5 && $exp < 10 ) {
					echo 'Level 3 ve ' . $exp . ' Puan <br> ★★★☆☆';
				}
				else if ( $exp > 10 && $exp < 30 ) {
					echo 'Level 4 ve ' . $exp . ' Puan <br> ★★★★☆';
				}
				else if ( $exp > 30 && $exp < 70 ) {
					echo 'Level 5 ve ' . $exp . ' Puan <br> ★★★★★';
				}
				else if ( $exp > 70 && $exp < 100 ) {
					echo 'Level 6 ve ' . $exp . ' Puan <br> ♡♡♡♡♡';
				}
				else {
					echo 'Level 7 ve ' . $exp . ' Puan <br> ♥♡♡♡♡';
				}
?>
