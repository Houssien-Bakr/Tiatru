<div class="app-section">
    <div class="app-heading">
        <div class="text">
            <?php echo $HomeModule['name']; ?>
        </div>
    </div>
    <div class="row 
    <?php if ($ModuleData['listing'] == 'v2') {
        echo 'row-cols-1 row-cols-md-4 ';
    } else {
        echo ' row-cols-2 row-cols-md-5';
    } ?>
    <?php if ($ModuleData['responsive'] == 'horizontal')
        echo 'list-scrollable'; ?>">

        <?php
        // Sort by the modified date to get the last modified episode
        if (!$ModuleData['sorting']) {
            $OrderBy = 'id DESC';
        } else {
            $OrderBy = $ModuleData['sorting'];
        }
        $Newests = $this->db->from(null, '
            SELECT 
            posts_episode.name as episode_name, 
            posts_episode.description as episode_description, 
            posts_episode.image as episode_image, 
            posts_season.name as season_name, 
            posts.id, 
            posts.title, 
            posts.self, 
            posts.image, 
            posts.cover, 
            posts.create_year,
            posts.imdb,
            latest_episodes.modified,
            posts_episode.created,
            posts_episode.featured
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
            WHERE posts.type = "serie" AND posts_episode.status = "1"
            ORDER BY latest_episodes.modified DESC
            LIMIT 0,' . $HomeModule['data_limit'])
            ->all();

        // Arabic ordinals for episodes (feminine form)
        $arabic_episodes = [
    '1' => 'الأولى', '2' => 'الثانية', '3' => 'الثالثة', '4' => 'الرابعة', '5' => 'الخامسة',
    '6' => 'السادسة', '7' => 'السابعة', '8' => 'الثامنة', '9' => 'التاسعة', '10' => 'العاشرة',
    '11' => 'الحادية عشرة', '12' => 'الثانية عشرة', '13' => 'الثالثة عشرة', '14' => 'الرابعة عشرة', '15' => 'الخامسة عشرة',
    '16' => 'السادسة عشرة', '17' => 'السابعة عشرة', '18' => 'الثامنة عشرة', '19' => 'التاسعة عشرة', '20' => 'العشرون',
    '21' => 'الحادية والعشرون', '22' => 'الثانية والعشرون', '23' => 'الثالثة والعشرون', '24' => 'الرابعة والعشرون', '25' => 'الخامسة والعشرون',
    '26' => 'السادسة والعشرون', '27' => 'السابعة والعشرون', '28' => 'الثامنة والعشرون', '29' => 'التاسعة والعشرون', '30' => 'الثلاثون',
    '31' => 'الحادية والثلاثون', '32' => 'الثانية والثلاثون', '33' => 'الثالثة والثلاثون', '34' => 'الرابعة والثلاثون', '35' => 'الخامسة والثلاثون',
    '36' => 'السادسة والثلاثون', '37' => 'السابعة والثلاثون', '38' => 'الثامنة والثلاثون', '39' => 'التاسعة والثلاثون', '40' => 'الأربعون',
    '41' => 'الحادية والأربعون', '42' => 'الثانية والأربعون', '43' => 'الثالثة والأربعون', '44' => 'الرابعة والأربعون', '45' => 'الخامسة والأربعون',
    '46' => 'السادسة والأربعون', '47' => 'السابعة والأربعون', '48' => 'الثامنة والأربعون', '49' => 'التاسعة والأربعون', '50' => 'الخمسون',
    '51' => 'الحادية والخمسون', '52' => 'الثانية والخمسون', '53' => 'الثالثة والخمسون', '54' => 'الرابعة والخمسون', '55' => 'الخامسة والخمسون',
    '56' => 'السادسة والخمسون', '57' => 'السابعة والخمسون', '58' => 'الثامنة والخمسون', '59' => 'التاسعة والخمسون', '60' => 'الستون',
    '61' => 'الحادية والستون', '62' => 'الثانية والستون', '63' => 'الثالثة والستون', '64' => 'الرابعة والستون', '65' => 'الخامسة والستون',
    '66' => 'السادسة والستون', '67' => 'السابعة والستون', '68' => 'الثامنة والستون', '69' => 'التاسعة والستون', '70' => 'السبعون',
    '71' => 'الحادية والسبعون', '72' => 'الثانية والسبعون', '73' => 'الثالثة والسبعون', '74' => 'الرابعة والسبعون', '75' => 'الخامسة والسبعون',
    '76' => 'السادسة والسبعون', '77' => 'السابعة والسبعون', '78' => 'الثامنة والسبعون', '79' => 'التاسعة والسبعون', '80' => 'الثمانون',
    '81' => 'الحادية والثمانون', '82' => 'الثانية والثمانون', '83' => 'الثالثة والثمانون', '84' => 'الرابعة والثمانون', '85' => 'الخامسة والثمانون',
    '86' => 'السادسة والثمانون', '87' => 'السابعة والثمانون', '88' => 'الثامنة والثمانون', '89' => 'التاسعة والثمانون', '90' => 'التسعون',
    '91' => 'الحادية والتسعون', '92' => 'الثانية والتسعون', '93' => 'الثالثة والتسعون', '94' => 'الرابعة والتسعون', '95' => 'الخامسة والتسعون',
    '96' => 'السادسة والتسعون', '97' => 'السابعة والتسعون', '98' => 'الثامنة والتسعون', '99' => 'التاسعة والتسعون', '100' => 'المائة'
        ];

        // Arabic ordinals for seasons (masculine form)
        $arabic_seasons = [
            '1' => 'الأول',
            '2' => 'الثاني',
            '3' => 'الثالث',
            '4' => 'الرابع',
            '5' => 'الخامس',
            '6' => 'السادس',
            '7' => 'السابع',
            '8' => 'الثامن',
            '9' => 'التاسع',
            '10' => 'العاشر',
        ];

        foreach ($Newests as $Newest) {
            // Convert episode and season names to Arabic ordinals
            $episode_ordinal = isset($arabic_episodes[$Newest['episode_name']]) ? $arabic_episodes[$Newest['episode_name']] : $Newest['episode_name'];
            $season_ordinal = isset($arabic_seasons[$Newest['season_name']]) ? $arabic_seasons[$Newest['season_name']] : $Newest['season_name'];
            ?>
            <div class="col">
                <a href="<?php echo APP . '/episode/' . $Newest['self'] . '-' . $Newest['create_year'] . '/season-' . $Newest['season_name'] . '-episode-' . $Newest['episode_name']; ?>"
                    class="list-movie 
            <?php if ($Newest['featured'] == '1')
                echo 'list-featured'; ?>
            <?php if ($ModuleData['listing'] == 'v2')
                echo 'list-episode'; ?>">
                    <div class="list-media">
                        <div class="play-btn">
                            <svg class="icon">
                                <use xlink:href="<?php echo ASSETS . '/img/sprite.svg#play'; ?>" />
                            </svg>
                        </div>
                        <?php if ($Newest['episode_image']) { ?>
                            <div class="media media-cover" style="background-image:url('<?php echo $Newest['image']; ?>');">
                                <!-- Display "الأخيرة" label if description contains it -->
                                <?php if (strpos($Newest['episode_description'], 'الأخيرة') !== false) { ?>
                                    <div class="label-last">الأخيرة</div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="media media-episode" style="background-image:url('<?php echo $Newest['cover']; ?>');">
                                <!-- Display "الأخيرة" label if description contains it -->
                                <?php if (strpos($Newest['episode_description'], 'الأخيرة') !== false) { ?>
                                    <div class="label-last">الأخيرة</div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($ModuleData['listing'] != 'v2') { ?>
                            <div class="list-media-attr">
                                <div class="date"><?php echo shortdate($Newest['modified']); /* Use modified date */ ?></div>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="list-caption">
                        <div class="list-title"><?php echo $Newest['title']; ?></div>
                        <div class="list-category">
                            <?php echo __('Episode') . ' ' . $episode_ordinal . ' ' . __('Season') . ' ' . $season_ordinal;
                            ?>
                        </div>
                    </div>
                    <?php if ($ModuleData['listing'] == 'v2') { ?>
                        <div class="list-date"><?php echo shortdate($Newest['modified']); /* Use modified date */ ?></div>
                    <?php } ?>

                </a>
            </div>
        <?php } ?>
    </div>
</div>