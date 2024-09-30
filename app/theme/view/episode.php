<?php
// Define Arabic seasons and episodes
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
?>
<?php require PATH . '/theme/view/common/header.php'; ?>
<div class="app-detail flex-fill">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo APP; ?>"><?php echo __('Home'); ?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo APP . '/shows'; ?>"><?php echo __('Series'); ?></a></li>
            <li class="breadcrumb-item d-none d-md-block">
                <a href="<?php echo APP . '/show/' . $Listing['self'] . '-' . $Listing['create_year']; ?>"
                    class="list-media"><?php echo $Listing['title']; ?></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <?php echo __('Episode') . ' ' . $arabic_episodes[$Listing['episode_name']] . ' : ' . __('Season') . ' ' . $arabic_seasons[$Listing['season_name']]; ?>
            </li>
        </ol>
    </nav>
    <?php require PATH . '/theme/view/common/post.header.php'; ?>
    <?php if (get($Settings, 'data.googleadsense', 'general') != 1) { ?>
        <div class="episode-nav">
            <?php if ($Prev['episode_name']) { ?>
                <a href="/show/<?php echo $Listing['self'] . '-' . $Listing['create_year'] . '-' . $Listing['id'] . '/season/' . $Prev['season_name'] . '/episode/' . $Prev['episode_name']; ?>"
                    class="pr-md-5">
                    <div class="svg-icon">
                        <svg>
                            <use xlink:href="<?php echo ASSETS . '/img/sprite.svg#chevron-left'; ?>" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <div class="name"><?php echo __('Prev episode'); ?></div>
                        <div class="episode">
                            <?php echo __('Season') . ' ' . $arabic_seasons[$Prev['season_name']] . ': ' . __('Episode') . ' ' . $arabic_episodes[$Prev['episode_name']]; ?>
                        </div>
                    </div>
                </a>
            <?php } ?>
            <?php if ($Next['episode_name']) { ?>
                <a href="/show/<?php echo $Listing['self'] . '-' . $Listing['create_year'] . '-' . $Listing['id'] . '/season/' . $Next['season_name'] . '/episode/' . $Next['episode_name']; ?>"
                    class="pl-md-5 ml-auto">
                    <div class="mr-3 text-right">
                        <div class="name"><?php echo __('Next episode'); ?></div>
                        <div class="episode">
                            <?php echo __('Season') . ' ' . $arabic_seasons[$Next['season_name']] . ': ' . __('Episode') . ' ' . $arabic_episodes[$Next['episode_name']]; ?>
                        </div>
                    </div>
                    <div class="svg-icon">
                        <svg>
                            <use xlink:href="<?php echo ASSETS . '/img/sprite.svg#chevron-right'; ?>" />
                        </svg>
                    </div>
                </a>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="detail-content">
        <div class="cover">
            <a href="<?php ?>" class="media media-cover" data-src="<?php echo $Listing['image']; ?>"></a>
        </div>
        <div class="detail-text flex-fill">
            <div class="caption">
                <div class="caption-content">
                    <h1><?php echo $Listing['title'] . ' ' . __('Episode') . ' ' . $arabic_episodes[$Listing['episode_name']] . ' ' . __('Season') . ' ' . $arabic_seasons[$Listing['season_name']]; ?>
                    </h1>
                </div>
                <?php if ($Listing['episode_release_date']) { ?>
                    <div class="video-attr">
                        <div class="attr"><?php echo 'تاريخ العرض:'; ?></div>
                        <div class="text"><?php echo dating($Listing['episode_release_date']); ?></div>
                    </div>
                <?php } ?>
                <div class="video-attr">
                    <div class="attr"><?php echo 'التصنيف'; ?></div>
                    <div class="text">
                        <?php foreach ($Categories as $Category) { ?>
                            <a
                                href="<?php echo APP . '/category/' . $Category['self']; ?>"><?php echo $Category['name']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <?php if ($Listing['duration']) { ?>
                    <div class="video-attr">
                        <div class="attr"><?php echo __('Duration'); ?></div>
                        <div class="text"><?php echo $Listing['duration'] . ' ' . __('min'); ?></div>
                    </div>
                <?php } ?>
                <?php if ($Listing['overview']) { ?>
                    <div class="video-attr">
                        <div class="attr"><?php echo __('Episode'); ?>     <?php echo __('Description'); ?></div>
                        <div class="text">
                            <div class="text-content"><?php echo $Listing['overview']; ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="action">
                <div class="video-view">
                    <div class="view-text">
                        <?php echo number_format($Listing['hit']); ?><span><?php echo __('views'); ?></span></div>
                </div>
                <div class="action-bar"><span style="width: <?php echo $Likes; ?>%"></span></div>
                <div class="action-btns">
                    <div class="action-btn like <?php if ($Vote['reaction'] == 'up')
                        echo 'active'; ?>"
                        data-id="<?php echo $Listing['id']; ?>">
                        <svg>
                            <use xlink:href="<?php echo ASSETS . '/img/sprite.svg#like'; ?>" />
                        </svg>
                        <span data-votes="<?php echo $Listing['likes']; ?>"><?php echo $Listing['likes']; ?></span>
                    </div>
                    <div class="action-btn dislike <?php if ($Vote['reaction'] == 'down')
                        echo 'active'; ?>"
                        data-id="<?php echo $Listing['id']; ?>">
                        <svg>
                            <use xlink:href="<?php echo ASSETS . '/img/sprite.svg#dislike'; ?>" />
                        </svg>
                        <span
                            data-votes="<?php echo $Listing['dislikes']; ?>"><?php echo $Listing['dislikes']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo ads($Ads, 1, 'my-3'); ?>
    <?php if (count($Seasons) > 0) { ?>
        <div class="season-list">
            <div class="seasons">
                <ul class="nav" role="tablist">
                    <?php
                    if ($Listing['season_name']) {
                        $SeasonNum = $Listing['season_name'];
                    } else {
                        $SeasonNum = 1;
                    }
                    foreach ($Seasons as $Season) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($Season['name'] == $SeasonNum)
                                echo 'active'; ?>"
                                id="season-<?php echo $Season['name']; ?>-tab" data-toggle="tab"
                                href="#season-<?php echo $Season['name']; ?>" role="tab"
                                aria-controls="season-<?php echo $Season['name']; ?>"
                                aria-selected="<?php echo ($SeasonNum == $Season['name'] ? 'true' : 'false'); ?>">
                                <?php echo __('Season') . ' ' . $arabic_seasons[$Season['name']]; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="episodes tab-content">
                <?php foreach ($Seasons as $Season) { ?>
                    <div class="tab-pane <?php if ($Season['name'] == $SeasonNum)
                        echo 'show active'; ?>"
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
                        WHERE posts_episode.status = "1" AND posts_episode.content_id = "' . $Listing['id'] . '" AND posts_episode.season_id = "' . $Season['id'] . '"')
                            ->all();
                        foreach ($Episodes as $Episode) {
                            ?>
                            <a href="<?php echo APP . '/episode/' . $Listing['self'] . '-' . $Listing['create_year'] . '/season-' . $Season['name'] . '-episode-' . $Episode['name']; ?>"
                                <?php if ($Episode['name'] == $Route->params->episode)
                                    echo 'class="active"'; ?>>
                                <div class="episode">
                                    <?php echo __('Episode') . ' ' . $Episode['name']; ?>
                                </div>
                                <div class="name">
                                    <?php echo $Episode['description']; ?>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
<?php require PATH . '/theme/view/common/schema.episode.php';?>
<?php require PATH . '/theme/view/common/footer.php'; ?>