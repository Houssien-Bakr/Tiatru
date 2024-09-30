<?php require PATH . '/view/common/header.php';?>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-theme table-row v-middle">
                    <thead class="text-muted">
                        <tr>
                            <th width="80"></th>
                            <th><?php echo __('CRON Time');?></th>
                            <th><?php echo __('Cron URL');?></th>
                            <th><?php echo __('Purpose');?></th>
                            <th>HRT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="v-middle text-color">
                            <td class="pr-0 text-muted text-12">
								#1
                            </td>
                            <td class="flex">
								0 0 * * 0 *
                            </td>
                            <td class="no-wrap">
								<?php echo APP; ?>/app/controller/tasks/weekly.php
                            </td>
                            <td class="no-wrap">
								Resets the weekly views on content.
                            </td>
                            <td class="no-wrap">
								Weekly on Sunday
                            </td>
                        </tr>
                        <tr class="v-middle text-color">
                            <td class="pr-0 text-muted text-12">
								#2
                            </td>
                            <td class="flex">
								0 0 L * * *
                            </td>
                            <td class="no-wrap">
								<?php echo APP; ?>/app/controller/tasks/monthly.php
                            </td>
                            <td class="no-wrap">
								Resets the monthly views on content.
                            </td>
                            <td class="no-wrap">
								Monthly on the 31st
                            </td>
                        </tr>
                        <tr class="v-middle text-color">
                            <td class="pr-0 text-muted text-12">
								#3
                            </td>
                            <td class="flex">
								0 0 * * *
                            </td>
                            <td class="no-wrap">
								<?php echo APP; ?>/app/controller/tasks/demote.php
                            </td>
                            <td class="no-wrap">
								Demotes members when premium expires.
                            </td>
                            <td class="no-wrap">
								Daily at Midnight
                            </td>
                        </tr>
                        <tr class="v-middle text-color">
                            <td class="pr-0 text-muted text-12">
								#4
                            </td>
                            <td class="flex">
								0 0 * * *
                            </td>
                            <td class="no-wrap">
								<?php echo APP; ?>/api/tmdb/auto/?page=0
                            </td>
                            <td class="no-wrap">
								Gets new episodes for shows.
                            </td>
                            <td class="no-wrap">
								Daily at Midnight
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><br><br>
                                New episodes cronjob #4 is for every 100 shows, if you have 101 shows you need two cronjobs <pre style="display:inline;color:#fff;">?page=0</pre> AND <pre style="display:inline;color:#fff;">?page=1</pre> and then plus one page number for every 100 shows. This is to prevent the server from been overloaded with mass requests from 1000s of shows. 
                                <br><br>
                                Cronjobs can be done via the server if you have knowledge of that or can be done via <a style="text-decoration:underline" href="https://easycron.com?ref=227122">Easy Cron</a>.
                                <br><br>
                                HRT = Human Readable Time
                        </div>
<?php require PATH . '/view/common/footer.php';?>