<!-- Laravel Blade Form -->
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- User ID (User_ID) -->
        <div>
            <x-input-label for="User_ID" :value="__('Enter your ID : ')" />
            <x-text-input id="User_ID" class="block mt-1 w-full" type="text" name="User_ID" :value="old('User_ID')" required autofocus autocomplete="id" />
            <x-input-error :messages="$errors->get('id')" class="mt-2" />
        </div>

        <!-- User IC -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Enter your IC :')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Select role (KAFA Admin/JAIP Admin/Teacher/Student) -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Select your role :')" />
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="" disabled selected>Role</option>
                <option value="K_admin">KAFA Admin</option>
                <option value="J_admin">JAIP Admin</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Button -->
        <div class="mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
