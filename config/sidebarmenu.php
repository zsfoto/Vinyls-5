<?php
return [
	'Theme' => [
		'admin' => [
			'sidebar' => [
				'title' => 'JeffAdmin5',
				
			],
			'sidebarMenu' => [
				'Admin' => [
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Albums'),
						'controller'=> 'Albums',
						'action' 	=> 'index',
					],
					
					//[
					//	'type' 		=> 'menu',
					//	'icon' 		=> 'fa fa-fw fa-bars',
					//	'title'		=> __('Categories'),
					//	'controller'=> 'Categories',
					//	'action' 	=> 'index',
					//],
					//[
					//	'type' 		=> 'submenu',
					//	'title'		=> __('Tables'),
					//	'icon'		=> 'fa fa-fw fa-table',
					//	'items'		=> [
					//		[
					//			'title' 		=> __('Posts'),
					//			'controller' 	=> 'Posts',
					//			'action' 		=> 'index',								
					//		],
					//		[
					//			'title' 		=> __('Categories'),
					//			'controller' 	=> 'Categories',
					//			'action' 		=> 'index',								
					//		],
					//	]
					//],
				],				
			]		
		]	
	],

];

?>
