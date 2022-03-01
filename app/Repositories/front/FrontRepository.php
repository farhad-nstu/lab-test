<?php

namespace App\Repositories\front;
use App\Models\UrlShort;
use App\Models\Log;
use Auth;
use Jenssegers\Agent\Facades\Agent;
use DateTime;
use App\Models\BlockList;

class FrontRepository
{
    public function index()
    {
        $urls = UrlShort::where('expiry_time', '>=', date('Y-m-d'))->orderBy('id', 'desc')->get();
        return view('front.home', compact('urls'));
    }

    public function hit_link($request, $link)
    {      
        $currentDate = date('Y-m-d H:i:s');
        $user_id = Auth::id();
        $userIpAddress = '5.161.62.218';

        // Block 5 minutes check
        $checkDate = new DateTime;
        $checkDate->modify('-5 minutes');
        $formatteCheckDate = $checkDate->format('Y-m-d H:i:s');

        $checkBlockMinutes = BlockList::where(['user_id' => $user_id, 'ip' => $userIpAddress, 'link' => $link])->whereBetween('created_at', [$formatteCheckDate, $currentDate])->get();
        if(count($checkBlockMinutes) > 0) {
            return back()->with('stillBlockMessage', 'You are still blocked');
        } 

        // More than 3 times click check
        $date = new DateTime;
        $date->modify('-1 minute');
        $formatteDate = $date->format('Y-m-d H:i:s');

        $logs = Log::where(['user_id' => $user_id, 'ip' => $userIpAddress, 'link' => $link])->whereBetween('created_at', [$formatteDate, $currentDate])->get();
        $url = UrlShort::where('link', $link)->pluck('click_limitation')->first();
        if($url) {
            $limit = $url;
        } else {
            $limit = 3;
        }

        if(count($logs) >= $limit) {
            $blockList = new BlockList;          
            $blockList->user_id = $user_id;
            $blockList->ip = $userIpAddress;
            $blockList->link = $link;
            $blockList->save();
            return back()->with('blockMessage', 'You are blocked for five minutes');          
        }

        $locationData = \Location::get($userIpAddress);
    	$log = new Log;
        $log->link = $link;
    	$log->user_id = Auth::id();
    	$log->ip = $userIpAddress;
        $log->location = $locationData->cityName.", ".$locationData->regionCode.", ".$locationData->countryCode;
        $log->latitude = $locationData->latitude;
        $log->longitude = $locationData->longitude;

        if(Agent::isDesktop()) {
            $device = "Desktop";
        } else if(Agent::isTablet()) {
            $device = "Tablet";
        } else if(Agent::isPhone()) {
            $device = "Phone";
        } else {
            $device = Agent::device();
        }
        $log->browser = Agent::browser();
        $log->os = Agent::platform();
        $log->device = $device;
        $log->save();
        return back()->with('message', 'You have clicked the link '.$link);
    }
}
