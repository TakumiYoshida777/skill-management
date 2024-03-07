@php($logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout'))
{{-- @php( $logout_url =Str::contains(Request::url(), 'admin')
? View::getSection('logout_url') ?? config('adminlte.admin_logout_url', 'logout')
: View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout')
 ) --}}

@if (config('adminlte.use_route_url', false))
    @php($logout_url = $logout_url ? route($logout_url) : '')
@else
    @php($logout_url = $logout_url ? url($logout_url) : '')
@endif

<li class="nav-item">
    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-fw fa-power-off text-red"></i>
        {{ __('adminlte::adminlte.log_out') }}
    </a>
    <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
        @if (config('adminlte.logout_method'))
            {{ method_field(config('adminlte.logout_method')) }}
        @endif
        {{ csrf_field() }}
    </form>
</li>
