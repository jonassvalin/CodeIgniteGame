<?php
require_once BASEPATH.'../application/libraries/Card.php';

/**
 * Class Card_game_model. Provides a model representation of the games current state.
 */
class Card_game_model extends CI_Model {
    private $player = 'player';
    private $cpu = 'cpu';
    private $player_deck;
    private $cpu_deck;

    /**
     * Card_game_model constructor. Simply loads the database used by the game.
     */
    public function __construct()
    {
        $this->load->database();
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


    /**
     * This function creates the deck of the chosen player. Currently there is unnecessary duplicate code
     * but this is so that it can easily be refactored in the future if players are using custom decks.
     * @param $whos_deck
     */
    public function create_deck($deck_owner)
    {
        $available_cards = $this->get_cards();
        if ($deck_owner === $this->player) {
            foreach ($available_cards as $card) {
                $this->player_deck[$card['name']] = new Card($card['name'], $card['health'], $card['attack']);
            }
        } elseif ($deck_owner === $this->cpu) {
            foreach ($available_cards as $card) {
                $this->cpu_deck[$card['name']] = new Card($card['name'], $card['health'], $card['attack']);
            }
        }

    }

    /**
     * @param $whos_deck
     * @return The deck of either the player or the CPU
     */
    public function get_deck($deck_owner)
    {
        return $this->$deck_owner;
    }

    public function set_deck($deck_owner, $deck)
    {
        $this->$deck_owner = $deck;
    }

    public function attack_character($deck_owner, $name, $attack)
    {
        foreach ($this->$deck_owner as $player_card) {
            if ($player_card->get_name() === $name) {
                $player_card->increase_damage($attack);
            }
        }
    }
}