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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

@include('code-operation.nature-compt.modal.nouveau-code')
@include('code-operation.nature-compt.modal.edit-code')



