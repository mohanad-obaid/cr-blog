<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Api Documentation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <button class="accordion"><span class="POST">POST</span> /api/register</button>
                <div class="accordion-panel p-6 text-gray-900 space-y-6" id="register-api" style="max-height:2000px;">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">User register</h2>
                    <br/>
                    <p><b>Endpoint:</b> `/api/register`</p>    
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Description:</h3>           
                    <p>The User registration API endpoint is used to create new user accounts and obtain a bearer token for accessing protected resources in the application. Users are required to provide their name, email, and password to initiate the registration process. Upon successful registration, the API will return a bearer token that should be included in the <b>`Authorization`</b> header of subsequent API requests.</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request:</h3>
                    <p><b>HTTP Method:</b> POST</p>
                    <p><b>Content-Type:</b> application/json</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request Parameters:</h3>
                    <ol class="ordered-list">
                        <li>`name` (string, required): The name associated with the user's account.</li>
                        <li>`email` (string, required): The email address associated with the user's account.</li>
                        <li>`password` (string, required): The user's password.</li>
                    </ol>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response Example:</h3>
                    <div class="response-container"><pre>{
    "user": {
        "name": "mohanad",
        "email": "mohanad.obaid@gmail.com",
        "updated_at": "2023-10-21T22:33:03.000000Z",
        "created_at": "2023-10-21T22:33:03.000000Z",
        "id": 3
    },
    "token": "39|Ll196SgfQE6p4DA2D1Hfeevpmo1FpILNd2KfLml24ac78d54"
}</pre></div>
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Give it a try:</h3>
                    <form class="mt-6 space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="register-name">Name</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="register-name" name="register-name" type="text" required="required">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="register-email">Email</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="register-email" name="register-email" type="text" required="required">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="register-password">Password</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="register-password" name="register-password" type="text" required="required">
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="button" onclick="doRegisterRequest()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Send Request</button>
                        </div>
                    </form>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response: <span id="register-response-status"></span></h3>
                    <pre class="response-container" id="register-response"></pre>
                    <hr/>
                </div>
                <button class="accordion"><span class="POST">POST</span> /api/login</button>
                <div class="accordion-panel p-6 text-gray-900 space-y-6" id="login-api" style="max-height:2000px;">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Login</h2>
                    <br/>
                    <p><b>Endpoint:</b> `/api/login`</p>    
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Description:</h3>           
                    <p>The User Login API endpoint is used to authenticate users and obtain a bearer token for accessing protected resources in the application. Users are required to provide their email and password to initiate the login process. Upon successful authentication, the API will return a bearer token that should be included in the <b>`Authorization`</b> header of subsequent API requests.</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request:</h3>
                    <p><b>HTTP Method:</b> POST</p>
                    <p><b>Content-Type:</b> application/json</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request Parameters:</h3>
                    <ol class="ordered-list">
                        <li>`email` (string, required): The email address associated with the user's account.</li>
                        <li>`password` (string, required): The user's password.</li>
                    </ol>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response Example:</h3>
                    <div class="response-container"><pre>{"token":"1|xgblVGAkU6qoMFyHrsVWz10V9eWe7qevjfTs5oghfxxc542b"}</pre></div>
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Give it a try:</h3>
                    <form class="mt-6 space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="login-email">Email</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="login-email" name="login-email" type="text" required="required" value="{{ $userEmail }}">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="login-password">Password</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="login-password" name="login-password" type="text" required="required">
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="button" onclick="doLoginRequest()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Send Request</button>
                        </div>
                    </form>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response: <span id="login-response-status"></span></h3>
                    <pre class="response-container" id="login-response"></pre>
                    <hr/>
                </div>
                <button class="accordion"><span class="GET">GET</span> /api/posts</button>
                <div class="accordion-panel p-6 text-gray-900 space-y-6" id="posts-api">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Login</h2>
                    <br/>
                    <p><b>Endpoint:</b> `/api/posts`</p>    
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Description:</h3>           
                    <p>The /api/posts endpoint provides a list of posts. You can customize the result by using query parameters to control pagination and sorting. By default, the list is sorted by the <b>`created_at`</b> column in descending order (<b>`desc`</b>).</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request:</h3>
                    <p><b>HTTP Method:</b> GET</p>
                    <p><b>Content-Type:</b> application/json</p>

                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Query Parameters:</h3>
                    
                    <ol class="ordered-list">
                        <li>`page` (integer, optional): Use this query parameter to navigate to a specific page of the paginated results. The default page is 1.</li>
                        <li>`sort_column` (string, optional): Specify the column by which you want to sort the results. Available options may include, but are not limited to, `created_at`, `title`, or other relevant columns. If not specified, the default is `created_at`.</li>
                        <li>`sort_direction` (string, optional): Specify the sorting direction. Options are `asc` for ascending and `desc` for descending. If not specified, the default is `desc`.</li>
                    </ol>

                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response Example:</h3>
                    <div class="response-container">
                        <pre>{
    "current_page": 1,
    "data": [
        {
            "id": 12,
            "title": "test api title",
            "content": "mmm",
            "featured_image": "images/posts/featured-images/NGnHqMIqc9mYaEp1260KmpmwhOUUPbMSdsEQrc93.png",
            "created_at": "2023-10-21T11:27:24.000000Z",
            "updated_at": "2023-10-21T11:27:24.000000Z"
        },
        {
            "id": 11,
            "title": "test api title",
            "content": "mmm",
            "featured_image": "images/posts/featured-images/omiEMrEFPqRWWwOHR68gR7lxPXADF3YcBrJEZBgk.png",
            "created_at": "2023-10-21T07:36:41.000000Z",
            "updated_at": "2023-10-21T07:36:41.000000Z"
        },
        {
            "id": 10,
            "title": "test api title",
            "content": "mmm",
            "featured_image": "images/posts/featured-images/5AB3uGsA6BXCMGzo0GOhBeyfalhPPXvEzJYlQFEF.png",
            "created_at": "2023-10-21T07:36:30.000000Z",
            "updated_at": "2023-10-21T07:36:30.000000Z"
        },
        {
            "id": 9,
            "title": "test api title",
            "content": "mmm",
            "featured_image": "images/posts/featured-images/5Iz6w217Vzbg8dgjdb3WVOkqwDZtjL8A64QiXAF2.png",
            "created_at": "2023-10-21T07:32:40.000000Z",
            "updated_at": "2023-10-21T07:32:40.000000Z"
        },
        {
            "id": 8,
            "title": "test api title",
            "content": "mmm",
            "featured_image": "images/posts/featured-images/wxYi14qJByZSrBnrSHA9Nz0zn8np21QBhj2f1Ebw.png",
            "created_at": "2023-10-20T18:42:57.000000Z",
            "updated_at": "2023-10-20T18:42:57.000000Z"
        },
        {
            "id": 7,
            "title": "test api title",
            "content": "mmm",
            "featured_image": "images/posts/featured-images/52hXjmmykjyf3ns9MhwTLPTveT0rvjocQ5SeDrp6.png",
            "created_at": "2023-10-20T18:42:20.000000Z",
            "updated_at": "2023-10-20T18:42:20.000000Z"
        },
        {
            "id": 6,
            "title": "test api title",
            "content": "mmm",
            "featured_image": "images/posts/featured-images/YpUmwFTacJvttn4m9yOj7ppK3szHNBKC2QdzRZJ3.png",
            "created_at": "2023-10-20T18:42:11.000000Z",
            "updated_at": "2023-10-20T18:42:11.000000Z"
        },
        {
            "id": 5,
            "title": "test api title",
            "content": "mmm",
            "featured_image": "images/posts/featured-images/QB1Clb15fG8E1YeEXR96D5lTqwesM3ml3R1VjhDk.png",
            "created_at": "2023-10-20T18:41:50.000000Z",
            "updated_at": "2023-10-20T18:41:50.000000Z"
        },
        {
            "id": 4,
            "title": "test api title",
            "content": "mmm",
            "featured_image": "images/posts/featured-images/JXitmgk8j6lli08gnRHBnPh8h4BEl8iaDucXvlNn.png",
            "created_at": "2023-10-20T18:41:36.000000Z",
            "updated_at": "2023-10-20T18:41:36.000000Z"
        },
        {
            "id": 3,
            "title": "test m2 2",
            "content": "m2 22222222",
            "featured_image": "images/posts/featured-images/DZwYfz7jGJDakqXQptuaCCD7xbeu45OOXAOaNM2V.png",
            "created_at": "2023-10-20T12:03:29.000000Z",
            "updated_at": "2023-10-20T14:50:08.000000Z"
        }
    ],
    "first_page_url": "http://localhost:8000/api/posts?page=1",
    "from": 1,
    "last_page": 2,
    "last_page_url": "http://localhost:8000/api/posts?page=2",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/posts?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": "http://localhost:8000/api/posts?page=2",
            "label": "2",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/posts?page=2",
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": "http://localhost:8000/api/posts?page=2",
    "path": "http://localhost:8000/api/posts",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 12
}</pre>
                    </div>
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Give it a try:</h3>
                    <form class="mt-6 space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="posts-page">Page</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="posts-page" name="posts-page" type="number" value="1">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="posts-sort-column">Sort Column</label>
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="posts-sort-column" name="posts-sort-column" type="text">
                                <option value="title">Title</option>
                                <option value="created_at">Created At</option>
                                <option value="updated_at">Updated At</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="posts-sort-direction">Sort Direction</label>
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="posts-sort-direction" name="posts-sort-direction" type="text">
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="button" onclick="doPostsRequest()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Send Request</button>
                        </div>
                    </form>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response: <span id="posts-response-status"></span></h3>
                    <pre class="response-container" id="posts-response"></pre>
                    <hr/>
                </div>

                <button class="accordion"><span class="GET">GET</span> /api/post/{id}</button>
                <div class="accordion-panel p-6 text-gray-900 space-y-6" id="post-api">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Post Details</h2>
                    <br/>
                    <p><b>Endpoint:</b> `/api/post/{id}`</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Description:</h3>           
                    <p>The `/api/post/{id}` endpoint allows you to retrieve a single post by providing the `id` of the post as a URL parameter.</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request:</h3>
                    <p><b>HTTP Method:</b> GET</p>
                    <p><b>Content-Type:</b> application/json</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">URL Parameter:</h3>
                    <ol class="ordered-list">
                        <li>`id` (integer, required): The unique identifier of the post you want to retrieve.</li>
                    </ol>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response Example:</h3>
                    <div class="response-container"><pre>{
    "id": 1,
    "title": "test",
    "content": "test",
    "featured_image": "images/posts/featured-images/XKjNHwG9k1jmfmZI6vFhQnYISwvh1etaVPEq1fuf.png",
    "created_at": "2023-10-20T11:49:52.000000Z",
    "updated_at": "2023-10-20T11:49:52.000000Z"
}</pre></div>
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Give it a try:</h3>
                    <form class="mt-6 space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-id">Id</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="post-id" name="post-id" type="number" required="required" value="1">
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="button" onclick="doPostRequest()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Send Request</button>
                        </div>
                    </form>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response: <span id="post-response-status"></span></h3>
                    <pre class="response-container" id="post-response"></pre>
                    <hr/>
                </div>

                <button class="accordion"><span class="POST">POST</span> /api/post/create</button>
                <div class="accordion-panel p-6 text-gray-900 space-y-6" id="post-create-api">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Post</h2>
                    <br/>
                    <p><b>Endpoint:</b> `/api/post/create`</p>   
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Description:</h3>           
                    <p>The `/api/post/create` endpoint enables you to create a new post by providing the required parameters. It allows you to add a title, content, and an optional featured image to the new post.</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request:</h3>
                    <p><b>HTTP Method:</b> POST</p>
                    <p><b>Content-Type:</b> application/json</p>
                    <p><b>Authorization:</b> Bearer token required</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request Parameters:</h3>
                    <ol class="ordered-list">
                        <li>`title` (string, required): The title of the new post.</li>
                        <li>`content` (string, required): The content or body of the new post.</li>
                        <li>`featured_image` (file, optional): An optional featured image to associate with the new post.</li>
                    </ol>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response Example:</h3>
                    <div class="response-container"><pre>{"message": "Post created successfully"}</pre></div>
                    <p>
                        In this response, the successful response status is set to 201 Created to indicate a successful creation.
                        <br/>
                        Note: The Authorization header with a bearer token is required for authentication. Ensure that you provide a valid bearer token in the request header, you can get the Bearer token from the <b>Login Api</b> by providing the username and password.
                    </p>
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Give it a try:</h3>
                    <form class="mt-6 space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-create-token">Authorization <em class="text-muted">(filled from cookie / login api request)</em></label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full bearer-token-input" id="post-create-token" name="post-create-token" type="text" required="required">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-create-title">Title</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="post-create-title" name="post-create-title" type="text" required="required">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-create-content">Content</label>    
                            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="post-create-content" name="post-create-content" required="required"></textarea>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-create-featured_image">Featured Image</label><label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="post-create-featured_image" name="post-create-featured_image" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100">
                            </label>
                            <div class="shrink-0 my-2">
                                <img id="featured_image_preview" class="h-64 w-128 object-cover rounded-md" src="http://localhost:8000/assets/images/placeholder-image.jpg" alt="Featured image preview">
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="button" onclick="doPostCreateRequest()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Send Request</button>
                        </div>
                    </form>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response: <span id="post-create-response-status"></span></h3>
                    <pre class="response-container" id="post-create-response"></pre>
                    <hr/>
                </div>

                <button class="accordion"><span class="PUT">PUT</span> /api/post/update/{id}</button>
                <div class="accordion-panel p-6 text-gray-900 space-y-6" id="post-update-api">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">update Post</h2>
                    <br/>
                    <p><b>Endpoint:</b> `/api/post/update/{id}`</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Description:</h3>           
                    <p>The `/api/post/update/{id}` endpoint enables you to update a post by providing the required parameters. It allows you to update a title, content, and an optional featured image to the post.</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request:</h3>
                    <p><b>HTTP Method:</b> POST</p>
                    <p><b>Content-Type:</b> application/json</p>
                    <p><b>Authorization:</b> Bearer token required</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request Parameters:</h3>
                    <ol class="ordered-list">
                        <li>`id` (integer, required): The unique identifier of the post you want to retrieve.</li>
                        <li>`title` (string, required): The title of the new post.</li>
                        <li>`content` (string, required): The content or body of the new post.</li>
                        <li>`featured_image` (file, optional): An optional featured image to associate with the new post.</li>
                    </ol>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response Example:</h3>
                    <div class="response-container"><pre>{"message": "Post updated successfully"}</pre></div>
                    <p>
                        In this response, the successful response status is set to 201 updated to indicate a successful creation.
                        <br/>
                        Note: The Authorization header with a bearer token is required for authentication. Ensure that you provide a valid bearer token in the request header, you can get the Bearer token from the <b>Login Api</b> by providing the username and password.
                    </p>
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Give it a try:</h3>
                    <form class="mt-6 space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-update-id">Id</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="post-update-id" name="post-update-id" type="number" required="required" value="1">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-update-token">Authorization <em class="text-muted">(filled from cookie / login api request)</em></label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full bearer-token-input" id="post-update-token" name="post-update-token" type="text" required="required">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-update-title">Title</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="post-update-title" name="post-update-title" type="text" required="required">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-update-content">Content</label>    
                            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="post-update-content" name="post-update-content" required="required"></textarea>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-update-featured_image">Featured Image</label><label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="post-update-featured_image" name="post-update-featured_image" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100">
                            </label>
                            <div class="shrink-0 my-2">
                                <img id="featured_image_preview" class="h-64 w-128 object-cover rounded-md" src="http://localhost:8000/assets/images/placeholder-image.jpg" alt="Featured image preview">
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="button" onclick="doPostUpdateRequest()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Send Request</button>
                        </div>
                    </form>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response: <span id="post-update-response-status"></span></h3>
                    <pre class="response-container" id="post-update-response"></pre>
                    <hr/>
                </div>

                <button class="accordion"><span class="DELETE">DELETE</span> /api/post/delete/{id}</button>
                <div class="accordion-panel p-6 text-gray-900 space-y-6" id="post-delete-api">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Delete Post</h2>
                    <br/>
                    <p><b>Endpoint:</b> `/api/post/delete/{id}`</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Description:</h3>
                    <p>The `/api/post/delete/{id}` endpoint allows you to delete a post by providing the unique identifier of the post to be deleted.</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request:</h3>
                    <p><b>HTTP Method:</b> DELETE</p>
                    <p><b>Content-Type:</b> N/A (No request body)</p>
                    <p><b>Authorization:</b> Bearer token required</p>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Request Parameters:</h3>
                    <ol class="ordered-list">
                        <li>`id` (integer, required): The unique identifier of the post you want to delete.</li>
                    </ol>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response Example:</h3>
                    <div class="response-container"><pre>{"message": "Post deleted successfully"}</pre></div>
                    <p>
                        In this response, the successful response status is set to 200 to indicate a successful deletion.
                        <br/>
                        Note: The Authorization header with a bearer token is required for authentication. Ensure that you provide a valid bearer token in the request header, which you can obtain from the <b>Login API</b> by providing the username and password.
                    </p>
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Give it a try:</h3>
                    <form class="mt-6 space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-delete-id">Id</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="post-delete-id" name="post-delete-id" type="number" required="required" value="1">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="post-delete-token">Authorization <em class="text-muted">(filled from cookie / login API request)</em></label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full bearer-token-input" id="post-delete-token" name="post-delete-token" type="text" required="required">
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="button" onclick="doPostDeleteRequest()" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Send Request</button>
                        </div>
                    </form>
                    <h3 class="font-semibold text-l text-gray-800 leading-tight">Response: <span id="post-delete-response-status"></span></h3>
                    <pre class="response-container" id="post-delete-response"></pre>
                    <hr/>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/api-docs.js') }}"></script>
</x-app-layout>
