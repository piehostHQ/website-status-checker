<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebsiteStatusController extends Controller
{
    public function checkWebsiteStatus(Request $request)
{
    // Use regex to allow partial URLs without protocol (e.g., "google.com")
    $request->validate([
        'url' => 'required|regex:/^((https?:\/\/)?(www\.)?[\w\-]+\.\w{2,})(\/[\w\-]*)*$/'
    ]);

    // Add "https://" if no protocol is specified
    $url = $request->input('url');
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "https://" . $url;
    }

    try {
        $response = Http::timeout(5)->get($url);

        if ($response->successful()) {
            return response()->json(['status' => 'up', 'message' => 'The website is up and running!']);
        } else {
            return response()->json(['status' => 'down', 'message' => 'The website is down.']);
        }
    } catch (\Exception $e) {
        return response()->json(['status' => 'down', 'message' => 'Could not reach the website.']);
    }
}

}
