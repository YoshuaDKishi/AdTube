<?php
/**
 * BackPress Scripts Procedural API
 *
 * @since 2.6.0
 *
 * @package WordPress
 * @subpackage BackPress
 */

/**
 * Initialize $wp_scripts if it has not been set.
 *
 * @global WP_Scripts $wp_scripts
 *
 * @since 4.2.0
 *
 * @return WP_Scripts WP_Scripts instance.
 */
function wp_scripts() {
	global $wp_scripts;
	if ( ! ( $wp_scripts instanceof WP_Scripts ) ) {
		$wp_scripts = new WP_Scripts();
	}
	return $wp_scripts;
}

/**
 * Helper function to output a _doing_it_wrong message when applicable.
 *
 * @ignore
 * @since 4.2.0
 *
 * @param string $function Function name.
 */
function _wp_scripts_maybe_doing_it_wrong( $function ) {
	if ( did_action( 'init' ) ) {
		return;
	}

	_doing_it_wrong( $function, sprintf(
		__( 'Scripts and styles should not be registered or enqueued until the %1$s, %2$s, or %3$s hooks.' ),
		'<code>wp_enqueue_scripts</code>',
		'<code>admin_enqueue_scripts</code>',
		'<code>login_enqueue_scripts</code>'
	), '3.3' );
}

/**
 * Print scripts in document head that are in the $handles queue.
 *
 * Called by admin-header.php and wp_head hook. Since it is called by wp_head on every page load,
 * the function does not instantiate the WP_Scripts object unless script names are explicitly passed.
 * Makes use of already-instantiated $wp_scripts global if present. Use provided wp_print_scripts
 * hook to register/enqueue new scripts.
 *
 * @see WP_Scripts::do_items()
 * @global WP_Scripts $wp_scripts The WP_Scripts object for printing scripts.
 *
 * @since 2.6.0
 *
 * @param string|bool|array $handles Optional. Scripts to be printed. Default 'false'.
 * @return array On success, a processed array of WP_Dependencies items; otherwise, an empty array.
 */
function wp_print_scripts( $handles = false ) {
	/**
	 * Fires before scripts in the $handles queue are printed.
	 *
	 * @since 2.1.0
	 */
	do_action( 'wp_print_scripts' );
	if ( '' === $handles ) { // for wp_head
		$handles = false;
	}

	_wp_scripts_maybe_doing_it_wrong( __FUNCTION__ );

	global $wp_scripts;
	if ( ! ( $wp_scripts instanceof WP_Scripts ) ) {
		if ( ! $handles ) {
			return array(); // No need to instantiate if nothing is there.
		}
	}

	return wp_scripts()->do_items( $handles );
}

/**
 * Register a new script.
 *
 * Registers a script to be linked later using the wp_enqueue_script() function.
 *
 * @see WP_Dependencies::add(), WP_Dependencies::add_data()
 *
 * @since 2.6.0
 * @since 4.3.0 A return value was added.
 *
 * @param string      $handle    Name of the script. Should be unique.
 * @param string      $src       Path to the script from the WordPress root directory. Example: '/js/myscript.js'.
 * @param array       $deps      Optional. An array of registered script handles this script depends on. Set to false if there
 *                               are no dependencies. Default empty array.
 * @param string|bool $ver       Optional. String specifying script version number, if it has one, which is concatenated
 *                               to end of path as a query string. If no version is specified or set to false, a version
 *                               number is automatically added equal to current installed WordPress version.
 *                               If set to null, no version is added. Default 'false'. Accepts 'false', 'null', or 'string'.
 * @param bool        $in_footer Optional. Whether to enqueue the script before </head> or before </body>.
 *                               Default 'false'. Accepts 'false' or 'true'.
 * @return bool Whether the script has been registered. True on success, false on failure.
 */
function wp_register_script( $handle, $src, $deps = array(), $ver = false, $in_footer = false ) {
	$wp_scripts = wp_scripts();
	_wp_scripts_maybe_doing_it_wrong( __FUNCTION__ );

	$registered = $wp_scripts->add( $handle, $src, $deps, $ver );
	if ( $in_footer ) {
		$wp_scripts->add_data( $handle, 'group', 1 );
	}

	return $registered;
}


//他の人の投稿を見れないようにする

function exclude_other_posts( $wp_query ) {
    if ( isset( $_REQUEST['post_type'] ) && post_type_exists( $_REQUEST['post_type'] ) ) {
        $post_type = get_post_type_object( $_REQUEST['post_type'] );
        $cap_type = $post_type->cap->edit_other_posts;
    } else {
        $cap_type = 'edit_others_posts';
    }
 
    if ( is_admin() && $wp_query->is_main_query() && ! $wp_query->get( 'author' ) && ! current_user_can( $cap_type ) ) {
        $user = wp_get_current_user();
        $wp_query->set( 'author', $user->ID );
    }
}
add_action( 'pre_get_posts', 'exclude_other_posts' );


