<?php
/*!
* WordPress Social Login
*
* http://hybridauth.sourceforge.net/wsl/index.html | http://github.com/hybridauth/WordPress-Social-Login
*    (c) 2011-2014 Mohamed Mrassi and contributors | http://wordpress.org/extend/plugins/wordpress-social-login/
*/

/**
* Widget Customization
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit; 

// --------------------------------------------------------------------

function wsl_component_bouncer_setup()
{
	// HOOKABLE:
	do_action( "wsl_component_bouncer_setup_start" );

	$sections = array(
		'wsl_widget'         => 'wsl_component_bouncer_setup_wsl_widget'        ,
		'profile_completion' => 'wsl_component_bouncer_setup_profile_completion',
		'user_moderation'    => 'wsl_component_bouncer_setup_user_moderation'   , 
		'membership_level'   => 'wsl_component_bouncer_setup_membership_level'  , 
		'filters_domains'    => 'wsl_component_bouncer_setup_filters_domains'   , 
		'filters_mails'      => 'wsl_component_bouncer_setup_filters_mails'     , 
		'filters_urls'       => 'wsl_component_bouncer_setup_filters_urls'      , 
	);

	$sections = apply_filters( 'wsl_component_buddypress_setup_alter_sections', $sections );
?>
<div>
	<?php
		foreach( $sections as $section => $action )
		{
			do_action( $action . '_start' );

			do_action( $action );

			do_action( $action . '_end' );
		}
	?>

	<br />

	<div style="margin-left:5px;margin-top:-20px;"> 
		<input type="submit" class="button-primary" value="<?php _wsl_e("Save Settings", 'wordpress-social-login') ?>" /> 
	</div>
</div>
<?php
	// HOOKABLE: 
	do_action( "wsl_component_bouncer_setup_end" );
}

// --------------------------------------------------------------------	

function wsl_component_bouncer_setup_wsl_widget()
{
?>
<div class="stuffbox">
	<h3>
		<label><?php _wsl_e("WSL Widget", 'wordpress-social-login') ?></label>
	</h3>
	<div class="inside"> 
		<p> 
			<?php _wsl_e("Here you can tell Bouncer if you are accepting new users registration and authentication into your website or not any more. Note that Bouncer only works for WSL and will not interfere with users authenticating through the regulars wordpress Login and Register pages with their usernames and passwords (to to achieve that kind of restrictions, you may need to use another plugin(s) in combination with WSL).", 'wordpress-social-login') ?>
		</p> 
		<table width="100%" border="0" cellpadding="5" cellspacing="2" style="border-top:1px solid #ccc;">  
		  <tr>
			<td width="200" align="right"><strong><?php _wsl_e("Accept new registration", 'wordpress-social-login') ?> :</strong></td>
			<td> 
				<select name="wsl_settings_bouncer_registration_enabled">
					<option <?php if( get_option( 'wsl_settings_bouncer_registration_enabled' ) == 1 ) echo "selected"; ?> value="1"><?php _wsl_e("Yes", 'wordpress-social-login') ?></option>
					<option <?php if( get_option( 'wsl_settings_bouncer_registration_enabled' ) == 2 ) echo "selected"; ?> value="2"><?php _wsl_e("No", 'wordpress-social-login') ?></option> 
				</select>
			</td>
		  </tr> 
		  <tr>
			<td width="200" align="right"><strong><?php _wsl_e("Allow authentication", 'wordpress-social-login') ?> :</strong></td>
			<td> 
				<select name="wsl_settings_bouncer_authentication_enabled">
					<option <?php if( get_option( 'wsl_settings_bouncer_authentication_enabled' ) == 1 ) echo "selected"; ?> value="1"><?php _wsl_e("Yes", 'wordpress-social-login') ?></option>
					<option <?php if( get_option( 'wsl_settings_bouncer_authentication_enabled' ) == 2 ) echo "selected"; ?> value="2"><?php _wsl_e("No", 'wordpress-social-login') ?></option> 
				</select>
			</td>
		  </tr> 
		</table>
	</div>
</div>
<?php
}

add_action( 'wsl_component_bouncer_setup_wsl_widget', 'wsl_component_bouncer_setup_wsl_widget' );

// --------------------------------------------------------------------	

function wsl_component_bouncer_setup_profile_completion()
{
?>
<div class="stuffbox">
	<h3>
		<label><?php _wsl_e("Profile Completion", 'wordpress-social-login') ?></label>
	</h3>
	<div class="inside"> 
		<p>
			<?php _wsl_e("Select required fields. If a social network doesn't return them, Bouncer will then ask your visitors to fill additional form to provide them when registering.", 'wordpress-social-login') ?> 
		</p>
		<p class="description">
			<?php _wsl_e("You may activate <b>Profile Completion</b> for both <b>E-mail</b> and <b>Username</b>, but keep in mind, the idea behind <b>social login</b> is to avoid forms and to remove the hassle of registration", 'wordpress-social-login') ?>.
		</p>
		<table width="100%" border="0" cellpadding="5" cellspacing="2" style="border-top:1px solid #ccc;">  
		  <tr>
			<td width="200" align="right"><strong><?php _wsl_e("Require E-mail", 'wordpress-social-login') ?> :</strong></td>
			<td> 
				<select name="wsl_settings_bouncer_profile_completion_require_email">
					<option <?php if( get_option( 'wsl_settings_bouncer_profile_completion_require_email' ) == 1 ) echo "selected"; ?> value="1"><?php _wsl_e("Yes", 'wordpress-social-login') ?></option>
					<option <?php if( get_option( 'wsl_settings_bouncer_profile_completion_require_email' ) == 2 ) echo "selected"; ?> value="2"><?php _wsl_e("No", 'wordpress-social-login') ?></option> 
				</select>
			</td>
		  </tr>
		  <tr>
			<td width="200" align="right"><strong><?php _wsl_e("Allow Username change", 'wordpress-social-login') ?> :</strong></td>
			<td>
				<select name="wsl_settings_bouncer_profile_completion_change_username">
					<option <?php if( get_option( 'wsl_settings_bouncer_profile_completion_change_username' ) == 1 ) echo "selected"; ?> value="1"><?php _wsl_e("Yes", 'wordpress-social-login') ?></option>
					<option <?php if( get_option( 'wsl_settings_bouncer_profile_completion_change_username' ) == 2 ) echo "selected"; ?> value="2"><?php _wsl_e("No", 'wordpress-social-login') ?></option> 
				</select>
			</td>
		  </tr>
		</table>  
	</div>
</div>
<?php
}

add_action( 'wsl_component_bouncer_setup_profile_completion', 'wsl_component_bouncer_setup_profile_completion' );

// --------------------------------------------------------------------	

function wsl_component_bouncer_setup_user_moderation()
{
?>
<div class="stuffbox">
	<h3>
		<label><?php _wsl_e("User Moderation", 'wordpress-social-login') ?></label>
	</h3>
	<div class="inside"> 
		<p> 
			<?php _wsl_e("<b>User Moderation</b> will define how <b>Bouncer</b> should behave with new registered users:", 'wordpress-social-login') ?>
		</p>
		<ul style="margin-left:30px">
			<li><?php _wsl_e("<b>None</b>: No moderation required.", 'wordpress-social-login') ?></li>
			<li><?php _wsl_e('<b>E-mail Confirmation</b>: New users will need to be confirm their e-mail address before they may log in', 'wordpress-social-login') ?>.</li>
			<li><?php _wsl_e('<b>Admin Approval</b>: New users will need to be approved by an administrator before they may log in', 'wordpress-social-login') ?>.</li>
		</ul> 
		<p>
			<?php _wsl_e('<b>Notes</b>', 'wordpress-social-login') ?>:
		</p> 
		<p class="description">
			1. <?php _wsl_e('Both <b>Admin Approval</b> and <b>E-mail Confirmation</b> requires <a href="http://wordpress.org/extend/plugins/theme-my-login/" target="_blank">Theme My Login Plugin</a> to be installed', 'wordpress-social-login') ?>.
			<br />
			2. <?php _wsl_e('<a href="http://wordpress.org/extend/plugins/theme-my-login/" target="_blank">Theme My Login</a>, is a free and open source plugin and <b>WordPress Social Login User Moderation</b> was purposely made compatible with it because it provides a solid <b>User Moderation</b> module and there is no point to reinvent the wheel', 'wordpress-social-login') ?>.
			<br />
			3. <?php _wsl_e('In order for this to work correctly, you will need to go to <b>Theme My Login</b> settings, then enable <b>User Moderation</b> and set <b>Moderation Type</b> to the same thing as the box bellow', 'wordpress-social-login') ?>.
		</p> 
		
		
		<table width="100%" border="0" cellpadding="5" cellspacing="2" style="border-top:1px solid #ccc;">  
		  <tr>
			<td width="200" align="right"><strong><?php _wsl_e("User Moderation", 'wordpress-social-login') ?> :</strong></td>
			<td> 
				<select name="wsl_settings_bouncer_new_users_moderation_level">
					<option <?php if( get_option( 'wsl_settings_bouncer_new_users_moderation_level' ) == 1 )   echo "selected"; ?> value="1"><?php _wsl_e("None", 'wordpress-social-login') ?></option> 
					<option <?php if( get_option( 'wsl_settings_bouncer_new_users_moderation_level' ) == 101 ) echo "selected"; ?> value="101"><?php _wsl_e("E-mail Confirmation &mdash; Yield to Theme My Login plugin", 'wordpress-social-login') ?></option> 
					<option <?php if( get_option( 'wsl_settings_bouncer_new_users_moderation_level' ) == 102 ) echo "selected"; ?> value="102"><?php _wsl_e("Admin Approval &mdash; Yield to Theme My Login plugin", 'wordpress-social-login') ?></option> 
				</select>
			</td>
		  </tr>
		</table>
	</div>
</div>
<?php
}

add_action( 'wsl_component_bouncer_setup_user_moderation', 'wsl_component_bouncer_setup_user_moderation' );

// --------------------------------------------------------------------	

function wsl_component_bouncer_setup_membership_level()
{
?>
<div class="stuffbox">
	<h3>
		<label><?php _wsl_e("Membership level", 'wordpress-social-login') ?></label>
	</h3>
	<div class="inside"> 
		<p>
			<?php _wsl_e("Here you can define the default role for new users authenticating through WSL", 'wordpress-social-login') ?>.
			<?php _wsl_e("Please, be extra carefull with this option, you ay be automatically giving someone elevated roles and capabilities", 'wordpress-social-login') ?>.
			<?php _wsl_e('For more information about WordPress users roles and capabilities refer to <a href="http://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table" target="_blank">http://codex.wordpress.org/Roles_and_Capabilities</a>', 'wordpress-social-login') ?>.
		</p>  
		<p class="description">
			<?php _wsl_e('<b>Notes:</b>', 'wordpress-social-login') ?>
			<br /><?php _wsl_e('1. If <b>User Moderation</b> is set to <code>Admin Approval</code> then <b>Membership level</b> will be ignored', 'wordpress-social-login') ?>. 
			<br /><?php _wsl_e('2. To assign the same default role as in your website <b>General Settings</b>, set this field to <code>default</code>', 'wordpress-social-login') ?>.
			<br /><?php _wsl_e('3. If you are not sure, leave this field to either <code>wslnorole</code> or blank (omitting the role will create a users with "No Role For This Site")', 'wordpress-social-login') ?>.
		</p> 
		<table width="100%" border="0" cellpadding="5" cellspacing="2" style="border-top:1px solid #ccc;">
		  <tr>
			<td width="200" align="right" nowrap><strong><?php _wsl_e("New WSL users default role", 'wordpress-social-login') ?> :</strong></td>
			<td>
				<input type="text" name="wsl_settings_bouncer_new_users_membership_default_role" class="inputgnrc" style="width:535px" value="<?php echo get_option( 'wsl_settings_bouncer_new_users_membership_default_role' ); ?>"> 
			</td>
		  </tr>  
		  <tr>
			<td colspan="2">
				<div class="fade updated">
					<p>
						<?php 
							$role = get_option( 'wsl_settings_bouncer_new_users_membership_default_role' );

							$role = $role == 'default' ?  get_option ('default_role') : $role;

							$role = get_role( $role );

							if( $role )
							{
								echo sprintf( _wsl__( "<b>New WSL users default role</b> is currently set to <b>&ldquo;%s&rdquo;</b>, which gives these capabilities: ", 'wordpress-social-login' ), get_option( 'wsl_settings_bouncer_new_users_membership_default_role' ) );

								$capabilities = array();

								foreach ( $role->capabilities as $k => $v )
								{
									if( $v && ! stristr( $k, 'level_' ) )
									{
										$capabilities[] = '<a href="http://codex.wordpress.org/Roles_and_Capabilities#' . $k . '" target="_blank">' . $k . '</a>' ;
									}
								}

								echo implode( ', ', $capabilities );
							}
							else
							{
								echo sprintf( _wsl__( "<b>New WSL users default role</b> is currently set to <b>&ldquo;%s&rdquo;</b>, which gives NO capabilities", 'wordpress-social-login' ), get_option( 'wsl_settings_bouncer_new_users_membership_default_role' ) );
							}
						?>.
					</p>
				</div>
			</td>
		  </tr>  
		</table>  
	</div>
</div>
<?php
}

add_action( 'wsl_component_bouncer_setup_membership_level', 'wsl_component_bouncer_setup_membership_level' );

// --------------------------------------------------------------------	

function wsl_component_bouncer_setup_filters_domains()
{
?>
<div class="stuffbox">
	<h3>
		<label><?php _wsl_e("Filters by emails domains name", 'wordpress-social-login') ?></label>
	</h3>
	<div class="inside"> 
		<p>
			<?php _wsl_e("Restrict registration to a limited number of domains name.", 'wordpress-social-login') ?>
			<br /><?php _wsl_e("Note that filtration domains name takes priority over filtration by e-mails addresses and profile urls", 'wordpress-social-login') ?>.
			<br /><?php _wsl_e("Insert one domain address per line and try to keep this list short (ex: <code>gmail.com</code>, without '@'). On <b>Bounce text</b> insert the text you want to display for rejected users", 'wordpress-social-login') ?>.
		</p>
		<table width="100%" border="0" cellpadding="5" cellspacing="2" style="border-top:1px solid #ccc;">  
		  <tr>
			<td width="200" align="right"><strong><?php _wsl_e("Enabled", 'wordpress-social-login') ?> :</strong></td>
			<td> 
				<select name="wsl_settings_bouncer_new_users_restrict_domain_enabled">
					<option <?php if( get_option( 'wsl_settings_bouncer_new_users_restrict_domain_enabled' ) == 1 ) echo "selected"; ?> value="1"><?php _wsl_e("Yes", 'wordpress-social-login') ?></option>
					<option <?php if( get_option( 'wsl_settings_bouncer_new_users_restrict_domain_enabled' ) == 2 ) echo "selected"; ?> value="2"><?php _wsl_e("No", 'wordpress-social-login') ?></option> 
				</select>
			</td>
		  </tr>   
		  <tr>
			<td width="200" align="right" valign="top"><p><strong><?php _wsl_e("Domains list", 'wordpress-social-login') ?> :</strong></p></td>
			<td>
				<textarea style="width:100%;height:60px;margin-top:6px;" name="wsl_settings_bouncer_new_users_restrict_domain_list"><?php echo get_option( 'wsl_settings_bouncer_new_users_restrict_domain_list' ); ?></textarea> 
			</td>
		  </tr>  
		  <tr>
			<td width="200" align="right" valign="top"><p><strong><?php _wsl_e("Bounce text", 'wordpress-social-login') ?> :</strong></p></td>
			<td> 
				<?php 
					wsl_render_wp_editor( "wsl_settings_bouncer_new_users_restrict_domain_text_bounce", get_option( 'wsl_settings_bouncer_new_users_restrict_domain_text_bounce' ) ); 
				?>
			</td>
		  </tr>
		</table>  
	</div>
</div>
<?php
}

add_action( 'wsl_component_bouncer_setup_filters_domains', 'wsl_component_bouncer_setup_filters_domains' );

// --------------------------------------------------------------------	

function wsl_component_bouncer_setup_filters_mails()
{
?>
<div class="stuffbox">
	<h3>
		<label><?php _wsl_e("Filters by e-mails addresses", 'wordpress-social-login') ?></label>
	</h3>
	<div class="inside"> 
		<p>
			<?php _wsl_e("Restrict registration to a limited number of emails addresses.", 'wordpress-social-login') ?> 
			<br /><?php _wsl_e("Note that filtration e-mails addresses takes priority over filtration by profile urls", 'wordpress-social-login') ?>.
			<br /><?php _wsl_e("Insert one email address per line and try to keep this list short (ex: <code>hybridauth@gmail.com</code>). On <b>Bounce text</b> insert the text you want to display for rejected users", 'wordpress-social-login') ?>.
		</p>
		<table width="100%" border="0" cellpadding="5" cellspacing="2" style="border-top:1px solid #ccc;">  
		  <tr>
			<td width="200" align="right"><strong><?php _wsl_e("Enabled", 'wordpress-social-login') ?> :</strong></td>
			<td> 
				<select name="wsl_settings_bouncer_new_users_restrict_email_enabled">
					<option <?php if( get_option( 'wsl_settings_bouncer_new_users_restrict_email_enabled' ) == 1 ) echo "selected"; ?> value="1"><?php _wsl_e("Yes", 'wordpress-social-login') ?></option>
					<option <?php if( get_option( 'wsl_settings_bouncer_new_users_restrict_email_enabled' ) == 2 ) echo "selected"; ?> value="2"><?php _wsl_e("No", 'wordpress-social-login') ?></option> 
				</select>
			</td>
		  </tr>   
		  <tr>
			<td width="200" align="right" valign="top"><p><strong><?php _wsl_e("E-mails list", 'wordpress-social-login') ?> :</strong></p></td>
			<td> 
				<textarea style="width:100%;height:60px;margin-top:6px;" name="wsl_settings_bouncer_new_users_restrict_email_list"><?php echo get_option( 'wsl_settings_bouncer_new_users_restrict_email_list' ); ?></textarea>  
			</td>
		  </tr>  
		  <tr>
			<td width="200" align="right" valign="top"><p><strong><?php _wsl_e("Bounce text", 'wordpress-social-login') ?> :</strong></p></td>
			<td> 
				<?php 
					wsl_render_wp_editor( "wsl_settings_bouncer_new_users_restrict_email_text_bounce", get_option( 'wsl_settings_bouncer_new_users_restrict_email_text_bounce' ) ); 
				?>
			</td>
		  </tr>  
		</table>  
	</div>
</div>
<?php
}

add_action( 'wsl_component_bouncer_setup_filters_mails', 'wsl_component_bouncer_setup_filters_mails' );

// --------------------------------------------------------------------	

function wsl_component_bouncer_setup_filters_urls()
{
?>
<div class="stuffbox">
	<h3>
		<label><?php _wsl_e("Filters by profile urls", 'wordpress-social-login') ?></label>
	</h3>
	<div class="inside"> 
		<p>
			<?php _wsl_e("Restrict registration to a limited number of profile urls", 'wordpress-social-login') ?>. 
			<br /><?php _wsl_e("<b>Note</b>: Some providers like Facebook can have multiples profiles URLs per user and WSL won't be able to recognize all them", 'wordpress-social-login') ?>. 
			<br /><?php _wsl_e("Insert one URL per line and try to keep this list short (ex: <code>https://twitter.com/HybridAuth</code>, <code>https://plus.google.com/u/0/108839241301472312344</code>). On <b>Bounce text</b> insert the text you want to display for rejected users", 'wordpress-social-login') ?>.
		</p>
		<table width="100%" border="0" cellpadding="5" cellspacing="2" style="border-top:1px solid #ccc;">  
		  <tr>
			<td width="200" align="right"><strong><?php _wsl_e("Enabled", 'wordpress-social-login') ?> :</strong></td>
			<td> 
				<select name="wsl_settings_bouncer_new_users_restrict_profile_enabled">
					<option <?php if( get_option( 'wsl_settings_bouncer_new_users_restrict_profile_enabled' ) == 1 ) echo "selected"; ?> value="1"><?php _wsl_e("Yes", 'wordpress-social-login') ?></option>
					<option <?php if( get_option( 'wsl_settings_bouncer_new_users_restrict_profile_enabled' ) == 2 ) echo "selected"; ?> value="2"><?php _wsl_e("No", 'wordpress-social-login') ?></option> 
				</select>
			</td>
		  </tr>   
		  <tr>
			<td width="200" align="right" valign="top"><p><strong><?php _wsl_e("Profile urls", 'wordpress-social-login') ?> :</strong></p></td>
			<td>
				<textarea style="width:100%;height:60px;margin-top:6px;" name="wsl_settings_bouncer_new_users_restrict_profile_list"><?php echo get_option( 'wsl_settings_bouncer_new_users_restrict_profile_list' ); ?></textarea>  
			</td>
		  </tr>  
		  <tr>
			<td width="200" align="right" valign="top"><p><strong><?php _wsl_e("Bounce text", 'wordpress-social-login') ?> :</strong></p></td>
			<td> 
				<?php 
					wsl_render_wp_editor( "wsl_settings_bouncer_new_users_restrict_profile_text_bounce", get_option( 'wsl_settings_bouncer_new_users_restrict_profile_text_bounce' ) ); 
				?>
			</td>
		  </tr>  
		</table>  
	</div>
</div>
<?php
}

add_action( 'wsl_component_bouncer_setup_filters_urls', 'wsl_component_bouncer_setup_filters_urls' );

// --------------------------------------------------------------------	
