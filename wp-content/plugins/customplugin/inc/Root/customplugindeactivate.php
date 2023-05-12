<?php

/**
 * @package customplugin
 */


 namespace Inc\Root;
class AddMembersDeactivate{
    static function deactivatePlugin(){
        flush_rewrite_rules();
    }
}