@extends('layouts.front')

@section('content')
    <div class="container" style="margin-top: 5%; margin-bottom: 15%">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                
                    <div class="card-content">

                         <div class="card-title">{{ __('Vérifier votre adresse mail') }}</div>

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                            </div>
                        @endif

                        {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.') }}
                        {{ __('Si vous n\'avez pas reçu l\'e-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('cliquez ici pour en demander un autre') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
