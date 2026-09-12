<?php
namespace App\Jobs;
use App\Mail\StoredMessageMail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendStoredMessageEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public int $contactId
    ) {
    }

    public function handle(): void
    {
        Log::info('SendStoredMessageEmail job started', [
            'contact_id' => $this->contactId,
        ]);

        $contact = Contact::find($this->contactId);

        if (!$contact) {
            Log::warning('Contact not found', [
                'contact_id' => $this->contactId,
            ]);

            return;
        }

        Log::info('Contact found', [
            'contact_id' => $contact->id,
            'name' => $contact->name,
            'email' => $contact->email,
        ]);

        try {
            Mail::to('midhunchackoxyz@gmail.com')
                ->send(new StoredMessageMail($contact));

            Log::info('Contact email sent successfully', [
                'contact_id' => $contact->id,
            ]);
        } catch (\Throwable $e) {
            Log::error('Contact email sending failed', [
                'contact_id' => $contact->id,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }
}
