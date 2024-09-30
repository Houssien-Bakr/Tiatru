        <div class="profile-box">
            <div class="row row-cols-6 list-scrollable">
                <?php 
                            $Follows = $this->db->from(null,'
                                SELECT 
                                posts.id, 
                                posts.title, 
                                posts.create_year, 
                                posts.self, 
                                posts.image, 
                                posts.type
                                FROM `reactions` 
                                LEFT JOIN posts ON posts.id = reactions.content_id  
                                WHERE reactions.reaction = "up" AND reactions.user_id = "'.$Listing['id'].'" 
                                ORDER BY posts.id
                                LIMIT 0,10')
                                ->all();
                            foreach ($Follows as $Follow) {  
                            ?>
                <div class="col">
                    <div class="list-movie">
                        <a href="<?php if($Follow['type'] == 'serie') { echo APP. '/show/'; } else { echo '/movie/'; } echo $Follow['self'] . '-' . $Follow['create_year']; ?>" class="list-media">
                            <div class="play-btn">
                                <svg class="icon">
                                    <use xlink:href="<?php echo ASSETS.'/img/sprite.svg#play';?>" />
                                </svg>
                            </div>
                            <div class="media media-cover" data-src="<?php echo $Follow['image'];?>"></div>
                        </a>
                        <div class="list-caption">
                            <a href="<?php if($Follow['type'] == 'serie') { echo APP. '/show/'; } else { echo '/movie/'; } echo $Follow['self'] . '-' . $Follow['create_year']; ?>" class="list-title text-12">
                                <?php echo $Follow['title'];?>
                            </a>
                            <a href="<?php if($Follow['type'] == 'serie') { echo APP. '/show/'; } else { echo '/movie/'; } echo $Follow['self'] . '-' . $Follow['create_year']; ?>" class="list-category">
                                <?php echo ($Follow['type'] == 'movie' ? __('Movie') : __('Show'));?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
