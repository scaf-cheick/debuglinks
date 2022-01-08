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

                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-small back-color waves-effect waves-light">{{ __('click here to request another') }}</button>.
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


