<div class="content">
    <h3>Let's play</h3>
    <div class="row">

        <?php foreach ($cpu_deck as $cpu_card): ?>
            <div class="col-md-4">
                <h3><?php echo $cpu_card->get_name(); ?></h3>
                <?php echo 'HP: '.$cpu_card->get_health().'/'.$cpu_card->get_max_health().' Attack: '.$cpu_card->get_attack(); ?>
                <br>
            </div>
        <?php endforeach; ?>

    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">VS</div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">

        <?php foreach ($player_deck as $player_card): ?>
            <div class="col-md-4">
                <h3><?php echo $player_card->get_name(); ?></h3>
                <?php echo 'HP: '.$player_card->get_health().'/'.$player_card->get_max_health().' Attack: '.$player_card->get_attack(); ?>
                <br>
            </div>
        <?php endforeach; ?>

    </div>
    <p><a href="<?php echo site_url('card_game_ctrl/attack'); ?>" class="btn btn-xlarge"
          role="button">Attack</a></p>
</div>