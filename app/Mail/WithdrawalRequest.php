<?php

namespace App\Mail;
use App\Models\Withdraw;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WithdrawalRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $withdraw;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Withdraw $withdraw)
    {
        $this->withdraw = $withdraw;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.withdrawalrequest')
            ->with([
                'amount' => $this->withdraw->amount,
                'paymentMode' => $this->withdraw->payment_mode,
            ]);
    }
}
