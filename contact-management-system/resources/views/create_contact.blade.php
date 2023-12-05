<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{__('Create a New Contact')}}<br>
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <br>
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br>
                    @endif
                    <form method="POST" action="{{ route('contacts.store') }}">
                        @csrf
                        @method('POST')
                        <label for="name">Name: </label><input style="color: black" type="text" name="name" placeholder="Name"><br><br>
                        <label for="phone">Phone: </label><input style="color: black" ype="text" name="phone" placeholder="Phone"><br><br>
                        <label for="email">Email: </label><input style="color: black" type="email" name="email" placeholder="Email"><br><br>
                        <label for="address">Address: </label><input style="color: black" type="text" name="address" placeholder="Address"><br><br>
                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
