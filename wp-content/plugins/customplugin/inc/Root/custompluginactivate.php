<?php

/**
 * @package customplugin
 */

 //composer
 namespace Inc\Root;

class AddMembersActivate
{
    static function activatePlugin()
    {
        flush_rewrite_rules();
    }
}