function custom_login_logo() {
 echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/logo-login.gif) 50% 50% no-repeat !important; }</style>';
 }
add_action('login_head', 'custom_login_logo');


// バージョン更新を非表示にする
add_filter('pre_site_transient_update_core', '__return_zero');

// フッターWordPressリンクを非表示に
function custom_admin_footer() {
 echo '<a href="mailto:xxx@zzz">お問い合わせ</a>';
 }
add_filter('admin_footer_text', 'custom_admin_footer');

// 管理バーの項目を非表示
function remove_admin_bar_menu( $wp_admin_bar ) {
 $wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressシンボルマーク
 $wp_admin_bar->remove_menu('my-account'); // マイアカウント
 }
add_action( 'admin_bar_menu', 'remove_admin_bar_menu', 70 );

// 管理バーのヘルプメニューを非表示にする
function my_admin_head(){
 echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
 }
add_action('admin_head', 'my_admin_head');

// 管理バーにログアウトを追加
function add_new_item_in_admin_bar() {
 global $wp_admin_bar;
 $wp_admin_bar->add_menu(array(
 'id' => 'new_item_in_admin_bar',
 'title' => __('ログアウト'),
 'href' => wp_logout_url()
 ));
 }
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');


// ダッシュボードウィジェット非表示
function example_remove_dashboard_widgets() {
 if (!current_user_can('level_10')) { //level10以下のユーザーの場合ウィジェットをunsetする
 global $wp_meta_boxes;
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
 }
 }
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');


// メニューを非表示にする
function remove_menus () {
 if (!current_user_can('level_10')) { //level10以下のユーザーの場合メニューをunsetする
 remove_menu_page('wpcf7'); //Contact Form 7
 global $menu;
 unset($menu[2]); // ダッシュボード
 unset($menu[4]); // メニューの線1
 unset($menu[10]); // メディア
 unset($menu[15]); // リンク
 unset($menu[20]); // ページ
 unset($menu[25]); // コメント
 unset($menu[59]); // メニューの線2
 unset($menu[60]); // テーマ
 unset($menu[65]); // プラグイン
 unset($menu[75]); // ツール
 unset($menu[80]); // 設定
 unset($menu[90]); // メニューの線3
 }
 }
add_action('admin_menu', 'remove_menus');


// 投稿画面の項目を非表示にする
function remove_default_post_screen_metaboxes() {
 if (!current_user_can('level_10')) { // level10以下のユーザーの場合メニューをremoveする
 remove_meta_box( 'postcustom','post','normal' ); // カスタムフィールド
 remove_meta_box( 'postexcerpt','post','normal' ); // 抜粋
 remove_meta_box( 'commentstatusdiv','post','normal' ); // ディスカッション
 remove_meta_box( 'commentsdiv','post','normal' ); // コメント
 remove_meta_box( 'trackbacksdiv','post','normal' ); // トラックバック
 remove_meta_box( 'authordiv','post','normal' ); // 作成者
 remove_meta_box( 'slugdiv','post','normal' ); // スラッグ
 remove_meta_box( 'revisionsdiv','post','normal' ); // リビジョン
 }
 }
add_action('admin_menu','remove_default_post_screen_metaboxes');


/**
 * Localize a script.
 *
 * Works only if the script has already been added.
 *
 * Accepts an associative array $l10n and creates a JavaScript object:
 *
 *     "$object_name" = {
 *         key: value,
 *         key: value,
 *         ...
 *     }
 *
 *
 * @see WP_Dependencies::localize()
 * @link https://core.trac.wordpress.org/ticket/11520
 * @global WP_Scripts $wp_scripts The WP_Scripts object for printing scripts.
 *
 * @since 2.6.0
 *
 * @todo Documentation cleanup
 *
 * @param string $handle      Script handle the data will be attached to.
 * @param string $object_name Name for the JavaScript object. Passed directly, so it should be qualified JS variable.
 *                            Example: '/[a-zA-Z0-9_]+/'.
 * @param array $l10n         The data itself. The data can be either a single or multi-dimensional array.
 * @return bool True if the script was successfully localized, false otherwise.
 */
function wp_localize_script( $handle, $object_name, $l10n ) {
	global $wp_scripts;
	if ( ! ( $wp_scripts instanceof WP_Scripts ) ) {
		_wp_scripts_maybe_doing_it_wrong( __FUNCTION__ );
		return false;
	}

	return $wp_scripts->localize( $handle, $object_name, $l10n );
}

/**
 * Remove a registered script.
 *
 * Note: there are intentional safeguards in place to prevent critical admin scripts,
 * such as jQuery core, from being unregistered.
 *
 * @see WP_Dependencies::remove()
 *
 * @since 2.6.0
 *
 * @param string $handle Name of the script to be removed.
 */
