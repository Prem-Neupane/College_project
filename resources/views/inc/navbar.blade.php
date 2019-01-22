<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">    
        <a class="navbar-brand" href="{{ url('/') }}">NC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <!-- left side of navbar -->

        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="/homes">Home</a>
          </li>           
            
              @foreach($menus as $menu)

                    {{-- @if($menu->has_submenu == 1) --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ $menu->title }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                               @foreach($submenus as $submenu)
                                 @if($submenu->parent_id == $menu->id)
                                        <a class="dropdown-item" href="{{ $menu->slug }}/{{ $submenu->slug }}">{{ $submenu->title }}</a>
                                 @endif
                               @endforeach                                   
                            </div>
                        </li>
                    {{-- @else --}}
                        {{-- <a class="nav-link" href="/homes">{{ $menu->title }}</a> --}}
                    {{-- @endif                  --}}
                @endforeach                
        </ul>

        

        {{-- <div class="_1ro1 _5ycb _5ycb">
            <a class="_1nv3 _11kg _1nv5 profilePicThumb" href="https://www.facebook.com/photo.php?fbid=1960253724298588&amp;set=a.1437461793244453&amp;type=3&amp;source=11&amp;referrer_profile_id=100009419396569" rel="theater" id="u_jsonp_5_4">
            <img class="_11kf img" alt="your Profile Photo, Image may contain: 1 person, smiling, sunglasses and text" src="https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-1/p160x160/24301277_1960253724298588_5510183175486627302_n.jpg?_nc_cat=106&amp;_nc_ht=scontent.fktm3-1.fna&amp;oh=87e05ace877abc8995caadcb2a101833&amp;oe=5CFC6D11">
        </a>
            <div class="fbTimelineProfilePicSelector _23fv">
            <div class="_156n _23fw _1o59" data-ft="{&quot;tn&quot;:&quot;+B&quot;}">
            <a href="#" class="_156p _1o5e" ajaxify="/profile/picture/menu_dialog/?context_id=u_jsonp_5_4&amp;profile_id=100009419396569" rel="dialog" role="button" id="u_jsonp_5_f">
            <div class="_3-95"><i class="_1din _156q _1o6f img sp_E0oHonVlduq sx_c610f4"></i>
        </div>Update</a></div>
    </div>
    </div> --}}

          <!-- right side of navbar -->
          <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                <a class="dropdown-item" href="/{{ Auth::user()->identity }}/add_profile">Update My Profile
                                    </a>

                                <a class="dropdown-item" href="/{{Auth::user()->identity }}/dashboard"> Dashboard
                                    </a>

                                    <a class="dropdown-item" href="#"> Create Post
                                    </a>


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
         
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>      
      </div>
    </div>
    </nav>
