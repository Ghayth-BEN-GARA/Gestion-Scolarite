<?php
    namespace App\Mail;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class creerMailInviterEtudiantsClasse extends Mailable{
        use Queueable, SerializesModels;
        public $mailData;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($mailData){
            $this->mailData = $mailData;
        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope(){
            return new Envelope(
                subject: 'Classe effectué',
            );
        }

        /**
         * Get the message content definition.
         *
         * @return \Illuminate\Mail\Mailables\Content
         */
        public function build(){
            return $this->subject("Classe effectué")->markdown('Emails.email_inviter_etudiants_classe');
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
