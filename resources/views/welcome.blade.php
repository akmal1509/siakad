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
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1852405474!2d107.41218281538941!3d-6.987448670371749!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f11a0b2beb4d%3A0x8d92f3230ca51166!2sJl.%20Raya%20Sindangkerta%2C%20Sindangkerta%2C%20Kec.%20Sindangkerta%2C%20Kabupaten%20Bandung%20Barat%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1657364117812!5m2!1sid!2sid"
                    width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    class="rounded-lg col-span-2 w-full" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <p class="col-span-1 text-sm">
                    <span class="font-semibold text-base">Address</span> : Jl. Raya Sindangkerta No.49, Cikadu, Kec.
                    Sindangkerta, Kabupaten Bandung Barat, Jawa Barat 40563
                </p>
            </div>
        </div>
    </section>
@endsection
