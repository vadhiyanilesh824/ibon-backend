<x-guest-layout>
  
    <div class="register-box">
        <div class="register-logo">
          <a href="/"><b>Admin</b>LTE</a>
        </div>
      
        <div class="card">
          <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

        <!-- Validation Errors -->
        <x-alert type="alert" :message="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="input-group mb-3">
                <input id="name" class=" form-control" type="text" name="name" :value="old('name')" placeholder="{{ __("Full Name") }}" required autofocus />
                <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
            </div>

            <!-- Email Address -->
            <div class="input-group mt-4">
               
                <input id="email" class="form-control" placeholder="{{ __("Email") }}" type="email" name="email" :value="old('email')" required />
                <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
            </div>

            <!-- Password -->
            <div class="input-group mt-4">
                

                <input id="password" class="form-control" placeholder="{{ __("Password") }}"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                    </div>
                                  </div>
            </div>

            <!-- Confirm Password -->
            <div class="input-group mt-4  mb-3">
                
                <input id="password_confirmation" class="form-control"
                placeholder="{{ __("Repeat Password") }}"
                                type="password"
                                name="password_confirmation" required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                    </div>
                                  </div>
            </div>

            <div class="row">
                
                <div class="col-4">
                <x-button>
                    {{ __('Register') }}
                </x-button>
                </div>
           
            <div class="col-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </div>
        </form>
          </div>
        </div>
    </div>
</x-guest-layout>
