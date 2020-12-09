{{-- Menampilkan halaman View Pizza Details untuk Admin dan Member --}}
@extends('layouts.master')

@section('title', 'View Pizza Details — Phizza Hut')

@section('content')
<div class="container my-5">
    <div class="row justify-content-start">
        <div class="col-md-12 my-3">

            {{-- Jika admin yang mengakses halaman --}}
            @if(auth()->user()->role=="admin")
            <div class="card border-light mt-5 mb-3">
                <div class="row showcase-left">
                    <div class="col-sm-4 mr-0">
                        <img src="{{ asset('assets/image/' . $pizza->image) }}" class="mx-3 my-3" alt="{{ $pizza->name }}" style="width: 370px; height: 350px">
                    </div>
                    
                    <div class="col-lg-6 mx-5 my-3">
                        <p class="h1 font-weight-bold">{{ $pizza->name }}</p>
                        <p>{{ $pizza->description }}</p>
                        <br><br>
                        <p>Rp. {{ $pizza->price }}</p>
                    </div>
                </div>
            </div>

            {{-- Jika member yang mengakses halaman --}}
            @elseif(auth()->user()->role=="member")
            <div class="card border-light mt-0 mb-3">
                <div class="row showcase-left">
                    <div class="col-sm-4 mr-0">
                        <img src="{{ asset('assets/image/' . $pizza->image) }}" class="mx-3 my-3" alt="{{ $pizza->name }}" style="width: 370px; height: 350px">
                    </div>
                    
                    <div class="col-lg-6 mx-5 my-3">
                        <p class="h1 font-weight-bold">{{ $pizza->name }}</p>
                        <p>{{ $pizza->description }}</p>
                        <br><br>
                        <p>Rp. {{ $pizza->price }}</p>
                        <br><br>
                        {{-- Form untuk memasukkan quantity pizza yang akan dipesan --}}
                        <form method="POST" action="{{ route('show', $pizza) }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="quantity">Quantity: </label>
                                </div>
                                
                                <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                                    {{-- Pesan error untuk quantity --}}
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add to Cart') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            @endif
        </div>
    </div>
</div>
@endsection