<!-- OTP Verification Modal -->
<div id="otpModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="otpModalLabel" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" id="otpModalBackdrop"></div>

    <!-- Modal Content Container - Perfectly Centered -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-2xl transform transition-all w-full max-w-lg mx-auto p-6 my-8">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-7 h-7 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        Verify Mobile Number
                    </h3>
                    <button type="button" id="otpModalCloseX" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="space-y-4">
                <!-- OTP Send Section -->
                <div id="otpSendSection">
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        We'll send a 6-digit verification code to your mobile number to confirm it's valid.
                    </p>
                    <div class="mb-4">
                        <label for="otpPhoneDisplay" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Mobile Number</label>
                        <input type="text" class="w-full px-4 py-3 text-center text-lg font-semibold bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white" id="otpPhoneDisplay" readonly>
                    </div>
                    <button type="button" class="w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300" id="sendOtpBtn">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Send OTP
                    </button>
                </div>

                <!-- OTP Verify Section -->
                <div id="otpVerifySection" class="hidden">
                    <div class="bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-4">
                        <p class="text-blue-800 dark:text-blue-200 text-sm flex items-start">
                            <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <span>A 6-digit OTP has been sent to <strong id="otpPhoneConfirm"></strong></span>
                        </p>
                    </div>
                    <div class="mb-4">
                        <label for="otpCode" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Enter OTP Code</label>
                        <input type="text" class="w-full px-4 py-4 text-center text-2xl font-bold bg-gray-50 dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 tracking-widest" id="otpCode" placeholder="000000" maxlength="6" pattern="[0-9]{6}">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 flex items-center justify-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            OTP expires in <span id="otpTimer" class="font-semibold ml-1">5:00</span>
                        </p>
                    </div>
                    <button type="button" class="w-full px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition duration-200 focus:outline-none focus:ring-4 focus:ring-green-300 mb-3" id="verifyOtpBtn">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Verify OTP
                    </button>
                    <button type="button" class="w-full px-6 py-2 text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium transition disabled:opacity-50 disabled:cursor-not-allowed" id="resendOtpBtn" disabled>
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Resend OTP
                    </button>
                </div>

                <!-- OTP Success Section -->
                <div id="otpSuccessSection" class="hidden text-center py-8">
                    <svg class="w-20 h-20 mx-auto text-green-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h4 class="text-2xl font-bold text-green-600 dark:text-green-400 mb-2">Mobile Number Verified!</h4>
                    <p class="text-gray-600 dark:text-gray-400">You can now continue with the form submission.</p>
                </div>

                <!-- Alert Messages -->
                <div id="otpAlert" class="hidden rounded-lg p-4"></div>
            </div>

            <!-- Footer -->
            <div class="mt-6 flex justify-end">
                <button type="button" class="px-6 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg transition duration-200" id="otpModalClose">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<style>
#otpCode:focus {
    outline: none;
}

#otpModal {
    display: none;
}

#otpModal.show {
    display: flex !important;
    align-items: center;
    justify-content: center;
}

/* Ensure modal content stays centered */
#otpModal > div:first-child {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Smooth fade-in animation */
#otpModal.show {
    animation: fadeIn 0.3s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Scale-in animation for modal content */
#otpModal.show > div > div {
    animation: scaleIn 0.3s ease-out;
}

@keyframes scaleIn {
    from {
        transform: scale(0.9);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.verifying {
    animation: pulse 1.5s ease-in-out infinite;
}
</style>
