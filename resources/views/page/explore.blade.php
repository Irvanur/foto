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
    <section class="mt-10">
        @csrf
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container" id="exploredata">
                
            </div>
        </div>
    </section>
    @endsection
    @push('footerjsexternal')
    <script src="/javascript/explore.js"></script>
    @endpush
</body>

</html>