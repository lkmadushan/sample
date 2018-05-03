@extends('layouts.app')

@section('body')
    <nav class="bg-black">
        <div class="container mx-auto px-6 py-4">
            @include('svg.logo')
        </div>
    </nav>
    <header class="relative">
        <img class="w-full hidden sm:block" src="images/Leafcutter_Afeature.png">
        <div class="container mx-auto px-0 sm:px-6 pin-x sm:absolute" style="top: 20%">
            <div class="bg-teal p-6 sm:w-2/5">
                <h2 class="font-normal tracking-wide text-sm md:text-xl lg:text-3xl mb-4">
                    Welcome to Smoke <br>
                    & Mirrors. Your one <br>
                    location for advice.</h2>
                <button class="bg-teal hover:bg-white text-sm md:text-base border border-white py-2 px-6 lg:py-3 lg:px-8">Find out more</button>
            </div>
        </div>
    </header>
    <article class="bg-white sm:mt-16">
        <users>
            <div slot-scope="{ users }" class="container mx-auto px-6">
                <div class="-mx-6 flex flex-wrap">
                    <div v-for="user in users.data" :key="user.id" class="group mx-6 my-4 w-32 lg:w-1/5 flex-auto relative">
                        <img class="w-full h-full" src="http://via.placeholder.com/250x250" :alt="user.name">
                        <div class="hidden group-hover:block absolute pin bg-grey-darkest opacity-25 w-full h-full"></div>
                        <div class="hidden group-hover:block absolute absolute pin text-black h-full">
                            <div class="flex justify-center items-center flex-col h-full">
                                <span v-text="user.name"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </users>
    </article>
    <footer class="bg-black h-64 sm:mt-32"></footer>
@endsection
