<?php

namespace App\Mail;

use App\Models\Utility;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommonEmailTemplate extends Mailable
{
    use Queueable, SerializesModels;

    public $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $settings = Utility::settingsById(1);

        $from = $this->template->from;

        return $this->from(isset($settings['mail_from_address']) ? $settings['mail_from_address'] : '', $from)->markdown('emails.common_email_template')->subject($this->template->subject)->with(
            [
                'content' => $this->template->content,
                'mail_header' => env('APP_NAME'),
            ]
        );

    }
}
