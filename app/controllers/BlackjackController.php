<?php namespace App\Controllers;

use Controller,
    Response,
    Markdown,
    Request,
    Input,
    Validator,
    App;

class BlackjackController extends Controller
{
    public function show_index()
    {
        $html = Markdown::render(file_get_contents(base_path() . '/readme.md'));
        $thisServer = Request::server('SERVER_NAME');

        if ($thisServer) {
            $html = str_replace('your-virtual-host', $thisServer, $html);
        }

        return Response::make($html, 200);
    }

    public function api()
    {
        $input = Input::get('card');

        if (!is_array($input)) {
            $inputCards = array();
            if ($input) $inputCards[] = $input;
        } else {
            $inputCards = $input;
        }

        $ret = array('success' => 'false', 'error' => 'No valid cards found'); // default response

        $invalidCards = array();
        $validCards = array();

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
            $ret['invalid_cards'] = $invalidCards;
        }

        if (count($validCards)) {
            $calc = App::make('BlackjackCalculator');

            $ret['data'] = array(
                'card_total' => $calc->add($validCards)
            );
            $ret['success'] = true;
            unset($ret['error']);
        }

         return Response::json($ret);
    }
}