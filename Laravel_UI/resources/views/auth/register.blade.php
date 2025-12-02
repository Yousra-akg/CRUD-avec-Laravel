@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                {{ __('Create a new account') }}
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                {{ __('Or') }}
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    {{ __('sign in to your existing account') }}
                </a>
            </p>
        </div>
        <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" required autocomplete="name" autofocus
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 
                                      placeholder-gray-500 text-gray-900 focus:outline-none 
                                      focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('name') border-red-500 @enderror"
                               placeholder="{{ __('Your name') }}" value="{{ old('name') }}">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" required autocomplete="email"
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 
                                      placeholder-gray-500 text-gray-900 focus:outline-none 
                                      focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('email') border-red-500 @enderror"
                               placeholder="{{ __('Email address') }}" value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 
                                      placeholder-gray-500 text-gray-900 focus:outline-none 
                                      focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('password') border-red-500 @enderror"
                               placeholder="{{ __('Password') }}">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <div class="mt-1">
                        <input id="password-confirm" name="password_confirmation" type="password" required 
                               autocomplete="new-password"
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 
                                      placeholder-gray-500 text-gray-900 focus:outline-none 
                                      focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="{{ __('Confirm Password') }}">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <p class="text-gray-600">
                        {{ __('By registering, you agree to our terms and conditions.') }}
                    </p>
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent 
                               text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" 
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" 
                             aria-hidden="true">
                            <path fill-rule="evenodd" 
                                  d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" 
                                  clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ __('Create Account') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
