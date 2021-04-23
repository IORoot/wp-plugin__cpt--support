<?php

namespace andyp\cpt\support\register;

class tags
{

	public $singular = '';

	public $plural = '';

	public $taxonomy = '';


	/**
	 * Something like 'Tutorial' or 'Article'
	 */
	public function set_singular($name)
	{
		$this->singular = ucfirst($name);
		$this->plural = [ strtolower($name . 's') ];
	}


	/**
	 * Register something like 'tutorial_tags' or 'article_tags'.
	 */
	public function set_taxonomy($taxonomy)
	{
		$this->taxonomy = $taxonomy;
	}


	/**
	 * Register on init
	 */
	public function register_on_init()
	{
		add_action( 'init', array($this, 'callback_to_add_tags'), 5 );
	}


	/**
	 * Callback to run.
	 * (make sure its a public method)
	 */
	public function callback_to_add_tags()
	{
		if (empty($this->singular)) { return; }
		if (empty($this->plural))   { return; }
		if (empty($this->taxonomy)) { return; }

		register_taxonomy( 
			$this->taxonomy, 
			$this->singular, 
			[
				'labels'                     => [
					'name'                       => $this->singular .' Tags',
					'singular_name'              => $this->singular .' Tag',
					'menu_name'                  => $this->singular .' Tags',
					'all_items'                  => 'All Items',
					'parent_item'                => 'Parent Item',
					'parent_item_colon'          => 'Parent Item:',
					'new_item_name'              => 'New Item Name',
					'add_new_item'               => 'Add New Item',
					'edit_item'                  => 'Edit Item',
					'update_item'                => 'Update Item',
					'view_item'                  => 'View Item',
					'separate_items_with_commas' => 'Separate items with commas',
					'add_or_remove_items'        => 'Add or remove items',
					'choose_from_most_used'      => 'Choose from the most used',
					'popular_items'              => 'Popular Items',
					'search_items'               => 'Search Items',
					'not_found'                  => 'Not Found',
					'no_terms'                   => 'No items',
					'items_list'                 => 'Items list',
					'items_list_navigation'      => 'Items list navigation',
				],
				'hierarchical'               => false,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
				'rewrite'                    => [
					'slug'         => $this->taxonomy, 
					'with_front'   => true,
				],
			] 
		);
	}

}
