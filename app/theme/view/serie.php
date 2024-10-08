<?php require PATH . '/theme/view/common/header.php'; ?>

<div class="app-detail flex-fill">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo APP; ?>"><?php echo __('Home'); ?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo APP . '/shows' ?>"><?php echo __('Series'); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $Listing['title']; ?></li>
        </ol>
    </nav>

    <?php echo ads($Ads, 3, 'mb-3'); ?>

    <div class="row">
        <div class="col-md-3">
            <div class="media media-cover mb-2" data-src="<?php echo $Listing['image']; ?>"></div>

            <?php
            // Fetch the last modified episode
            $LatestEpisode = $this->db->from(null, '
                SELECT 
                posts_episode.name as episode_name,
                posts_episode.description as episode_description,
                posts_season.name as season_name,
                posts.create_year,
                posts.self
                FROM `posts_episode`
                INNER JOIN (
                    SELECT content_id, MAX(modified) AS modified
                    FROM posts_episode
                    WHERE status = "1"
                    GROUP BY content_id
                ) AS latest_episodes 
                ON posts_episode.content_id = latest_episodes.content_id 
                AND posts_episode.modified = latest_episodes.modified
                LEFT JOIN posts ON posts_episode.content_id = posts.id  
                LEFT JOIN posts_season ON posts_season.id = posts_episode.season_id  
                WHERE posts.id = "' . $Listing['id'] . '"
                LIMIT 1
            ')->first();

            if ($LatestEpisode) {
                // Construct the URL to the latest episode
                $watchNowUrl = APP . '/episode/' . $LatestEpisode['self'] . '-' . $LatestEpisode['create_year'] . '/season-' . $LatestEpisode['season_name'] . '-episode-' . $LatestEpisode['episode_name'];
            } else {
                // Fallback if no latest episode is found
                $watchNowUrl = APP . '/episode/' . $Listing['self'] . '-' . $Listing['create_year'] . '/season-1-episode-1';
            }
            ?>

            <a href="<?php echo $watchNowUrl; ?>">
                <button type="button" class="btn btn-theme px-5 my-3 mr-2 trailer">
                    <?php echo __('Watch Now'); ?>
                </button>
            </a>

            <?php if ($Listing['trailer']) { ?>
                <button type="button" class="btn btn-theme px-5 my-3 mr-2 trailer" data-toggle="modal" data-target="#lg"
                    data-remote="<?php echo APP . '/modal/trailer?trailer=' . urlencode($Listing['trailer']); ?>">
                    <?php echo __('Trailer'); ?>
                </button>
            <?php } ?>
        </div>

        <div class="col-md-9">
            <div class="pl-md-4">
                <h1>
                    <?php echo $Listing['title']; ?>
                </h1>
                <?php if ($Listing['imdb']) { ?>
                    <div class="video-attr">
                        <div class="attr">
                            <?php echo __('IMDb Rating'); ?>
                        </div>
                        <div class="text">
                            <?php echo round($Listing['imdb'], 1); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($Listing['country_name']) { ?>
                    <div class="video-attr">
                        <div class="attr">
                            <?php echo __('Country'); ?>
                        </div>
                        <div class="text">
                            <?php $self = str_replace(' ', '-', strtolower($Listing['country_name'])); ?>
                            <a href="<?php echo APP . '/country/' . $self; ?>"><?php echo $Listing['country_name']; ?></a>
                        </div>
                    </div>
                <?php } ?>
                <div class="video-attr">
                    <div class="attr">
                        <?php echo 'التصنيف'; ?>
                    </div>
                    <div class="text">
                        <?php foreach ($Categories as $Category) { ?>
                            <a href="<?php echo APP . '/category/' . $Category['self']; ?>">
                                <?php echo $Category['name']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <?php if ($Listing['mpaa']) { ?>
                    <div class="video-attr">
                        <div class="attr">
                            <?php echo __('MPAA'); ?>
                        </div>
                        <div class="text">
                            <?php echo $Listing['mpaa']; ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($Listing['duration']) { ?>
                    <div class="video-attr">
                        <div class="attr">
                            <?php echo __('Duration'); ?>
                        </div>
                        <div class="text">
                            <?php echo $Listing['duration'] . ' ' . __('min'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($Listing['create_year']) { ?>
                    <div class="video-attr">
                        <div class="attr">
                            <?php echo __('Release Date'); ?>
                        </div>
                        <div class="text">
                            <?php echo $Listing['create_year']; ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($Listing['end_year']) { ?>
                    <div class="video-attr">
                        <div class="attr">
                            <?php echo __('End Date'); ?>
                        </div>
                        <div class="text">
                            <?php echo $Listing['end_year']; ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="video-attr">
                    <div class="attr">
                        <?php echo __('Overview'); ?>:
                    </div>
                </div>
                <?php if ($Listing['description']) { ?>
                    <div class="video-attr">
                        <div class="text">
                            <div class="text-content">
                                <?php echo $Listing['description']; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (count($Actors) > 0) { ?>
                    <div class="video-attr">
                        <div class="attr">
                            <?php echo __('Actors'); ?>:
                        </div>
                    </div>
                    <style>
                        .container1234 {
                            white-space: nowrap;
                            width: 100%;
                            height: 280px;
                            overflow-x: scroll;
                            overflow-y: hidden;
                        }

                        .slide {
                            display: inline-block;
                            vertical-align: top;
                            white-space: normal;
                            width: 250px;
                            height: 250px;
                            margin: 5px;
                        }
                    </style>
                    <div class="video-attr">
                        <div class="container1234 list-scrollable">
                            <?php foreach ($Actors as $Actor) { ?>
                                <a href="<?php echo APP . '/actor/' . $Actor['self'] . '-' . $Actor['actor_id']; ?>">
                                    <div class="slide">
                                        <img src="<?php echo $Actor['image']; ?>" style="margin-bottom:10px;" />
                                        <font style="color:white;"><?php echo $Actor['name']; ?></font>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($Data['tags']) { ?>
                    <div class="tags" data-more="" data-element="div" data-limit="6">
                        <?php
                        $Tags = explode(',', $Data['tags']);
                        for ($i = 0; $i < count($Tags); $i++) {
                            ?>
                            <div>
                                <?php echo $Tags[$i]; ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="nav-social">
                    <?php foreach ($Data['social'] as $key => $value) { ?>
                        <?php if ($value) { ?>
                            <a href="<?php echo 'https://www.' . $key . '.com/' . $value; ?>" target="_blank"
                                title="<?php echo $key; ?>">
                                <svg class="icon">
                                    <use xlink:href="<?php echo ASSETS . '/img/sprite.svg#' . $key; ?>" />
                                </svg>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php echo ads($Ads, 1, 'my-3'); ?>
            <?php
            // Season
            $Seasons = $this->db->from(null, '
                    SELECT 
                    posts_season.id,  
                    posts_season.name
                    FROM `posts_season`
                    WHERE posts_season.content_id = "' . $Listing['id'] . '"
                    ORDER BY cast(name as unsigned) ASC')
                ->all();
            ?>
            <?php if (count($Seasons) > 0) { ?>     <?php if ($Listing['notification'] === NULL) {
                      } else { ?>
                    <div class="alert bg-danger text-white font-weight-bold text-center"
                        style="background-color:<?php echo $Listing['notification_color']; ?>!important">
                        <?php echo $Listing['notification']; ?>
                    </div>
                <?php } ?>
                <div class="season-list">
                    <div class="seasons">
                        <ul class="nav" role="tablist">
                            <?php
                            $i = 0;
                            foreach ($Seasons as $Season) {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($i == 0)
                                        echo 'active'; ?>" id="season-<?php echo $Season['name']; ?>-tab"
                                        data-toggle="tab" href="#season-<?php echo $Season['name']; ?>" role="tab"
                                        aria-controls="season-<?php echo $Season['name']; ?>"
                                        aria-selected="<?php echo ($i == 0 ? 'true' : 'false'); ?>">
                                        <?php echo __('Season') . ' ' . $Season['name']; ?></a>
                                </li>
                                <?php $i++;
                            } ?>
                        </ul>
                    </div>
                    <div class="episodes tab-content">
                        <?php
                        $i = 0;
                        foreach ($Seasons as $Season) {
                            ?>
                            <div class="tab-pane <?php echo ($i == 0 ? 'show active' : ''); ?>"
                                id="season-<?php echo $Season['name']; ?>" role="tabpanel"
                                aria-labelledby="season-<?php echo $Season['name']; ?>-tab">
                                <?php

                                // Episodes
                                $Episodes = $this->db->from(null, '
                                SELECT 
                                posts_episode.id,  
                                posts_episode.name,  
                                posts_episode.description,  
                                posts_episode.created
                                FROM `posts_episode`
                                WHERE posts_episode.status = "1" AND posts_episode.content_id = "' . $Listing['id'] . '" AND posts_episode.season_id = "' . $Season['id'] . '"
                                ')
                                    ->all();
                                foreach ($Episodes as $Episode) {
                                    ?>
                                    <a
                                        href="<?php echo APP . '/episode/' . $Listing['self'] . '-' . $Listing['create_year'] . '/season-' . $Season['name'] . '-episode-' . $Episode['name']; ?>">
                                        <div class="episode">
                                            <?php echo __('Episode') . ' ' . $Episode['name']; ?>
                                        </div>
                                        <div class="name">
                                            <?php echo $Episode['description']; ?>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                            <?php $i++;
                        } ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($Listing['comment'] != 1) { ?>
                <div class="row">
                    <div class="col">
                        <?php require PATH . '/theme/view/common/comments.php'; ?>
                    </div>
                    <?php if (ads($Ads, 4, 'ml-auto')) { ?>
                        <div class="col-md-4">
                            <?php echo ads($Ads, 4, 'ml-auto'); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
<?php require PATH . '/theme/view/common/schema.serie.php'; ?>
<?php require PATH . '/theme/view/common/footer.php'; ?>