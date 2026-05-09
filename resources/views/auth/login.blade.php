<x-guest-layout>
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('site.home') }}"><b>DS</b> INFOWAY</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <!--<x-auth-validation-errors class="mb-4" :errors="$errors" /> -->
                <x-alert type="alert" :message="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="input-group mb-3">
                        <input id="email" class="form-control" type="email"
                            placeholder="{{ __('Email / UserName') }}" name="email" :value="old('email')" required
                            autofocus />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">


                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" placeholder="{{ __('Password') }}" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <div class="icheck-primary">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <div class="col-4">
                            <x-button class="">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </div>
                </form>


                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </p>
        <p class="mb-0">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                {{ __('Register new membership') }}
            </a>
        </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</x-guest-layout>
