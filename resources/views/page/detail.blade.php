@extends('layout.master2')
@push('cssjsexternal')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content2')
    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-4xl text-center font-fontutama mt-3">Gallery Foto</h3>
        </div>
    </section>
    <section class="mt-10">
        @csrf
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap px-2 flex-container">
                <div class="w-3/5 max-[480px]:w-full">
                    <div class="flex justify-center overflow-hidden">
                        <img src="" alt=""
                            class="w-full h-auto max-w-xl px-2 transition duration-500 ease-in-out hover:scale-105" id="fotodetail">
                    </div>
                    <div class="flex flex-col px-2">
                        <div class="font-semibold" id="judulfoto">
                           
                        </div>
                        <div>
                            <small class="text-abuabu" id="deskripsifoto">  </small>
                        </div>
                    </div>
                </div>
                <div class="w-2/5  max-[480px]:w-full">
                    <div class="flex flex-wrap items-center justify-between ">
                        <div class="flex flex-row items-center gap-2">
                            <div>
                                <img src="/assets/{{ $photo->user->picture }}" alt="" class="w-10 h-10  rounded-full"> 
                            </div>
                            <div class="flex flex-col">
                                <a href="/other-pin/" class="text-md" id="username"></a>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                    <div class="mt-[32px]">
                        Komentar
                    </div>
                    <div class="relative flex flex-col overflow-y-auto h-[200px] scrollbar-hidden" id="listkomentar">
                        
                    </div>
                    <div class="flex gap-2 mt-2">
                        <div class="w-3/4">
                            <input type="text" name="textkomentar" id="" class="w-full px-2 py-1 rounded-full border-slate-500">
                        </div>
                        <button class="px-4 rounded-full bg-blue-900" onclick="kirimkomentar()"><span class="text-white bi bi-send"></span></button>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap mt-10 flex-container" id="exploredata">
                
            </div>
        </div>
    </section>
    @endsection
    @push('footerjsexternal')
    <script src="/javascript/detail.js"></script>
    @endpush