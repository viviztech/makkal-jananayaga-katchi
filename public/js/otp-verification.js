/**
 * OTP Verification Handler (Vanilla JavaScript)
 * Handles mobile number verification using Fast2SMS OTP service
 */

class OTPVerification {
    constructor() {
        this.phoneNumber = null;
        this.isVerified = false;
        this.otpTimer = null;
        this.timeLeft = 300; // 5 minutes in seconds

        this.init();
    }

    init() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.bindEvents());
        } else {
            this.bindEvents();
        }
    }

    bindEvents() {
        // Bind event listeners
        const sendBtn = document.getElementById('sendOtpBtn');
        const verifyBtn = document.getElementById('verifyOtpBtn');
        const resendBtn = document.getElementById('resendOtpBtn');
        const closeBtn = document.getElementById('otpModalClose');
        const closeXBtn = document.getElementById('otpModalCloseX');
        const backdrop = document.getElementById('otpModalBackdrop');
        const otpInput = document.getElementById('otpCode');

        if (sendBtn) sendBtn.addEventListener('click', () => this.sendOTP());
        if (verifyBtn) verifyBtn.addEventListener('click', () => this.verifyOTP());
        if (resendBtn) resendBtn.addEventListener('click', () => this.resendOTP());
        if (closeBtn) closeBtn.addEventListener('click', () => this.closeModal());
        if (closeXBtn) closeXBtn.addEventListener('click', () => this.closeModal());

        // Close modal when clicking on backdrop
        if (backdrop) {
            backdrop.addEventListener('click', () => this.closeModal());
        }

        // Auto-verify when 6 digits are entered
        if (otpInput) {
            otpInput.addEventListener('input', (e) => {
                const value = e.target.value.replace(/[^0-9]/g, '');
                e.target.value = value;

                if (value.length === 6) {
                    this.verifyOTP();
                }
            });
        }
    }

    /**
     * Open OTP modal for phone verification
     */
    openModal(phoneNumber) {
        this.phoneNumber = phoneNumber;
        this.isVerified = false;

        const modal = document.getElementById('otpModal');
        const sendSection = document.getElementById('otpSendSection');
        const verifySection = document.getElementById('otpVerifySection');
        const successSection = document.getElementById('otpSuccessSection');
        const alertBox = document.getElementById('otpAlert');
        const otpInput = document.getElementById('otpCode');
        const phoneDisplay = document.getElementById('otpPhoneDisplay');

        // Reset modal state
        if (sendSection) this.show(sendSection);
        if (verifySection) this.hide(verifySection);
        if (successSection) this.hide(successSection);
        if (alertBox) this.hide(alertBox);
        if (otpInput) otpInput.value = '';

        // Display phone number
        if (phoneDisplay) phoneDisplay.value = phoneNumber;

        // Show modal
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }

    /**
     * Close modal
     */
    closeModal() {
        if (this.otpTimer) {
            clearInterval(this.otpTimer);
        }

        const modal = document.getElementById('otpModal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('show');
            document.body.style.overflow = '';
        }

        // Trigger custom event for parent to handle
        if (this.isVerified) {
            window.dispatchEvent(new CustomEvent('otpVerified', {
                detail: { phoneNumber: this.phoneNumber }
            }));
        }
    }

    /**
     * Send OTP to phone number
     */
    async sendOTP() {
        const btn = document.getElementById('sendOtpBtn');
        if (!btn) return;

        const originalHtml = btn.innerHTML;

        // Disable button and show loading
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Sending...';
        this.hideAlert();

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            const response = await fetch('/otp/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken ? csrfToken.getAttribute('content') : ''
                },
                body: JSON.stringify({
                    phone_number: this.phoneNumber
                })
            });

            const data = await response.json();

            if (data.success) {
                // Show OTP verify section
                const sendSection = document.getElementById('otpSendSection');
                const verifySection = document.getElementById('otpVerifySection');
                const phoneConfirm = document.getElementById('otpPhoneConfirm');
                const otpInput = document.getElementById('otpCode');

                if (sendSection) this.hide(sendSection);
                if (verifySection) this.show(verifySection);
                if (phoneConfirm) phoneConfirm.textContent = this.phoneNumber;

                // Start countdown timer
                this.startTimer();

                // Focus on OTP input
                if (otpInput) otpInput.focus();

                this.showAlert('success', data.message);
            } else {
                this.showAlert('error', data.message);
                btn.disabled = false;
                btn.innerHTML = originalHtml;
            }
        } catch (error) {
            console.error('Error sending OTP:', error);
            this.showAlert('error', 'Failed to send OTP. Please try again.');
            btn.disabled = false;
            btn.innerHTML = originalHtml;
        }
    }

    /**
     * Verify OTP code
     */
    async verifyOTP() {
        const otpInput = document.getElementById('otpCode');
        if (!otpInput) return;

        const otpCode = otpInput.value.trim();

        if (otpCode.length !== 6) {
            this.showAlert('warning', 'Please enter a valid 6-digit OTP code.');
            return;
        }

        const btn = document.getElementById('verifyOtpBtn');
        if (!btn) return;

        const originalHtml = btn.innerHTML;

        // Disable button and show loading
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Verifying...';
        this.hideAlert();

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            const response = await fetch('/otp/verify', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken ? csrfToken.getAttribute('content') : ''
                },
                body: JSON.stringify({
                    phone_number: this.phoneNumber,
                    otp_code: otpCode
                })
            });

            const data = await response.json();

            if (data.success) {
                // Stop timer
                if (this.otpTimer) {
                    clearInterval(this.otpTimer);
                }

                // Show success section
                const verifySection = document.getElementById('otpVerifySection');
                const successSection = document.getElementById('otpSuccessSection');

                if (verifySection) this.hide(verifySection);
                if (successSection) this.show(successSection);

                this.isVerified = true;
                this.showAlert('success', data.message);

                // Auto-close after 2 seconds
                setTimeout(() => {
                    this.closeModal();
                }, 2000);
            } else {
                this.showAlert('error', data.message);
                btn.disabled = false;
                btn.innerHTML = originalHtml;
                otpInput.value = '';
                otpInput.focus();
            }
        } catch (error) {
            console.error('Error verifying OTP:', error);
            this.showAlert('error', 'Failed to verify OTP. Please try again.');
            btn.disabled = false;
            btn.innerHTML = originalHtml;
        }
    }

    /**
     * Resend OTP
     */
    async resendOTP() {
        // Reset timer
        if (this.otpTimer) {
            clearInterval(this.otpTimer);
        }

        // Reset to send section
        const verifySection = document.getElementById('otpVerifySection');
        const sendSection = document.getElementById('otpSendSection');
        const otpInput = document.getElementById('otpCode');

        if (verifySection) this.hide(verifySection);
        if (sendSection) this.show(sendSection);
        if (otpInput) otpInput.value = '';

        // Automatically send OTP
        this.sendOTP();
    }

    /**
     * Start countdown timer
     */
    startTimer() {
        this.timeLeft = 300; // 5 minutes
        const resendBtn = document.getElementById('resendOtpBtn');
        if (resendBtn) resendBtn.disabled = true;

        this.otpTimer = setInterval(() => {
            this.timeLeft--;

            const minutes = Math.floor(this.timeLeft / 60);
            const seconds = this.timeLeft % 60;
            const timerEl = document.getElementById('otpTimer');
            if (timerEl) {
                timerEl.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            }

            if (this.timeLeft <= 0) {
                clearInterval(this.otpTimer);
                if (timerEl) timerEl.textContent = 'Expired';
                if (resendBtn) resendBtn.disabled = false;
                this.showAlert('warning', 'OTP has expired. Please request a new one.');
            }

            // Enable resend after 1 minute
            if (this.timeLeft <= 240 && resendBtn) { // 4 minutes left
                resendBtn.disabled = false;
            }
        }, 1000);
    }

    /**
     * Show alert message
     */
    showAlert(type, message) {
        const alert = document.getElementById('otpAlert');
        if (!alert) return;

        const colors = {
            success: 'bg-green-50 dark:bg-green-900/30 border-green-200 dark:border-green-800 text-green-700 dark:text-green-300',
            error: 'bg-red-50 dark:bg-red-900/30 border-red-200 dark:border-red-800 text-red-700 dark:text-red-300',
            warning: 'bg-yellow-50 dark:bg-yellow-900/30 border-yellow-200 dark:border-yellow-800 text-yellow-700 dark:text-yellow-300'
        };

        const icons = {
            success: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
            error: 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
            warning: 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'
        };

        alert.className = `border rounded-lg p-4 flex items-start ${colors[type] || colors.error}`;
        alert.innerHTML = `
            <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${icons[type] || icons.error}"></path>
            </svg>
            <span>${message}</span>
        `;
        alert.classList.remove('hidden');
    }

    /**
     * Hide alert message
     */
    hideAlert() {
        const alert = document.getElementById('otpAlert');
        if (alert) alert.classList.add('hidden');
    }

    /**
     * Utility: Show element
     */
    show(element) {
        if (element) element.classList.remove('hidden');
    }

    /**
     * Utility: Hide element
     */
    hide(element) {
        if (element) element.classList.add('hidden');
    }

    /**
     * Check if phone is verified
     */
    getVerificationStatus() {
        return this.isVerified;
    }
}

// Initialize OTP verification when script loads
let otpVerification;
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        otpVerification = new OTPVerification();
    });
} else {
    otpVerification = new OTPVerification();
}
