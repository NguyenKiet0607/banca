@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
@php( $profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout') )

@if (config('adminlte.usermenu_profile_url', false))
@php( $profile_url = \Illuminate\Support\Facades\Auth::guard('admin')->user()->adminlte_profile_url() )
@endif

@if (config('adminlte.use_route_url', false))
@php( $profile_url = $profile_url ? route($profile_url) : '' )
@php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
@php( $profile_url = $profile_url ? url($profile_url) : '' )
@php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif
<li class="nav-item" style="padding: 0.5rem 0">
    <svg width="23" height="15" viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.1287 1.54509V4.04111H17.0574C17.0574 4.92069 14.704 5.61007 11.899 5.61007C10.8293 5.63382 9.73574 5.51497 8.68977 5.25348V5.32478C8.16679 4.87314 7.57251 4.5403 6.93067 4.32636V4.27881L6.85938 1.64014C7.04957 2.44837 9.23655 3.0902 11.9228 3.0902C14.609 3.0902 17.0575 2.40082 17.0575 1.54504L17.1287 1.54509Z" fill="#F4B844"></path>
        <path d="M11.9701 0C14.799 0 17.1524 0.713131 17.1524 1.56895C17.1524 2.42477 14.7752 3.1141 11.9701 3.1141C9.16508 3.1141 7.07314 2.47227 6.883 1.66405V1.56895C6.8592 0.713131 9.14133 0 11.9701 0Z" fill="#FEDB41"></path>
        <path d="M12.3972 11.1727V13.1695H11.9217C10.8758 13.1932 9.8298 13.0744 8.80763 12.8367L8.73633 12.7654C9.40196 12.1711 9.87739 11.4103 10.1626 10.5784H10.2815C10.7807 10.6259 11.3275 10.6497 11.8742 10.6497H12.3734L12.3972 11.1727Z" fill="#E2A63B"></path>
        <path d="M11.9456 8.03493L12.1833 8.15378C12.1596 8.20133 12.1596 8.24887 12.1596 8.29642C12.1596 8.36772 12.1833 8.43906 12.2071 8.51036V10.7449H11.9456C11.3513 10.7449 10.7571 10.7211 10.2341 10.6736H10.1152C10.2816 10.1506 10.3529 9.60388 10.3529 9.05715C10.3529 8.70056 10.3054 8.34401 10.2578 7.98743H10.3767C10.8997 8.03493 11.4227 8.03493 11.9456 8.03493Z" fill="#F4B844"></path>
        <path d="M8.68786 5.2535C9.73383 5.51499 10.8273 5.63384 11.8971 5.61009C14.7021 5.61009 17.0555 4.92071 17.0555 4.04114H17.1268V6.8462C14.5119 6.8462 12.3725 7.46428 12.111 8.24871L11.897 8.12987C11.3978 8.12987 10.9224 8.10611 10.4232 8.05857H10.3043C10.0666 6.98885 9.49609 6.01418 8.66406 5.30105L8.68786 5.2535Z" fill="#E2A63B"></path>
        <path d="M22.3576 10.9114V13.4312C22.3576 14.287 20.0517 15.0002 17.2466 15.0002C14.4416 15.0002 12.207 14.3108 12.207 13.455V11.1729C12.5874 11.9098 14.6555 12.4803 17.1515 12.4803C19.6476 12.4803 22.2862 11.7672 22.2862 10.9114H22.3576Z" fill="#E2A63B"></path>
        <path d="M22.3582 8.43896V10.9112H22.2869C22.2869 11.767 19.9573 12.4802 17.1522 12.4802C14.3471 12.4802 12.588 11.9097 12.1602 11.1727V8.58161C12.4692 9.36609 14.6086 9.96037 17.176 9.96037C19.7434 9.96037 22.2394 9.27099 22.3107 8.43896H22.3582Z" fill="#F4B844"></path>
        <path d="M12.0866 8.58165C12.0629 8.51035 12.0391 8.46281 12.0391 8.39146C12.0391 8.34391 12.0391 8.29636 12.0628 8.24882C12.3243 7.46434 14.4875 6.82251 17.1262 6.82251H17.15C19.9788 6.82251 22.356 7.51189 22.356 8.39146V8.43901C22.2847 9.27103 19.9312 9.98416 17.15 9.98416C14.3687 9.98416 12.3957 9.36613 12.0866 8.58165Z" fill="#FEDB41"></path>
        <path d="M10.4239 8.05869C10.4715 8.39148 10.519 8.74807 10.519 9.08086C10.519 9.60384 10.4477 10.1268 10.3051 10.6023C10.0198 11.458 9.52059 12.2425 8.85501 12.8368C7.92793 13.6926 6.71557 14.168 5.45566 14.168C2.65055 14.3582 0.202072 12.2425 0.0118797 9.4137C-0.178313 6.60863 1.93737 4.16015 4.76624 3.96996C5.00393 3.94621 5.24167 3.94621 5.47937 3.96996C5.97855 3.96996 6.50154 4.04126 6.97697 4.18391C7.6426 4.39785 8.26063 4.75444 8.78362 5.20608C9.59189 5.9668 10.1862 6.96517 10.4239 8.05869Z" fill="#FEDB41"></path>
        <path d="M5.24279 11.6244C6.64757 11.6244 7.78637 10.4856 7.78637 9.08081C7.78637 7.67603 6.64757 6.53723 5.24279 6.53723C3.83802 6.53723 2.69922 7.67603 2.69922 9.08081C2.69922 10.4856 3.83802 11.6244 5.24279 11.6244Z" fill="#F4B844"></path>
    </svg>
    {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->coin }}
</li>
<li class="nav-item dropdown user-menu">

    {{-- User menu toggler --}}
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        @if(config('adminlte.usermenu_image'))
            <img src="{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->adminlte_image() }}"
                 class="user-image img-circle elevation-2"
                 alt="{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->username }}">
        @endif
        <span @if(config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>
            {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->username }}
        </span>
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        {{-- User menu header --}}
        @if(!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
            <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
                @if(!config('adminlte.usermenu_image')) h-auto @endif">
                @if(config('adminlte.usermenu_image'))
                    <img src="{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->adminlte_image() }}"
                         class="img-circle elevation-2"
                         alt="{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->username }}">
                @endif
                <p class="@if(!config('adminlte.usermenu_image')) mt-0 @endif">
                    {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->username }}
                    @if(config('adminlte.usermenu_desc'))
                        <small>{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->adminlte_desc() }}</small>
                    @endif
                </p>
            </li>
        @else
            @yield('usermenu_header')
        @endif

        {{-- Configured user menu links --}}
        @each('adminlte::partials.navbar.dropdown-item', $adminlte->menu("navbar-user"), 'item')

        {{-- User menu body --}}
        @hasSection('usermenu_body')
            <li class="user-body">
                @yield('usermenu_body')
            </li>
        @endif

        {{-- User menu footer --}}
        <li class="user-footer">
            @if($profile_url)
                <a href="{{ $profile_url }}" class="btn btn-default btn-flat">
                    <i class="fa fa-fw fa-user text-lightblue"></i>
                    {{ __('adminlte::menu.profile') }}
                </a>
            @endif
            <a class="btn btn-default btn-flat float-right @if(!$profile_url) btn-block @endif"
               href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off text-red"></i>
                {{ __('adminlte::adminlte.log_out') }}
            </a>
            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>
        </li>

    </ul>

</li>
