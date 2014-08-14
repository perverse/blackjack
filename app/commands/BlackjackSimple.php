<?php namespace App\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App, Validator;

class BlackjackSimple extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'blackjack:simple';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate a blackjack score.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function do_echo($text)
    {
        $this->info('   '.$text);
    }

    public function do_error($text)
    {
        $textArr = explode("\n", $text);

        $maxStrLen = 0;

        foreach ($textArr as $row) {
            $length = strlen($row);
            $maxStrLen = ($length > $maxStrLen) ? $length : $maxStrLen;
        }

        if ($maxStrLen) {
            $padding = 6;
            $this->error('');
            $this->error(str_repeat(' ', $maxStrLen + $padding));
            $this->error(str_pad('-- Error --', $maxStrLen + $padding, " ", STR_PAD_BOTH));
            foreach ($textArr as $row) {
                $row = "   $row";
                $row = str_pad($row, $maxStrLen + $padding, " ");
                $this->error($row);
            }
            $this->error(str_repeat(' ', $maxStrLen + $padding));
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $inputCards = $this->option('card');

        $invalidCards = array();
        $validCards = array();

        $calc = App::make('BlackjackCalculator');

        if (empty($inputCards)) {
            $this->do_echo('Welcome to my simple blackjack calculator.');
            $this->do_echo('');
            $this->do_echo('To calculate a blackjack score, provide 1 or more of the following cards:  ');
            $this->do_echo('' . implode(', ', $calc->getDeck()->getCardIndexes()) . '');
            $this->do_echo('');
            $this->do_echo('In the following format:');
            $this->do_echo('');
            $this->do_echo('e.g: "php artisan blackjack:simple --card=AH --card=10D"');
            $this->do_echo('For more help, type php artisan blackjack:simple --help');
        }

        foreach ($inputCards as $cardIndex) {
            $validator = Validator::make(
                array('card' => $cardIndex),
                array('card' => 'isacard')
            );

            if ($validator->fails()) {
                $invalidCards[] = $cardIndex;
            } else {
                $validCards[] = $cardIndex;
            }
        }

        if (count($invalidCards)) {
            $this->do_error('Invalid card/s: ' . implode(', ', $invalidCards) . '');

            if (count($invalidCards) === count($inputCards)) {
                $this->do_error('No valid cards found :(');
            }
        }

        if (count($validCards)) {
            $this->do_echo('Valid cards input: ' . implode(', ', $validCards) . '');
            $this->do_echo('Adding together...  ');
            $this->do_echo("");
            $this->do_echo('Your Blackjack score is ' . $calc->add($validCards) . '');
        }
        
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('card', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Add a card to the calculator, e.g --card=AH', array())
        );
    }

}
