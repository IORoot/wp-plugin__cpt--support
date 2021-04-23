<?php

namespace andyp\cpt\support\register;

class taxonomy
{

	public $singular = '';

	public $plural = '';

	public $taxonomy = '';


	/**
	 * Capitalized.
	 * 
	 * Something like 'Tutorial' or 'Article'
	 */
	public function set_singular($name)
	{
		$this->singular = ucfirst($name);
		$this->plural = [ strtolower($name) . 's' ];
	}


	/**
	 * All lowercase.
	 * 
	 * Register something like 'tutorial_category' or 'article_category'.
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
		add_action( 'init', array($this, 'callback_to_add_taxonomy'), 5 );
	}


	/**
	 * Callback to run.
	 * (make sure its a public method)
	 */
	public function callback_to_add_taxonomy()
	{
		if (empty($this->singular)) { return; }
		if (empty($this->plural))   { return; }
		if (empty($this->taxonomy)) { return; }


		$result = register_taxonomy( 
			$this->taxonomy, 
			strtolower($this->singular), 
			[
				'labels'                     => [
					'name'                       => $this->singular . ' Category',
					'singular_name'              => $this->singular . ' Category',
					'menu_name'                  => $this->singular . ' Category',
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
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
				'rewrite'                    => [
					'slug'         => $this->taxonomy, 
					'with_front'   => false,
					'hierarchical' => true
				],
			] 
		);

		$result = register_taxonomy_for_object_type($this->taxonomy, strtolower($this->singular));

	}


}
