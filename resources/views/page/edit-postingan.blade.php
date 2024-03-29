@extends('layout.master2')
@section ('content2')
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
    <form action="/edit-postingan/{{$foto->id}}" method="POST" enctype="multipart/form-data">
        @csrf
    <section class="mt-10">
        <div class="max-w-screen-md mx-auto flex justify-center">

                <div class="w-2/5  max-[480px]:w-full px-2">
                    <div class="flex flex-col flex-wrap">
                        <h3 class="font-medium">Judul</h3>
                        <input type="text" name="judul_baru" id="" class="py-1 rounded-lg border-slate-500" value="{{$foto->judul_foto}}">
                        <h3 class="mt-4 font-medium">Deskripsi</h3>
                        <input type="text" name="deskripsi_baru" id="" class="py-1 rounded-lg border-slate-500" value="{{$foto->deskripsi_foto}}">

                            <h3 class="mt-4 font-medium">Album</h3>
                            <select name="album" id="">
                                @foreach ($albums as $album)
                                    <option value="{{$album->id}}">{{$album->nama_album}}</option>
                                @endforeach
                            <input type="hidden" name="" id="" class="py-1 rounded-full border-slate-500">
                        <div class="flex flex-row justify-between">
                            <div></div>
                            <button class="px-6 py-1 mt-4 text-white rounded-md bg-blue-900">upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
    @endsection