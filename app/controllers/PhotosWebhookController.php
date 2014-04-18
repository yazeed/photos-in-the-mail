<?php

use Laravel\Cashier\WebhookController;

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
			case 'invoice.payment_failed':
				return $this->handleFailedPayment($payload);
		}
	}

	public function handleFailedPayment($payload) {
		
		if ($this->tooManyFailedPayments($payload)) {

			$data = [];
		    Mail::queue('emails.customer.failed', $data, function($message)
		    {
		        $message->to('mvanmeter1@gmail.com')
		                ->subject('Failed Payment');
		    });

		}

	}

}