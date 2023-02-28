<?php
    namespace App\Mail;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class creerMailEnvoyerEmploiClasse extends Mailable{
        use Queueable, SerializesModels;
        public $mailData;
        public $attach;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($mailData, $attach){
            $this->mailData = $mailData;
            $this->attach = $attach;
        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope(){
            return new Envelope(
                subject: 'Emploi du temps',
            );
        }

        /**
         * Get the message content definition.
         *
         * @return \Illuminate\Mail\Mailables\Content
         */
        public function build(){
            return $this->subject("Emploi du temps")->markdown('Emails.email_envoyer_emploi')->attach($this->attach);
        }

        /**
         * Get the attachments for the message.
         *
         * @return array
         */
        public function attachments(){
            return [];
        }
    }
?>