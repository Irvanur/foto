@extends('layout.master2')
@push('cssjsexternal')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content2')
    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-4xl text-center text-blue-900 font-fontutama">Gallery Foto</h3>
        </div>
    </section>
    @if ($message = Session::get('success'))
    <div class="flex justify-center mt-4">
        <div id="toast-undo" class="flex items-center justify-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="text-sm font-normal text-blue-600">
            {{ $message }}
            </div>
            <div class="flex items-center ms-auto space-x-2 rtl:space-x-reverse">
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-undo" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                </button>
            </div>
        </div>
    </div>
    @endif
    <section>
        <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
            <div>
                <img src="/assets/{{ Auth::user()->picture }}" alt="" class="w-24 h-24 rounded-full" id="myprofil">
            </div>
            <a href="profil.html">
                <h3 class="text-xl font-semibold" id="nama">
                    {{ Auth::user()->nama_lengkap }}
                </h3>
                <!-- <a href="/edit-profile" class="text-xs text-white p-2 rounded-2xl bg-blue-900 mt-2">Edit Profile</a> -->
            </a>
        </div>
    </section>
    <section class="mt-10">
        @csrf
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container" id="dataprofile">
                
            </div>
        </div>
    </section>
    @endsection
    @push('footerjsexternal')
    <script src="/javascript/profil.js"></script>
    @endpush