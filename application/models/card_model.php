<?php

/**
 * Class Card_model. Provides a class representation of a card.
 */
class Card_model extends CI_Model {
    private $name;
    private $health;
    private $attack;

    /**
     * Card_model constructor.
     * @param $name of the character
     * @param $health of the character initially
     * @param $attack power of the character
     */
    public function __construct($name)
    {
        $this->$name = $name;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_health() {
        return $this->health;
    }

    public function get_attack() {
        return $this->attack;
    }

    /**
     * Reduces the health of the character based on the attack score.
     * @param $attack_score dealt by the opposing players character
     */
    public function reduce_health($attack_score) {
        $this->health = $this->health - $attack_score;
    }
}