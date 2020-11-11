@extends('layouts.bootstrap')

@section('body')
<div class='row'>
    <div class='col-12'>
        <h1>{{$game->name}}</h1>
        <hr/>
    </div>
    <div class='col-12 col-md-6'>
        <h2>Short</h2>
        <p>Earn cash for sharing links to this page. Get a free referral link. Share it with 
        friends. If you share a link with the person who finishes the objective, you win cash!</p>
        <section class='alert alert-info'>
            <p><strong>In 2009,</strong> MIT gave away {{currency(40000)}} to find ten red balloons across the United States.
        It took less than 9 hours for people to help MIT find the balloons when they 
        could register for a personalized website link for free, refer friends, and earn money 
        when people identified the balloons.</p>
        <p>Since then, this format has been recognized as an amazingly quick method of 
            uniting people to accomplish a goal.</p>
        </section>
        <h2>How much money is being given away to accomplish the current goal?</h2>
        <p class='alert alert-primary'>We will give away a total of $300,000 to 
            hundreds of people when the goal is achieved. <strong>You do not 
                need to contribute to the goal to win money. You do need to 
            share your personalized link with friends.</strong></p>
        <h2>What is the goal of this website?</h2>
        <p>{{$game->description}}</p>
        <h2>When is cash paid out?</h2>
        <p>{{$game->win_condition}}</p>
        <h2>What kind of prizes can you expect?</h2>
        <p>{{$game->prize_description}}</p>
    </div>
    
    <div class='col-12 col-md-6'>
        
        <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><h2>Register</h2></h5>
    <p class="card-text">
        Get a free link and share it with friends to be eligible to win money when 
        this site achieves the listed goal.
    </p>
    <a href="#" class="btn btn-primary">Get a personalized, free link</a>
  </div>
</div><br/>
        <div class="card d-none d-md-block" style="width: 18rem;">
  <div class="card-body">
      <h5 class="card-title"> <h2>Why participate?</h2></h5>
    <p class="card-text">
        <p>You earn money, even if:</p>
                <ul class='list-group'>
                    <li class='list-group-item'>you don't believe in the cause.</li>
                    <li class='list-group-item'>you don't personally know the people who do.</li>
                    <li class='list-group-item'>your friends signed up but did not contribute.</li>
                    <li class='list-group-item'><em>their</em> friends signed up but did not contribute.</li> 
                    <li class='list-group-item'>someone downstream from them <em>does</em> contribute.</li>
                </ul><br/>
        <section class='alert alert-primary'>
            <strong>In other words...</strong> you have nothing to lose, and everything to gain.
        </section>
    </p>
  </div>
</div>
    </div>
    <div class='col-12'>
        <h1>Why should I participate?</h1>
        <p>
            First, even if you don't <em>believe in</em> the objectives of this website, 
            you can still earn money by helping us find people who do. That's huge!
        </p>
        <p>
            Second, this site has a noble goal that we should all support.
        </p>
    </div>
</div>
@endsection
