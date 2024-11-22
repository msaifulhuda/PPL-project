<x-staffperpustakaan-layout>
    @include('staff_perpus/modal/profile_Modal')
    <div class="font-[Poppins] px-16 py-4 bg-white m-4 drop-shadow-sm rounded-md">

        <h1 class="text-center text-2xl mb-5">My Profile</h1>

        <dl class="max-w-full text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
            <div class="flex flex-col pb-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nama Lengkap</dt>
                <dd class="text-lg font-semibold">{{ $staff_account->nama_staff_perpustakaan }}</dd>
            </div>
            <div class="flex flex-col pb-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Username</dt>
                <dd class="text-lg font-semibold">{{ $staff_account->username }}</dd>
            </div>
            <div class="flex flex-col pb-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email address</dt>
                <dd class="text-lg font-semibold">{{ $staff_account->email }}</dd>
            </div>
            <div class="flex flex-col py-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Home address</dt>
                <dd class="text-lg font-semibold">{{ $staff_account->alamat_staff_perpustakaan }}</dd>
            </div>
            <div class="flex flex-col pt-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Phone number</dt>
                <dd class="text-lg font-semibold">{{ $staff_account->wa_staff_perpustakaan }}</dd>
            </div>
            <div class="flex flex-col pt-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Password</dt>
                <dd class="text-lg font-semibold">******</dd>
            </div>
        </dl>

    </div>
    <div class="px-16 py-4 bg-white m-4 drop-shadow-sm rounded-md">
        <button data-modal-target="edit-modal" data-modal-toggle="delete-modal" type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 mb-5 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                    clip-rule="evenodd" />
            </svg>
            Edit
        </button>
    </div>
</x-staffperpustakaan-layout>
