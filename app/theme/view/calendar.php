<?php require PATH . '/theme/view/common/header.php';?>
<div class="app-content">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo APP;?>">
                    <?php echo __('Home');?></a></li>
            <li class="breadcrumb-item active"><a href="<?php echo APP.'/calendar';?>">
                    <?php echo __('Calendar');?></a></li>
        </ol>
    </nav>
    <?php echo ads($Ads,3,'mb-3');?>
    <div class="filter-btn" data-toggle="modal" data-target="#filter">
        <svg class="icon">
            <use xlink:href="<?php echo ASSETS.'/img/sprite.svg#filter';?>" />
        </svg>
    </div>
    <div class="d-flex">
        <div class="app-content">
            <div class="app-section">
                <div class="mb-3">
                    <div class="text-24 text-white font-weight-bold">
                        <?php echo $Config['header'];?>
                    </div>
                    <div class="subtext text-12">
                        <?php echo $Config['description'];?>
                    </div>
                </div>
				<div class="list-scrollable" style="overflow: scroll;white-space: nowrap;overflow-y: hidden;margin-bottom:15px;">
				<a href="<?php echo APP . '/calendar'; ?>">
					<button style="border-radius:5px;margin-bottom:15px;" class="btn btn-theme btn-apply">
    					All      
					</button>
				</a>
            	<?php 
    				$Today = date("Y-m-d", strtotime("+1 day"));
					$Week = date("Y-m-d", strtotime("+15 day"));
					$period1 = new DatePeriod(
     					new DateTime($Today),
     					new DateInterval('P1D'),
     					new DateTime($Week)
					);
					foreach ($period1 as $key1 => $value1) { ?>
						<a href="?date=<?php echo $value1->format('Y-m-d'); ?>">
							<button style="border-radius:5px;margin-bottom:15px;" class="btn btn-theme btn-apply">
    							<?php echo dating($value1->format('Y-m-d')); ?>       
							</button>
						</a>
				<?php } ?>
				</div>
				<div class="text-24 text-white font-weight-bold" style="margin-bottom:25px;">
					<?php if(isset($_GET['date'])) { echo dating($_GET['date']); } else { echo "All Upcoming Episodes"; } ?>
				</div>
                <!-- calendar -->
                <div class="row row-cols-md-5 row-cols-2">
                    <?php foreach ($Listings as $Listing) {?>
                    <div class="col">
                        <div class="list-movie">
                            <a href="<?php echo APP . '/episode/'. $Listing['self'] .'-'. $Listing['create_year'] . '/season-' . $Listing['season_name'] . '-episode-' . $Listing['episode_name'];?>" class="list-media">
                                <?php if($Listing['quality'] || $Listing['imdb']) { ?>
                                <div class="list-media-attr">
                                    <?php if($Listing['quality']) { ?>
                                    <div class="quality">
                                        <?php echo $Listing['quality'];?>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <div class="play-btn">
                                    <svg class="icon">
                                        <use xlink:href="<?php echo ASSETS.'/img/sprite.svg#play';?>" />
                                    </svg>
                                </div>
                                <div class="media media-cover" data-src="<?php echo $Listing['image'];?>">
									<?php if($Listing['mpaa']) { ?>
										<div class="media-cover mpaa">
											<?php echo $Listing['mpaa'];?>
										</div>
									<?php } ?>
                                </div>
                            </a>
                            <div class="list-caption">
                    <div class="list-title"><?php echo $Listing['title'];?></div>
                    <div class="list-category"><?php echo ''.__('Season'). ' ' . $Listing['season_name'] . ': '  .__('Episode') . ' ' . $Listing['episode_name'];?></div>
                    <div class="list-category"><?php echo dating($Listing['release_date']);?></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- movies -->
                <?php echo $Pagination;?>
                <div class="text-muted text-12">
                    <?php if($TotalRecord == 0) { ?>
                    <?php echo __('No content found');?>
                    <?php } else { ?>
                    <?php echo $TotalRecord;?>
                    <?php echo __('contains content');?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require PATH . '/theme/view/common/footer.php';?>
