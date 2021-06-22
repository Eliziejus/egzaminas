@extends('layouts.app')

@section('content')

<h4 class="pb-3">New Task </h4>

<form action="{{route('post.store')}}" method="POST">
@csrf
  <div class="mb-3">
    <label for="pavadinimas" class="form-label">Pavadinimas</label>
    <input type="text" class="form-control" id="pavadinimas" name="pavadinimas">
  </div>
  <div class="mb-3">
    <label for="kategorija" class="form-label">aprašymas</label>
    <select name="kategorija" id="kategorija" class="form-control">
        @foreach ($kategorija as $kategor)
        <option value="{{$kategor['value'] }}">{{$kategor['label']}}</option>
        @endforeach
        
    </select>
    </div>
   <div class="mb-3">
    <label for="aprasymas" class="form-label">Aprašymas</label>
    <input type="text" class="form-control" id="aprasymas" name="aprasymas">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection