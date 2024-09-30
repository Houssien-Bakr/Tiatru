<div class="app-section app-weekly">
	<div class="app-heading">
		<div class="text"><?php echo $HomeModule['name']; ?></div>
		<a href="<?php echo APP . '/discovery'; ?>" class="all"><?php echo 'عرض المزيد'; ?></a>
	</div>
	<?php if ($ModuleData['mobile_slider'] == '1') { ?>
		<style>
			@media only screen and (max-width: 981px) {
				.mobile_slide_weekly {
					overflow-x: auto;
					flex-wrap: nowrap;
				}
			}
		</style>
	<?php } ?>
	<?php if ($ModuleData['desktop_slider'] == '1') { ?>
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
		// Fetch movies
		$Movies = $this->db->from(
			null,
			'
            SELECT 
                posts.id, 
                posts.title, 
                posts.self, 
                posts.image, 
                posts.cover, 
                posts.create_year, 
                posts.imdb, 
                posts.type, 
                posts.created
            FROM `posts`
            WHERE posts.type = "movie" AND posts.status="1"
            ORDER BY posts.created DESC
            LIMIT 0,' . $HomeModule['data_limit']
		)->all();

		// Fetch episodes
		$Episodes = $this->db->from(
			null,
			'
            SELECT 
                posts_episode.id, 
                posts_episode.name as episode_name, 
                posts_season.name as season_name, 
                posts.title as serie_name, 
                posts.self, 
                posts_episode.image as episode_image, 
                posts.cover,
                posts.image,
                posts_episode.description, /* Fetch episode description */
                posts.create_year, 
                posts.imdb, 
                "episode" as type, 
                posts_episode.created
            FROM `posts_episode`
            LEFT JOIN posts ON posts.id = posts_episode.content_id
            LEFT JOIN posts_season ON posts_season.id = posts_episode.season_id
            WHERE posts.type = "serie" AND posts_episode.status = "1"
            ORDER BY posts_episode.created DESC
            LIMIT 0,' . $HomeModule['data_limit']
		)->all();

		// Arabic ordinals for episodes (feminine form)
		$arabic_episodes = [
			'1' => 'الأولى',
			'2' => 'الثانية',
			'3' => 'الثالثة',
			'4' => 'الرابعة',
			'5' => 'الخامسة',
			'6' => 'السادسة',
			'7' => 'السابعة',
			'8' => 'الثامنة',
			'9' => 'التاسعة',
			'10' => 'العاشرة'
		];

		// Arabic ordinals for seasons (masculine form)
		$arabic_seasons = [
			'1' => 'الأول',
			'2' => 'الثاني',
			'3' => 'الثالث',
			'4' => 'الرابع',
			'5' => 'الخامس'
		];

		// Merge the movies and episodes arrays
		$Content = array_merge($Movies, $Episodes);

		// Sort the combined content by the `created` field in descending order
		usort($Content, function ($a, $b) {
			return strtotime($b['created']) - strtotime($a['created']);
		});

		// Display the content
		foreach ($Content as $Item) {
			// Convert episode and season names to Arabic ordinals if available
			$episode_ordinal = isset($arabic_episodes[$Item['episode_name']]) ? $arabic_episodes[$Item['episode_name']] : $Item['episode_name'];
			$season_ordinal = isset($arabic_seasons[$Item['season_name']]) ? $arabic_seasons[$Item['season_name']] : $Item['season_name'];

			// Check if the episode description contains "الأخيرة"
			$is_last_episode = strpos($Item['description'], 'الأخيرة') !== false;
			?>
			<div class="col">
				<div class="list-movie">
					<a href="<?php echo APP . '/' . ($Item['type'] == 'movie' ? 'movie' : 'episode') . '/' . $Item['self'] . '-' . $Item['create_year'] . '/season-' . $Item['season_name'] . '-episode-' . $Item['episode_name']; ?>"
						class="list-media">
						<div class="list-media-attr"></div>
						<div class="play-btn">
							<svg class="icon">
								<use xlink:href="<?php echo ASSETS . '/img/sprite.svg#play'; ?>" />
							</svg>
						</div>
						<div class="media media-cover"
							style="background-image:url('<?php echo ($Item['type'] == 'movie' ? $Item['image'] : $Item['episode_image']); ?>');">
							<?php if ($Item['mpaa']) { ?>
								<div class="media-cover mpaa"><?php echo $Item['mpaa']; ?></div><?php } ?>
							<!-- Add episode label -->
							<?php if ($Item['type'] == 'episode') { ?>
								<div class="episode-label <?php echo $is_last_episode ? 'last-episode' : ''; ?>">
									<?php echo $is_last_episode ? 'الحلقة الأخيرة' : 'الحلقة ' . $episode_ordinal; ?>
								</div>
							<?php } ?>
						</div>
					</a>
					<div class="list-caption">
						<a href="<?php echo APP . '/' . ($Item['type'] == 'movie' ? 'movie' : 'episode') . '/' . $Item['self'] . '-' . $Item['create_year'] . '/season-' . $Item['season_name'] . '-episode-' . $Item['episode_name']; ?>"
							class="list-title">
							<?php
							// For episodes, show "Series Name الحلقة Episode Name الموسم Season Name"
							echo ($Item['type'] == 'movie')
								? $Item['title']
								: $Item['serie_name'] . ' الحلقة ' . $episode_ordinal . ' الموسم ' . $season_ordinal;
							?>
						</a>
						<div class="list-year" style="display:inline">
							<?php echo $Item['create_year']; ?>
						</div>
						<div class="mpaa float-right" style="display:inline; margin-top: 0px;">
							<?php
							// Display type label
							echo ($Item['type'] == 'movie') ? 'فيلم' : 'مسلسل';
							?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<!-- Add the CSS style for the episode label -->
<style>
	.episode-label {
		position: absolute;
		top: 10px;
		right: 10px;
		background-color: rgba(0, 0, 0, 0.7);
		color: white;
		padding: 5px 10px;
		border-radius: 5px;
		font-size: 14px;
	}

	/* Red background for the last episode */
	.last-episode {
		background-color: rgba(255, 0, 0, 0.7);
	}
</style>