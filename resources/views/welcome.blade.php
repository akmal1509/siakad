@extends('layouts.home.app')

@section('content-1')
    <div class="mt-10 max-w-4xl mx-auto">
        <p class="bg-blue-500 text-white text-center py-4 font-semibold rounded-lg">
            Hai
            Selamat Datang Di
            SMP NEGERI 1 SINDANGKERTA
        </p>
        <div class="mt-16">
            <img src="{{ asset('img/logo.svg') }}" alt="welcome" class="rounded-lg w-full h-80">
            <div class="flex justify-between mt-10">
                <a href="{{ route('login') }}"
                    class="bg-blue-500 hover:bg-blue-600 shadow-lg text-white rounded py-1 px-4 transition duration-300 text-sm font-semibold">Login</a>
                <a href="{{ route('ppdb.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 shadow-lg text-white rounded py-1 px-4 transition duration-300 text-sm font-semibold">Register</a>
            </div>
        </div>
    </div>
    <section class="my-20 max-w-4xl mx-auto" id="contact_us">
        <div class="bg-blue-500 rounded-lg px-3 py-5 text-white">
            <h1 class="text-lg font-semibold">Kontak Kami</h1>
            <div class="mt-4 flex flex-col gap-4 text-center">
            <iframe  class="rounded-lg col-span-2 w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1473319634133!2d107.40321881469!3d-6.991922194949087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f10ef0f04c5d%3A0x54fa2a5ec1b15fbc!2sSMPN%201%20SINDANGKERTA!5e0!3m2!1sen!2sid!4v1659100334353!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <p class="col-span-1 text-sm">
                    <span class="font-semibold text-base">Address</span> : SMPN 1 Sindangkerta, Jalan Raya Sindangkerta, kecamatan sidangkerta, Kabupaten Bandung Barat, Jawa Barat 40563
                </p>
            </div>
        </div>
    </section>
@endsection
