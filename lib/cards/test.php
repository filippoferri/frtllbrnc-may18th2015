<?php

class big_card extends PT_Shortcode{

	/* Element icon ca be any HTML but we suggest to you to use font awesome icons */
	public $icon = '<span class="fa fa-bars"></span>';
	/* Element name is the name which will be displayed in the list of the available elements to add */
	public $name = 'Big Card';
	/* For the description you can write about what your element do */
	public $description = 'Card full window ';
	/* 	Since the list of the elements have filter you can select in which category your element should be added.
		This filter is dynamic and no predefined categories exists so you can type here anythng
	*/
	public $category = 'Cards';

	/* This is the array of the default values for the element options */
	public $default_options = array(
		'element_name' => 'Big Card',
		'extra_class' => ''
	);

	function __construct(){
		parent::__construct();
	}

	public function shortcode_frontend( $atts, $content ){
		extract( shortcode_atts( $this->default_options, $atts ) );

		$html = '<div class="'.$extra_class.'">I\'m a new card</div>';

		return $html;
	}

	public function shortcode_options( $atts ){
		extract( shortcode_atts( $this->default_options, $atts ) );

		$options = array(
			array(
				/*  Name of the option. Same as the associated key in the $defaul_options array */
				'id' => 'element_name',
				'title' => __( 'Titolo', 'sage' ),
				'desc' => __( 'Input custom element name for easy recognition.', 'pt-builder' ),
				/* Type of the option */
				'type' => 'textfield',
				/* Value for the option */
				'value' => $element_name
			),
			array(
				'id' => 'extra_class',
				'title' => __( 'Contenuto', 'sage' ),
				'desc' => __( 'Input extra class for the element.', 'pt-builder' ),
				'type' => 'textfield',
				'value' => $extra_class
			),
		);

		$options_html = new PT_Options( $options );
		return $options_html->get_options();
	}
}

new big_card();

?>
