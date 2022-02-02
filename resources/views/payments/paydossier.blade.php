@extends('layouts.app')
@section('content')

<div class="filter mx-4">
    <select class="p-3" onchange="window.location.href=this.options[this.selectedIndex].value;">
        <option value="{{ route('paymission') }}">ordres de missions</option>
        <option value="{{ route('paydossier') }}">Paiements des dossiers</option> 
        <option value="{{ route('refund') }}">Remboursements</option>
      </select>
</div>


@endsection

@section('styles')
    <link href="{{ asset('css/.css') }}" rel="stylesheet">
@endsection

@section('scripts')

@endsection