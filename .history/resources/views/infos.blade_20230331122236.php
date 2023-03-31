@extends('template')

@section('contenu')
    <form action="{{ url('users') }}" method="POST">
        
        {{-- @csrf --}}
        {{-- le csrf genere un token comme ceci exemple
        <input type="hidden" name="_token" value="iIjW9PMNsV6VKT2sIc16ShoTf6SdYVZolVUGsxDI"> --}}

        <label for="nom">Entrez votre nom : </label>
        <input type="text" name="nom" id="nom">
        <input type="submit" value="Envoyer !">
    </form>
@endsection
