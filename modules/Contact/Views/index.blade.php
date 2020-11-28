@extends('layouts.app')
@section('head')
	<style type="text/css">
		.bravo-contact-block .section{
			padding: 80px 0 !important;
		}
	</style>
@endsection
@section('content')
<div id="bravo_content-wrapper">
	@include("Contact::frontend.blocks.contact.index")
</div>
@endsection

@section('footer')

@endsection
