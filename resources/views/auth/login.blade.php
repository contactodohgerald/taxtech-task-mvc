<x-app-layout>
    <section id="book-a-table" class="book-a-table">
        <div class="container">

            <div name="logo" class="section-title">
                <h2>
                    <a href="/">Login</a>
                </h2>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('login') }}" method="POST"> @csrf
                <div class="form-group">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                        required autofocus />
                </div>
                <div class="form-group mt-3 mt-md-0">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="form-control" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="items-center text-center mt-4">
                    <x-button class="ml-4 book-a-table-btn">
                        {{ __('Log in') }}
                    </x-button>
                </div>

                <div class="text-center">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Dont`t have an account yet? Register') }}
                    </a>
                </div>

            </form>
        </div>
    </section>
</x-app-layout>
