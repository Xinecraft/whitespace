<?php

namespace App\White;

use App\Tweet;
use Carbon\Carbon;
use Twitter;

class TweetSeeker
{
    /**
     * Fetches Tweets and put back into DB.
     *
     * @return string
     * @throws \Exception
     */
    public function checktweets()
    {
 /*       try
        {
            if(Session::has('max_id'))
                $response = Twitter::getUserTimeline(['screen_name' => 'kamaalrkhan' ,'count' => 20, 'max_id' => $max_id, 'format' => 'array']);
            else
                $response = Twitter::getUserTimeline(['screen_name' => 'kamaalrkhan' ,'count' => 20, 'format' => 'array']);
        }
        catch (Exception $e)
        {
            throw new \Exception("Tweet Fetch Failed");

        }*/

        $since_tweet = Tweet::orderBy('tw_created_at','DESC')->first();


        /**
         * If this is not running first time.
         * so pull only that tweets that are tweeted after last tweet id at our db.
         */
        if($since_tweet)
        {
            $since_id = $since_tweet->tw_id;

            try
            {
                $tweets = Twitter::getUserTimeline(['screen_name' => 'kamaalrkhan' ,'since_id' => $since_id, 'format' => 'array']);
            }
            catch (\Exception $e)
            {
                throw new \Exception("Tweet Fetch Failed");

            }

            // Save to DB
            foreach($tweets as $tweet)
            {
                Tweet::create([
                    'tw_created_at' => Carbon::parse($tweet['created_at']),
                    'tw_id' => $tweet['id_str'],
                    'tw_text' => $tweet['text'],
                    'tw_source' => $tweet['source'],
                    'tw_retweet_count' => $tweet['retweet_count'],
                    'tw_favorite_count' => $tweet['favorite_count'],
                    'tw_lang' => $tweet['lang'],
                ]);
            }

            return "Tweets logged!";

        }

        // Called when tweet table is empty.
        else
        {
            try
            {
                $tweets = Twitter::getUserTimeline(['screen_name' => 'kamaalrkhan' ,'count' => 200, 'format' => 'array']);
            }
            catch (\Exception $e)
            {
                throw new \Exception("Tweet Fetch Failed");
            }

            // Save to DB
            foreach($tweets as $tweet)
            {
                Tweet::create([
                    'tw_created_at' => Carbon::parse($tweet['created_at']),
                    'tw_id' => $tweet['id_str'],
                    'tw_text' => $tweet['text'],
                    'tw_source' => $tweet['source'],
                    'tw_retweet_count' => $tweet['retweet_count'],
                    'tw_favorite_count' => $tweet['favorite_count'],
                    'tw_lang' => $tweet['lang'],
                ]);
            }

            return "Tweets logged for first time!";
        }

    }
}