function wp_deregister_script( $handle ) {
	_wp_scripts_maybe_doing_it_wrong( __FUNCTION__ );

	/**
	 * Do not allow accidental or negligent de-registering of critical scripts in the admin.
	 * Show minimal remorse if the correct hook is used.
	 */
	$current_filter = current_filter();
	if ( ( is_admin() && 'admin_enqueue_scripts' !== $current_filter ) ||
		( 'wp-login.php' === $GLOBALS['pagenow'] && 'login_enqueue_scripts' !== $current_filter )
	) {
		$no = array(
			'jquery', 'jquery-core', 'jquery-migrate', 'jquery-ui-core', 'jquery-ui-accordion',
			'jquery-ui-autocomplete', 'jquery-ui-button', 'jquery-ui-datepicker', 'jquery-ui-dialog',
			'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-menu', 'jquery-ui-mouse',
			'jquery-ui-position', 'jquery-ui-progressbar', 'jquery-ui-resizable', 'jquery-ui-selectable',
			'jquery-ui-slider', 'jquery-ui-sortable', 'jquery-ui-spinner', 'jquery-ui-tabs',
			'jquery-ui-tooltip', 'jquery-ui-widget', 'underscore', 'backbone',
		);

		if ( in_array( $handle, $no ) ) {
			$message = sprintf( __( 'Do not deregister the %1$s script in the administration area. To target the frontend theme, use the %2$s hook.' ),
				"<code>$handle</code>", '<code>wp_enqueue_scripts</code>' );
			_doing_it_wrong( __FUNCTION__, $message, '3.6' );
			return;
		}
	}

	wp_scripts()->remove( $handle );
}

/**
 * Enqueue a script.
 *
 * Registers the script if $src provided (does NOT overwrite), and enqueues it.
 *
 * @see WP_Dependencies::add(), WP_Dependencies::add_data(), WP_Dependencies::enqueue()
 *
 * @since 2.6.0
 *
 * @param string      $handle    Name of the script.
 * @param string|bool $src       Path to the script from the root directory of WordPress. Example: '/js/myscript.js'.
 * @param array       $deps      An array of registered handles this script depends on. Default empty array.
 * @param string|bool $ver       Optional. String specifying the script version number, if it has one. This parameter
 *                               is used to ensure that the correct version is sent to the client regardless of caching,
 *                               and so should be included if a version number is available and makes sense for the script.
 * @param bool        $in_footer Optional. Whether to enqueue the script before </head> or before </body>.
 *                               Default 'false'. Accepts 'false' or 'true'.
 */
function wp_enqueue_script( $handle, $src = false, $deps = array(), $ver = false, $in_footer = false ) {
	$wp_scripts = wp_scripts();

	_wp_scripts_maybe_doing_it_wrong( __FUNCTION__ );


	if ( $src || $in_footer ) {
		$_handle = explode( '?', $handle );

		if ( $src ) {
			$wp_scripts->add( $_handle[0], $src, $deps, $ver );
		}

		if ( $in_footer ) {
			$wp_scripts->add_data( $_handle[0], 'group', 1 );
		}
	}

	$wp_scripts->enqueue( $handle );
}

/**
 * Remove a previously enqueued script.
 *
 * @see WP_Dependencies::dequeue()
 *
 * @since 3.1.0
 *
 * @param string $handle Name of the script to be removed.
 */
function wp_dequeue_script( $handle ) {
	_wp_scripts_maybe_doing_it_wrong( __FUNCTION__ );

	wp_scripts()->dequeue( $handle );
}

/**
 * Check whether a script has been added to the queue.
 *
 * @since 2.8.0
 * @since 3.5.0 'enqueued' added as an alias of the 'queue' list.
 *
 * @param string $handle Name of the script.
 * @param string $list   Optional. Status of the script to check. Default 'enqueued'.
 *                       Accepts 'enqueued', 'registered', 'queue', 'to_do', and 'done'.
 * @return bool Whether the script script is queued.
 */
function wp_script_is( $handle, $list = 'enqueued' ) {
	_wp_scripts_maybe_doing_it_wrong( __FUNCTION__ );

	return (bool) wp_scripts()->query( $handle, $list );
}

/**
 * Add metadata to a script.
 *
 * Works only if the script has already been added.
 *
 * Possible values for $key and $value:
 * 'conditional' string Comments for IE 6, lte IE 7, etc.
 *
 * @since 4.2.0
 *
 * @see WP_Dependency::add_data()
 *
 * @param string $handle Name of the script.
 * @param string $key    Name of data point for which we're storing a value.
 * @param mixed  $value  String containing the data to be added.
 * @return bool True on success, false on failure.
 */
function wp_script_add_data( $handle, $key, $value ){
	return wp_scripts()->add_data( $handle, $key, $value );
}
