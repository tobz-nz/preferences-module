<?php namespace Anomaly\PreferencesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class PreferencesModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Preferences\Module
 */
class PreferencesModule extends Module
{

    /**
     * The module icon.
     *
     * @var string
     */
    protected $icon = 'adjust';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'system',
        'modules',
        'extensions',
        'field_types',
        'plugins'
    ];

}
