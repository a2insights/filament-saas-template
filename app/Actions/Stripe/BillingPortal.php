<?php

namespace App\Actions\Stripe;

use App\Filament\Pages\Billing;
use App\Models\Billable;
use Illuminate\Support\Facades\Redirect;
use Lorisleiva\Actions\Concerns\AsAction;

class BillingPortal extends StripeBaseAction
{
    use AsAction;

    public function handle(Billable $billable)
    {
        $session = $this->stripe->billingPortal->sessions->create([
            'customer' => $billable->stripe_id,
            'return_url' => Billing::getUrl(),
        ]);

        Redirect::to($session->url, 303);
    }
}
