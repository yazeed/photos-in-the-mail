<?php namespace Acme\Plans;

use Stripe, Stripe_Plan;

/**
 * Class StripePlan
 * Simple service provider for Sripe plans.
 * @property array values
 * @package Acme\Plan
 */
class StripePlan extends Stripe_Plan {

    public $id;
    public $name;
    public $amount;
    public $display_amount;
    public $all;

    /**
     * @param string $id name of plan
     */
    public function __construct($id = '')
    {
        Stripe::setApiKey($_ENV['STRIPE_SECRET']);
        if ( ! is_null($id))
        {
            $this->id = $id;
            $plan = $this->retrieve($id);
            if ( ! is_null($plan))
            {
                $this->setValues($plan->_values);
            }
        }
    }

    private function setValues(array $values)
    {
        $this->name = $values['name'];
        $this->amount = $values['amount'];
        $this->display_amount = $this->amount / 100;
    }

    public static function getAllPlans() {
        $plans = array();
        $stripe_plans = Stripe_Plan::all()->__toArray();
        foreach ($stripe_plans['data'] as $plan) {
            $plans[$plan->id]['id'] = $plan->id;
            $plans[$plan->id]['name'] = $plan->name;
            $plans[$plan->id]['amount'] = $plan->amount;
        }

        // Sort by amount, small to large.
        uasort($plans, function($a, $b) {
            if ($a['amount'] == $b['amount']) {
                return 0;
            }
            return ($a['amount'] < $b['amount']) ? -1 : 1;
        });

        return $plans;
    }

}