<?php namespace Anomaly\FixedAmountDiscountExtension;

use Anomaly\DiscountsModule\Discount\DiscountExtension;
use Anomaly\StoreModule\Contract\OrderInterface;

/**
 * Class FixedAmountDiscountExtension
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\FixedAmountDiscountExtension
 */
class FixedAmountDiscountExtension extends DiscountExtension
{

    /**
     * This extension provides a simple fixed
     * amount discount for the discounts module.
     *
     * @var null|string
     */
    protected $provides = 'anomaly.module.discounts::discount.fixed_amount';

    /**
     * Calculate the discount.
     *
     * @param OrderInterface $order
     * @return float
     */
    public function calculate(OrderInterface $order)
    {
        return $order->getSubtotal() * .1;
    }

}
