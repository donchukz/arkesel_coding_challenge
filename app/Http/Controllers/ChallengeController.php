<?php

namespace App\Http\Controllers;

use App\Helpers\ArrayHelper;
use Illuminate\Support\Facades\Cache;

class ChallengeController extends Controller
{

    public function q1()
    {
        $arr = [1, 2, 3, 4, 5];
        $k = 3;
        ArrayHelper::rotateArray($arr, $k);
        print_r($arr);
    }

    public function q2($posts, $page, $perPage)
    {
        // Create a new collection instance from the input array.
        $collection = collect($posts);

        // Use the `forPage` method to retrieve the requested page of items
        // from the collection, and convert the result back to an array.
        // Return the paginated results.
        return $collection->forPage($page, $perPage)->all();
    }

    public function q3($query) {
        // Generate a unique key for the query
        $key = md5($query);

        // Try to get the result from Redis cache
        $result = Cache::get($key);

        if ($result === null) {
            // Query the database if the result is not in the Redis cache
            $result = query_database($query);

            // Store the result in the Redis cache for 10 minutes
            Cache::put($key, $result, 10);
        }

        return $result;
    }

    public function q4($s) {
        $compressed = '';  // initialize an empty string to store the compressed string
        $count = 1;  // initialize a count variable to keep track of the number of consecutive characters
        $len = strlen($s);  // get the length of the input string
        for ($i = 0; $i < $len; $i++) {  // loop through the input string
            if ($i == $len - 1 || $s[$i] != $s[$i+1]) {  // if the current character is different than the next character or if it's the last character
                $compressed .= $s[$i] . $count;  // append the current character and the count to the compressed string
                $count = 1;  // reset the count variable to 1
            } else {  // if the current character is the same as the next character
                $count++;  // increment the count variable
            }
        }
        // if the length of the compressed string is longer or equal to the length of the input string, return the input string
        // otherwise, return the compressed string
        return (strlen($compressed) >= $len) ? $s : $compressed;
    }

    /**
     * Traverses a hierarchical structure of categories using DFS and returns an array of category names.
     *
     * @param array $root_category The root category of the hierarchy.
     * @return array An array containing the names of all categories in the hierarchy.
     */
    function q5($root_category) {
        $categories = [];  // initialize an empty array to store category names

        // Inner function that performs the DFS traversal
        function traverse_category($category) use (&$categories) {
            // Append the name of the current category to the $categories array
            array_push($categories, $category["name"]);

            // Check if the current category has subcategories
            if (isset($category["subcategories"])) {
                // Loop through each subcategory and recursively call traverse_category on it
                foreach ($category["subcategories"] as $subcategory) {
                    traverse_category($subcategory);
                }
            }
        }

        // Call the traverse_category function with the root category to start the traversal
        traverse_category($root_category);

        // Return the array of category names
        return $categories;
    }
}
