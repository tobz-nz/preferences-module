<?php namespace Anomaly\PreferencesModule\Preference\Command;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ModifyValue
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference\Command
 */
class ModifyValue implements SelfHandling
{

    use DispatchesJobs;

    /**
     * The preference value.
     *
     * @var mixed
     */
    protected $value;

    /**
     * The preference instance.
     *
     * @var PreferenceInterface
     */
    protected $preference;

    /**
     * Create a new ModifyValue instance.
     *
     * @param PreferenceInterface $preference
     * @param                     $value
     */
    function __construct(PreferenceInterface $preference, $value)
    {
        $this->value      = $value;
        $this->preference = $preference;
    }

    /**
     * Handle the command.
     *
     * @return mixed
     */
    public function handle()
    {
        /* @var FieldType $type */
        if ($type = $this->dispatch(new GetValueFieldType($this->preference))) {
            return $type->getModifier()->modify($this->value);
        }

        return $this->value;
    }
}
