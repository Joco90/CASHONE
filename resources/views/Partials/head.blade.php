<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>{{$title}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <!-- Disable tap highlight on IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <link href="{{asset('/imginterface/graph.ico')}}" rel="icon">
        <link href="{{asset('/imginterface/graph.ico')}}" rel="apple-touch-icon">
        <!-- <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="{{asset('/vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('/vendors/ionicons-npm/css/ionicons.css')}}">
        <link rel="stylesheet" href="{{asset('/vendors/linearicons-master/dist/web-font/style.css')}}">
        <link rel="stylesheet" href="{{asset('/vendors/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.css')}}">
        <link href="{{asset('/styles/css/base.css')}}" rel="stylesheet">
        <link href="{{asset('tabulator/css/tabulator.min.css')}}" rel="stylesheet">
        <link href="{{asset('Auth/css/sweetalert2.min.css')}}" rel="stylesheet">
    </head>
