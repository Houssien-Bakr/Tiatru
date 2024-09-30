<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends Controller
{
    public function process()
    {
        $AuthUser               = $this->getVariable("AuthUser");
        $Route                  = $this->getVariable("Route");
        $Settings               = $this->getVariable("Settings");  

        $Config['nav']          = 'calendar';
    
    	if(!isset($_GET['date'])) {
    	$Date = date("Y-m-d");
    	$Listings = $this->db->from(null,'
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
            WHERE posts.type = "serie" AND posts.status = "1" AND release_date > "'.$Date.'"
            ORDER BY release_date ASC')
            ->all();
        } else {
        $Date = $_GET['date'];
        $Listings = $this->db->from(null,'
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
            WHERE posts.type = "serie" AND posts.status = "1" AND release_date = "'.$Date.'"')
            ->all();
        }
         
		$Config['title'] 		= "Calendar";
        $this->setVariable('Listings', $Listings); 
        $this->setVariable("Config", $Config);
        $this->view('calendar', 'app');
    }

}
