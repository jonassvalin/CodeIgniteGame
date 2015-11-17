<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card_game_ctrl extends CI_Controller {

    /**
     * Card game controller
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('card_game_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->display_page();
    }

    public function display_page($page = 'introscreen')
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
        $data['title'] = ucfirst('Explosia'); // Capitalize the first letter
        $this->card_game_model->create_deck("player");

        $this->load->view('templates/header', $data);
        $this->load->view('pages/gamepage', $data);
        $this->load->view('templates/footer', $data);
    }

    public function play_game()
    {
        $data['title'] = ucfirst('Explosia'); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/gamepage', $data);
        $this->load->view('templates/footer', $data);
    }

}
