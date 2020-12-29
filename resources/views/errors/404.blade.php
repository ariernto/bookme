@extends('errors.illustrated-layout',['title'=>__('Page not found')])
@section('title',__('Page not found'))
@section('message',$exception->getMessage()??__("Sorry, we couldn't find the page you're looking for."))
@section('code',404)
