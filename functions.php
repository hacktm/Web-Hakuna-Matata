<?php

class Tips_for_Trip {

	private $version = 1.0;
	private $textdomain = 'tipsfortrips';

	public $social_networks = array( 
		'facebook' => 'Facebook', 
		'twitter' => 'Twitter', 
		'gplus' => 'Google Plus', 
		'pinterest' => 'Pinterest', 
		'vimeo' => 'Vimeo', 
		'youtube-play' => 'YouTube', 
		'flickr' => 'Flickr', 
		'tumblr' => 'Tumblr', 
		'instagram' => 'Instagram', 
		'stumbleupon' => 'Stumble Upon', 
		'picasa' => 'Picasa' );
	private $countries = array(	
		'AF' => 'Afghanistan',
		'AX' => 'Aland Islands',
		'AL' => 'Albania',
		'DZ' => 'Algeria',
		'AS' => 'American Samoa',
		'AD' => 'Andorra',
		'AO' => 'Angola',
		'AI' => 'Anguilla',
		'AQ' => 'Antarctica',
		'AG' => 'Antigua And Barbuda',
		'AR' => 'Argentina',
		'AM' => 'Armenia',
		'AW' => 'Aruba',
		'AU' => 'Australia',
		'AT' => 'Austria',
		'AZ' => 'Azerbaijan',
		'BS' => 'Bahamas',
		'BH' => 'Bahrain',
		'BD' => 'Bangladesh',
		'BB' => 'Barbados',
		'BY' => 'Belarus',
		'BE' => 'Belgium',
		'BZ' => 'Belize',
		'BJ' => 'Benin',
		'BM' => 'Bermuda',
		'BT' => 'Bhutan',
		'BO' => 'Bolivia',
		'BA' => 'Bosnia And Herzegovina',
		'BW' => 'Botswana',
		'BV' => 'Bouvet Island',
		'BR' => 'Brazil',
		'IO' => 'British Indian Ocean Territory',
		'BN' => 'Brunei Darussalam',
		'BG' => 'Bulgaria',
		'BF' => 'Burkina Faso',
		'BI' => 'Burundi',
		'KH' => 'Cambodia',
		'CM' => 'Cameroon',
		'CA' => 'Canada',
		'CV' => 'Cape Verde',
		'KY' => 'Cayman Islands',
		'CF' => 'Central African Republic',
		'TD' => 'Chad',
		'CL' => 'Chile',
		'CN' => 'China',
		'CX' => 'Christmas Island',
		'CC' => 'Cocos (Keeling) Islands',
		'CO' => 'Colombia',
		'KM' => 'Comoros',
		'CG' => 'Congo',
		'CD' => 'Congo, Democratic Republic',
		'CK' => 'Cook Islands',
		'CR' => 'Costa Rica',
		'CI' => 'Cote D\'Ivoire',
		'HR' => 'Croatia',
		'CU' => 'Cuba',
		'CY' => 'Cyprus',
		'CZ' => 'Czech Republic',
		'DK' => 'Denmark',
		'DJ' => 'Djibouti',
		'DM' => 'Dominica',
		'DO' => 'Dominican Republic',
		'EC' => 'Ecuador',
		'EG' => 'Egypt',
		'SV' => 'El Salvador',
		'GQ' => 'Equatorial Guinea',
		'ER' => 'Eritrea',
		'EE' => 'Estonia',
		'ET' => 'Ethiopia',
		'FK' => 'Falkland Islands (Malvinas)',
		'FO' => 'Faroe Islands',
		'FJ' => 'Fiji',
		'FI' => 'Finland',
		'FR' => 'France',
		'GF' => 'French Guiana',
		'PF' => 'French Polynesia',
		'TF' => 'French Southern Territories',
		'GA' => 'Gabon',
		'GM' => 'Gambia',
		'GE' => 'Georgia',
		'DE' => 'Germany',
		'GH' => 'Ghana',
		'GI' => 'Gibraltar',
		'GR' => 'Greece',
		'GL' => 'Greenland',
		'GD' => 'Grenada',
		'GP' => 'Guadeloupe',
		'GU' => 'Guam',
		'GT' => 'Guatemala',
		'GG' => 'Guernsey',
		'GN' => 'Guinea',
		'GW' => 'Guinea-Bissau',
		'GY' => 'Guyana',
		'HT' => 'Haiti',
		'HM' => 'Heard Island & Mcdonald Islands',
		'VA' => 'Holy See (Vatican City State)',
		'HN' => 'Honduras',
		'HK' => 'Hong Kong',
		'HU' => 'Hungary',
		'IS' => 'Iceland',
		'IN' => 'India',
		'ID' => 'Indonesia',
		'IR' => 'Iran, Islamic Republic Of',
		'IQ' => 'Iraq',
		'IE' => 'Ireland',
		'IM' => 'Isle Of Man',
		'IL' => 'Israel',
		'IT' => 'Italy',
		'JM' => 'Jamaica',
		'JP' => 'Japan',
		'JE' => 'Jersey',
		'JO' => 'Jordan',
		'KZ' => 'Kazakhstan',
		'KE' => 'Kenya',
		'KI' => 'Kiribati',
		'KR' => 'Korea',
		'KW' => 'Kuwait',
		'KG' => 'Kyrgyzstan',
		'LA' => 'Lao People\'s Democratic Republic',
		'LV' => 'Latvia',
		'LB' => 'Lebanon',
		'LS' => 'Lesotho',
		'LR' => 'Liberia',
		'LY' => 'Libyan Arab Jamahiriya',
		'LI' => 'Liechtenstein',
		'LT' => 'Lithuania',
		'LU' => 'Luxembourg',
		'MO' => 'Macao',
		'MK' => 'Macedonia',
		'MG' => 'Madagascar',
		'MW' => 'Malawi',
		'MY' => 'Malaysia',
		'MV' => 'Maldives',
		'ML' => 'Mali',
		'MT' => 'Malta',
		'MH' => 'Marshall Islands',
		'MQ' => 'Martinique',
		'MR' => 'Mauritania',
		'MU' => 'Mauritius',
		'YT' => 'Mayotte',
		'MX' => 'Mexico',
		'FM' => 'Micronesia, Federated States Of',
		'MD' => 'Moldova',
		'MC' => 'Monaco',
		'MN' => 'Mongolia',
		'ME' => 'Montenegro',
		'MS' => 'Montserrat',
		'MA' => 'Morocco',
		'MZ' => 'Mozambique',
		'MM' => 'Myanmar',
		'NA' => 'Namibia',
		'NR' => 'Nauru',
		'NP' => 'Nepal',
		'NL' => 'Netherlands',
		'AN' => 'Netherlands Antilles',
		'NC' => 'New Caledonia',
		'NZ' => 'New Zealand',
		'NI' => 'Nicaragua',
		'NE' => 'Niger',
		'NG' => 'Nigeria',
		'NU' => 'Niue',
		'NF' => 'Norfolk Island',
		'MP' => 'Northern Mariana Islands',
		'NO' => 'Norway',
		'OM' => 'Oman',
		'PK' => 'Pakistan',
		'PW' => 'Palau',
		'PS' => 'Palestinian Territory, Occupied',
		'PA' => 'Panama',
		'PG' => 'Papua New Guinea',
		'PY' => 'Paraguay',
		'PE' => 'Peru',
		'PH' => 'Philippines',
		'PN' => 'Pitcairn',
		'PL' => 'Poland',
		'PT' => 'Portugal',
		'PR' => 'Puerto Rico',
		'QA' => 'Qatar',
		'RE' => 'Reunion',
		'RO' => 'Romania',
		'RU' => 'Russian Federation',
		'RW' => 'Rwanda',
		'BL' => 'Saint Barthelemy',
		'SH' => 'Saint Helena',
		'KN' => 'Saint Kitts And Nevis',
		'LC' => 'Saint Lucia',
		'MF' => 'Saint Martin',
		'PM' => 'Saint Pierre And Miquelon',
		'VC' => 'Saint Vincent And Grenadines',
		'WS' => 'Samoa',
		'SM' => 'San Marino',
		'ST' => 'Sao Tome And Principe',
		'SA' => 'Saudi Arabia',
		'SN' => 'Senegal',
		'RS' => 'Serbia',
		'SC' => 'Seychelles',
		'SL' => 'Sierra Leone',
		'SG' => 'Singapore',
		'SK' => 'Slovakia',
		'SI' => 'Slovenia',
		'SB' => 'Solomon Islands',
		'SO' => 'Somalia',
		'ZA' => 'South Africa',
		'GS' => 'South Georgia And Sandwich Isl.',
		'ES' => 'Spain',
		'LK' => 'Sri Lanka',
		'SD' => 'Sudan',
		'SR' => 'Suriname',
		'SJ' => 'Svalbard And Jan Mayen',
		'SZ' => 'Swaziland',
		'SE' => 'Sweden',
		'CH' => 'Switzerland',
		'SY' => 'Syrian Arab Republic',
		'TW' => 'Taiwan',
		'TJ' => 'Tajikistan',
		'TZ' => 'Tanzania',
		'TH' => 'Thailand',
		'TL' => 'Timor-Leste',
		'TG' => 'Togo',
		'TK' => 'Tokelau',
		'TO' => 'Tonga',
		'TT' => 'Trinidad And Tobago',
		'TN' => 'Tunisia',
		'TR' => 'Turkey',
		'TM' => 'Turkmenistan',
		'TC' => 'Turks And Caicos Islands',
		'TV' => 'Tuvalu',
		'UG' => 'Uganda',
		'UA' => 'Ukraine',
		'AE' => 'United Arab Emirates',
		'GB' => 'United Kingdom',
		'US' => 'United States',
		'UM' => 'United States Outlying Islands',
		'UY' => 'Uruguay',
		'UZ' => 'Uzbekistan',
		'VU' => 'Vanuatu',
		'VE' => 'Venezuela',
		'VN' => 'Viet Nam',
		'VG' => 'Virgin Islands, British',
		'VI' => 'Virgin Islands, U.S.',
		'WF' => 'Wallis And Futuna',
		'EH' => 'Western Sahara',
		'YE' => 'Yemen',
		'ZM' => 'Zambia',
		'ZW' => 'Zimbabwe',
	);
	
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
	}

	public function setup() {
        add_image_size( 'single-image', 9999, 600, true);

        add_action( 'pre_get_posts', array( $this, 'restrict_media_library' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scrips' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scrips' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'login_enqueue_scrips' ) );
		add_action( 'admin_init', array( $this, 'edit_capabilities' ) );
		add_action( 'admin_init', array( $this, 'manage_pages' ) );
		add_action( 'admin_menu', array( $this, 'deactivate_dashboard_widgets' ) );
		add_action( 'wp_dashboard_setup', array( $this, 'manage_dashboard_widgets' ) );
		add_action( 'save_post', array( $this, 'save_meta_box_data' ) );
		add_filter('show_admin_bar', '__return_true');

		add_action( 'add_meta_boxes', array( $this, 'manage_metaboxes' ) );
		add_action( 'init', array( $this, 'setup_default_categories' ) );
		add_filter( 'login_headerurl', array( $this, 'login_logo_url' ) );
		add_action( 'admin_bar_menu', array( $this, 'remove_nodes'), 999 );
		add_action( 'admin_head-profile.php', array( $this, 'profile_subject_start' ) );
		add_action( 'admin_footer-profile.php', array( $this, 'profile_subject_end' ) );
		add_filter( 'user_contactmethods', array( $this, 'modify_contact_methods' ) );

		remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
	}

	public function enqueue_scrips() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'google-geochart', 'https://www.google.com/jsapi', array(), $this->version, true );
		wp_enqueue_script( 'google-maps', '//maps.google.com/maps/api/js?sensor=false', array(), $this->version, true );
		wp_enqueue_script( 'map-generator', get_template_directory_uri() . '/js/map_generator.js', array( 'google-maps' ), $this->version, true );
		wp_enqueue_script( 'general', get_template_directory_uri() . '/js/general.js', array( 'jquery', 'google-geochart', 'google-maps' ), $this->version, true );

		wp_enqueue_style( 'general-style', get_template_directory_uri() . '/style.css', array(), $this->version );
	}

	public function admin_enqueue_scrips() {
		wp_enqueue_script( 'google-geochart', 'https://www.google.com/jsapi', array(), $this->version, true );
		wp_enqueue_script( 'google-maps', '//maps.google.com/maps/api/js?sensor=false', array(), $this->version, true );
		wp_enqueue_script( 'map-generator', get_template_directory_uri() . '/js/map_generator.js', array( 'google-maps' ), $this->version, true );
		wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/js/admin.js', array( 'google-geochart', 'google-maps', 'map-generator' ), $this->version, true );

		wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/admin.css', array(), $this->version );
	}

	public function login_enqueue_scrips() {
		wp_enqueue_style( 'login-style', get_template_directory_uri() . '/css/login.css', array(), $this->version );

	}

	public function login_logo_url() {
		return home_url();
	}

	public function modify_contact_methods( $profile_fields ) {
		foreach( $this->social_networks as $key => $value ) {
			$profile_fields[ $key ] = $value;
		}

		return $profile_fields;
	}

	public function remove_personal_options( $subject ) {
    		$subject = preg_replace( '#<h3>Personal Options</h3>.+?/table>#s', '', $subject, 1 );
    		return $subject;
  	}

	public function profile_subject_start() {
		ob_start( array( $this, 'remove_personal_options' ) );
	}

	public function profile_subject_end() {
		ob_end_flush();
	}

	public function remove_nodes( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'wp-logo' );	
		$wp_admin_bar->remove_node( 'comments' );	
	}

	public function edit_capabilities() {
		remove_role( 'traveler');
		add_role( 'traveler', __( 'Traveler', 'tipsfortrips' ) , array(
			'traveler' => true,
			'read' => true,
			'edit_post' => true,
			'read_post' => true,
			'delete_post' => true,
			'edit_posts' => true,
			'edit_published_posts' => true,
			'publish_posts' => true,
			'delete_posts' => true,
			'delete_published' => true,
			'edit_others_posts' => false,
			'moderate_comments' => false,
			'upload_files' => true
		));
	}

	public function manage_pages() {
		if( current_user_can( 'traveler' ) ) {
			remove_menu_page( 'edit-comments.php' );
			remove_menu_page( 'tools.php' );
		}
	}

	public function manage_dashboard_widgets() {
		wp_add_dashboard_widget( 'traveler_map', __( 'Where I traveled', 'tipsfortrips' ) , array( $this, 'user_travel_map_widget' ) );
		wp_add_dashboard_widget( 'overview', __( 'Overview', 'tipsfortrips' ), array( $this, 'user_overview' ) );
	}

	public function deactivate_dashboard_widgets() {
		if( current_user_can( 'traveler' ) ) {
			remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_activity', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );

			remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
		}
	}

	public function user_travel_map_widget() { ?>
		<div id="travel-map" data-countries='<?php echo json_encode( array( 'RU', 'US', 'RO' ) ); ?>'>

		</div>
	<?php }

	public function user_overview() { ?>
        <!--published travel stories-->
        <p>Number of stories I published: <strong>46</strong></p>
        <!--total visited countries-->
        <p>Total no. of visited countries:</p>
        <progress title="46/193" value="46" max="193"></progress>
        <!--last visited country-->
        <p>Last visited country: <strong>Romania</strong></p>
        <?php
	}

	function restrict_media_library( $wp_query_obj ) {
		global $current_user, $pagenow;
		if( !is_a( $current_user, 'WP_User') )
			return;
		if( 'admin-ajax.php' != $pagenow || $_REQUEST['action'] != 'query-attachments' )
			return;
		if( !current_user_can('manage_media_library') && current_user_can( 'traveler' ) )
			$wp_query_obj->set('author', $current_user->ID );
		return;
	}

	function setup_default_categories() {

		unregister_taxonomy_for_object_type('post_tag', 'post');

		foreach ( $this->countries as $code => $name ) {
			if( ! term_exists( $name, 'category' ) ) {
				wp_insert_term( $name, 'category', array( 'slug' => $code ) );
			}
		}
	}

	function manage_metaboxes() {
		add_meta_box( 'location-selection',
			__( 'Story location', 'tipsfortrips' ),
			array($this, 'location_selection'),
			'post',
			'normal',
			0 );
	}

	function location_selection( $post ) {
		$lat = get_post_meta( $post->ID, 'lat', true );
		$lng = get_post_meta( $post->ID, 'lng', true );
		?>
		<div id="location-selection-map"></div>
        <div id="latitude">
            <label for="lat"><?php _e( 'Latitude', 'tipsfortrips' ); ?></label><input id="lat" name="lat" type="text" value="<?php echo $lat; ?>"/>
        </div>
        <div id="longitude">
            <label for="lng"><?php _e( 'Longitude', 'tipsfortrips' ); ?></label><input id="lng" name="lng" type="text" value="<?php echo $lng; ?>"/>
        </div>
	<?php }


	function save_meta_box_data( $id ) {
		if( get_post_type() == 'post' ) {
			if( isset( $_POST['lat'] ) ) {
				update_post_meta( $id, 'lat', floatval( $_POST['lat'] ) );
			}
			if( isset( $_POST['lng'] ) ) {
				update_post_meta( $id, 'lng', floatval( $_POST['lng'] ) );
			}
		}
	}
}

global $theme;
$theme = new Tips_for_Trip();
