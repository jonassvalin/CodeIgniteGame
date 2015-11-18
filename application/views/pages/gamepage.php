<div class="content">
    <form action="<?php echo site_url('card_game_ctrl/attack'); ?>" method="post" name="gamepageform">
        <div class="row">

            <?php $k=1; foreach ($cpu_deck as $cpu_card): ?>
                <div class="col-md-4">
                    <h3><?php echo $cpu_card->get_name(); ?></h3>
                    <img src="<?php echo site_url($cpu_card->get_imagesrc()); ?>" alt="Card Image"
                         style="max-width: 200px;">
                    <br>
                    <?php echo 'HP: '.$cpu_card->get_health().'/'.$cpu_card->get_max_health(); ?>
                    <br>
                </div>
            <?php $k++; endforeach; ?>

        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><h1>VS</h1></div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">

            <?php foreach ($player_deck as $player_card): ?>
                <div class="col-md-4">
                    <h3><?php echo $player_card->get_name(); ?></h3>
                    <img src="<?php echo site_url($player_card->get_imagesrc()); ?>" alt="Card Image"
                         style="max-width: 200px;">
                    <br>
                    <?php echo 'HP: '.$player_card->get_health().'/'.$player_card->get_max_health(); ?>
                    <br>

                    <br>Attack:
                    <select class="selectpicker" name="select<?php echo $player_card->get_name(); ?>">
                        <?php foreach ($cpu_deck as $cpu_card): ?>
                            <option><?php echo $cpu_card->get_name(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>
            <?php endforeach; ?>

        </div>
        <br>
        <p><input type="submit" name="submit" value="Attack" class="btn btn-xlarge" role="button"></p>
    </form>
</div>