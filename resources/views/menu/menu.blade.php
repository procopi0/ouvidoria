@extends('layouts.master')
@include('layouts.partials.default-navigation')

<div class="row vertical-align" align="center">
    <a href="{{ route('get.logged-in-requests') }}" class="btn btn-primary">Manifestação</a>
    <a href="{{ route('get.anonymous-requests') }}" class="btn btn-primary">Manifestação Anônima</a>
</div>
