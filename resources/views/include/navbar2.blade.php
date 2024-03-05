
    <nav class="fixed top-0 z-20 w-full bg-blue-900 shadow-md">
        <div class="flex flex-wrap items-center justify-center max-w-screen-xl p-4 gap-5 mx-auto">
            <div class="font-fontutama text-3xl font-medium text-white">
                Gallery Foto
            </div>
            <a href="/explore" class="mr-4 text-white">Beranda</a>
            <a href="/upload" class="mr-4 text-white">Upload</a>
            <form action="/explore" method="get">
                <input type="text" class="px-4 py-1 mr-4 rounded-full" placeholder="Search ..." name="cari">
            </form>
            <a href="/album" class="mr-4 text-white">Album</a>
                <!-- Drop Down -->
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="mb-4" type="button">
                      <img src="/assets/{{ Auth::user()->picture }}" alt="" class="w-10 h-10  rounded-full">
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="/profilesaya" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="/edit-profile/{{ Auth::user()->id }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit Profile</a>
                        </li>
                        <li>
                            <a href="/change-password" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Ubah Password</a>
                        </li>
                        <li>
                            <a href="/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    
    