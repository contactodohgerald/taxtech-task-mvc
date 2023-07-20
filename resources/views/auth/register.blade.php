<x-app-layout>
    <section id="book-a-table" class="book-a-table">
        <div class="container">

            <div name="logo" class="section-title">
                <h2>
                    <a href="/">Register</a>
                </h2>
            </div>

            <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

            <form action="{{ route('register') }}" method="POST" class="row"> @csrf
                <div class="form-group col-lg-12">
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                <div class="form-group col-lg-6">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="form-group col-lg-6">
                    <x-label for="username" :value="__('Username')" />
                    <x-input id="username" class="form-control" type="text" name="username" :value="old('username')" required />
                </div>
                <div class="form-group col-lg-6">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="form-control" type="password" name="password"  required autocomplete="new-password" />
                </div>
                <div class="form-group col-lg-6">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                </div>
                
                <div class="items-center text-center mt-4">
                    <x-button class="ml-4 book-a-table-btn">
                        {{ __('Register') }}
                    </x-button>
                </div>

                <div class="text-center">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>

            </form>
        </div>
    </section>
</x-app-layout>
