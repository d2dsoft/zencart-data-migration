<?php

/**
 * D2dSoft
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL v3.0) that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL: https://d2d-soft.com/license/AFL.txt
 *
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade this extension/plugin/module to newer version in the future.
 *
 * @author     D2dSoft Developers <developer@d2d-soft.com>
 * @copyright  Copyright (c) 2021 D2dSoft (https://d2d-soft.com)
 * @license    https://d2d-soft.com/license/AFL.txt
 */

/**
 * A "safe" script module. No inline JS is allowed, and pointed to JS
 * files must match whitelist.
 */
class HTMLPurifier_HTMLModule_SafeScripting extends HTMLPurifier_HTMLModule
{
    /**
     * @type string
     */
    public $name = 'SafeScripting';

    /**
     * @param HTMLPurifier_Config $config
     */
    public function setup($config)
    {
        // These definitions are not intrinsically safe: the attribute transforms
        // are a vital part of ensuring safety.

        $allowed = $config->get('HTML.SafeScripting');
        $script = $this->addElement(
            'script',
            'Inline',
            'Optional:', // Not `Empty` to not allow to autoclose the <script /> tag @see https://www.w3.org/TR/html4/interact/scripts.html
            null,
            array(
                // While technically not required by the spec, we're forcing
                // it to this value.
                'type' => 'Enum#text/javascript',
                'src*' => new HTMLPurifier_AttrDef_Enum(array_keys($allowed), /*case sensitive*/ true)
            )
        );
        $script->attr_transform_pre[] =
        $script->attr_transform_post[] = new HTMLPurifier_AttrTransform_ScriptRequired();
    }
}

// vim: et sw=4 sts=4