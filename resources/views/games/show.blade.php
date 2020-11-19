<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($game->name) }}
        </h2>
    </x-slot>
    <div class='container'>
        <div class='row'>
            <div class='col-12 p-6'>
                {{$game->game_goal}}
                <hr/>
                <h3 class='text-lg'>Your Affiliate Link</h3>
                <div class='p-6 offset-1 col-10'>
                    Share this link with your friends. Share it by Facebook, Twitter, 
                    Email, Text Message, or any method that you wish. It costs nothing to 
                    refer friends and can win you (and them) cash prizes.
                    <div class='alert-info p-6 text-center'>
                        @if($referrerLink)
                        {{$referrerLink}}
                        @else
                        <a href="#" class="btn btn-link">Register to get <em>your</em> custom link.</a>
                        @endif
                    </div>
                </div>
                <hr/>
                <h3 class='text-lg'>Prize</h3>
                <div class='p-6 offset-1 col-10'>
                    {{$game->prize_description}}
                </div>
                <h3 class='text-lg'>Winning Condition</h3>
                <div class='p-6 offset-1 col-10'>
                    {{$game->payout_terms}}
                </div>
                <h3 class='text-lg'>Game's Motivation</h3>
                <div class='p-6 offset-1 col-10'>
                    {{$game->motivation}}
                    <strong>{{$game->goal}}</strong>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
