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
            $this->error('  You must provide cards that match the format:  ');
            $this->info('  ' . implode(', ', $calc->getDeck()->getCardIndexes()) . '  ');
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

        if ($invalidCards) {
            $this->error('  Invalid cards input: ' . implode(', ', $invalidCards) . '  ');

            if (count($invalidCards) === count($inputCards)) {
                $this->error('  No valid cards found :(  ');
            }
        }

        if (count($validCards)) {
            $this->info('  Valid cards input: ' . implode(', ', $validCards) . '  ');
            $this->info('  Adding together...  ');
            $this->info("");
            $this->info('  Your Blackjack score - ' . $calc->add($validCards) . '  ');
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
            array('card', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, '--card=AH --card=10C', array()),
        );
    }

}
