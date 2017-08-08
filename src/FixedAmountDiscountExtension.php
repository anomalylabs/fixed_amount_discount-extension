<?php namespace Anomaly\FixedAmountDiscountExtension;

use Anomaly\CartsModule\Cart\Contract\CartInterface;
use Anomaly\CartsModule\Modifier\ModifierModel;
use Anomaly\DiscountsModule\Discount\DiscountExtension;
use Anomaly\FixedAmountDiscountExtension\Command\GetAmount;

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
     * Apply the discount.
     *
     * @param $target
     */
    public function apply($target)
    {
        foreach ($target->modifiers as $modifier) {

            if ($modifier->entry->toArray() == $this->getDiscount()->toArray()) {
                return;
            }
        }

        (new ModifierModel(
            [
                'type'  => 'discount',
                'cart'  => ($target instanceof CartInterface) ? $target : $target->cart,
                'item'  => ($target instanceof CartInterface) ? null : $target,
                'value' => '-' . $this->dispatch(new GetAmount($this)),
                'entry' => $this->getDiscount(),
            ]
        ))->save();
    }

}
