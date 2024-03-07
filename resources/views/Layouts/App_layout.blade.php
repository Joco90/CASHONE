@include('Partials.head')

@include('Partials.top_bar')


<div class="app-main">
    @include('Partials.left_bar')

    @yield('content')

</div>

@include('Partials.foot')
{{-- Lot des modals --}}
@include('Modals.create-profile')

