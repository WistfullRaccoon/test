<?php


namespace App\Assistants;

use Exception;

class imageCompressor
{

    public static function compressImage($filepath)
    {
        try {
            \Tinify\setKey("9GgBMNwMWVr7fZzBW24Ym4nym0Ys1sjj");
            $source = \Tinify\fromFile($filepath);
            $source->toFile($filepath);
        } catch(\Tinify\AccountException $e) {
            // Verify your API key and account limit.
            return redirect('/')->with('error', $e->getMessage());
        } catch(\Tinify\ClientException $e) {
            // Check your source image and request options.
            return redirect('/')->with('error', $e->getMessage());
        } catch(\Tinify\ServerException $e) {
            // Temporary issue with the Tinify API.
            return redirect('/')->with('error', $e->getMessage());
        } catch(\Tinify\ConnectionException $e) {
            // A network connection error occurred.
            return redirect('/')->with('error', $e->getMessage());
        } catch(Exception $e) {
            // Something else went wrong, unrelated to the Tinify API.
            return redirect('/')->with('error', $e->getMessage());
        }
    }

}
