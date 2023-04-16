<?php foreach ($bots as $bot) : ?>
    <?php foreach ($bot->menssage as $menssage) : ?>
        <div>
            <i class="fas fa-comments bg-primary"></i>

            <div class="timeline-item">
                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Configura Menu</a> <?= $menssage->comentario ?></h3>

                <div class="timeline-body">
                    
                </div>
                <div class="timeline-footer">
                    <a href="#" class="btn btn-primary btn-sm" onclick="msg()">Read more</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php endforeach ?>