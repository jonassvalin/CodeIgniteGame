<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card {
    private $name;
    private $max_health;
    private $attack;
    private $damage;

    /**
     * Card constructor.
     * @param $name of the character
     * @param $health of the character initially
     * @param $attack power of the character
     */
    public function __construct($name, $health, $attack)
    {
        $this->name = $name;
        $this->max_health = $health;
        $this->attack = $attack;
        $this->damage = 0;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_max_health() {
        return $this->max_health;
    }

    public function get_health() {
        return $this->max_health - $this->damage;
    }

    public function get_attack() {
        return $this->attack;
    }

    /**
     * Reduces the health of the character based on the attack score.
     * @param $attack_score dealt by the opposing players character
     */
    public function increase_damage($damage)
    {
        $this->damage = $this->damage + $damage;
    }
}