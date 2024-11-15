@extends('dashboard')
@section('content')
    <div class="page-content mx-4">
        <h1 class="text-lg font-bold text-gray-700 leading-tight text-center mt-12 mb-5"> Fill Form Data Here</h1>
        <form id="signUpForm" class="p-12 shadow-md rounded-2xl bg-white mx-auto border border-gray-100 mb-8" action="#!">
            <div class="form-header flex justify-between mb-4 text-xs text-center relative">
                <span class="stepIndicator flex-1 pb-2 text-indigo-600 border-b-2 border-indigo-600 cursor-pointer"
                    onclick="showTab(0)">First Step</span>
                <span class="stepIndicator flex-1 pb-2 border-b-2 border-gray-300 cursor-pointer" onclick="showTab(1)">Second
                    Step</span>
            </div>
            <div class="step">
                <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Form Data</p>
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name" autocomplete="name"
                                value="{{ $form->name }}"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <span id="name-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email"
                                value="{{ $form->email }}"
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
                                <option value="1" {{ $form->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $form->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <span id="status-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                    </div>

                    <div>
                        <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                        <div class="mt-2">
                            <input type="date" name="start_date" id="start_date" autocomplete="start_date"
                                value="{{ $form->start_date }}"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <span id="start_date-error" class="text-red-600 text-sm error-message"
                            style="display: none;"></span>

                    </div>

                    <div>
                        <label for="description"
                            class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="5"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $form->description }}</textarea>
                        </div>
                        <span id="description-error" class="text-red-600 text-sm error-message"
                            style="display: none;"></span>
                    </div>
                    <div>
                        <label for="is_true" class="block text-sm font-medium leading-6 text-gray-900">Is True</label>
                        <div class="mt-2 flex items-center space-x-2">
                            <input type="hidden" name="is_true" value="0">
                            <input type="checkbox" name="is_true" id="is_true" value="1" autocomplete="is_true"
                                {{ $form->is_true ? 'checked' : '' }} class="h-4 w-4 border-gray-300 rounded">
                            <span class="text-sm text-gray-900">Mark as True</span>
                        </div>
                        <span id="is_true-error" class="text-red-600 text-sm error-message"
                            style="display: none;"></span>
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
            </div>

            <div class="step hidden">
                <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Create Data</p>
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label for="name1" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input type="text" name="name1" id="name1" autocomplete="name1"
                                value="{{ $form->name1 }}"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <span id="name1-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                    </div>

                    <div>
                        <label for="email1" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email1" id="email1" autocomplete="email1"
                                value="{{ $form->email1 }}"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <span id="email1-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                    </div>
                    <div>
                        <label class="block text-sm mb-2 dark:text-white">Password</label>
                        <div class="relative">
                            <input id="password1" type="password" name="password1"
                                class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 "
                                placeholder="Enter password">
                            <button type="button" id="toggle-password1"
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
                        <span id="password1-error" class="text-red-600 text-sm error-message"
                            style="display: none;"></span>

                    </div>
                    <div>
                        <label for="status1" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                        <div class="mt-2">
                            <select name="status1" id="status1"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                                <option selected disabled>Open this select menu</option>
                                <option value="1" {{ $form->status1 == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $form->status1 == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <span id="status1-error" class="text-red-600 text-sm error-message"
                            style="display: none;"></span>
                    </div>

                    <div>
                        <label for="start_date1" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                        <div class="mt-2">
                            <input type="date" name="start_date1" id="start_date1" autocomplete="start_date1"
                                {{ $form->start_date1 }}
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <span id="start_date1-error" class="text-red-600 text-sm error-message"
                            style="display: none;"></span>
                    </div>

                    <div>
                        <label for="description1"
                            class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="description1" name="description1" rows="5"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $form->description1 }}</textarea>
                        </div>
                        <span id="description1-error" class="text-red-600 text-sm error-message"
                            style="display: none;"></span>
                    </div>
                    <div>
                        <label for="is_true1" class="block text-sm font-medium leading-6 text-gray-900">Is
                            True</label>
                        <div class="mt-2 flex items-center space-x-2">
                            <input type="hidden" name="is_true1" value="0">
                            <input type="checkbox" name="is_true1" id="is_true1" value="1"
                                {{ $form->is_true1 ? 'checked' : '' }} autocomplete="is_true1"
                                class="h-4 w-4 border-gray-300 rounded">
                            <span class="text-sm text-gray-900">Mark as True</span>
                        </div>
                        <span id="is_true1-error" class="text-red-600 text-sm error-message"
                            style="display: none;"></span>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">
                            Image1</label>
                        <div class="mt-2">
                            <input type="file" name="image1" id="image1"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600"
                                onchange="previewImage1(event)">
                        </div>
                        <div id="Image1PreviewContainer" class="relative mt-2" style="display:none;">
                            <div class="relative inline-block">
                                <img id="Image1Preview" src="" alt="Image Preview"
                                    class="rounded-md bg-gray-200 p-1" width="100" style="display:none;">
                                <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1"
                                    onclick="removeImage1()">&#10006;</button>
                            </div>
                        </div>
                        <span id="image1-error" class="text-red-600 text-sm error-message" style="display: none;"></span>
                    </div>

                </div>

            </div>

        </form>
        <div class="form-footer flex justify-end gap-3 mt-2">
            <button type="button" id="prevBtn"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                onclick="nextPrev(1)">Next</button>
        </div>

    </div>
    <script>
        let currentTab = 0;
        showTab(currentTab);

        function showTab(n) {
            const steps = document.getElementsByClassName("step");
            if (n >= steps.length) return;

            Array.from(steps).forEach(step => step.style.display = "none");
            steps[n].style.display = "block";

            document.getElementById("prevBtn").style.display = n === 0 ? "none" : "inline";
            document.getElementById("nextBtn").innerHTML = n === (steps.length - 1) ? "Submit" : "Next";

            fixStepIndicator(n);
        }

        async function nextPrev(n) {
            const steps = document.getElementsByClassName("step");
            if (n === 1 && !await validateForm()) return false;
            currentTab += n;
            currentTab = Math.max(0, Math.min(currentTab, steps.length));
            if (currentTab >= steps.length) {
                await submitFormData();
                return false;
            }

            showTab(currentTab);

            const nextButton = document.getElementById("nextBtn");
            nextButton.disabled = !await validateForm();
        }

        async function submitFormData() {
            const form = document.getElementById("signUpForm");

            if (!form) {
                console.error("Form with id 'signUpForm' not found.");
                alert("An error occurred: the form cannot be found.");
                return;
            }

            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch("/admin/store/form", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    }
                });

                if (response.ok) {
                    window.location.href = "{{ route('all.form') }}";
                } else {
                    const errorData = await response.json();
                    if (errorData.errors) {
                        displayErrors(errorData.errors);
                    } else {
                        console.error('Unexpected error format:', errorData);
                    }
                }
            } catch (error) {
                console.error("An error occurred while submitting the form:", error);
            }
        }

        function displayErrors(errors) {
            document.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
                el.textContent = '';
            });

            document.querySelectorAll('.border-red-500').forEach(el => {
                el.classList.remove('border-red-500');
            });

            for (let fieldName in errors) {
                const field = document.querySelector(`[name="${fieldName}"]`);
                const errorMessageElement = document.getElementById(`${fieldName}-error`);

                if (field && errorMessageElement) {
                    errorMessageElement.textContent = errors[fieldName][0];
                    errorMessageElement.style.display = 'block';
                    field.classList.add("border-red-500");
                }
            }
        }

        // Basic frontend validation function
        async function validateForm() {
            const steps = document.getElementsByClassName("step");
            if (steps.length <= currentTab) return false;

            const inputs = steps[currentTab].getElementsByTagName("input");
            let valid = true;

            if (inputs.length === 0) return true;

            Array.from(inputs).forEach(input => {
                if (input.value === "") {
                    input.classList.add("border-red-500");
                    valid = false;
                } else {
                    input.classList.remove("border-red-500");
                }
            });

            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentTab].classList.add("text-indigo-600");
            }

            if (valid && currentTab === 0) {
                const form = document.getElementById("signUpForm");
                if (!form) return false;

                const formData = new FormData(form);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    const response = await fetch("/admin/store/form", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        }
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        if (errorData.errors) {
                            displayErrors(errorData.errors);
                            valid = false;
                        }
                    }
                } catch (error) {
                    console.error("Server-side validation failed:", error);
                    valid = false;
                }
            }

            return valid;
        }

        function fixStepIndicator(n) {
            const indicators = document.getElementsByClassName("stepIndicator");

            Array.from(indicators).forEach(indicator => indicator.classList.remove("text-indigo-600", "border-indigo-600"));
            indicators[n].classList.add("text-indigo-600", "border-indigo-600");
        }

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
