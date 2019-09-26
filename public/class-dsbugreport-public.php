<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       designstudio.com
 * @since      1.0.0
 *
 * @package    Dsbugreport
 * @subpackage Dsbugreport/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Dsbugreport
 * @subpackage Dsbugreport/public
 * @author     DesignStudio <Devteam1@designstudio.com>
 */
class Dsbugreport_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dsbugreport_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dsbugreport_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dsbugreport-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dsbugreport_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dsbugreport_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dsbugreport-public.js', array('jquery'), $this->version, false );
		

	}


	
	/**
	 * Pop Up for bug report.
	 * here is where you add the form
	 * @since    1.0.0
	 */
	public function pop_up() {

	echo '<div id="dsBugReport">
	        <div class="dsBugReportClose">X</div>
			<h2>DesignStudio Bug Report</h2>
			<p>Hello! please let us know if you found a bug so we can fix this ASAP</p>
			<form action="/wp-content/plugins/dsbugreport/public/dsbugreport-email.php" method="post">
			<div class="form-group">
			  <input type="text" name="email" required="required"/>
			  <label for="input" class="control-label">Your Email</label><i class="bar"></i>
			</div>
			<div class="form-group">
			  <textarea name="bug" required="required"></textarea>
			  <label for="textarea" class="control-label">Please describe the bug</label><i class="bar"></i>
			</div>
			<input type="hidden" name="site" value=http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '>
			
			<div class="button-container">
			<button type="submit" class="button"><span>Submit</span></button>
		  </div>
			</form>
		</div>';
	}
}
