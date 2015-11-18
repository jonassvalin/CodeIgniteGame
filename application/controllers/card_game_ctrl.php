<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once BASEPATH.'../application/libraries/Card.php';

class Card_game_ctrl extends CI_Controller {

    /**
     * Card game controller
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('card_game_model');
        $this->load->library('session');
        $this->load->library('card');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->display_page();
    }

    public function display_page($page = 'introscreen', $data = array())
    {
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function initialize_game()
    {
        $this->card_game_model->create_deck('player');
        $this->card_game_model->create_deck('cpu');

        $this->update();
    }

    public function set_session_variables()
    {
        $this->session->set_userdata(array('player_deck' => $this->card_game_model->get_deck('player_deck'),
            'cpu_deck' => $this->card_game_model->get_deck('cpu_deck')));
    }

    public function attack()
    {
        $this->card_game_model->set_deck('player_deck', $this->session->player_deck);
        $this->card_game_model->set_deck('cpu_deck', $this->session->cpu_deck);
        $this->card_game_model->attack_updates();

        $result = $this->card_game_model->get_result();
        if(is_null($result)) {
            $this->update();
        } else {
            $data['result'] = $result;
            $this->display_page("finished", $data);
        }
    }

    public function update()
    {
        $this->set_session_variables();

        $data['title'] = ucfirst('Explosia'); // Capitalize the first letter
        $data['player_deck'] = $this->card_game_model->get_deck('player_deck');
        $data['cpu_deck'] = $this->card_game_model->get_deck('cpu_deck');

        $this->load->view('templates/header', $data);
        $this->load->view('pages/gamepage', $data);
        $this->load->view('templates/footer', $data);
    }
}
