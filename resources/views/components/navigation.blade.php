<?php
$role=session('role');   
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="nav navbar-nav">

        @if(session()->has('LoggedUser'))

        <div class="dropdown">
           <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               My Account ({{  session('name') }})
           </button>
           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
             <li><a class="dropdown-item" href="{{ route('logOut') }}">Logout</a></li>
             <li><a class="dropdown-item" href="{{ route('editProfile') }}">Edit profile</a> </li>
           </ul>
         </div>
         @if (str_contains(url()->current(), '/') &&   $role ==1)              
         <a class="nav-item nav-link" href="auth/user/dashboard">dashboard</a>
        @elseif(str_contains(url()->current(), '/') && $role ==0) 
        <a class="nav-item nav-link " href="{{ route('exerciseList') }}">Exercises <span class="visually-hidden"></span></a>
        <a class="nav-item nav-link " href="{{ route('program.list') }}">Programs <span class="visually-hidden"></span></a>                    
        @endif
         @else
         <a class="nav-item nav-link " href="{{ route('auth.registry') }}">Registry <span class="visually-hidden"></span></a> 
         <a class="nav-item nav-link " href="{{ route('auth.login') }}">Login <span class="visually-hidden"></span></a> 
         @endif
        
        
         {{-- @if (str_contains(url()->current(), '/index') &&   $role ==1)              
         <a class="nav-item nav-link" href="/user/dashboard">dashboard</a>
        @elseif(str_contains(url()->current(), '/index') && $role ==0) 
         <a class="nav-item nav-link" href="/admin/dashboard">dashboard</a>                         
        @endif --}}
       
         
      
         
    </div>
</nav>