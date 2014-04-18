<?php namespace Learning\Mailers;

use User;

class UserMailer extends Mailer {

    public function welcome(User $user)
    {
        $view = 'emails.welcome';
        $data = [];
        $subject = 'Welcome to Laracasts';

        return $this->sendTo($user, $subject, $view, $data);
    }

    public function cancellation(User $user)
    {
        $view = 'emails.cancel';
        $data = [];
        $subject = 'Sorry to see you go';

        return $this->sendTo($user, $subject, $view, $data);

    }
}
