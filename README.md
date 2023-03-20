Question 1 - Array Manipulation

<b>Approach Explanation:</b>

- Get the length of the array 'n'.
- If the value of 'k' is greater than 'n', then reduce it to its equivalent value less than 'n'.
- Reverse the first 'n-k' elements of the array using the reverseArray() method with start index 0 and end index n-k-1.
- Reverse the remaining 'k' elements of the array using the reverseArray() method with start index n-k and end index n-1.
- Reverse the entire array using the reverseArray() method with start index 0 and end index n-1.
- The reverseArray() method is a helper method that takes an integer array, a start index, and an end index as input parameters, and reverses the elements between the start and end indices in place. The time complexity of this method is also O(n) because it only traverses the array three times. Note that we pass the array by reference to the rotateArray() and reverseArray() methods using the '&' symbol, so that any changes made to the array inside the methods are reflected outside the methods as well.


Question 2 - REST API Pagination

<b>Approach Explanation:</b>

To design an API endpoint for a paginated list of blog posts, we can use query parameters to specify the page number and the number of items per page. 

Here's an example API endpoint: GET /blog-posts?page=1&per_page=10

In this example, page is the number of the page to return (starting at 1) and per_page is the number of blog posts to return per page.

I have used Laravel's built-in collect function to create a new collection instance from the input $posts array. It then uses the forPage method of the collection to retrieve the requested page of items, based on the provided $page and $perPage parameters. Finally, the function returns the paginated results as an array.


Question 3 - Cache Implementation

<b>Approach Explanation:</b>

One caching mechanism that can be implemented to reduce the number of database queries is to use an in-memory cache. The idea is to store the results of frequently accessed queries in memory, and retrieve them from the cache rather than querying the database every time.

To implement this, we can use a key-value store such as Redis, which is an in-memory data structure store that can be used as a cache. When a query is executed, we can check if the data is already in the cache. If it is, we retrieve it from the cache and return it. If it is not, we query the database, store the result in the cache, and return it.


Question 4 - String Compression

<b>Approach Explanation:</b>

We initialize an empty string called $compressed, and a variable called $count which will keep track of the number of consecutive characters. We then iterate through the input string $s using a for loop.

Inside the loop, we check if the current character is the same as the next character. If it is, we increment the $count variable. Otherwise, we add the current character to the $compressed string, along with the current count. We then reset the $count variable to 1.

After iterating through the entire input string, we check if the length of the compressed string is shorter than the original string. If it is, we return the compressed string. Otherwise, we return the original string.


Question 5 - Tree Traversal

<b>Approach Explanation:</b>

The q5 function takes a root category as input and returns an array containing the names of all categories in the hierarchy using depth-first search (DFS) traversal.

The function first initializes an empty array called categories to store the category names. Then, it defines an inner function called traverse_category which takes a category as input and performs the DFS traversal.

Inside the traverse_category function, the name of the current category is appended to the categories array using the array_push function. If the current category has subcategories, the function loops through each subcategory and recursively calls traverse_category to traverse the subcategory.

Finally, the function calls traverse_category with the root category to start the traversal, and returns the categories array containing the names of all categories in the hierarchy. Note that the use keyword is used to pass the $categories array to the traverse_category function by reference, so that the changes made inside the function are reflected outside the function.
