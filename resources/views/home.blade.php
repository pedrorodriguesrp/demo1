@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Olá, {{ Auth::user()->name }}!
                    
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h2>Notificações</h2>
                            @if(!empty($notifications))
                                <ul>
                                    @foreach ($notifications->sortByDesc('created_at') as $item)
                                        <li>{{ $item->message }} - {{ $item->author->name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                Ainda não existem mensagens...
                            @endif

                            <form method="POST" action="{{ route('newMessage') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <textarea 
                                            id="name" type="text"
                                            class="form-control @error('message') is-invalid @enderror"
                                            name="message" value="{{ old('message') }}"
                                            required autocomplete="name" autofocus>
                                        </textarea>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Inserir mensagens') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
