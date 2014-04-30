<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laravel\Cashier\BillableInterface;
use Laravel\Cashier\BillableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface, BillableInterface {

    use BillableTrait;

    protected $dates = array('created_at', 'updated_at', 'trial_ends_at', 'subscription_ends_at', 'go_to_print', 'delivery_date');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    /**
     * Fillable properties and rules.
     *
     * @var array
     */
    public $fillable = ['email', 'password', 'go_to_print', 'delivery_date'];
    public static $rules = [
        'email' => 'required',
        'password' => 'required|alpha_num|between:6,20|',
    ];

    /**
     * @var array $errors
     */
    public static $errors;

    /**
     * Stripe_Customer $customer
     */
    protected $customer;

    public function __construct($email = '', $password = '')
    {
        if (!empty($email))
        {
            $this->email = $email;
        }
        if (!empty($password))
        {
            $this->password = Hash::make($password);
        }

        if(empty($this->customer))
        {
            $this->customer = $this->getCustomer();
        }

    }


    /**
     * See if the user is taking a valid form.
     *
     * @var array
     * @return boolean
     */
    public function isValid()
    {

        $validation = Validator::make($this->attributes, static::$rules);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }


	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }


    /**
     *  Get the customer.
     */
    public function getCustomer()
    {
        if (is_null($this->customer))
        {
            if( ! is_null($this->stripe_id))
            {
                Stripe::setApiKey(getenv('STRIPE_SECRET'));
                return $this->customer = Stripe_Customer::retrieve($this->stripe_id);
            }
        }
        return $this->customer;
    }

    /**
     *  Update card information.
     */
    public function getShipping()
    {

        if ($this->getCustomer())
        {
            $meta = $this->customer->metadata;
            return [
                'name' => $meta->name,
                'address_line1' => $meta->address_line1,
                'address_city'  => $meta->address_city,
                'address_state' => $meta->address_state,
                'address_zip' => $meta->address_zip,
            ];
        }
    }

    public function getBilling()
    {
        if ($this->getCustomer())
        {
            $default_card = $this->customer->default_card;
            $card = $this->customer->cards->retrieve($default_card);
            return [
                'id' => $card->id,
                'last4' => $card->last4,
                'type' => $card->type,
                'exp_month' => $card->exp_month,
                'exp_year' => $card->exp_year,
                'name' => $card->name,
                'address_line1' => $card->address_line1,
                'address_city' => $card->address_city,
                'address_state' => $card->address_state,
                'address_zip' => $card->address_zip,
            ];
        }
    }

    public function updateBilling($card, $address)
    {
        if ($this->getCustomer())
        {
            $card = $this->customer->cards->retrieve($card);
            if (! is_null($card))
            {
                foreach($address as $key => $value)
                {
                    $card->{$key} = $value;
                }
                $card->save();
            }

        }
    }

    public function updateShipping($address)
    {
        if($this->getCustomer())
        {
            $this->customer->metadata = $address;
            $this->customer->save();
        }
    }

    // Formatted print date for profile page
    public function getGoToPrint()
    {
        if(is_null($this->go_to_print))
        {
            return '0th';
        }
        return $this->go_to_print->format('jS');
    }

    // Formatted print date for profile page
    public function getDeliveryDate()
    {
        if(is_null($this->delivery_date))
        {
            return '0th';
        }
        return $this->delivery_date->format('jS');
    }

}