<?php

/**
 * The application configuration file, used to setup globally used values throughout the application
 */
return array(
    /**
     * Default metas
     */
    '_metas' => array(
        'title' => 'Quick Admin',
    ),
    
    /**
     * Common titles
     */
    '_site' => array(
        'title' => 'Quick Admin',
        'footer_title' => 'Silu'
    ),
    
    /**
     * The menu items shown at the menu of the application
     */
    'menu_items' => array(
        '/' => array(
            'type' => 'simple',
            'name' => 'Dashboard',
            'icon' => 'dashboard'
        ),
        'users' => array(
            'type' => 'nested',
            'name' => 'Users',
            'icon' => 'user',
            'role' => 'admin',
            'items' => array(
                'users' => array(
                    'name' => 'List',
                    'role' => 'admin',
                ),
                'users/edit' => array(
                    'name' => 'Create user',
                    'role' => 'admin',
                )
            )
        )
    )
);
