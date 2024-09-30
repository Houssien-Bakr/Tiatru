<div class="app-section app-weekly">
<div class="app-heading">
<div class="text"><?php echo $HomeModule['name'];?></div>
<a href="<?php echo APP.'/discovery';?>" class="all"><?php echo __('Trending');?></a>
</div>	
<?php if($ModuleData['mobile_slider'] == '1') { ?>
		<style>
			@media only screen and (max-width: 981px) {
				.mobile_slide_weekly {
    				overflow-x: auto;
    				flex-wrap: nowrap;
				}
			}
		</style>
	<?php } ?>
	<?php if($ModuleData['desktop_slider'] == '1') { ?>
		<style>
			@media only screen and (min-width: 981px) {
				.mobile_slide_weekly {
    				overflow-x: auto;
    				flex-wrap: nowrap;
				}
			}
		</style>
	<?php } ?>
<div class="row row-cols-5 mobile_slide_weekly mobile_slide">
<?php  
if(!$ModuleData['sorting']) {
$OrderBy = 'id DESC';
}else{
$OrderBy = $ModuleData['sorting'];
}
$today = date("Y/m/d");
        $Newests = $this->db->from(null,'
            SELECT 
            posts_episode.name as episode_name, 
            posts_episode.image as episode_image, 
            posts_episode.release_date as release_date, 
            posts_season.name as season_name, 
            posts.id, 
            posts.title, 
            posts.self, 
            posts.image, 
            posts.cover, 
            posts.create_year,
            posts.imdb,
            posts_episode.created,
            posts_episode.featured
            FROM `posts_episode` 
            LEFT JOIN posts ON posts_episode.content_id = posts.id  
            LEFT JOIN posts_season ON posts_season.id = posts_episode.season_id  
            WHERE posts.type = "serie" AND posts.status = "1" AND release_date > CURRENT_DATE()
            ORDER BY release_date ASC
            LIMIT 0,'.$HomeModule['data_limit'])
            ->all();
$count = 1;
foreach ($Newests as $Newest) {
?>
<div class="col">
<div class="list-movie">
<a href="<?php echo APP . '/episode/'. $Newest['self'] .'-'. $Newest['create_year'] . '/season-' . $Newest['season_name'] . '-episode-' . $Newest['episode_name'];?>" class="list-media">
<?php if($Newest['quality'] || $Newest['imdb']) { ?>
<div class="list-media-attr">
<?php if($Newest['quality']) { ?><div class="quality"><?php echo $Newest['quality'];?></div><?php } ?>
<?php if($Newest['imdb']) { ?>
<div class="imdb">
<span>
<?php echo round($Newest['imdb'],1);?></span>
<svg x="0px" y="0px" width="36px" height="36px" viewBox="0 0 36 36"><circle fill="none" stroke-width="1" cx="18" cy="18" r="16" stroke-dasharray="<?php echo round($Newest['imdb'] / 10 * 100);?> 100" stroke-dashoffset="0" transform="rotate(-90 18 18)"></circle></svg>
</div>
<?php } ?>
</div>
<?php } ?>
<div class="play-btn"><svg class="icon"><use xlink:href="<?php echo ASSETS.'/img/sprite.svg#play';?>" /></svg></div>
<div class="media media-cover" style="background-image:url('<?php echo $Newest['image'];?>');">
<?php if($Newest['mpaa']) { ?><div class="media-cover mpaa"><?php echo $Newest['mpaa'];?></div><?php } ?>
</div>
</a>
<div class="list-caption">
                    <div class="list-title"><?php echo $Newest['title'];?></div>
                    <div class="list-category"><?php echo ''.__('Season'). ' ' . $Newest['season_name'] . ': '  .__('Episode') . ' ' . $Newest['episode_name'];?></div>
                    <div class="list-category"><?php echo dating($Newest['release_date']);?></div>

</div>
</div>
</div>
<?php } ?>
</div>
</div>
