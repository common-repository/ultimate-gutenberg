<?php
/**
 * Theme info page
 *
 */

//Add the theme page
add_action('admin_menu', 'ug_add_ug_info');
function ug_add_ug_info(){

	if ( !current_user_can('install_plugins') ) {
		return;
	}

	$ug_info = add_menu_page( __('Ultimate Gutenberg','ultimate-gutenberg'), __('Ultimate Gutenberg','ultimate-gutenberg'), 'manage_options', 'ultimate-gutenberg-info.php', 'ug_info_page' );
}

//Callback
function ug_info_page() {
	$user = wp_get_current_user();
?>
	<div class="info-container">
		<p class="hello-user"><?php echo sprintf( __( 'Hello, %s,', 'ultimate-gutenberg' ), '<span>' . esc_html( ucfirst( $user->display_name ) ) . '</span>' ); ?></p>
		<h1 class="info-title"><?php echo sprintf( __( 'Welcome to Ultimate Gutenberg version %s', 'ultimate-gutenberg' ), esc_html( ULTIMATE_GUTENBERG_VERSION ) ); ?></h1>
		<p class="welcome-desc"><?php esc_html_e( 'Ultimate Gutenberg is now installed and ready to go. To help you with the next step, weâ€™ve gathered together on this page all the resources you might need. We hope you enjoy using Ultimate Gutenberg. ', 'ultimate-gutenberg' ); ?>


		<div class="theme-tabs">

			<div class="theme-tab-nav nav-tab-wrapper">
				<a href="#begin" data-target="begin" class="nav-button nav-tab begin active"><?php esc_html_e( 'Getting started', 'ultimate-gutenberg' ); ?></a>
				<a href="#actions" data-target="actions" class="nav-button actions nav-tab"><?php esc_html_e( 'Recommended Actions', 'ultimate-gutenberg' ); ?></a>
				<!--<a href="#support" data-target="support" class="nav-button support nav-tab"><?php //esc_html_e( 'Support', 'ultimate-gutenberg' ); ?></a>-->
				<a href="#table" data-target="table" class="nav-button table nav-tab"><?php esc_html_e( 'Free vs Premium', 'ultimate-gutenberg' ); ?></a>
			</div>

			<div class="theme-tab-wrapper">

				<div id="#begin" class="theme-tab begin show">
					<h3><?php esc_html_e( 'Step 1 - Implement recommended actions', 'ultimate-gutenberg' ); ?></h3>
					<p><?php esc_html_e( 'We\'ve made a list of steps for you to follow to get the most of Ultimate Gutenberg.', 'ultimate-gutenberg' ); ?></p>
					<p><a class="actions" href="#actions"><?php esc_html_e( 'Check recommended actions', 'ultimate-gutenberg' ); ?></a></p>
					<hr>
					<h3><?php esc_html_e( 'Step 2 - Read documentation', 'ultimate-gutenberg' ); ?></h3>
					<p><?php esc_html_e( 'Our documentation (including video tutorials) will have you up and running in no time.', 'ultimate-gutenberg' ); ?></p>
					<p><a href="https://idea-hack.com/ultimate-gutenberg" target="_blank"><?php esc_html_e( 'Documentation', 'ultimate-gutenberg' ); ?></a></p>
					<hr>
					<!--<h3><?php esc_html_e( 'Step 3 - Customize', 'ultimate-gutenberg' ); ?></h3>
					<p><?php esc_html_e( 'Use the Customizer to make Ultimate Gutenberg your own.', 'ultimate-gutenberg' ); ?></p>
					<p><a class="button button-primary button-large" href="<?php echo admin_url( 'customize.php' ); ?>"><?php esc_html_e( 'Go to Customizer', 'ultimate-gutenberg' ); ?></a></p>-->
				</div>

				<div id="#actions" class="theme-tab actions">
					<h3><?php esc_html_e( 'Install: Compatible Theme ', 'ultimate-gutenberg' ); ?></h3>
					<p><?php esc_html_e( 'It is highly recommended that you install the official Ultimate Gutenberg Compatible theme. Gutenberg Customs is usually affected by css written by 3rd party theme. If you feel a styling issue, please try our compatible theme, or make a bit cutomize by yourself.', 'ultimate-gutenberg' ); ?></p>

					<?php $so_url = 'https://idea-hack.com/brandia' ?>
					<p>
						<a target="_blank" class="button" href="<?php echo esc_url( $so_url ); ?>"><?php esc_html_e( 'Install and Activate', 'ultimate-gutenberg' ); ?></a>
					</p>
				</div>

				<!--<div id="#support" class="theme-tab support">
					<div class="column-wrapper">
						<div class="tab-column">
						<span class="dashicons dashicons-book-alt"></span>
						<h3><?php //esc_html_e( 'Documentation', 'ultimate-gutenberg' ); ?></h3>
						<p><?php//esc_html_e( 'Our documentation can help you learn how to use the theme and also provides you with premade code snippets and answers to FAQs.', 'ultimate-gutenberg' ); ?></p>
						<a href="https://idea-hack.com/ultimate-gutenberg" target="_blank"><?php //esc_html_e( 'See the Documentation', 'ultimate-gutenberg' ); ?></a>
						</div>
					</div>
				</div>-->
				<div id="#table" class="theme-tab table">
				<table class="widefat fixed featuresList">
				   <thead>
					<tr>
					 <td><strong><h3><?php esc_html_e( 'Feature', 'ultimate-gutenberg' ); ?></h3></strong></td>
					 <td style="width:20%;"><strong><h3><?php esc_html_e( 'Free', 'ultimate-gutenberg' ); ?></h3></strong></td>
					 <td style="width:20%;"><strong><h3><?php esc_html_e( 'Premium', 'ultimate-gutenberg' ); ?></h3></strong></td>
					</tr>
				   </thead>
				   <tbody>
					<tr>
					 <td><?php esc_html_e( 'Responsive', 'ultimate-gutenberg' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr>
					<tr>
					 <td><?php esc_html_e( 'Ready for the compatible theme created by Plugin Developer', 'ultimate-gutenberg' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/heading/"><?php esc_html_e( 'Heading', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="greenFeature"><span>1 desgin patters</span></td>
					 <td class="greenFeature"><span><b>8</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/button/"><?php esc_html_e( 'Button', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="greenFeature"><span>1 desgin patters</span></td>
					 <td class="greenFeature"><span><b>5</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/list/"><?php esc_html_e( 'List', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="greenFeature"><span>1 desgin patters</span></td>
					 <td class="greenFeature"><span><b>7</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/tips/"><?php esc_html_e( 'Tips', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="greenFeature"><span>1 desgin patters</span></td>
					 <td class="greenFeature"><span><b>5</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/blockquote/"><?php esc_html_e( 'Blockquote', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="greenFeature"><span>1 desgin patters</span></td>
					 <td class="greenFeature"><span><b>9</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/code/"><?php esc_html_e( 'Code', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="greenFeature"><span>1 desgin patters</span></td>
					 <td class="greenFeature"><span><b>2</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/tweet/"><?php esc_html_e( 'Tweet', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="greenFeature"><span>1 desgin patters</span></td>
					 <td class="greenFeature"><span><b>5</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/speak/"><?php esc_html_e( 'Speak', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span><b>1</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/step/"><?php esc_html_e( 'Step', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span><b>1</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/image/"><?php esc_html_e( 'Image', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span><b>1</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/codedemo/"><?php esc_html_e( 'CodeDemo', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span><b>12</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/pie-chart/"><?php esc_html_e( 'Pie Chart', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span><b>1</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><a href="https://idea-hack.com/ultimate-gutenberg/gutenberg-block/dl-list/"><?php esc_html_e( 'DL List', 'ultimate-gutenberg' ); ?></a></td>
					 <td class="greenFeature"><span>1 desgin patters</span></td>
					 <td class="greenFeature"><span><b>5</b> desgin patters</span></td>
					</tr>
					<tr>
					 <td><?php esc_html_e( 'Spacer', 'ultimate-gutenberg' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr>
					<tr>
					 <td><?php esc_html_e( 'Divider', 'ultimate-gutenberg' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr>
					 <td><?php esc_html_e( 'Priority support', 'ultimate-gutenberg' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr>
				   </tbody>
				  </table>
				</div>
			</div>
		</div>
	</div>
<?php
}
