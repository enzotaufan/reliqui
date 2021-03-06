@extends('layouts.master')

@section('title', 'All doctors')

@section('content')
    <div class="page-header border-bottom box-shadow-nav">
        <div class="container text-secondary">
                <a href="/doctors" class="badge badge-info">All</a>
            @foreach ($specialities as $speciality)
                <a href="/doctors/{{$speciality->slug}}" class="badge badge-info">{{ $speciality->name }}</a>
            @endforeach
        </div>
    </div>

    <main class="container">
        <div class="row">

            @forelse ($doctors as $doctor)
                <div class="media my-3 p-3 col-md-4">
                    <img src="{{ asset('img/example-avatar.png') }}" alt="avatar" class="img-responsive mr-2" width="50" height="50">                    
                    <p class="media-body pb-3 mb-0 border-bottom">
                        <a href="/doctors/{{$doctor->speciality->slug}}/{{$doctor->slug}}" class="d-block font-weight-bold">
                            {{ $doctor->full_name }}
                        </a>
                        <a href="/{{$doctor->group->slug}}" class="text-secondary font-weight-light">
                            {{ $doctor->group->name }}
                        </a>
                    </p>
                </div>
            @empty
                <div class="col-md-12 pt-5">
                    <h4 class="text-center">There are no relevant results at this time</h4>
                </div>
            @endforelse

            {{ $doctors->links('vendor.pagination.bootstrap-4') }}            
            
        </div>
    </main>
@endsection