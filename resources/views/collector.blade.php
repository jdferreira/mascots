@extends('layouts.app')

@section('content')
@if (! is_null($pair))
    <x-collector-panel
        :entity1="{{ $pair[0] }}"
        :entity2="{{ $pair[1] }}"
    ></x-collector-panel>
@else
    <x-collector-panel></x-collector-panel>
@endif
@endsection