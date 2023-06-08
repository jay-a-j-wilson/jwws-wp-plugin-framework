<?php

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Enums;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Plugin data header types.
 *
 * @link https://developer.wordpress.org/reference/functions/get_plugin_data/
 */
enum Type: string {
    /**
     * Name of the plugin. Should be unique.
     */
    case NAME = 'Name';

    /**
     * Plugin URI.
     */
    case PLUGIN_URI = 'PluginURI';

    /**
     * Plugin version.
     */
    case VERSION = 'Version';

    /**
     * Plugin description.
     */
    case DESCRIPTION = 'Description';

    /**
     * Plugin author's name.
     */
    case AUTHOR = 'Author';

    /**
     * Plugin author's website address (if set).
     */
    case AUTHOR_URI = 'AuthorURI';

    /**
     * Plugin textdomain.
     */
    case TEXT_DOMAIN = 'TextDomain';

    /**
     * Plugin's relative directory path to .mo files.
     */
    case DOMAIN_PATH = 'DomainPath';

    /**
     * Whether the plugin can only be activated network-wide.
     */
    case NETWORK = 'Network';

    /**
     * Minimum required version of WordPress.
     */
    case REQUIRES_WP = 'RequiresWP';

    /**
     * Minimum required version of PHP.
     */
    case REQUIRES_PHP = 'RequiresPHP';

    /**
     * ID of the plugin for update purposes, should be a URI.
     */
    case UPDATE_URI = 'UpdateURI';

    /**
     * Title of the plugin and link to the plugin's site (if set).
     */
    case TITLE = 'Title';

    /**
     * Plugin author's name.
     */
    case AUTHOR_NAME = 'AuthorName';
}
