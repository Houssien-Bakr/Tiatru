<div class="form-group module-accordion">
    <label class="custom-label mt-3"><?php echo __('Home Page Blocks');?></label>
    <?php 
    foreach ($HomeModules as $HomeModule) { 
    $ModuleData = json_decode($HomeModule['data'], true);
    ?>
    <div class="card card-list module-element">
        <div class="card-header">
            <div class="sortable-move">
                <svg class="icon">
                    <use xlink:href="<?php echo ASSETS.'/img/sprite.svg#sort';?>" />
                </svg>
            </div>
            <a data-toggle="collapse" href="#c<?php echo $HomeModule['id'];?>" role="button" aria-expanded="false" aria-controls="c<?php echo $HomeModule['id'];?>" class="flex-fill">
                <?php echo $HomeModule['name'];?>
                <?php if($HomeModule['status'] == '2') { ?>
                <span class="badge bg-warning-lt ml-2"><?php echo __('Disabled');?></span>
                <?php } ?>
            </a>
        </div>
        <div class="collapse" id="c<?php echo $HomeModule['id'];?>">
            <div class="card-body">
                <input type="hidden" name="module[<?php echo $HomeModule['id'];?>][id]" value="<?php echo $HomeModule['id'];?>">
                <input type="hidden" name="module[<?php echo $HomeModule['id'];?>][page]" value="<?php echo $HomeModule['page'];?>">
                <input type="hidden" name="module[<?php echo $HomeModule['id'];?>][sortable]" value="<?php echo $HomeModule['sortable'];?>" class="sortable-input">
                
                <div class="form-group">
                    <label class="custom-label"><?php echo __('Title');?></label>
                    <input type="text" name="module[<?php echo $HomeModule['id'];?>][name]" class="form-control form-control-sm" placeholder="Block Title" value="<?php echo $HomeModule['name'];?>">
                </div>

                <!-- Sorting Options -->
                <div class="form-group">
                    <label class="custom-label"><?php echo __('Sorting');?></label>
                    <select name="module[<?php echo $HomeModule['id'];?>][data][sorting]" class="custom-select custom-select-sm">
                        <?php if ($HomeModule['id'] != '10' && $HomeModule['id'] != '11') { ?>
                            <option value="id desc" <?php if($ModuleData['sorting']=='id.desc' ) echo 'selected';?>><?php echo __('Newest');?></option>
                            <option value="hit desc" <?php if($ModuleData['sorting']=='hit.desc' ) echo 'selected';?>><?php echo __('Popular');?></option>
                        <?php } ?>
                        <?php if ($HomeModule['id'] == '10' || $HomeModule['id'] == '11') { ?>
                            <option value="create_year desc" <?php if($ModuleData['sorting']=='create_year.desc' ) echo 'selected';?>><?php echo __('Release Date');?></option>
                            <option value="hit desc" <?php if($ModuleData['sorting']=='hit.desc' ) echo 'selected';?>><?php echo __('Popular');?></option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Listing Options for home.episodes -->
                <?php if ($HomeModule['module_file'] == 'home.episodes') { ?>
                <div class="form-group">
                    <label class="custom-label"><?php echo __('Listing');?></label>
                    <select name="module[<?php echo $HomeModule['id'];?>][data][listing]" class="custom-select custom-select-sm">
                        <option value="v1" <?php if($ModuleData['listing']=='v1' ) echo 'selected';?>><?php echo __('Vertical');?></option>
                        <option value="v2" <?php if($ModuleData['listing']=='v2' ) echo 'selected';?>><?php echo __('Horizontal');?></option>
                    </select>
                </div>
                <?php } ?>

                <!-- Limit Option -->
                <div class="form-group">
                    <label class="custom-label"><?php echo __('Limit');?></label>
                    <input type="text" name="module[<?php echo $HomeModule['id'];?>][data_limit]" class="form-control form-control-sm" placeholder="Limit" value="<?php echo $HomeModule['data_limit'];?>">
                </div>

                <!-- Slider Options for both Mobile and Desktop -->
                <?php if (in_array($HomeModule['id'], ['1', '3', '10', '11', '13', '14']) || $HomeModule['module_file'] == 'home.episodes') { ?>
                <div class="switch-container">
                    <label class="switch"><input name="module[<?php echo $HomeModule['id'];?>][data][mobile_slider]" type="checkbox" value="1" <?php if($ModuleData['mobile_slider']=='1' ) echo 'checked';?>><span class="switch-button"></span><?php echo __('Slide on Mobile');?></label>
                </div>
                <div class="switch-container">
                    <label class="switch"><input name="module[<?php echo $HomeModule['id'];?>][data][desktop_slider]" type="checkbox" value="1" <?php if($ModuleData['desktop_slider']=='1' ) echo 'checked';?>><span class="switch-button"></span><?php echo __('Slide on Desktop');?></label>
                </div>
                <br>
                <?php } ?>

                <!-- Active Status -->
                <div class="switch-container">
                    <label class="switch"><input name="module[<?php echo $HomeModule['id'];?>][status]" type="checkbox" value="1" <?php if($HomeModule['status']=='1' ) echo 'checked';?>><span class="switch-button"></span><?php echo __('Active');?></label>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
