<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">

        <!-- User ID -->
        <div class="mt-4">
            <x-input-label for="User_ID" :value="__('User_ID')" />
            <x-text-input id="User_ID" class="block mt-1 w-full" type="text" name="User_ID" :value="old('User_ID')" required autocomplete="User_ID" />
            <x-input-error :messages="$errors->get('User_ID')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value=" ">Select you role</option>
            <option value="K_admin">KAFA Admin</option>
            <option value="J_admin">JAIP Admin</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
        </select>
    </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!--for debug purpose-->
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            const formData = new FormData(this);
            
            console.log('Form Data:', Object.fromEntries(formData.entries()));

            fetch('{{ route('register') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log('Success:', data);
                window.location.href = data.redirect_url; // Redirect to the URL specified in the response
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was a problem with your registration. Please try again.');
            });
        });
    </script>

</x-guest-layout>
