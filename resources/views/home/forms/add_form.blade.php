@extends('dashboard')
@section('content')
    <div class="container mx-auto p-8 shadow-md">
        <h1 class="text-2xl font-bold mb-8 text-center">Form Validation</h1>

        <!-- Stepper Header -->
        <div class="flex justify-between mb-8 gap-4">
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 flex items-center justify-center rounded-full text-white font-semibold bg-gray-300"
                    id="step-1-circle">
                    1
                </div>
                <span class="text-sm mt-2 font-medium">Step 1</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 flex items-center justify-center rounded-full text-white font-semibold bg-gray-300"
                    id="step-2-circle">
                    2
                </div>
                <span class="text-sm mt-2 font-medium">Step 2</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 flex items-center justify-center rounded-full text-white font-semibold bg-gray-300"
                    id="step-3-circle">
                    3
                </div>
                <span class="text-sm mt-2 font-medium">Step 3</span>
            </div>
        </div>
        <hr class="mb-4 shadow">
        <!-- Step Content -->
        <div id="step-1-content" class="step-content">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name" autocomplete="name"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <span id="name-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <span id="email-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
                <div>
                    <label class="block text-sm mb-2 dark:text-white">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                            class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 "
                            placeholder="Enter password">
                        <button type="button" id="toggle-password"
                            class="absolute inset-y-0 right-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                            <svg id="eye-icon" class="shrink-0 h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path id="eye-open" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" class="hidden">
                                </path>
                                <circle id="eye-circle" cx="12" cy="12" r="3" class="hidden"></circle>
                                <path id="eye-closed" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path id="eye-line1"
                                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                </path>
                                <path id="eye-line2"
                                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                <line id="eye-diagonal" x1="2" x2="22" y1="2" y2="22"
                                    class="hidden"></line>
                            </svg>
                        </button>
                    </div>
                    <span id="password-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                    <div class="mt-2">
                        <select name="status" id="status"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                            <option selected disabled>Open this select menu</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <span id="status-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                    <div class="mt-2">
                        <input type="date" name="start_date" id="start_date" autocomplete="start_date"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <span id="start_date-error" class="text-red-600 text-sm error-message" style="display: none;"></span>

                </div>

                <div>
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="5" required
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <span id="description-error" class="text-red-600 text-sm error-message"
                        style="display: none;"></span>
                </div>
                <div>
                    <label for="is_true" class="block text-sm font-medium leading-6 text-gray-900">Is
                        True</label>
                    <div class="mt-2 flex items-center space-x-2">
                        <input type="hidden" name="is_true" value="0">
                        <input type="checkbox" name="is_true" id="is_true" value="1" autocomplete="is_true"
                            class="h-4 w-4 border-gray-300 rounded">
                        <span class="text-sm text-gray-900">Mark as True</span>
                    </div>
                    <span id="is_true-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">
                        Image</label>
                    <div class="mt-2">
                        <input type="file" name="image" id="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600"
                            onchange="previewImage(event)">
                    </div>
                    <div id="ImagePreviewContainer" class="relative mt-2" style="display:none;">
                        <div class="relative inline-block">
                            <img id="ImagePreview" src="" alt=" Image Preview"
                                class="rounded-md bg-gray-200 p-1" width="100" style="display:none;">
                            <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1"
                                onclick="removeImage()">&#10006;</button>
                        </div>
                    </div>
                    <span id="image-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
            </div>
            <button class="bg-blue-500 text-white mt-8 px-4 py-2 rounded" onclick="nextStep(1)">Next</button>
        </div>
        <div id="step-2-content" class="step-content hidden">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input type="text" name="name1" id="name1" autocomplete="name1"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <span id="name-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="email" name="email1" id="email1" autocomplete="email1"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <span id="email-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
                <div>
                    <label class="block text-sm mb-2 dark:text-white">Password</label>
                    <div class="relative">
                        <input id="password1" type="password" name="password1"
                            class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 "
                            placeholder="Enter password">
                        <button type="button" id="toggle-password"
                            class="absolute inset-y-0 right-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                            <svg id="eye-icon" class="shrink-0 h-5 w-5" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path id="eye-open" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" class="hidden">
                                </path>
                                <circle id="eye-circle" cx="12" cy="12" r="3" class="hidden"></circle>
                                <path id="eye-closed" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path id="eye-line1"
                                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                </path>
                                <path id="eye-line2"
                                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                <line id="eye-diagonal" x1="2" x2="22" y1="2" y2="22"
                                    class="hidden"></line>
                            </svg>
                        </button>
                    </div>
                    <span id="password-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
                <div>
                    <label for="status1" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                    <div class="mt-2">
                        <select name="status1" id="status1"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                            <option selected disabled>Open this select menu</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <span id="status-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                    <div class="mt-2">
                        <input type="date" name="start_date1" id="start_date1" autocomplete="start_date1"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <span id="start_date-error" class="text-red-600 text-sm error-message" style="display: none;"></span>

                </div>

                <div>
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea id="description1" name="description1" rows="5" required
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <span id="description-error" class="text-red-600 text-sm error-message"
                        style="display: none;"></span>
                </div>
                <div>
                    <label for="is_true" class="block text-sm font-medium leading-6 text-gray-900">Is
                        True</label>
                    <div class="mt-2 flex items-center space-x-2">
                        <input type="hidden" name="is_true1" value="0">
                        <input type="checkbox" name="is_true1" id="is_true" value="1" autocomplete="is_true"
                            class="h-4 w-4 border-gray-300 rounded">
                        <span class="text-sm text-gray-900">Mark as True</span>
                    </div>
                    <span id="is_true-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">
                        Image</label>
                    <div class="mt-2">
                        <input type="file" name="image" id="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600"
                            onchange="previewImage(event)">
                    </div>
                    <div id="ImagePreviewContainer" class="relative mt-2" style="display:none;">
                        <div class="relative inline-block">
                            <img id="ImagePreview" src="" alt=" Image Preview"
                                class="rounded-md bg-gray-200 p-1" width="100" style="display:none;">
                            <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1"
                                onclick="removeImage()">&#10006;</button>
                        </div>
                    </div>
                    <span id="image-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
            </div>
            <button class="bg-gray-500 text-white mt-8 px-4 py-2 rounded" onclick="previousStep()">Back</button>
            <button class="bg-blue-500 text-white mt-8 px-4 py-2 rounded" onclick="nextStep(2)">Next</button>
        </div>
        <div id="step-3-content" class="step-content hidden">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name" autocomplete="name"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <span id="name-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <span id="email-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
                <div>
                    <label class="block text-sm mb-2 dark:text-white">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                            class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 "
                            placeholder="Enter password">
                        <button type="button" id="toggle-password"
                            class="absolute inset-y-0 right-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                            <svg id="eye-icon" class="shrink-0 h-5 w-5" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path id="eye-open" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" class="hidden">
                                </path>
                                <circle id="eye-circle" cx="12" cy="12" r="3" class="hidden"></circle>
                                <path id="eye-closed" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path id="eye-line1"
                                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                </path>
                                <path id="eye-line2"
                                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                <line id="eye-diagonal" x1="2" x2="22" y1="2" y2="22"
                                    class="hidden"></line>
                            </svg>
                        </button>
                    </div>
                    <span id="password-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                    <div class="mt-2">
                        <select name="status" id="status"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                            <option selected disabled>Open this select menu</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <span id="status-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                    <div class="mt-2">
                        <input type="date" name="start_date" id="start_date" autocomplete="start_date"
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <span id="start_date-error" class="text-red-600 text-sm error-message" style="display: none;"></span>

                </div>

                <div>
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="5" required
                            class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <span id="description-error" class="text-red-600 text-sm error-message"
                        style="display: none;"></span>
                </div>
                <div>
                    <label for="is_true" class="block text-sm font-medium leading-6 text-gray-900">Is
                        True</label>
                    <div class="mt-2 flex items-center space-x-2">
                        <input type="hidden" name="is_true" value="0">
                        <input type="checkbox" name="is_true" id="is_true" value="1" autocomplete="is_true"
                            class="h-4 w-4 border-gray-300 rounded">
                        <span class="text-sm text-gray-900">Mark as True</span>
                    </div>
                    <span id="is_true-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">
                        Image</label>
                    <div class="mt-2">
                        <input type="file" name="image" id="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600"
                            onchange="previewImage(event)">
                    </div>
                    <div id="ImagePreviewContainer" class="relative mt-2" style="display:none;">
                        <div class="relative inline-block">
                            <img id="ImagePreview" src="" alt=" Image Preview"
                                class="rounded-md bg-gray-200 p-1" width="100" style="display:none;">
                            <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1"
                                onclick="removeImage()">&#10006;</button>
                        </div>
                    </div>
                    <span id="image-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                </div>
            </div>
            <button class="bg-gray-500 text-white mt-8 px-4 py-2 rounded" onclick="previousStep()">Back</button>
            <button class="bg-blue-500 text-white mt-8 px-4 py-2 rounded" onclick="finish()">Save</button>
        </div>
    </div>

    <script>
        let currentStep = 1;

        function updateStepper() {
            console.log("Updating stepper to step:", currentStep);
            for (let i = 1; i <= 3; i++) {
                const stepCircle = document.getElementById(`step-${i}-circle`);
                stepCircle.classList.toggle('bg-green-500', i < currentStep);
                stepCircle.classList.toggle('bg-blue-500', i === currentStep);
                stepCircle.classList.toggle('bg-gray-300', i > currentStep);
            }
            document.querySelectorAll('.step-content').forEach(content => content.classList.add('hidden'));
            document.getElementById(`step-${currentStep}-content`).classList.remove('hidden');
        }

        function validateStep(step) {
            let isValid = true;

            // Clear previous error messages
            document.querySelectorAll('.error-message').forEach(function(span) {
                span.style.display = 'none';
            });

            // Step 1 validation
            if (step === 1) {
                // Name Validation
                const name = document.getElementById('name');
                if (!name.value.trim()) {
                    document.getElementById('name-error').style.display = 'block';
                    document.getElementById('name-error').innerText = 'Name is required';
                    isValid = false;
                }

                // Email Validation
                const email = document.getElementById('email');
                const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!email.value.trim() || !emailRegex.test(email.value)) {
                    document.getElementById('email-error').style.display = 'block';
                    document.getElementById('email-error').innerText = 'Valid email is required';
                    isValid = false;
                }

                // Password Validation
                const password = document.getElementById('password');
                if (!password.value.trim() || password.value.length < 6) {
                    document.getElementById('password-error').style.display = 'block';
                    document.getElementById('password-error').innerText = 'Password must be at least 6 characters';
                    isValid = false;
                }

                // Status Validation
                const status = document.getElementById('status');
                if (status.value === 'disabled') {
                    document.getElementById('status-error').style.display = 'block';
                    document.getElementById('status-error').innerText = 'Status is required';
                    isValid = false;
                }

                // Start Date Validation
                const startDate = document.getElementById('start_date');
                if (!startDate.value) {
                    document.getElementById('start_date-error').style.display = 'block';
                    document.getElementById('start_date-error').innerText = 'Start date is required';
                    isValid = false;
                }

                // Description Validation
                const description = document.getElementById('description');
                if (!description.value.trim()) {
                    document.getElementById('description-error').style.display = 'block';
                    document.getElementById('description-error').innerText = 'Description is required';
                    isValid = false;
                }

                // Image Validation (optional if required)
                const image = document.getElementById('image');
                if (image.files.length === 0) {
                    document.getElementById('image-error').style.display = 'block';
                    document.getElementById('image-error').innerText = 'Image is required';
                    isValid = false;
                }
            }
            if (step == 2) {
                // Step 2 validation (optional)
                // Name Validation
                const name = document.getElementById('name1');
                if (!name.value.trim()) {
                    document.getElementById('name-error').style.display = 'block';
                    document.getElementById('name-error').innerText = 'Name is required';
                    isValid = false;
                }

                // Email Validation
                const email = document.getElementById('email1');
                const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!email.value.trim() || !emailRegex.test(email.value)) {
                    document.getElementById('email-error').style.display = 'block';
                    document.getElementById('email-error').innerText = 'Valid email is required';
                    isValid = false;
                }

                // Password Validation
                const password = document.getElementById('password1');
                if (!password.value.trim() || password.value.length < 6) {
                    document.getElementById('password-error').style.display = 'block';
                    document.getElementById('password-error').innerText = 'Password must be at least 6 characters';
                    isValid = false;
                }

                // Status Validation
                const status = document.getElementById('status1');
                if (status.value === 'disabled') {
                    document.getElementById('status-error').style.display = 'block';
                    document.getElementById('status-error').innerText = 'Status is required';
                    isValid = false;
                }

                // Start Date Validation
                const startDate = document.getElementById('start_date1');
                if (!startDate.value) {
                    document.getElementById('start_date-error').style.display = 'block';
                    document.getElementById('start_date-error').innerText = 'Start date is required';
                    isValid = false;
                }

                // Description Validation
                const description = document.getElementById('description1');
                if (!description.value.trim()) {
                    document.getElementById('description-error').style.display = 'block';
                    document.getElementById('description-error').innerText = 'Description is required';
                    isValid = false;
                }

                // Image Validation (optional if required)
                const image = document.getElementById('image1');
                if (image.files.length === 0) {
                    document.getElementById('image-error').style.display = 'block';
                    document.getElementById('image-error').innerText = 'Image is required';
                    isValid = false;
                }

            }
            return isValid;
        }

        function nextStep(step) {
            if (validateStep(step)) {
                currentStep++;
                updateStepper();
            }
        }

        function previousStep() {
            currentStep--;
            updateStepper();
        }

        function finish() {}

        updateStepper(); // Initialize stepper display

        function togglePasswordVisibility(passwordInputId, toggleButtonId) {
            const passwordInput = document.getElementById(passwordInputId);
            const eyeClosed = document.getElementById(`eye-closed-${passwordInputId}`);
            const eyeOpen = document.getElementById(`eye-open-${passwordInputId}`);
            const eyeCircle = document.getElementById(`eye-circle-${passwordInputId}`);
            const eyeDiagonal = document.getElementById(`eye-diagonal-${passwordInputId}`);

            document.getElementById(toggleButtonId).addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeClosed.classList.add('hidden');
                    eyeOpen.classList.remove('hidden');
                    eyeCircle.classList.remove('hidden');
                    eyeDiagonal.classList.add('hidden');
                } else {
                    passwordInput.type = 'password';
                    eyeClosed.classList.remove('hidden');
                    eyeOpen.classList.add('hidden');
                    eyeCircle.classList.add('hidden');
                    eyeDiagonal.classList.remove('hidden');
                }
            });
        }

        togglePasswordVisibility('password', 'toggle-password');
        togglePasswordVisibility('password1', 'toggle-password1');
    </script>
@endsection
