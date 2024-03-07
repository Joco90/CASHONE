@include('Partials.head')

@include('Partials.top_bar')


<div class="app-main">
    @include('Partials.left_bar')

    @yield('content')

</div>

@include('Partials.foot')
{{-- Lot des modals --}}
@if (Route::is(['profile']))
    @include('Modals.create-profile')
    @include('Modals.edit-profile')
@endif


