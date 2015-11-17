<?php

/**
 * Class Card_game_model. Provides a model representation of the games current state.
 */
class Card_game_model extends CI_Model {
    private $player = "player";
    private $player_deck;
    private $cpu_deck;

    /**
     * Card_game_model constructor. Simply loads the database used by the game.
     */
    public function __construct()
    {
        $this->load->database();
        //$this->load->library('Card', "thename");
    }

    /**
     * Get function for the cards in the database.
     * @return The full set of cards available in the database
     */
    private function get_cards()
    {
        $query = $this->db->get('cards');
        return $query->result_array();
    }


    public function create_deck($whos_deck) {
        $available_cards = $this->get_cards();
        if ($whos_deck === $this->player) {
            foreach ($available_cards as $card) {
                //$this->player_deck[$card['name']] = new card_model($card['name'], $card['health'], $card['attack']);
            }
        }

    }
}