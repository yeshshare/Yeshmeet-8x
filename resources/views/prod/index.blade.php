@extends('layouts.app')

@section('content')


Prod
<br>

    
    
    <div id="yeshmeet">
        <prod   
        @if(auth()->check())
            :user="{{ $user }}"
        @endif
        
        
          ></prod>
    </div>





@endsection