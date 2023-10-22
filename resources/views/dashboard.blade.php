<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Chain Reaction Demo Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6 text-gray-900">
                     <p>
                        We're delighted to introduce you to our demo blog platform, where creating and managing your own content is as easy as a few clicks. Our blog is designed with a user-centric approach, allowing you to have full control over your content without affecting others. Here's what you can expect from our platform:
                    </p>

                    <h2 class="font-semibold text-l text-gray-800 leading-tight">User-Centric Blogging Experience:</h2>
                    <p>
                        Our blog is all about putting you in the driver's seat. As a user, you have the power to create, edit, and delete your own content without any impact on other users' posts. Your content is entirely yours to manage.
                    </p>

                    <h2 class="font-semibold text-l text-gray-800 leading-tight">CRUD Operations Made Simple:</h2>
                    <p>
                        With our user-friendly user interface (UI), you can effortlessly perform CRUD (Create, Read, Update, Delete) operations on your blog posts. We believe in keeping things intuitive, so you don't need any technical expertise to get started.
                    </p>

                    <h2 class="font-semibold text-l text-gray-800 leading-tight">Seamless API Integration:</h2>
                    <p>
                        For those who prefer to interact with the system programmatically or want to build custom applications on top of our platform, we provide a dedicated API. You can find the API documentation at <a class="link" href="/api-docs">/api-docs</a>, making it easy to integrate your tools or scripts with our system.
                    </p>

                    <h2 class="font-semibold text-l text-gray-800 leading-tight">Your Personal Blog Space:</h2>
                    <p>
                        Think of our blog platform as your personal blogging space within a larger community. Your posts are your own, and you can manage them with ease. Share your thoughts, experiences, or insights, and engage with your audience.
                    </p>

                    <h2 class="font-semibold text-l text-gray-800 leading-tight">UI for Convenience, API for Flexibility:</h2>
                    <p>
                        Choose how you want to interact with our platform. If you're looking for a convenient and straightforward experience, access your posts through our UI at <a class="link" href="/posts">/posts</a>. For those who seek flexibility, the API is there to accommodate your development needs.
                    </p>

                    <p>
                        Whether you're a seasoned blogger, a first-time writer, or someone looking to share your knowledge or stories, our Laravel blog platform is designed to cater to your unique needs. We believe in empowering users to express themselves, and we're excited to see what you'll create.
                    </p>

                    <p>
                        So, whether you're here to read, write, or code, we welcome you to explore the world of blogging on our platform. Your words, your stories, and your experiences await. Enjoy your journey through our Laravel blog!
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
