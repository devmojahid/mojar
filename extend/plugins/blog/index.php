<?php

use App\classes\BasePlugin;

/**
 * Blog Plugin
 *
 * @package     Blog
 * @version     1.0.0
 * @link
 * @license     MIT
 */
class BlogPlugin extends BasePlugin
{

    /**
     * Plugin name.
     *
     * @var string
     */
    protected $name = 'Blog';

    /**
     * Plugin version.
     *
     * @var string
     */

    protected $version = '1.0.0';

    /**
     * Plugin author.
     *
     * @var string
     */
    protected $author = 'Mojahidul Islam';


    /**
     * Plugin constructor.
     *
     * @param string $name
     * @param string $version
     * @param string $author
     */
    public function __construct(string $name, string $version, string $author )
    {
        parent::__construct( $name, $version, $author );
    }


    /**
     * Activate the plugin.
     *
     * @return void
     */
    public function activate()
    {
        // Activate the plugin.
    }

    /**
     * Deactivate the plugin.
     *
     * @return void
     */
    public function deactivate()
    {
        // Deactivate the plugin.
    }

    /**
     * Uninstall the plugin.
     *
     * @return void
     */
    public function uninstall()
    {
        // Uninstall the plugin.
    }

    /**
     * Register plugin routes.
     *
     * @return void
     */
    public function registerRoutes()
    {
        // Register plugin routes.
    }
}