<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class='container'>
        <div class='row'>
            <div class='col-12 p-6'>
                <h2 class='text-2xl'>{{$game->name}}</h2>
                <hr/>
                {{$game->description}}
                <hr/>
                <h3 class='text-lg'>Your Affiliate Link</h3>
                <div class='p-6 offset-1 col-10'>
                    Share this link with your friends. Share it by Facebook, Twitter, 
                    Email, Text Message, or any method that you wish. It costs nothing to 
                    refer friends and can win you (and them) cash prizes.
                    <div class='alert-info p-6 text-center'>
                        {{$referrerLink}}
                    </div>
                </div>
                <hr/>
                <h3 class='text-lg'>Prize</h3>
                <div class='p-6 offset-1 col-10'>
                    {{$game->prize_description}}
                </div>
                <h3 class='text-lg'>Winning Condition</h3>
                <div class='p-6 offset-1 col-10'>
                    {{$game->win_condition}}
                </div>
                <h3 class='text-lg'>Game's Motivation</h3>
                <div class='p-6 offset-1 col-10'>
                    {{$game->designed_goal}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
