<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Storage;

class Downloader
{
    /**
     * Grab the contents of and URL and save it in a unique file in one of the
     * Laravel storages, under a specific directory. When the request ends,
     * it returns the path of the newly created file back to the caller.
     *
     * @param String $url
     * @param String $directory
     * @param String|\Illuminate\Contracts\Filesystem\Filesystem $disk
     */
    public static function downloadFile($url, $directory = '', $disk = null)
    {
        // Process the arguments
        $disk = static::getDisk($disk);
        $path = static::makeFilename($url, $directory);
        
        // Create a temporary file for the contents of the URL
        $temp_file_handle = fopen('php://temp', 'w+');
        
        // Stream the contents with cURL into the temporary file
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FILE, $temp_file_handle);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        
        // Go back to the start of the temporary file handle, put its contents
        // in a unique file in the designated directory, and then close the
        // handle. This ensures the temporary file is properly destroyed
        fseek($temp_file_handle, 0);
        $disk->put($path , $temp_file_handle);
        fclose($temp_file_handle);
        
        // Return the path of the newly created file
        return $path;
    }
    
    private static function makeFilename($url, $directory) {
        // Return a unique filename based on the URL
        $path = parse_url($url, PHP_URL_PATH);
        $basename = basename($path);
        
        return trim($directory . '/' . Str::random(20) . $basename, '/');
    }
    
    private static function getDisk($disk)
    {
        if (is_null($disk)) {
            return Storage::disk('local');
        }
        else if (is_string($disk)) {
            return Storage::disk($disk);
        }
        else {
            return $disk;
        }
    }
}
