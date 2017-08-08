<?php namespace Anomaly\FixedAmountDiscountExtension\Command;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\FixedAmountDiscountExtension\FixedAmountDiscountExtension;

/**
 * Class GetAmount
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetAmount
{

    /**
     * The extension instance.
     *
     * @var FixedAmountDiscountExtension
     */
    protected $extension;

    /**
     * Create a new GetAmount instance.
     *
     * @param FixedAmountDiscountExtension $extension
     */
    public function __construct(FixedAmountDiscountExtension $extension)
    {
        $this->extension = $extension;
    }

    /**
     * Handle the command.
     *
     * @param ConfigurationRepositoryInterface $configuration
     * @return mixed|null
     */
    public function handle(ConfigurationRepositoryInterface $configuration)
    {
        return $configuration->value(
            $this->extension->getNamespace('amount'),
            $this->extension->getDiscountId()
        );
    }
}
