@include('Partials.head')

@include('Partials.top_bar')


<div class="app-main">
    @include('Partials.left_bar')

    @yield('content')

</div>

@include('Partials.foot')
{{-- Lot des modals --}}
@if (Route::is(['profile','users.liste']))
    @include('Modals.create-profile')
    @include('Modals.edit-profile')
    {{-- @include('Modals.create-user') --}}
@endif
@include('code-operation.nature-compt.modal.nouveau-code')
@include('code-operation.nature-compt.modal.edit-code')



