<?php

use Laravel\Cashier\WebhookController;
use Carbon\Carbon;

class PhotosWebhookController extends WebhookController {

	/**
	 * Handle a Stripe webhook call.
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function handleWebhook()
	{
		$payload = $this->getJsonPayload();

		switch ($payload['type'])
		{
			case 'customer.subscription.created':
				return $this->handleSubscriptionCreated($payload);
			case 'invoice.payment_succeeded':
				return $this->handleInvoiceSucceeded($payload);
			case 'invoice.payment_failed':
				return $this->handleFailedPayment($payload);
		}
	}

	public function handleFailedPayment(array $payload) {
		
		$data = $payload['data']['object'];
		$customer_id = $data['customer'];
		$user = User::where('stripe_id', '=', $customer_id)->firstOrFail();
	    Mail::queue('emails.customer.failed', $data, function($message) use ($user)
	    {
	        $message->to($user->email)
	                ->subject('Failed Payment');
	    });

		if ($this->tooManyFailedPayments($payload)) {

		}

	}

	public function handleSubscriptionCreated(array $payload) {
		$data = $payload['data']['object'];
		$customer_id = $data['customer'];
		$user = User::where('stripe_id', '=', $customer_id)->firstOrFail();
		if(!is_null($user))
		{
			$plan = $data['plan'];
			$data = [
				'dates' => [
					$user->go_to_print->format('n/j/y'),
					$user->go_to_print->format('jS'),
					$user->go_to_print->format('jS'),
					$user->delivery_date->format('jS'),
					$user->go_to_print->format('n/j/y'),
					$user->go_to_print->addMonth()->format('n/j/y'),
					$user->delivery_date->format('n/j/y')
				]
			];
		    Mail::queue('emails.customer.welcome', $data, function($message) use ($user)
		    {
		        $message->to($user->email)
		                ->subject('Subscription Created');
		    });
		}
	}

	public function handleInvoiceSucceeded(array $payload) {
		
		$data = $payload['data']['object'];
		$customer_id = $data['customer'];
		$user = User::where('stripe_id', '=', $customer_id)->firstOrFail();
		$date = Carbon::createFromTimeStamp($data['date'])->format('n/j/y');
		$amount = number_format(((int) $data['lines']['data'][0]['amount']) / 100, 2, '.', '');
		$data = ['last_four' => $user->last_four, 'date' => $date, 'amount' => $amount];
	    Mail::queue('emails.customer.success', $data, function($message) use ($user)
	    {
	        $message->to($user->email)
	                ->subject('Payment Successful');
	    });

		if ($this->tooManyFailedPayments($payload)) {

		}

	}

}